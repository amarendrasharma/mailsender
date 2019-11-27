<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Mail\FirstCampaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CampaignController extends Controller
{

    public function index()
    {
        $mailTemplates = scandir('../resources/views/campaign/mailtemp');
        $mailTemplates = collect($mailTemplates);
        $templateList = [];
        $templateList = $mailTemplates->map(function ($template) use ($templateList) {
            $filename = explode(".", $template);
            array_push($templateList, $filename[0]);
            return $templateList;
        });
        // $templateList = implode("", Arr::flatten($templateList));
        $templateList = Arr::flatten($templateList);
        return view('campaign.index', compact('templateList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request['templates'] = 'campaign.mailtemp.' . $request->templates;
        // $y = json_decode($request->getContent());
        $y = json_decode($request->emails);
        $y = collect($y);
        Log::info(count($y));

        $x = $y->map(function ($m) use ($request) {
            // $m = collect($m);
            // $m['email'];
            // return $m->email;
            Mail::to($m->email)->queue(new FirstCampaign($request->only(['templates', 'subject'])));
            // Log::info($m->name);
            Log::info($m->name . " " . $m->email);
        });

        return "All mails are queued";
    }


    public function show(Campaign $campaign)
    {
        //
    }


    public function edit(Campaign $campaign)
    {
        //
    }


    public function update(Request $request, Campaign $campaign)
    {
        //
    }


    public function destroy(Campaign $campaign)
    {
        //
    }
}
