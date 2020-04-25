<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
//use GuzzleHttp\Psr7\Response;
class GuzzleController extends Controller
{
   function getMessage(){


   	try {
    	$client=new Client([
    		'base_uri' => 'https://api.chat-api.com/instance120137/messages?token=crgsufxtpkppv7a0',
    		'headers'=> [
    		'content-type' => 'applicatio/json',
    		'Accept' => 'application/json'],
    	]);


    	$response = $client->request('GET', 'https://api.chat-api.com/instance120137/messages?token=crgsufxtpkppv7a0',
    		['auth' => [
    		'roula.rohban@gmail.com' , '123456789'
    	]] 
    ,
    [           'query' => [
                'lastMessageNumber' => 32,
                'last' => false,
                'chatId' => '17633123456@c.us',
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
            throw new \Exception('Request error');
        }

        //return json_decode($res->getBody());
        response()->json($res->getBody()->getContents());
    }

}
