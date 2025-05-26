<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('email/Campaig',[CampaignController::class,'createpage'])->name('email.campaign');
Route::post('campaign/save',[CampaignController::class,'Bulkemail'])->name('campaign.save');


Route::get('getcampaigns',[CampaignController::class,'fetchcampign'])->name('campaign.index');