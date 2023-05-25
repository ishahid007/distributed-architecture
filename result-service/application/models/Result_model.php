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

    // get result by user id and assignment id
    public function getSolutionWithResult($user_id, $assignment_id){
        return $this->db->where("solutions.user_id", $user_id)
        ->where("solutions.assignment_id", $assignment_id)
        ->from("solutions")
        ->join("results", "results.solution_id = solutions.id", 'left')
        ->select("solutions.*, results.percentage, results.remarks")
        ->group_by("solutions.id")
        ->get()
        ->row_array();
    }

}