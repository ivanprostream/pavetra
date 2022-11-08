<?php

namespace App\Http\Controllers\Admin;

use App\Models\CountryConstType;
use App\Services\Lang\LangService;
use App\Services\User\UserService;
use App\Services\Country\CountryService;
use App\Services\CountryConst\CountryConstService;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\StoreLangRequest;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\StoreCountryConstRequest;

class SettingsController extends Controller
{
    private $userService;
    private $countryService;
    private $langService;
    private $countryConstService;

    public function __construct( countryService $countryService, userService $userService,
    langService $langService, countryConstService $countryConstService ) {
        $this->countryService = $countryService;
        $this->userService = $userService;
        $this->langService = $langService;
        $this->countryConstService = $countryConstService;
    }

    public function index() {
        $user = $this->userService->authUser();
        $lang_list = $this->countryService->getAllCountries();
        return view('admin.settings', compact('user', 'lang_list'));
    }

    public function update(UpdateSettingRequest $request) {
        $this->userService->updateSetting($request);
        return back()->with('message', __('message.settings_updated'));
    }

    public function change_password() {
        $user = $this->userService->authUser();
        return view('admin.change_password', compact('user'));
    }

    public function update_password(UpdatePasswordRequest $request) {
        $this->userService->updatePassword($request);
        return back()->with('message', __('message.settings_updated'));
    }

    // Countries

    public function localization() {
        $user = $this->userService->authUser();
        $lang_list = $this->langService->getAllLangs();
        $country_list = $this->countryService->getAllCountries();
        return view('admin.localization', compact('user', 'lang_list', 'country_list'));
    }

    public function country_store(StoreCountryRequest $request) {
        $this->countryService->storeCountry($request);
        return redirect('/admin/localization')->with('message',  __('message.country_created'));
    }

    public function country_edit($id) {
        $country_data = $this->countryService->getItem($id);
        return view('admin.country_edit', compact('country_data'));
    }

    public function country_update(UpdateCountryRequest $request) {
        $this->countryService->updateCountry($request);
        return redirect('/admin/localization')->with('message', __('message.country_updated'));
    }

    // Languages

    public function lang_list() {
        $lang_list = $this->langService->getAllLangs();
        return view('admin.lang_list', compact('lang_list'));
    }

    public function lang_store(StoreLangRequest $request) {
        $this->langService->storeLang($request);
        return redirect('/admin/lang_list')->with('message', __('message.lang_created'));
    }

    public function lang_edit($id) {
        $lang_data = $this->langService->getItem($id);
        return view('admin.lang_edit', compact('lang_data'));
    }

    public function lang_update(StoreLangRequest $request) {
        $this->langService->updateLang($request);
        return redirect('/admin/lang_list')->with('message', __('message.lang_updated'));
    }

    // Constants

    public function country_const_list() {
        $user = $this->userService->authUser();
        $country_const_list = $this->countryConstService->getAll();
        $country_const_type = CountryConstType::all();
        return view('admin.settings.country_const_list', compact('user', 'country_const_list', 'country_const_type'));
    }

    public function country_const_store(StoreCountryConstRequest $request) {
        $this->countryConstService->storeCountryConst($request);
        return redirect('/admin/country_const_list')->with('message', __('message.constant_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function country_const_destroy($id)
    {
        $this->countryConstService->delete($id);
        return redirect('/admin/country_const_list')->with('message', __('message.constant_deleted'));
    }


}
