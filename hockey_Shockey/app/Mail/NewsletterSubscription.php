<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscription extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->view('emails.newsletter-subscription')
        ->subject('Newsletter Subscription Confirmation');
    }
}
