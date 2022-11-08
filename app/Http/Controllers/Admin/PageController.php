<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Page\PageService;
use App\Services\Country\CountryService;

use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;

class PageController extends Controller
{
    private $pageService;
    private $countryService;

    public $sidebar = 'pages';
    public $sort = '/admin/page/sorting';

    public function __construct( countryService $countryService, pageService $pageService ) {
        $this->countryService = $countryService;
        $this->pageService = $pageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_list = $this->pageService->getParentPages();
        $sidebar = $this->sidebar;
        $sort = $this->sort;
        return view('admin.pages.index', compact('page_list', 'sidebar', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sidebar = $this->sidebar;
        $country_list = $this->countryService->getAllCountries();
        $page_list = $this->pageService->getParentPages();
        $template_list = $this->pageService->getPageTemplates();
        return view('admin.pages.create', compact('sidebar', 'country_list', 'template_list', 'page_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $this->pageService->storePage($request);
        return redirect('/admin/pages')->with('message', __('message.page_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $country_list = $this->countryService->getAllCountries();
        $page_list = $this->pageService->getChildCategories($id);
        $sidebar = $this->sidebar;
        $sort = $this->sort;
        return view('admin.pages.show', compact('page_list', 'sidebar', 'sort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sidebar = $this->sidebar;
        $country_list = $this->countryService->getAllCountries();
        $template_list = $this->pageService->getPageTemplates();
        $page_list = $this->pageService->getParentPages();
        $page_data = $this->pageService->getItem($id);
        return view('admin.pages.edit', compact('sidebar', 'country_list', 'template_list', 'page_list', 'page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $this->pageService->updatePage($request, $id);
        return redirect('/admin/pages')->with('message', __('message.page_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pageService->delete($id);
        return redirect('/admin/pages')->with('message', __('message.page_deleted'));
    }

    public function createPagePath($parent, $url)
    {
        if(empty($parent)) {
            return $url;
        } else {
        $page = $this->pageService->getItem($parent);
            return $page->path.'/'.$url;
        }
    }

    public function sorting(Request $request) {
        $array = $request->only('sort');

        if($array['sort']){

            $list = explode("&", $array['sort']);

            foreach ($list as $key => $value) {
                $id = explode("=", $value);
                $model = $this->pageService->getItem($id[1]);
                $model->sort = $key;
                $model->save();
            }
        }
    }


}
