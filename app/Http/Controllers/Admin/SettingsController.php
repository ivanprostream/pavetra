<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryConst;
use App\Models\CountryConstType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index() {
        $user = Auth::user();
        $lang_list = Lang::all();
        return view('admin.settings', compact('user', 'lang_list'));
    }

    public function update(Request $request) {

        $user = Auth::user();
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $user_data = User::find($user->id);

        $formFields = $request->validate([
            'name' => 'required',
            'lang_id' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ]);

        $user_data->update($formFields);

        app()->setLocale($request->lang_id);

        return back()->with('message', __('admin.update_userdata'));
    }

    public function change_password() {
        $user = Auth::user();
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        return view('admin.change_password', compact('user'));
    }

    public function update_password(Request $request) {

        $user = Auth::user();
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $user_data = User::find($user->id);

        $formFields = $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        // Update new password for session
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('message', __('admin.update_userdata'));
    }

    // Countries

    public function localization() {

        $user = Auth::user();
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $lang_list = Lang::all();
        $country_list = Country::all();
        return view('admin.localization', compact('user', 'lang_list', 'country_list'));
    }

    public function country_store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'lang_id' => 'required'
        ]);

        Country::create($formFields);

        return redirect('/admin/localization')->with('message', 'Country created successfully!');
    }

    public function country_edit($id) {

        $country_data = Country::find($id);
        return view('admin.country_edit', compact('country_data'));
    }

    public function country_update(Request $request) {

        $formFields = $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        $country_data = Country::find($request->id);
        $country_data->update($formFields);

        return redirect('/admin/localization')->with('message', __('admin.update_data'));
    }

    // Languages

    public function lang_list() {

        $user = Auth::user();
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $lang_list = Lang::all();
        return view('admin.lang_list', compact('user', 'lang_list'));
    }

    public function lang_store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        Lang::create($formFields);

        return redirect('/admin/lang_list')->with('message', 'Language created successfully!');
    }

    public function lang_edit($id) {
        $lang_data = Lang::find($id);
        return view('admin.lang_edit', compact('lang_data'));
    }

    public function lang_update(Request $request) {

        $formFields = $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        $lang_data = Lang::find($request->id);
        $lang_data->update($formFields);

        return redirect('/admin/lang_list')->with('message', __('admin.update_data'));
    }

    // Constants

    public function country_const_list() {

        $user = Auth::user();
        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $country_const_list = CountryConst::where('lang_id', 1)->get();
        $country_const_type = CountryConstType::all();
        return view('admin.settings.country_const_list', compact('user', 'country_const_list', 'country_const_type'));
    }

    public function country_const_store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'lang_id' => 'required',
            'country_const_type_id' => 'required'
        ]);

        CountryConst::create($formFields);

        return redirect('/admin/country_const_list')->with('message', 'Constant created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function country_const_destroy($id)
    {
        CountryConst::find($id)->delete();
        return redirect('/admin/country_const_list')->with('message', 'Constant deleted successfully!');
    }


}
