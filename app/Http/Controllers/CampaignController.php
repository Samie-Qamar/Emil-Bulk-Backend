<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignContact;
use App\Mail\Campaignemail;
use App\Jobs\SendingEmail;
use Illuminate\Support\Facades\Mail;

class CampaignController extends Controller
{
    // Create Campign //

    public function createpage()
    {
        return view('campigncreate');

    }




    // fetch Bulk Campaign /.


    public function fetchcampign()
    {
        $CampaignContact=CampaignContact::get();
        return view('index',compact('CampaignContact'));
    }


public function Bulkemail(Request $request)
{
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    $campaign = Campaign::create([
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    $path = $request->file('csv_file')->getRealPath();
    $rows = array_map('str_getcsv', file($path));
    $header = array_map('strtolower', array_shift($rows));

    foreach ($rows as $row) {
        $data = array_combine($header, $row);
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;

        if ($name && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $contact = CampaignContact::create([
                'campaign_id' => $campaign->id,
                'name' => $name,
                'email' => $email,
                'status'=>'Email Send',
            ]);

       
            SendingEmail::dispatch($contact, $campaign);
            
        }
    }

    return back()->with('success', 'Campaign created and emails queued.');
}








}
