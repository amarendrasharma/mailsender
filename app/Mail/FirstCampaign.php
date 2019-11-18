<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;

class FirstCampaign extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $subject;
    public function __construct($data)
    {
        $this->template = $data['templates'];
        $this->subject = $data['subject'];
        // $this->from = "tingtong@pingpong.dingdong";
    }


    public function build()
    {
        return $this->subject($this->subject)->view($this->template);
    }
}
