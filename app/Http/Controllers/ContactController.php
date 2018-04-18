<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\User;
use App\Http\Requests;
use App\Applications;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller {

      public function create(User $user)
    {
        $supers = User::where('role', 2)->orderBy('fname', 'asc')->get();
        return view('contact.contactSupervisor', compact('supers'));

    }

    public function store(Request $request)
    {
        $contact = [];

        $this->validate($request,[
            'name' => 'required',
            // 'email' => 'required|email',
            'msg'=> 'required',
            'subject'=> 'required'
        ]);

        $message = $request->message;
        $id = $request->name;
        $email = User::where('id', $id)->first()->email;
        // $email = "claramarshall@rogers.com";

        $subject = $request->subject;
        $from = Auth::user()->fname;


        // Mail delivery logic goes here
        // dd($email, $id, $subject, $from);

        if (mail($email, $subject, $message)) { 
            Session::flash('message', 'Your message has been sent...now get back to work!!'); 
            //return view('admin')->with('message', 'News Article Added');;
            return redirect()->back();
        } 
    }

}
