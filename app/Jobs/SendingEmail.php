<?php

namespace App\Jobs;


use App\Models\Campaign;
use App\Models\CampaignContact;
use App\Mail\Campaignemail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendingEmail implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public CampaignContact $contact, public Campaign $campaign) {}

    public function handle()
    {
         \Log::info('TestQueueJob executed');
        Mail::to($this->contact->email)->send(new CampaignEmail($this->contact, $this->campaign));
    }
     

}
