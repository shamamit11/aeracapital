<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\CmsContent;
use App\Models\Faq;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Cta;
use App\Models\Service;
use App\Models\WorkProcess;
use App\Models\Blog;
use App\Models\PageSection;
use App\Models\LandingPage;
use App\Models\Setting;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function admin()
    {
        return redirect()->route('admin-dashboard');
    }
    public function home()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $seo_link = url()->current();
        return view('site.pages.home', compact('nav', 'sub_nav', 'page_title', 'seo_link'));
    }

    public function about()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $seo_link = url()->current();
        $data['counters'] = Counter::limit(4)->get();
        return view('site.pages.about', compact('nav', 'sub_nav', 'page_title', 'seo_link'), $data);
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
        $seo_link = url()->current();
        $data['services'] = Service::where('status', 1)->orderBy('order', 'asc')->get();
        $data['cta'] = Cta::where('id', 2)->first();
        $data['process'] = WorkProcess::orderBy('order', 'asc')->limit(4)->get();
        return view('site.services.index', compact('nav', 'sub_nav', 'page_title', 'seo_link'), $data);
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
        $seo_link = url()->current();
        $data['blogs'] = Blog::where('status', 1)->orderBy('date', 'desc')->get();
        return view('site.blog.index', compact('nav', 'sub_nav', 'page_title', 'seo_link'), $data);
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
        $seo_link = url()->current();
        $data['section'] = PageSection::where('id', 6)->first();
        $data['settings'] = Setting::first();
        return view('site.pages.contact', compact('nav', 'sub_nav', 'page_title', 'seo_link'), $data);
    }

    public function faq()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $seo_link = url()->current();
        $data['faqs'] = Faq::where([['status', 1]])->orderBy('order', 'asc')->get();
        return view('site.pages.faq', compact('nav', 'sub_nav', 'page_title', 'seo_link'), $data);
    }

    public function cms($slug)
    {
        $nav = '';
        $cms = Cms::where('slug', $slug)->first();
        $data['row'] = CmsContent::where('cms_id', $cms->id)->first();
        return view('site.pages.cms', compact('nav'), $data);
    }

    public function error404(Request $request)
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $seo_link = url()->current();
        return view('site.pages.404', compact('nav', 'sub_nav', 'page_title', 'seo_link'));
    }

    public function landingPage($slug)
    {
        $nav = '';
        $landing = LandingPage::where([['slug', $slug], ['status', 1]])->first();
        if($landing) {
            $data['landing'] = LandingPage::where('slug', $slug)->first();
            return view('site.landing.index', compact('nav'), $data);
        } else {
            return redirect()->route('404');
        }
    }

    public function digitalTransformation()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        return view('site.landing.digital', compact('nav', 'sub_nav', 'page_title'));
    }


    public function landingFormAction(Request $request) {
        $emailData = [
            'logo' => asset('assets/landing/img/favicon.svg'),
            'contact_name' => $request['contact_name'],
            'email_address' => $request['email_address'],
            'mobile_no' => $request['mobile_no'],
            'company_name' => $request['company_name'] ? $request['company_name'] : '',
            'service' => $request['service'] ? $request['service'] : '',
            'remarks' => $request['message'] ? $request['message'] : '',
            'slug' => $request['slug'] ? $request['slug'] : '',
        ];

        $lead = new Lead;
        $lead->name = $request['contact_name'];
        $lead->email = $request['email_address'];
        $lead->mobile = $request['mobile_no'];
        $lead->company = $request['company_name'] ? $request['company_name'] : '';
        $lead->package = $request['service'] ? $request['service'] : $request['message'];

        Mail::send('email.leadform', $emailData, function ($message) use ($request) {
            $message->to('info@aera-capital.com');
            $message->subject('New Lead Submission !!');
        });

        $message = "success";
        return $message;
    }

    public function contactFormAction(Request $request) {
        $emailData = [
            'logo' => asset('assets/landing/img/favicon.svg'),
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile_no' => $request['mobile_no'],
            'remarks' => $request['remarks'],
            'service' => $request['service'],
        ];
        Mail::send('email.contactform', $emailData, function ($message) use ($request) {
            $message->to('info@aera-capital.com');
            $message->subject('New Contact Form Submission !!');
        });
        $message = "Contact Form was submitted Successfully !! We will get back you shortly !!!";
        return $message;
    }
}
