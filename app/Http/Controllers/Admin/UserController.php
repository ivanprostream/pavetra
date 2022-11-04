<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = User::all();
        $sidebar = 'users';
        return view('admin.users.index', compact('user_list', 'sidebar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sidebar = 'users';
        $roles = Role::all();
        $lang_list = Lang::all();
        $country_list = Country::all();
        return view('admin.users.create', compact('sidebar', 'roles', 'lang_list', 'country_list'));
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
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'country_id' => 'required',
            'lang_id' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $formFields['password'] = Hash::make($request->password);

        $user = User::create($formFields);

        $user->syncRoles($request->get('role'));

        return redirect('/admin/users')->with('message', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = User::find($id);
        $sidebar = 'users';
        $roles = Role::all();
        $lang_list = Lang::all();
        $country_list = Country::all();

        return view('admin.users.edit', compact('user_data', 'sidebar', 'roles', 'lang_list', 'country_list'));
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
        $user_data = User::find($id);

        $formFields = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'country_id' => 'required',
            'lang_id' => 'required'
        ]);

        $password = $request->get('password');
        if(empty($password)) {
            $formFields['password'] = $user_data->password;
        } else {
            $formFields['password'] = Hash::make($request->password);
        }

        $user_data->update($formFields);

        $user_data->syncRoles($request->get('role'));

        return redirect('/admin/users')->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user_data = User::find($id);
        $user_data->delete();
        return redirect('/admin/users')->with('message', 'User deleted successfully!');
    }
}
