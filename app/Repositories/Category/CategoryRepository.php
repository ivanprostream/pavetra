<?php
namespace App\Repositories\Category;

use App\Models\Category;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository
{
  protected $model;

  public function __construct(Category $model)
  {
    $this->model = $model;
  }

  public function allParent()
  {
    return $this->model->where('lang_id', Auth::user()->country_id)->where('parent', NULL)->get();
  }

}
