<?php

namespace App\helper;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
class WhatsAppService
{
   function getMessage(){
   	try {
    	$client=new Client();

    	$response = $client->request('GET', 'https://api.chat-api.com/instance120137/messages?token=crgsufxtpkppv7a0',
    		['auth' => [
    		'roula.rohban@gmail.com' , '123456789'
    	]] 
    ,
    [           'query' => [
                'lastMessageNumber' => 10,
                //'last' => false,
                'chatId' => '17680561234-1479621234@g.us',
                'limit' => 100 ,
                'min_time' => 946684800, 
                'max_time' => 946684800

            ]

        ]);
        if($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();

        }

    }
     catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    }

	public function sendMessage(Request $request) {

		//dd($request->all());

        if (!isset($request->chatId) && !isset($request->phone)) {
            return 'phone or chatId not set in params';
        }

        if (isset($request->chatId) && isset($request->phone)) {
            return 'Require only phone OR chatId';
        }

        if (!isset($request->body)) {
            return 'body not set in params';
        }

        $sender = new Client();
        try {
            $res = $sender->request(
                'POST', 'https://api.chat-api.com/instance120137/sendMessage?token=crgsufxtpkppv7a0',
                ['verify' => false, 'json' => $request->all()]
            );
        } catch (GuzzleException $e) {
            echo "Error: " . $e->getMessage();
        }

        //return json_decode($res->getBody());

        // if($res->getStatusCode() == 200) {
        //    return response()->json(['status'=>'success','Message'=>'Done Send','data'=>$res->getBody()->getContents()],200);

        // }
        

    }

}
