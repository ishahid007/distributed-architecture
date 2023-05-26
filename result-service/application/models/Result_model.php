<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Result_model extends CI_Model
{
    // get all Result or get one by id
    public function getResult($id = NULL)
    {
        if ($id === NULL) {
            return $this->db->get('results')->result_array();
        }

        return $this->db->get_where('results', ['id' => $id])->row_array();
    }

    // create a new Result
    public function createResult($data)
    {
        $this->db->insert('results', $data);
        return $this->db->affected_rows();
    }

    // update an existing Result
    public function updateResult($data, $id)
    {
        $this->db->update('results', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // delete an existing Result
    public function deleteResult($id)
    {
        $this->db->delete('results', ['id' => $id]);
        return $this->db->affected_rows();
    }


    // get result by solution_id
    public function get_result_by_solution($id){
        return $this->db->get_where('results', ['solution_id' => $id])->row_array();
    }

}