<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    // get all users or get one by id
    public function getUser($id = NULL)
    {
        if ($id === NULL) {
            return $this->db->get('users')->result_array();
        }

        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    // create a new user
    public function createUser($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    // update an existing user
    public function updateUser($data, $id)
    {
        $this->db->update('users', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // delete an existing user
    public function deleteUser($id)
    {
        $this->db->delete('users', ['id' => $id]);
        return $this->db->affected_rows();
    }

    // search for a user
    public function searchUser($email, $password, $role){
        return $this->db->where("email", $email)
        ->where("password", $password)
        ->where("role", $role)
        ->get("users")
        ->row();
    }



    public function countUsers(){
        return $this->db->select('id')->from("users")-> count_all_results();
    }

}