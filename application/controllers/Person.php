<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person extends CI_Controller
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
		$this->load->view('person_view', $data);
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
			$this->load->view('person/index', $data);
		} else {
			// Si la validación es exitosa, procesa los datos y redirige
			$person = array(
				'name' => $this->input->post('name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'sex' => $this->input->post('sex'),
			);
	
			$inserted = $this->Person_model->insert_person($person);
	
			if ($inserted) {
				// Guardar mensaje de éxito en la sesión
				$this->session->set_flashdata('message', 'Persona guardada exitosamente.');
			} else {
				// Guardar mensaje de error en la sesión
				$this->session->set_flashdata('error', 'Error al guardar la persona en la base de datos.');
			}
	
			echo '<script>';
			echo 'setTimeout(function() { window.location.href = "' . site_url('person/index') . '"; }, 400);'; // Redirige después de 2 segundos (ajusta según tus necesidades)
			echo '</script>';
		}
	}
	

	public function edit($id)
	{
		$data['person'] = $this->Person_model->get_person_by_id($id);
		$this->load->view('person_view', $data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
	
		// Reglas de validación
		$this->form_validation->set_rules('edit_name', 'Name', 'required');
		$this->form_validation->set_rules('edit_last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('edit_birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('edit_sex', 'Sex', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			// Si la validación falla, vuelve a cargar la vista de edición con errores
			$data['person'] = $this->Person_model->get_person_by_id($id);
			$this->load->view('person/edit', $data);
		} else {
			// Si la validación es exitosa, procesa los datos y redirige
			$updated_data = array(
				'name' => $this->input->post('edit_name'),
				'last_name' => $this->input->post('edit_last_name'),
				'birthday' => $this->input->post('edit_birthday'),
				'sex' => $this->input->post('edit_sex')
			);
	
			$this->Person_model->update_person($id, $updated_data);
	
			// Guardar mensaje de éxito en la sesión
			$this->session->set_flashdata('message', 'Persona actualizada exitosamente.');
	
			echo '<script>';
			echo 'setTimeout(function() { window.location.href = "' . site_url('person/index') . '"; }, 400);'; // Redirige después de 2 segundos (ajusta según tus necesidades)
			echo '</script>';
		}

	}

	public function delete($id)
	{
		$this->Person_model->delete_person($id);

		redirect('person/index');
	}

}
