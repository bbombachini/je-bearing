<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\User;
use App\Http\Requests;
use App\Applications;


class ContactController extends Controller {

      public function create(User $user)
    {
        // $supers = User::where('role', 2);
        // $supers = User::all();
        $supers = User::where('role', 2)->orderBy('fname', 'asc')->get();
        return view('contact.create', compact('supers'));

    }

    public function store(Request $request)
    {
        $from = 'Clara Testing'; 
        $to = 'claramarshall@rogers.com'; 

        $contact = [];

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'msg'=> 'required',
            'subject'=> 'required'
        ]);

        $message = $request->message;
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;


        // Mail delivery logic goes here
        dd($request->all());

        if (mail($to, $subject, $message)) { 
            Session::flash('message', 'Your message has been sent...now get back to work!!'); 
            //return view('admin')->with('message', 'News Article Added');;
            return redirect()->route('contact.create');
        } 
    }

}
