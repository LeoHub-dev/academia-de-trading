<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends LH_Controller {

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
	

	public function index()
	{
		redirect('Inicio','refresh');
	}

	public function referido($id_usuario = NULL)
	{
		$referido = $this->Auth_model->obtenerReferidoID($id_usuario);
		echo json_encode($referido);
	}

	public function c($cuenta = NULL)
	{
		if(!$this->Auth_model->estaConectado())
		{
			if($this->Auth_model->obtenerReferidoID($cuenta)['response'])
	        {
	            $this->session->set_userdata('ref',$cuenta);
	        }
	        
			redirect('' ,'refresh');
		}
		else
		{
			redirect('/dashboard' ,'refresh');
		}
	}

	public function admin_usuario($id_usuario)
	{
		$usuario = $this->Auth_model->obtenerUsuarioID($id_usuario);

		$array = array('response' => true, 'usuario' => $usuario['data']);

		echo json_encode($array);

	}

	public function coinbase_callback()
	{
		$this->load->library('Coinbase');

		$data = file_get_contents('php://input');
		$signature = $_SERVER['HTTP_CB_SIGNATURE'];

		$this->coinbase->callback($data,$signature);

	}

	public function coinpaymentscallback()
	{
		$this->load->library('Coinpayments');

		$this->coinpayments->coinpaymentsCallBack();
	}

	public function verificar_pago($payment = NULL)
	{
		$this->load->library('Coinbase');
		$response = $this->coinbase->verifyPayment($payment);

		if($response || $response == 0)
		{
			echo response_good(FALSE,FALSE,array('amount_paid' => $response));
		}
		else
		{
			echo response_bad('Error al verificar');
		}

	}

	public function obtener_matriz()
	{
		if(!$this->session->userdata('id_usuario'))
		{
			header("Content-type: application/x-javascript");
		}
		else
		{
			

			header("Content-type: application/x-javascript");
			echo "var chart_config = ".json_encode($this->Matriz_model->crearMatriz(@$this->Matriz_model->obtenerMatrizActiva($this->session->userdata('id_usuario'))->id_matriz)).";";
		}
		
		/*header('Content-Type: application/json');
		echo json_encode($this->Matriz_model->obtenerHijos('05208681'), true);*/
	}

	public function obtener_circulo()
	{
		if(!$this->session->userdata('id_usuario'))
		{
			header("Content-type: application/x-javascript");
		}
		else
		{
			

			header("Content-type: application/x-javascript");
			echo "var chart_config = '".json_encode($this->Matriz_model->crearCirculo(@$this->Matriz_model->obtenerCirculoActivo($this->session->userdata('id_usuario'))->id_circulo))."';";
		}
		
		/*header('Content-Type: application/json');
		echo json_encode($this->Matriz_model->obtenerHijos('05208681'), true);*/
	}


	/*public function verificar_pago($payment = NULL)
	{
		$this->load->library('Coinpayments');
		$response = $this->coinpayments->verifyPayment($payment);

		if($response || $response == 0)
		{
			echo response_good(FALSE,FALSE,array('amount_paid' => $response));
		}
		else
		{
			echo response_bad('Error al verificar');
		}
	}*/

	

	public function verificar_mensualidad()
	{
		$this->Academia_model->verificarMensualidad();
	}

	public function save_logs()
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
		//$obj = json_decode($execResult);

		//var_dump($obj);

		$data_fecha_hoy = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $fecha_actual = $data_fecha_hoy->format("Y-m-d_H-i");

        if (!file_exists('bittrex/')) {
		    mkdir('bittrex/', 0777, true);
		}

		$file = $fecha_actual.'.json';
		file_put_contents("bittrex/".$file, $execResult);

		//echo json_encode($lista_monedas);

		//https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName=BTC-WAVES


	}

	public function get_logs($time)
	{
		$datos_clientes = file_get_contents("bittrex/".$time.".json");
		//$json_clientes = json_decode($datos_clientes, true);
		echo $datos_clientes;
	}

	public function remove_old()
	{
		$data_fecha_hoy = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        $fecha_actual = $data_fecha_hoy->format("Y-m-d_H-i");

        $data_fecha_hoy->modify('-1 day');
        $data_fecha_hoy->modify('-1 hour');

        try {
        	if (!file_exists("bittrex/".$data_fecha_hoy->format("Y-m-d_H-i").".json")) {
			    throw new Exception('No mas archivos');
			}
        	while(unlink("bittrex/".$data_fecha_hoy->format("Y-m-d_H-i").".json")){
	        	$data_fecha_hoy->modify('-1 minute');
	        	if (!file_exists("bittrex/".$data_fecha_hoy->format("Y-m-d_H-i").".json")) {
				    throw new Exception('No mas archivos');
				}
	        }
        }
        catch (Exception $e) {
		    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
        

	}

	public function addmatriz($var = NULL)
	{
		echo "<script>console.log('Se agrego cuenta ".$var."'); </script><br>";
		$this->Matriz_model->agregarCuentaMatriz(20);
		return;
	}

	public function addcirculo($var = NULL)
	{
		echo "<script>console.log('Se agrego cuenta ".$var."'); </script><br>";
		$this->Matriz_model->agregarCuentaCirculo($var);
	}



	
}
