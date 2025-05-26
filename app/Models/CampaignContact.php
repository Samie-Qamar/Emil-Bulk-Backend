<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campaign;
class CampaignContact extends Model
{
 
    protected $table="campaign_contacts";

        protected $fillable=[
        'campaign_id',
        'name',
        'email',
        'status',
        'created_at',
        'updated_at',
    ];
    
    public function campignget()
    {
        return $this->belongsTo(Campaign::class,'campaign_id','id');
    }
}
