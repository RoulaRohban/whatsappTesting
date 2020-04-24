<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class MainController extends Controller
{
    public function actionIndex()
	{
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'http://localhost:3000/products');
		$result = json_decode($res->getBody());

		$data = [];
		foreach ($result as $key => $value) {

			try{
				$name = $value->name;
			}catch(\Exception $e){
				$name = "-";
			}

			try{
				$category = $value->category;
			}catch(\Exception $e){
				$category = "-";
			}

			try{
				$description = $value->description;
			}catch(\Exception $e){
				$description = "-";
			}

			try{
				$price = $value->price;
			}catch(\Exception $e){
				$price = "-";
			}

			try{
				$pic = $value->pic;
			}catch(\Exception $e){
				$pic = "-";
			}

			$data[] = [
				'id' => $value->_id,
				'name' => $name,
				'description' => $description,
				'price' => $price,
				'category' => $category,
				'pic' => $pic
			];
		}

		$params = [
			'data' => $data
		];

		return view('main.index', $params);
	}

	public function actionFindOne(Request $request)
	{
		$id = $request->get('id');
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'http://localhost:3000/products/'.$id);
		$value = json_decode($res->getBody());

		try{
				$name = $value->name;
			}catch(\Exception $e){
				$name = "-";
			}

			try{
				$category = $value->category;
			}catch(\Exception $e){
				$category = "-";
			}

			try{
				$description = $value->description;
			}catch(\Exception $e){
				$description = "-";
			}

			try{
				$price = $value->price;
			}catch(\Exception $e){
				$price = "-";
			}

			try{
				$pic = $value->pic;
			}catch(\Exception $e){
				$pic = "-";
			}

			$data = [
				'id' => $value->_id,
				'name' => $name,
				'description' => $description,
				'price' => $price,
				'category' => $category,
				'pic' => $pic
			];

		$params = [
			'data' => $data
		];

		return view('main.show', $params);

	}

	public function actionAdd(Request $request)
	{
		$id = $request->input('id');
		
		if($id){
			$id = $request->get('id');
			$client = new \GuzzleHttp\Client();
			$res = $client->request('GET', 'http://localhost:3000/products/'.$id);
			$value = json_decode($res->getBody());

			try{
				$name = $value->name;
			}catch(\Exception $e){
				$name = "-";
			}

			try{
				$category = $value->category;
			}catch(\Exception $e){
				$category = "-";
			}

			try{
				$description = $value->description;
			}catch(\Exception $e){
				$description = "-";
			}

			try{
				$price = $value->price;
			}catch(\Exception $e){
				$price = "-";
			}

			try{
				$pic = $value->pic;
			}catch(\Exception $e){
				$pic = "-";
			}

			$data = [
				'id' => $value->_id,
				'name' => $name,
				'description' => $description,
				'price' => $price,
				'category' => $category,
				'pic' => $pic
			];

		}else{
			$data = null;
		}

		$params = [
			'data' => $data
		];

		return view('main.form', $params);
	}

	public function actionSave(Request $request)
	{
		$id = $request->input('id');
		$name = $request->input('name');
		$category = $request->input('category');
		$description = $request->input('description');
		$price = $request->input('price');

		if($id){
			$params = [
				'name' => $name,
				'category' => $category,
				'description' => $description,
				'price' => $price
			];

			$client = new Client(['verify' => false ]);
			$res = $client->put('http://localhost:3000/products/'.$id, [
				    'form_params' => $params
			]);

			if($res->getStatusCode() == 200){
				return redirect('/');
			}else{
				return redirect('/add');
			}

		}else{
			$params = [
				'name' => $name,
				'category' => $category,
				'description' => $description,
				'price' => $price
			];

			$client = new Client(['verify' => false ]);
			$res = $client->post('http://localhost:3000/products', [
				    'form_params' => $params,
				    'timeout' => 60,
	        		'connect_timeout' => 60
			]);

			if($res->getStatusCode() == 200){
				return redirect('/');
			}else{
				return redirect('/add');
			}

		}

		
	}

	public function actionDelete(Request $request)
	{
		$id = $request->get('id');
		$client = new Client(['verify' => false ]);
		$res = $client->delete('http://localhost:3000/products/'.$id);

		if($res->getStatusCode() == 200){
				return redirect('/');
		}else{
				return redirect('/add');
		}
	}
}
}
 -->