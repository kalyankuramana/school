<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	/**
	 *  
	 *  
	 */
	public function __construct()
	{
        parent::__construct();
		$this->load->database();
        // Your own constructor code
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	}
	function index()
	{
	}
	
	function paypal()
	{
		$this->paypal->add_field('business', 'creativeadmin@gmail.com');
		//sandbox email testcreative@gmail.com creative1234 for purchase simulation
		//$this->paypal->add_field('business', 'payment@creativeitem.com');						//original paypal email
		
		$this->paypal->add_field('return',  		base_url().'index.php?payment/paypal_response/success');
		$this->paypal->add_field('cancel_return',  	base_url().'index.php?payment/paypal_response/cancel');
		$this->paypal->add_field('notify_url',  	base_url().'index.php?payment/paypal_ipn');
		$this->paypal->add_field('item_name',	'Deposit to user ');
		$this->paypal->add_field('amount', 0.5);
		$this->paypal->add_field('no_note', 0);
		$this->paypal->add_field('rm', 2);
		$this->paypal->add_field('custom', 'test payment');

		$this->paypal->submit_paypal_post(); // submit the fields to paypal

	}
	function paypal_ipn()
	{
		if($this->paypal->validate_ipn() == true) 
		{	
			$ipn_response	=	'';
				foreach ($_POST as $key => $value) {
					$value = urlencode(stripslashes($value));
					$ipn_response.= "\n$key=$value";
				}
			$data['description']	=	$ipn_response;
			$this->db->insert('payment' , $data);
		}

	}
	function paypal_success()
	{
		
	}
	function paypal_cancel()
	{
		
	}
}
