<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstCampaign extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public function __construct($template)
    {
        $this->template = $template;
    }


    public function build()
    {
        return $this->subject('Say Hello to Jobs Harbour!')->view($this->template);
    }
}
