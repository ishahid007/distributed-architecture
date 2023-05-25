<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(FCPATH.'vendor/autoload.php');
class Http {
	public function request($method, $url, $data = array()){
	  $client     = new GuzzleHttp\Client();
	  // 
	  try {
	    $response = $client->request( $method, $url, [ 'form_params' => $data ]);
	    // response
	    return $response->getBody()->getContents();

	  } catch (GuzzleHttp\Exception\BadResponseException $e) {
	  	// 
	    return $e->getResponse()->getBody()->getContents();
	  }


	}
}



?>