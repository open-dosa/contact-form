<?php
// Kruxsoft\Contactform\src\Http\Controllers\ContactFormController.php
namespace Kruxsoft\ContactForm\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kruxsoft\ContactForm\Models\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use Kruxsoft\ContactForm\Mail\ContactMail;

class ContactFormController extends Controller {

	public function index()
	{
	   return view('contactform::contact');
	}

	public function sendMail(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required',
			'message' => 'required',
		]);
		
		$contact = ContactFormSubmission::create($request->all());
		
        Mail::to(config('contact.email_to'))->send(new ContactMail($contact));

	    return redirect(route('contact'))->with(['message' => 'Thank you, your mail has been sent successfully.']);

	}

}