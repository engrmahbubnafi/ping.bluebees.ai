<?php

namespace App\Mail;

use App\Models\Domain;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DomainStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $domainName, $domain;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Domain $domain)
    {
        $this->domainName = $domain->name;
        $this->domain     = $domain->domain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@bluebees.ai', 'BlueBees AI')
            ->view('emails.domain-status');
    }
}