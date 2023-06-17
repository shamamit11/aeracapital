<?php
namespace App\Services\Site;

use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Helper;

class LeadService
{
    public function store($request)
    { 
        try {
            $lead = new Lead;
            $lead->name = $request['name'];
            $lead->email = $request['email'];
            $lead->mobile = $request['mobile'];
            $lead->company = $request['company'];
            $lead->package = $request['package'];

            if(@$request['website']) {
                $lead->website = $request['website'];
            }

            if(@$request['addons']) {
                $implode_addons = implode(", ", $request['addons']);
                $lead->addons = $implode_addons;
            }

            if(@$request['business_consultation']) {
                $implode_business_consultation = implode(", ", $request['business_consultation']);
                $lead->business_consultation = $implode_business_consultation;
            }

            if(@$request['business_solutions']) {
                $implode_business_solutions = implode(", ", $request['business_solutions']);
                $lead->business_solutions = $implode_business_solutions;
            }

            if(@$request['development']) {
                $implode_development = implode(", ", $request['development']);
                $lead->development = $implode_development;
            }

            if(@$request['marketing']) {
                $implode_marketing = implode(", ", $request['marketing']);
                $lead->marketing = $implode_marketing;
            }

            $lead->save();
            $message = "Request has been submitted successfully !!";

            $emailData = [
                'logo' => asset('assets/landing/img/favicon.svg'),
                "name" => $request['name'],
                "email" => $request['email'],
                "mobile" => $request['mobile'],
                "company" => $request['company'],
                "package" => $request['package'],
                "website" => @$request['website'],
                "addons" => @$request['addons'],
                "business_consultation" => @$request['business_consultation'],
                "business_solutions" => @$request['business_solutions'],
                "development" => @$request['development'],
                "marketing" => @$request['marketing'],
            ];
            Mail::send('email.packageleadform', $emailData, function ($message) use ($request) {
                $message->to('info@aera-capital.com');
                $message->subject('New Lead Form Submission !!');
            });
            
            return $message;
            

        } catch (\Exception$e) {
            return $e->getMessage();
        }
    }
}
