<?php 
class Install extends CI_Controller
{
   function __construct()
    {
        parent::__construct();	
		$this->load->helper('url');
		$this->load->helper('file');
		// Cache control
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	}
	
	function index()
	{
		$db_verify	=	$this->check_db_connection();
		$data['value']=$db_verify;
		$this->load->view('/check_error/check',$data);
	}

}