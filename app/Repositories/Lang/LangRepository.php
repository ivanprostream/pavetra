<?php
namespace App\Repositories\Lang;

use App\Models\Lang;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class LangRepository
{
  protected $model;

  public function __construct(Lang $model) {
    $this->model = $model;
  }

  public function all() {
    return $this->model->all();
  }

  public function store($request) {
    $model = $this->model;
    $model->name = $request['name'];
    $model->url = $request['url'];

    $model->save();
    return $model;
  }

  public function getRow($id) {
    return $this->model->where('id', $id)->first();
  }

  public function update($request) {
    $model = $this->getRow($request['id']);
    $model->name = $request['name'];
    $model->url = $request['url'];

    $model->save();
    return $model;
  }

}
