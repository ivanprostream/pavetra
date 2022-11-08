<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\User\UserService;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use App\Services\Country\CountryService;
use App\Http\Requests\Admin\StoreUserRequest;

class UserController extends Controller
{
    private $userService;

    public $sidebar = 'users';

    public function __construct( userService $userService, countryService $countryService ) {
        $this->userService = $userService;
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = $this->userService->allUsers();
        $sidebar = $this->sidebar;
        return view('admin.users.index', compact('user_list', 'sidebar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sidebar = $this->sidebar;
        $roles = Role::all();
        $lang_list = Lang::all();
        $country_list = $this->countryService->getAllCountries();
        return view('admin.users.create', compact('sidebar', 'roles', 'lang_list', 'country_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->userService->storeUser($request);
        return redirect('/admin/users')->with('message', __('message.user_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = $this->userService->getItem($id);
        $sidebar = $this->sidebar;
        $roles = Role::all();
        $lang_list = Lang::all();
        $country_list = $this->countryService->getAllCountries();

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
        $this->userService->updateUser($request);
        return redirect('/admin/users')->with('message', __('message.user_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->userService->delete($id);
        return redirect('/admin/users')->with('message', __('message.user_deleted'));
    }
}
