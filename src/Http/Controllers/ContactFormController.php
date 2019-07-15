<?php
// Kruxsoft\Contactform\src\Http\Controllers\ContactFormController.php
namespace Kruxsoft\ContactForm\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kruxsoft\ContactForm\Models\ContactFormSubmission;

class ContactFormController extends Controller {

	public function index()
	{
	   return view('contactform::contact');
	}

	public function sendMail(Request $request)
	{
		ContactFormSubmission::create($request->all());

	    return redirect(route('contact'))->with(['message' => 'Thank you, your mail has been sent successfully.']);

	}

}