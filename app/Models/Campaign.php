<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //

    protected $table="campaign";

    protected $fillable=[
        'subject',
        'message',
        'created_at',
        'updated_at',
    ];
    public function contacts()
    {
        return $this-hasMany(CampaignContact::class,'campaign_id','id');
    }

   // public function getcam
}
