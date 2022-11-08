<?php
namespace App\Repositories\CountryConst;

use App\Models\CountryConst;

use Illuminate\Support\Facades\Auth;

class CountryConstRepository
{
  protected $model;

  public function __construct(CountryConst $model) {
    $this->model = $model;
  }

  public function all() {
    return $this->model->where('lang_id', Auth::user()->country_id)->get();
  }

  public function getRow($id) {
    return $this->model->where('id', $id)->first();
  }

  public function store($request) {
    $model = $this->model;
    $model->name = $request['name'];
    $model->lang_id = $request['lang_id'];
    $model->country_const_type_id = $request['country_const_type_id'];

    $model->save();
    return $model;
  }

  public function delete($id) {
    $model = $this->getRow($id);
    return $model->delete();
  }

}
