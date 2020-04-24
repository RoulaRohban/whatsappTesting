<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

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

	public function sendMessage(Request $request)
	{
//     	$client=new Client([
//     		'base_uri' => 'https://api.chat-api.com/instance120137/messages?token=crgsufxtpkppv7a0',
//     		'headers'=> [
//     		'content-type' => 'applicatio/json',
//     		'Accept' => 'application/json',
//     	    'X-CSRF-Token' => csrf_token()
//     	 ]
//     	]);
//     $response = $client->post(
//     'https://api.chat-api.com/instance120137/sendMessage?token=crgsufxtpkppv7a0',
//     [
//         'json' => 
//         ['chatId'    => $request->chatId,
//           //'phone'  => null,
//          'body'      => $request->body ]
//     ],
//     ['Content-Type' => 'application/x-www-form-urlencoded']
// );
//         try {
//        //$response = $request->send();
//        //dd($response);
//         	$responseJSON = json_decode($response->getBody(), true);
//             } 
// 		catch (Guzzle\Http\Exception\BadResponseException $e) {
//    			 echo 'Uh oh!: ' . $e->getMessage();
// 			}

			$headers =  [
                'content-type' => 'application/json',
                'verify' => true,
                'X-CSRF-TOKEN' => csrf_token()
            ];

            $guzzleClient = new \GuzzleHttp\Client();
            $url = 'https://api.chat-api.com/instance120137/sendMessage?token=crgsufxtpkppv7a0';

            $requestBody['chatId'] = $request->chatId;
            $requestBody['body'] = $request->body;
//            $requestBody['Accept'] = 'application/json';  // Do I need this parameter ?
			 $request = $guzzleClient->post( $url,  [
                "headers" => $headers,             // Do I need these params ?
                'form_params' => $requestBody  //  ERROR REFERING THIS LINE
            ]);
			 $request->headers->set('X-CSRF-TOKEN', csrf_token());
            $response = $request->send();		
	 }

}
