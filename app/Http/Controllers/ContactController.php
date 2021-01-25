<?php
Namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Recipient;
use DB;
use Mail;

Class ContactController extends Controller
{

public function index()
{
    $contacts = DB::table('contacts')->get();
    return view('adminMessages', ['contacts' => $contacts]);
}

public function show()
{
  return view('contact.index');
}

public function store(Request $request){

    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    Mail::send('email', array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'user_input' => $request->get('message'),
    ), function($message) use ($request) {
       $message->from($request->email);
       $message->to('project.algonquin@gmail.com', 'Admin')->subject('Message from the Customer');
    });
    return redirect()->back()->with('message', 'Thanks for your message! We will get back to you soon!');
} 

}
