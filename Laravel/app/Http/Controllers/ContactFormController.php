<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class ContactFormController extends Controller
{
    public function submit(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns|required',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:7',
            'subject' => 'required|string|max:78',
            'message' => 'required|string|min:5',
            'captcha' => 'required|captcha',
        ], ['captcha' => 'Wrong code. Please try again.']);

        Mail::to("abedian.b@gmail.com")
                ->cc("iliaabedianamiri@gmail.com")
                ->send(new ContactUs($fields));

        return response()->json(['status' => true]);
    }

    public function reloadCaptcha(){
        return response()->json(['captcha' => captcha_img()]);
    }
}
