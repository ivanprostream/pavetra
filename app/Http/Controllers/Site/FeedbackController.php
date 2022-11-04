<?php

namespace App\Http\Controllers\Site;


use App\Models\User;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Mail\FeedbackMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function send_message(Request $request) {

        $trap = $request->trap;
        if(empty($trap)) {
            $formFields = $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7',
                'message' => 'required',
                'lang_id' => 'required'
             ]);

            //  Store data in database
            Feedback::create($formFields);


            // Send mail to admin

            // $adminEmails = User::select('email')->where('lang_id', 1)->get();
            // $list = '';
            // foreach ($adminEmails as $i) {
            //  $list.= $i->email.' ,';
            // }
            // $list = rtrim($list,",");

            // $lastMessage = Feedback::where('lang_id', 1)->orderBy('id', 'DESC')->first();

            //  Mail::to($list)->send(new FeedbackMail($lastMessage));

            return back()->with('message', 'Спасибо за обращение. Ваше сообщение получено.');
        }


    }
}
