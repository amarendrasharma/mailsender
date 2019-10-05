<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Test extends Mailable
{
    use Queueable, SerializesModels;

    public $test_name;
    public function __construct()
    {
        $this->test_name = "asasas";
    }


    public function build()
    {
        return $this->from('amar@test.test')
            ->view('mailtemp.test');
    }
}
