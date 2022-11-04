<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_list = Category::where('lang_id', Auth::user()->country_id)->where('parent', NULL)->orderBy('sort')->get();
        $sidebar = 'categories';
        $sort = '/admin/category/sorting';
        return view('admin.categories.index', compact('category_list', 'sidebar', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $sidebar = 'categories';
        $country_list = Country::all();
        $category_list = Category::where('parent', NULL)->where('lang_id', $user->country_id)->get();
        return view('admin.categories.create', compact('sidebar', 'country_list', 'category_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|max:150',
            'url' => 'required|max:150',
            'short_text' => 'max:255',
            'content' => 'required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'lang_id' => 'required',
            'is_active' => 'required',
            'in_tags' => 'required',
        ]);

        $formFields['url'] =  Str::of($request->url)->slug('-');

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        Category::create($formFields);

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
        $category_list = Category::where('lang_id', Auth::user()->country_id)->where('parent', $id)->orderBy('sort')->get();
        $sidebar = 'categories';
        $sort = '/admin/category/sorting';
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
        $sidebar = 'categories';
        $country_list = Country::all();
        $category_list = Category::where('parent', NULL)->where('lang_id', Auth::user()->country_id)->get();
        $category_data = Category::find($id);
        return view('admin.categories.edit', compact('sidebar', 'country_list', 'category_list', 'category_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_data = Category::find($id);

        $formFields = $request->validate([
            'name' => 'required|max:150',
            'url' => 'required|max:150',
            'short_text' => 'max:255',
            'content' => 'required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'lang_id' => 'required',
            'is_active' => 'required',
            'in_tags' => 'required',
        ]);

        $formFields['url'] =  Str::of($request->url)->slug('-');

        if(isset($category_data->image) && $request->hasFile('image')) {
            File::delete($category_data->image);  // don't work
        }

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        $category_data->update($formFields);

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
        $category = Category::find($id);

        $image_path = $category->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $category->delete();

        return redirect('/admin/categories')->with('message', __('message.category_deleted'));
    }

    public function sorting(Request $request) {
        $array = $request->only('sort');

        if($array['sort']){

            $list = explode("&", $array['sort']);

            foreach ($list as $key => $value) {
                $id = explode("=", $value);
                $model = Category::find($id[1]);
                $model->sort = $key;
                $model->save();
            }
        }
    }
}
