<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Blog\BlogService;
use App\Services\Category\CategoryService;
use App\Services\Country\CountryService;
use App\Services\Psych\PsychService;

use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;

class BlogController extends Controller
{
    private $blogService;
    private $categoryService;
    private $countryService;
    private $psychService;

    public $sidebar = 'blog';
    public $sort = '/admin/blog/sorting';

    public function __construct( blogService $blogService, categoryService $categoryService,
    countryService $countryService, psychService $psychService ) {
        $this->blogService = $blogService;
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->psychService = $psychService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $blog_list = $this->blogService->getAllArticles();
        $sidebar=$this->sidebar;
        $sort=$this->sort;
        return view('admin.blog.index', compact('blog_list', 'sidebar', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sidebar=$this->sidebar;
        $country_list = $this->countryService->getAllCountries();
        $category_list = $this->categoryService->getParentCategories();
        $author_list = $this->psychService->getAllByCountry();
        return view('admin.blog.create', compact('sidebar', 'country_list', 'category_list', 'author_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $this->blogService->storeArticle($request);
        return redirect('/admin/blog')->with('message', __('message.blog_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sidebar=$this->sidebar;
        $country_list = $this->countryService->getAllCountries();
        $category_list = $this->categoryService->getParentCategories();
        $author_list = $this->psychService->getAllByCountry();
        $blog_data = $this->blogService->getItem($id);
        return view('admin.blog.edit', compact('sidebar', 'country_list', 'blog_data', 'author_list', 'category_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        $this->blogService->updateArticle($request, $id);

        return redirect('/admin/blog')->with('message', __('message.blog_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->delete($id);
        return redirect('/admin/blog')->with('message', __('message.blog_deleted'));
    }


    public function sorting(Request $request) {
        $array = $request->only('sort');

        if($array['sort']){

            $list = explode("&", $array['sort']);

            foreach ($list as $key => $value) {
                $id = explode("=", $value);
                $model = $this->blogService->getItem($id[1]);
                $model->sort = $key;
                $model->save();
            }
        }
    }

}
