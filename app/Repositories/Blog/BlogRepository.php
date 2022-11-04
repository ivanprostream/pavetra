<?php
namespace App\Repositories\Blog;

use App\Models\Blog;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class BlogRepository
{
  protected $model;

  public function __construct(Blog $model) {
    $this->model = $model;
  }

  public function all() {
    return $this->model
    ->where('country_id', Auth::user()
    ->country_id)
    ->orderBy('sort')
    ->get();
  }

  public function store($request) {
    $model = $this->model;
    $model->name = $request['name'];
    $model->url = Str::of($request['url'])->slug('-');
    $model->short_text = $request['short_text'];
    $model->content = $request['content'];
    $model->meta_title = $request['meta_title'];
    $model->meta_description = $request['meta_description'];
    $model->meta_keywords = $request['meta_keywords'];
    $model->country_id = $request['country_id'];
    $model->category_id = $request['category_id'];
    $model->is_active = $request['is_active'];
    $model->psych_id = $request['psych_id'];

    if($request->hasFile('image')) {
        $model->image = $request->file('image')->store('img', 'public');
    }

    $model->save();
    return $model;
  }

  public function getRow($id) {
    return $this->model->where('id', $id)->first();
  }

  public function update($request, $id) {

    $model = $this->getRow($id);
    $model->name = $request['name'];
    $model->url = Str::of($request['url'])->slug('-');
    $model->short_text = $request['short_text'];
    $model->content = $request['content'];
    $model->meta_title = $request['meta_title'];
    $model->meta_description = $request['meta_description'];
    $model->meta_keywords = $request['meta_keywords'];
    //$model->country_id = $request['country_id'];
    $model->category_id = $request['category_id'];
    $model->is_active = $request['is_active'];
    $model->psych_id = $request['psych_id'];

    if($request->hasFile('image')) {

        $image_path = './public/storage/'.$model->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

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

}
