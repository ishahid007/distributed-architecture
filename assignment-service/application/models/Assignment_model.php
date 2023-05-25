<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assignment_model extends CI_Model
{
    // get all assignment or get one by id
    public function getAssignment($id = NULL)
    {
        if ($id === NULL) {
            return $this->db->get('assignments')->result_array();
        }

        return $this->db->get_where('assignments', ['id' => $id])->row_array();
    }

    // create a new Assignment
    public function createAssignment($data)
    {
        $this->db->insert('assignments', $data);
        return $this->db->affected_rows();
    }

    // update an existing Assignment
    public function updateAssignment($data, $id)
    {
        $this->db->update('assignments', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // delete an existing Assignment
    public function deleteAssignment($id)
    {
        $this->db->delete('assignments', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function countAssignments(){
        return $this->db->select('id')->from("assignments")-> count_all_results();
    }

}