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

	public function index2()
	{
		$this->scope['titulo'] = "Mercado";
		$this->load->view('Mercado2_view',$this->scope);
	}


	public function api_coins_old()
	{
		$data_fecha_hoy = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $fecha_actual = $data_fecha_hoy->format("Y-m-d_H-i");

        //$datos['actual'] = json_decode(file_get_contents("bittrex/".$fecha_actual.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_actual.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['Actual'] = $moneda;
        }

        $data_fecha_5min = new DateTime("-5 minutes", new DateTimeZone(TIMEZONE));
        $fecha_5min = $data_fecha_5min->format("Y-m-d_H-i");

        //$datos['5min'] = json_decode(file_get_contents("bittrex/".$fecha_5min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_5min.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['FiveMin'] = $moneda;
        }

        $data_fecha_10min = new DateTime("-10 minutes", new DateTimeZone(TIMEZONE));
        $fecha_10min = $data_fecha_10min->format("Y-m-d_H-i");

        //$datos['10min'] = json_decode(file_get_contents("bittrex/".$fecha_10min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_10min.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['TenMin'] = $moneda;
        }

        $data_fecha_15min = new DateTime("-15 minutes", new DateTimeZone(TIMEZONE));
        $fecha_15min = $data_fecha_15min->format("Y-m-d_H-i");

        //$datos['15min'] = json_decode(file_get_contents("bittrex/".$fecha_15min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_15min.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['FifteenMin'] = $moneda;
        }

        $data_fecha_30min = new DateTime("-30 minutes", new DateTimeZone(TIMEZONE));
        $fecha_30min = $data_fecha_30min->format("Y-m-d_H-i");

        //$datos['30min'] = json_decode(file_get_contents("bittrex/".$fecha_30min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_30min.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['ThirtyMin'] = $moneda;
        }

        $data_fecha_1h = new DateTime("-1 hour", new DateTimeZone(TIMEZONE));
        $fecha_1h = $data_fecha_1h->format("Y-m-d_H-i");

        //$datos['1h'] = json_decode(file_get_contents("bittrex/".$fecha_1h.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_1h.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['OneHour'] = $moneda;
        }

        $data_fecha_2h = new DateTime("-2 hour", new DateTimeZone(TIMEZONE));
        $fecha_2h = $data_fecha_2h->format("Y-m-d_H-i");

        //$datos['2h'] = json_decode(file_get_contents("bittrex/".$fecha_2h.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_2h.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['TwoHour'] = $moneda;
        }

        $data_fecha_4h = new DateTime("-4 hour", new DateTimeZone(TIMEZONE));
        $fecha_4h = $data_fecha_4h->format("Y-m-d_H-i");

        //$datos['4h'] = json_decode(file_get_contents("bittrex/".$fecha_4h.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_4h.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['FourHour'] = $moneda;
        }

        $data_fecha_1d = new DateTime("-1 day", new DateTimeZone(TIMEZONE));
        $fecha_1d = $data_fecha_1d->format("Y-m-d_H-i");

        //$datos['1d'] = json_decode(file_get_contents("bittrex/".$fecha_1d.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_1d.".json"))->result as $moneda) {
        	$datos[$moneda->Summary->MarketName]['OneDay'] = $moneda;
        }

        echo json_encode($datos);

       	//var_dump($datos);



	}

    public function api_coins()
    {
        /*$data_fecha_hoy = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $fecha_actual = $data_fecha_hoy->format("Y-m-d_H-i");

        //$datos['actual'] = json_decode(file_get_contents("bittrex/".$fecha_actual.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_actual.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['Actual'] = $moneda;
        }*/

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


        foreach (json_decode($execResult)->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['Actual'] = $moneda;
        }

        $data_fecha_5min = new DateTime("-5 minutes", new DateTimeZone(TIMEZONE));
        $fecha_5min = $data_fecha_5min->format("Y-m-d_H-i");

        //$datos['5min'] = json_decode(file_get_contents("bittrex/".$fecha_5min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_5min.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['FiveMin'] = $moneda;
        }

        $data_fecha_10min = new DateTime("-10 minutes", new DateTimeZone(TIMEZONE));
        $fecha_10min = $data_fecha_10min->format("Y-m-d_H-i");

        //$datos['10min'] = json_decode(file_get_contents("bittrex/".$fecha_10min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_10min.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['TenMin'] = $moneda;
        }

        $data_fecha_15min = new DateTime("-15 minutes", new DateTimeZone(TIMEZONE));
        $fecha_15min = $data_fecha_15min->format("Y-m-d_H-i");

        //$datos['15min'] = json_decode(file_get_contents("bittrex/".$fecha_15min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_15min.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['FifteenMin'] = $moneda;
        }

        $data_fecha_30min = new DateTime("-30 minutes", new DateTimeZone(TIMEZONE));
        $fecha_30min = $data_fecha_30min->format("Y-m-d_H-i");

        //$datos['30min'] = json_decode(file_get_contents("bittrex/".$fecha_30min.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_30min.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['ThirtyMin'] = $moneda;
        }

        $data_fecha_1h = new DateTime("-1 hour", new DateTimeZone(TIMEZONE));
        $fecha_1h = $data_fecha_1h->format("Y-m-d_H-i");

        //$datos['1h'] = json_decode(file_get_contents("bittrex/".$fecha_1h.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_1h.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['OneHour'] = $moneda;
        }

        $data_fecha_2h = new DateTime("-2 hour", new DateTimeZone(TIMEZONE));
        $fecha_2h = $data_fecha_2h->format("Y-m-d_H-i");

        //$datos['2h'] = json_decode(file_get_contents("bittrex/".$fecha_2h.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_2h.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['TwoHour'] = $moneda;
        }

        $data_fecha_4h = new DateTime("-4 hour", new DateTimeZone(TIMEZONE));
        $fecha_4h = $data_fecha_4h->format("Y-m-d_H-i");

        //$datos['4h'] = json_decode(file_get_contents("bittrex/".$fecha_4h.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_4h.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['FourHour'] = $moneda;
        }

        $data_fecha_1d = new DateTime("-1 day", new DateTimeZone(TIMEZONE));
        $fecha_1d = $data_fecha_1d->format("Y-m-d_H-i");

        //$datos['1d'] = json_decode(file_get_contents("bittrex/".$fecha_1d.".json"))->result;

        foreach (json_decode(file_get_contents("bittrex/".$fecha_1d.".json"))->result as $moneda) {
            $datos[$moneda->Summary->MarketName]['OneDay'] = $moneda;
        }

        echo json_encode($datos);

        //var_dump($datos);



    }








}
