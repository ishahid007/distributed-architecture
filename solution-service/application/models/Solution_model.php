<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Solution_model extends CI_Model
{
    // get all Solution or get one by id
    public function getSolution($id = NULL)
    {
        if ($id === NULL) {
            return $this->db
            ->select("solutions.*, users.name, assignments.title, assignments.deadline")
            ->from('solutions')
            ->join("assignments", "assignments.id = solutions.assignment_id")
            ->join("users", "users.id = solutions.user_id")
            ->group_by("solutions.id")
            ->get()
            ->result_array();
        } else {
            return $this->db
            ->where("solutions.id", $id)
            ->select("solutions.*, users.name, assignments.title, assignments.deadline")
            ->from('solutions')
            ->join("assignments", "assignments.id = solutions.assignment_id")
            ->join("users", "users.id = solutions.user_id")
            ->group_by("solutions.id")
            ->get()
            ->row_array();
        }

    }

    // create a new Solution
    public function createSolution($data)
    {
        $this->db->insert('solutions', $data);
        return $this->db->affected_rows();
    }

    // update an existing Solution
    public function updateSolution($data, $id)
    {
        $this->db->update('solutions', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // delete an existing Solution
    public function deleteSolution($id)
    {
        $this->db->delete('solutions', ['id' => $id]);
        return $this->db->affected_rows();
    }



    public function countSolutions(){
        return $this->db->select('id')->from("solutions")-> count_all_results();
    }

}