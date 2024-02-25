<?php
class Person_model extends CI_Model {
    
    public function get_all_people() {
        $query = $this->db->get('persons'); 
        return $query->result_array();
    }

    public function insert_person($data) {
        $this->db->insert('persons', $data);
        // return $this->db->insert_id();
    }

    public function delete_person($id) {
        $this->db->where('id', $id);
        $this->db->delete('persons');
    }
}
