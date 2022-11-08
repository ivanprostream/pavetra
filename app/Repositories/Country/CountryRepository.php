<?php
namespace App\Repositories\Country;

use App\Models\Country;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class CountryRepository
{
  protected $model;

  public function __construct(Country $model)
  {
    $this->model = $model;
  }

  public function all()
  {
    return $this->model->all();
  }

  public function getRow($id) {
    return $this->model->where('id', $id)->first();
  }

  public function store($request) {
    $model = $this->model;
    $model->name = $request['name'];
    $model->url = $request['url'];
    $model->lang_id = $request['lang_id'];

    $model->save();
    return $model;
  }

  public function update($request) {
    $model = $this->getRow($request['id']);
    $model->name = $request['name'];
    $model->url = $request['url'];

    $model->save();
    return $model;
  }



}
