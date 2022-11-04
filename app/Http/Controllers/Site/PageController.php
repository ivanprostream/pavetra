<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Category;
use App\Models\CountryConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function page(Request $request) {

        $uri = $request->path();
        $header_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [1, 3])->orderBy('sort')->get();
        $footer_menu = Page::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->whereIn('in_menu', [2, 3])->orderBy('sort')->get();

        $page_data = Page::where('path', $uri)->where('lang_id', 1)->where('is_active', 1)->first();
        $category_data = Category::where('path', $uri)->where('lang_id', 1)->where('is_active', 1)->first();
        if(!empty($page_data)) {
            switch ($page_data->page_type_id) {

                case 1:  /** standart page **/
                    return view('site.pages.standart_page', compact('page_data','header_menu','footer_menu'));
                break;

                case 2:  /** page with sidebar **/
                    return view('site.pages.sidebar_page', compact('page_data','header_menu','footer_menu'));
                break;

                case 3:  /** page contact **/
                    $contact_list = CountryConst::where('lang_id', 1)->whereIn('country_const_type_id', [1,2,3])->get();
                    return view('site.pages.contact_page', compact('page_data','header_menu','footer_menu', 'contact_list'));
                break;

                case 4:  /** page blog **/
                    $tags = Category::where('lang_id', 1)->whereIn('in_tags', [2,3])->orderBy('sort')->get(); // in_tags = 3 show in sidebar
                    $last_articles = Blog::where('country_id', 1)->orderBy('created_at', 'DESC')->get();
                    $parent_categories =  Category::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->orderBy('sort')->get();
                    return view('site.pages.blog', compact('page_data','header_menu','footer_menu','last_articles', 'parent_categories', 'tags'));
                break;

                case 5:  /** page catalog **/
                    return view('site.pages.catalog', compact('page_data','header_menu','footer_menu'));
                break;

            }
        } elseif (!empty($category_data)) {
            $parent_categories =  Category::where('lang_id', 1)->where('parent', NULL)->where('is_active', 1)->orderBy('sort')->get();
            return view('site.pages.catalog', compact('category_data','header_menu','footer_menu', 'parent_categories'));
        } else {
            echo '404';
        }



    }
}
