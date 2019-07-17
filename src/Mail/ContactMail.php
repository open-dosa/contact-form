<?php

namespace Kruxsoft\ContactForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Kruxsoft\ContactForm\Models\ContactFormSubmission;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
	
    public $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactFormSubmission $contact)
    {
        $this->contact = $contact;
    }
	
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contact->email, $this->contact->name)
			->subject('Contact form submitted')->markdown('contactform::email.message');
    }
}