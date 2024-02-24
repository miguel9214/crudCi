<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		// En tu controlador o modelo de CodeIgniter
		echo current_url(); // Para obtener la URL actual completa
		echo uri_string();  // Para obtener el segmento de la URI actual

	}


	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function store()
	{

		$person = array(
			'name' => $this->input->post('name'),
			'last_name' => $this->input->post('last_name'),
			'birthday' => $this->input->post('birthday'),
			'sex' => $this->input->post('sex'),

		);


		var_dump($person);
	}
}
