<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\helper\WhatsAppService;

class WhatsAppController extends Controller
{
	protected $service;

    // public function __construct(){

    //     $this->service = new WhatsAppService();
    // }

    public function getMessage(){

        $this->service = new WhatsAppService('https://api.chat-api.com/instance120137/messages','crgsufxtpkppv7a0');
        
    	return $this->service->getMessage();
    }
	public function sendMessage(Request $request) {
      $this->service = new WhatsAppService('https://api.chat-api.com/instance120137/sendMessage','crgsufxtpkppv7a0');

      $this->service->sendMessage($request);
    }
}
