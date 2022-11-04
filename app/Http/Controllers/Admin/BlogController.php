<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Psych;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_list = Blog::where('country_id', Auth::user()->country_id)->orderBy('sort')->get();
        $sidebar = 'blog';
        $sort = '/admin/blog/sorting';
        return view('admin.blog.index', compact('blog_list', 'sidebar', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $sidebar = 'blog';
        $country_list = Country::all();
        $category_list = Category::where('lang_id', $user->country_id)->where('parent', NULL)->get();
        $author_list = Psych::where('country_id', $user->country_id)->get();
        return view('admin.blog.create', compact('sidebar', 'country_list', 'category_list', 'author_list'));
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
            'name' => ['required', 'max:160', Rule::unique('blog', 'name')],
            'url' => ['required', 'max:160', Rule::unique('blog', 'url')],
            'short_text' => 'max:255',
            'content' => 'required',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
            'country_id' => 'required',
            'is_active' => 'required',
            'psych_id' => 'required',
            'category_id' => 'required',
        ]);

        $formFields['url'] =  Str::of($request->url)->slug('-');

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        Blog::create($formFields);

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
        $user = Auth::user();
        $sidebar = 'blog';
        $country_list = Country::all();
        $category_list = Category::where('lang_id', $user->country_id)->where('parent', NULL)->get();
        $author_list = Psych::where('country_id', $user->country_id)->get();
        $blog_data = Blog::find($id);
        return view('admin.blog.edit', compact('sidebar', 'country_list', 'blog_data', 'author_list', 'category_list'));
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
        $blog_data = Blog::find($id);

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
            'category_id' => 'required',
        ]);

        $formFields['url'] =  Str::of($request->url)->slug('-');

        if(isset($blog_data->image) && $request->hasFile('image')) {
            File::delete($blog_data->image);  // don't work
        }

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        $blog_data->update($formFields);

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
        $blog = Blog::find($id);

        $image_path = $blog->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $blog->delete();

        return redirect('/admin/blog')->with('message', __('message.blog_deleted'));
    }

    public function sorting(Request $request) {
        $array = $request->only('sort');

        if($array['sort']){

            $list = explode("&", $array['sort']);

            foreach ($list as $key => $value) {
                $id = explode("=", $value);
                $model = Blog::find($id[1]);
                $model->sort = $key;
                $model->save();
            }
        }
    }

}
