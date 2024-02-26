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
		$this->load->view('welcome_message', $data);
	}
	

	public function store()
	{
		$this->load->library('form_validation');

		// Reglas de validación
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('sex', 'Sex', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Si la validación falla, vuelve a cargar la vista principal con errores
			$data['persons'] = $this->Person_model->get_all_people();
			$this->load->view('welcome_message', $data);
		} else {
			// Si la validación es exitosa, procesa los datos y redirige
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

	public function edit($id)
	{
		$data['person'] = $this->Person_model->get_person_by_id($id);
		$this->load->view('welcome_message', $data);
	}

	public function update($id)
	{

		$updated_data = array(
			'name' => $this->input->post('edit_name'),
			'last_name' => $this->input->post('edit_last_name'),
			'birthday' => $this->input->post('edit_birthday'),
			'sex' => $this->input->post('edit_sex')
		);

		$this->Person_model->update_person($id, $updated_data);

		redirect('welcome');
	}

	public function delete($id)
	{
		$this->Person_model->delete_person($id);

		redirect('welcome');
	}
}
