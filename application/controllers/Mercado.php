<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mercado extends LH_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		
		if(!$this->Auth_model->estaConectado())
		{
			redirect('/auth' ,'refresh');
		}
		else
		{
			if(!$this->Auth_model->estaPago())
        	{
        		redirect('/pago' ,'refresh');
        	}
		}
	}


	public function index()
	{
		$this->scope['titulo'] = "Mercado";
		$this->load->view('Mercado_view',$this->scope);
	}

	/*public function api_coins()
	{
		set_time_limit(600);
        ini_set('max_execution_time', 600);


		$lista_monedas = NULL;
	    $apikey = '60c37ee6710a4c72821e9f642869e66e';
		$apisecret = '6d7e3bf940c4486f8c85c156ee39a0b2';

		$nonce = time();
		$uri = 'https://bittrex.com/api/v2.0/pub/markets/GetMarketSummaries?apikey='.$apikey.'&nonce='.$nonce;
		$sign = hash_hmac('sha512',$uri,$apisecret);
		$ch = curl_init($uri);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('apisign:'.$sign));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$execResult = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($execResult);

		//var_dump($obj);

		foreach ($obj->result as $moneda) {
			$lista_monedas[$moneda->Market->MarketCurrency]['Market'] = $moneda->Market;
			$lista_monedas[$moneda->Market->MarketCurrency]['Summary'] = $moneda->Summary;
			$lista_monedas[$moneda->Market->MarketCurrency]['Ticks'] = NULL;

			$uri_moneda = 'https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName='.$moneda->Market->MarketName.'&tickInterval=fiveMin&apikey='.$apikey.'&nonce='.$nonce;

			$ch_moneda = curl_init($uri_moneda);
			curl_setopt($ch_moneda, CURLOPT_HTTPHEADER, array('apisign:'.$sign));
			curl_setopt($ch_moneda, CURLOPT_RETURNTRANSFER, TRUE);
			$tickResult = curl_exec($ch_moneda);
			curl_close($ch_moneda);
			$ticks = json_decode($tickResult);
			$lista_monedas[$moneda->Market->MarketCurrency]['Ticks'] = $ticks;

		}

		

		//echo $execResult;

		echo json_encode($lista_monedas);

		//https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName=BTC-WAVES


	}*/


	public function api_coins()
	{
		set_time_limit(600);
        ini_set('max_execution_time', 600);


		$lista_monedas = NULL;
	    $apikey = '60c37ee6710a4c72821e9f642869e66e';
		$apisecret = '6d7e3bf940c4486f8c85c156ee39a0b2';

		$nonce = time();
		$uri = 'https://bittrex.com/api/v2.0/pub/markets/GetMarketSummaries?marketName=BTC-&apikey='.$apikey.'&nonce='.$nonce;
		$sign = hash_hmac('sha512',$uri,$apisecret);
		$ch = curl_init($uri);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('apisign:'.$sign));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$execResult = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($execResult);

		//var_dump($obj);



		echo $execResult;

		//echo json_encode($lista_monedas);

		//https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName=BTC-WAVES


	}


	public function api_tick($moneda)
	{
		set_time_limit(600);
        ini_set('max_execution_time', 600);
        
		$apikey = '60c37ee6710a4c72821e9f642869e66e';
		$apisecret = '6d7e3bf940c4486f8c85c156ee39a0b2';

		$nonce = time();

		$uri_moneda = 'https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName='.$moneda.'&tickInterval=fiveMin&apikey='.$apikey.'&nonce='.$nonce;
		$sign = hash_hmac('sha512',$uri_moneda,$apisecret);
		$ch_moneda = curl_init($uri_moneda);
		curl_setopt($ch_moneda, CURLOPT_HTTPHEADER, array('apisign:'.$sign));
		curl_setopt($ch_moneda, CURLOPT_RETURNTRANSFER, TRUE);
		$tickResult = curl_exec($ch_moneda);
		curl_close($ch_moneda);
		$ticks = json_decode($tickResult);
		
		echo $tickResult;
	}



}
