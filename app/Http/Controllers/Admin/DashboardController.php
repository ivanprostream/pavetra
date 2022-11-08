<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $sidebar = 'dashboard';

    public function index() {
        $sidebar = $this->sidebar;
        return view('admin.index', compact('sidebar'));
    }
}
