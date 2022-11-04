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

}
