<?php
namespace App\Repositories\User;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
  protected $model;

  public function __construct(User $model)
  {
    $this->model = $model;
  }

  public function all() {
    return $this->model->all();
    }


  public function authUser() {
    return Auth::user();
  }

  public function user() {
    return $this->model->where(Auth::user()->id);
  }

  public function getRow($id) {
    return $this->model->where('id', $id)->first();
  }

  public function updateSetting($request) {
    $model = $this->getRow(Auth::user()->id);
    $model->name = $request['name'];
    $model->lang_id = $request['lang_id'];
    $model->phone = $request['phone'];
    $model->gender = $request['gender'];

    $model->update();
    return $model;
  }

  public function updatePassword($request) {
    $model = $this->getRow(Auth::user()->id);
    $model->password = Hash::make($request['password']);
    $model->update();

    $this->model->whereId(auth()->user()->id)->update([
        'password' => Hash::make($request['password'])
    ]);

    return $model;
  }

  public function create($request) {
    $model = $this->model;
    $model->name = $request['name'];
    $model->phone = $request['phone'];
    $model->gender = $request['gender'];
    $model->email = $request['email'];
    $model->country_id = $request['country_id'];
    $model->lang_id = $request['lang_id'];
    $model->password = Hash::make($request['password']);

    $model->save();

    $user = User::latest()->first();
    $user->syncRoles($request->get('role'));

    return $model;
  }

  public function update($request) {
    $model = $this->getRow($request['id']);
    $model->name = $request['name'];
    $model->phone = $request['phone'];
    $model->gender = $request['gender'];
    $model->email = $request['email'];
    $model->country_id = $request['country_id'];
    $model->lang_id = $request['lang_id'];

    if(!empty($request['password'])) {
        $model->password = Hash::make($request['password']);
    } else {
        $model->password = $this->getRow($request['id'])->password;
    }

    $model->save();

    $this->getRow($request['id'])->syncRoles($request->get('role'));

    return $model;
  }

  public function delete($id) {
    $model = $this->getRow($id);
    return $model->delete();
  }



}
