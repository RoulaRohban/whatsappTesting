<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\helper\WhatsAppService;

class WhatsAppController extends Controller
{
	protected $service;

    public function __construct(){

        $this->service = new WhatsAppService();
    }

    public function getMessage(){
    	return $this->service->getMessage();
    }
	public function sendMessage(Request $request) {
      $this->service->sendMessage($request);
    }
}
