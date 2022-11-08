<?php
namespace App\Repositories\Category;

use App\Models\Category;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository
{
  protected $model;

  public function __construct(Category $model) {
    $this->model = $model;
  }

  public function allParent() {
    return $this->model->where('lang_id', Auth::user()->country_id)->where('parent', NULL)->orderBy('sort')->get();
  }

  public function childCategories($id) {
    return $this->model->where('lang_id', Auth::user()->country_id)->where('parent', $id)->orderBy('sort')->get();
  }

  public function getRow($id) {
    return $this->model->where('id', $id)->first();
  }

  public function store($request) {
    $model = $this->model;
    $model->name = $request['name'];
    $model->url = Str::of($request['url'])->slug('-');
    $model->parent = $request['parent'];
    $model->path = $this->createPagePath($request['parent'], Str::of($request['url'])->slug('-'));
    $model->short_text = $request['short_text'];
    $model->content = $request['content'];
    $model->meta_title = $request['meta_title'];
    $model->meta_description = $request['meta_description'];
    $model->meta_keywords = $request['meta_keywords'];
    $model->lang_id = $request['lang_id'];
    $model->is_active = $request['is_active'];
    $model->in_tags = $request['in_tags'];

    if($request->hasFile('image')) {
        $model->image = $request->file('image')->store('img', 'public');
    }

    $model->save();
    return $model;
  }

  public function update($request, $id) {

    $model = $this->getRow($id);
    $model->name = $request['name'];
    $model->parent = $request['parent'];
    $model->url = Str::of($request['url'])->slug('-');
    $model->path = $this->createPagePath($request['parent'], Str::of($request['url'])->slug('-'));
    $model->short_text = $request['short_text'];
    $model->content = $request['content'];
    $model->meta_title = $request['meta_title'];
    $model->meta_description = $request['meta_description'];
    $model->meta_keywords = $request['meta_keywords'];
    //$model->lang_id = $request['lang_id'];
    $model->is_active = $request['is_active'];
    $model->in_tags = $request['in_tags'];

    if($request->hasFile('image')) {
        $image_path = './public/storage/'.$model->image;
        if(File::exists($image_path)) { File::delete($image_path); }
        $model->image = $request->file('image')->store('img', 'public');
    }

    $model->save();
    return $model;
  }

  public function delete($id) {
    $model = $this->getRow($id);

    $image_path = './public/storage/'.$model->image;
    if(File::exists($image_path)) {
        File::delete($image_path);
    }
    return $model->delete();
  }

  public function createPagePath($parent, $url){
    if(empty($parent)) {
        return $url;
    } else {
        $page = $this->getRow($parent);
        return $page->path.'/'.$url;
    }
  }

}
