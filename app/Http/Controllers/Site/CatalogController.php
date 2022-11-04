<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{

    public function search() {
        $header_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [1, 3])->orderBy('sort')->get();
        $footer_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [2, 3])->orderBy('sort')->get();
        return view('site.catalog.search', compact('header_menu', 'footer_menu'));
    }
}
