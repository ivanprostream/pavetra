<?php
namespace App\Repositories\Psych;

use App\Models\Psych;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class PsychRepository
{
  protected $model;

  public function __construct(Psych $model)
  {
    $this->model = $model;
  }

  public function allByCountry()
  {
    return $this->model->where('country_id', Auth::user()->country_id)->get();
  }

}
