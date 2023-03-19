<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\CmsContent;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Cta;
use App\Models\Service;
use App\Models\WorkProcess;
use App\Models\Blog;
use App\Models\PageSection;
use App\Models\Setting;
use App\Models\Counter;

class PageController extends Controller
{
    public function home()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        return view('site.pages.home', compact('nav', 'sub_nav', 'page_title'));
    }

    public function about()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['counters'] = Counter::limit(4)->get();
        return view('site.pages.about', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function productDetail($slug)
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['row'] = Product::where('slug', $slug)->first();
        $data['cta'] = Cta::where('id', 3)->first();
        return view('site.pages.product', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function service()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['services'] = Service::where('status', 1)->orderBy('order', 'asc')->get();
        $data['cta'] = Cta::where('id', 2)->first();
        $data['process'] = WorkProcess::orderBy('order', 'asc')->limit(4)->get();
        return view('site.services.index', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function serviceDetail($slug)
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['row'] = Service::where('slug', $slug)->first();
        $data['cta'] = Cta::where('id', 3)->first();
        $data['services'] = Service::where('status', 1)->get();
        return view('site.services.detail', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function blog()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['blogs'] = Blog::where('status', 1)->orderBy('date', 'desc')->get();
        return view('site.blog.index', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function blogDetail($slug)
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['row'] = Blog::where('slug', $slug)->first();
        $data['blogs'] = Blog::where('status', 1)->orderBy('date', 'desc')->limit(6)->get();
        return view('site.blog.detail', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function contact()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['section'] = PageSection::where('id', 6)->first();
        $data['settings'] = Setting::first();
        return view('site.pages.contact', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function faq()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $data['faqs'] = Faq::where('status', 1)->get();
        return view('site.pages.faq', compact('nav', 'sub_nav', 'page_title'), $data);
    }

    public function cms($slug)
    {
        $nav = '';
        $cms = Cms::where('slug', $slug)->first();
        $data['row'] = CmsContent::where('cms_id', $cms->id)->first();
        return view('site.pages.cms', compact('nav'), $data);
    }

    public function error404()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        return view('site.pages.404', compact('nav', 'sub_nav', 'page_title'));
    }
}
