<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\QueuedEmails;
use App\Mail\SimulateMail;
use Faker\Factory as Faker;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->faker = Faker::create();
    }


    public function index()
    {
        return view('queue', ['jobs' => $this->jobs()]);
    }

    public function jobs()
    {
        return QueuedEmails::orderBy('created_at', 'DESC')->get()->toArray();
    }

    public function simulate()
    {
        $email = $this->faker->email;

        Mail::to($email)->send(
            new SimulateMail([
                "email" => $email,
                "description" => $this->faker->sentence()
            ])
        );

        return redirect()->route('home');
    }
}
