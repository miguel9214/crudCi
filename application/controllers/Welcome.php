<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Person_model');

	}


	public function index()
	{
		$data['persons'] = $this->Person_model->get_all_people();
		$this->load->view('welcome_message',$data);
	}


	public function store()
	{
		
		$person = array(

			'name' => $this->input->post('name'),
			'last_name' => $this->input->post('last_name'),
			'birthday' => $this->input->post('birthday'),
			'sex' => $this->input->post('sex'),

		);

		$this->Person_model->insert_person($person);



		redirect('welcome');

	}
}
