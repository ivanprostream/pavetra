<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Country;
use App\Models\PageType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_list = Page::where('lang_id', Auth::user()->country_id)->where('parent', NULL)->orderBy('sort')->get();
        $sidebar = 'pages';
        $sort = '/admin/page/sorting';
        return view('admin.pages.index', compact('page_list', 'sidebar', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $sidebar = 'pages';
        $country_list = Country::all();
        $template_list = PageType::all();
        $page_list = Page::where('lang_id', $user = Auth::user()->country_id)->get();
        return view('admin.pages.create', compact('sidebar', 'country_list', 'template_list', 'page_list'));
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
            'page_type_id' => 'required',
            'is_active' => 'required',
            'in_menu' => 'required',
            'parent' => ''
        ]);

        $formFields['url'] =  Str::of($request->url)->slug('-');
        $formFields['path'] = $this->createPagePath( $formFields['parent'], $formFields['url'] );


        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        Page::create($formFields);

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
        $page_list = Page::where('lang_id', Auth::user()->country_id)->where('parent', $id)->orderBy('sort')->get();
        $sidebar = 'pages';
        $sort = '/admin/page/sorting';
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
        $sidebar = 'pages';
        $country_list = Country::all();
        $template_list = PageType::all();
        $page_list = Page::where('lang_id', Auth::user()->country_id)->get();
        $page_data = Page::find($id);
        return view('admin.pages.edit', compact('sidebar', 'country_list', 'template_list', 'page_list', 'page_data'));
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
        $page_data = Page::find($id);

        $formFields = $request->validate([
            'name' => 'required|max:150',
            'url' => 'required|max:150',
            'short_text' => 'max:255',
            'content' => 'required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'lang_id' => 'required',
            'page_type_id' => 'required',
            'is_active' => 'required',
            'in_menu' => 'required',
            'parent' => ''
        ]);

        $formFields['url'] =  Str::of($request->url)->slug('-');
        $formFields['path'] = $this->createPagePath( $formFields['parent'], $formFields['url'] );

        if(isset($page_data->image) && $request->hasFile('image')) {
            File::delete($page_data->image);  // don't work
        }

        if($request->hasFile('image')) {

            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        $result = $page_data->update($formFields);

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
        $page = Page::find($id);

        $image_path = $page->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $page->delete();

        return redirect('/admin/pages')->with('message', __('message.page_deleted'));
    }

    public function createPagePath($parent, $url)
    {
        if(empty($parent)) {
            return $url;
        } else {
        $page = Page::find($parent);
            return $page->path.'/'.$url;
        }
    }

    public function sorting(Request $request) {
        $array = $request->only('sort');

        if($array['sort']){

            $list = explode("&", $array['sort']);

            foreach ($list as $key => $value) {
                $id = explode("=", $value);
                $model = Page::find($id[1]);
                $model->sort = $key;
                $model->save();
            }
        }
    }


}
