<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Solution_model extends CI_Model
{
    // get all Solution or get one by id
    public function getSolution($id = NULL)
    {
        if ($id === NULL) {
            return $this->db->get('solutions')->result_array();
        }

        return $this->db->get_where('solutions', ['id' => $id])->row_array();
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

    // get solution by user id and assignment id
    public function get_solution_by_user_assignment($user_id, $assignment_id){
        return $this->db->get_where('solutions', ['user_id' => $user_id, 'assignment_id' => $assignment_id])->row_array();
    }



    public function countSolutions(){
        return $this->db->select('id')->from("solutions")-> count_all_results();
    }

}