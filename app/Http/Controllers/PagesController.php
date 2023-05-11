<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\AssistanceMail;
use App\Mail\ContactMail;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact-us');
    }

    public function assistance(Request $request)
    {
        $recipient = 'info@bakkieauctions.co.za';

        $data = [
            'first-name' => $request->input('first-name'),
            'last-name' => $request->input('last-name'),
            'number' => $request->input('number'),
            'email' => $request->input('email')
        ];

        Mail::to($recipient)->send(new AssistanceMail($data));

        return back();
    }

    public function contactUs(Request $request)
    {
        $recipient = 'info@bakkieauctions.co.za';

        $data = [
            'first-name' => $request->input('first-name'),
            'last-name' => $request->input('last-name'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to($recipient)->send(new ContactMail($data));

        return back();
    }


}
