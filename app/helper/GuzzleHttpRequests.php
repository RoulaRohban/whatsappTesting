namespace App\helpers;

use GuzzleHttp\Client;

class GuzzleHttpRequests {

    protected $client; 

    public function __construct(Client $client){

        $this->client = $client;
    }

    protected function get($url){

        $response = $this->client->request('GET', $url); // https://jsonplaceholder.typicode.com/posts/ && Any url
        
        return json_decode($response->getBody()->getContents());

    }


    

}