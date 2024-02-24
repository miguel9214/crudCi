<?php
class Person_model extends CI_Model {
    
    public function insert_person($data) {
        $this->db->insert('persons', $data);
        return $this->db->insert_id();
    }
}
