<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Category\CategoryService;
use App\Services\Country\CountryService;

use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;

class CategoryController extends Controller
{

    private $categoryService;
    private $countryService;

    public $sidebar = 'categories';
    public $sort = '/admin/category/sorting';

    public function __construct( categoryService $categoryService, countryService $countryService ) {
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_list = $this->categoryService->getParentCategories();
        $sidebar = $this->sidebar;
        $sort = $this->sort;
        return view('admin.categories.index', compact('category_list', 'sidebar', 'sort'));
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
        $category_list = $this->categoryService->getParentCategories();
        return view('admin.categories.create', compact('sidebar', 'country_list', 'category_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->storeCategory($request);
        return redirect('/admin/categories')->with('message', __('message.category_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_list = $this->categoryService->getChildCategories($id);
        $sidebar = $this->sidebar;
        $sort = $this->sort;
        return view('admin.categories.show', compact('category_list', 'sidebar', 'sort'));
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
        $category_list = $this->categoryService->getParentCategories();
        $category_data = $this->categoryService->getItem($id);
        return view('admin.categories.edit', compact('sidebar', 'country_list', 'category_list', 'category_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryService->updateCategory($request, $id);
        return redirect('/admin/categories')->with('message', __('message.category_updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->delete($id);

        return redirect('/admin/categories')->with('message', __('message.category_deleted'));
    }

    public function sorting(Request $request) {
        $array = $request->only('sort');

        if($array['sort']){

            $list = explode("&", $array['sort']);

            foreach ($list as $key => $value) {
                $id = explode("=", $value);
                $model = $this->categoryService->getItem($id[1]);
                $model->sort = $key;
                $model->save();
            }
        }
    }
}
