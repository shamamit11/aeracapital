<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LeadFormRequest;
use App\Services\Site\LeadService;

class PackageController extends Controller
{
    public function startup()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $seo_link = url()->current();
        $form_action = route('lead-form-submit');
        return view('site.package.startup', compact('nav', 'sub_nav', 'page_title', 'seo_link', 'form_action'));
    }

    public function existing()
    {
        $nav = '';
        $sub_nav = '';
        $page_title = '';
        $seo_link = url()->current();
        $form_action = route('lead-form-submit');
        return view('site.package.existing', compact('nav', 'sub_nav', 'page_title', 'seo_link', 'form_action'));
    }

    public function submitLeadForm(LeadFormRequest $request)
    {
        $lead = new LeadService;
        $message = $lead->store($request->validated()); 
        return redirect()->back()->withMessage($message);
    }
}
