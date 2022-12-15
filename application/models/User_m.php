<?php

class User_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_user');
        $query = $this->db->get();
        return $query;
    }
    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('userID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function loginUser($post){
        $this->db->from('tb_user');
        $this->db->where('userName', $post['username']);
        $this->db->where('userPassword', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    public function addUser($post){
        $params = array(
            'userName' => $post['userName'],
            'userRules' => $post['userRules'],
            'userPassword' => $post['password'],
        );
        $this->db->insert('tb_user', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editUser($post){
        $params = array(
            'userName' => $post['userName'],
            'userRules' => $post['userRules'],
            'userPassword' => $post['password'],
        );
        $this->db->where('userID ', $post['userID']);
        $query = $this->db->update('tb_user',$params);
        return $query;
    }

    public function deleteUser($id){
        $this->db->where('userID', $id);
        $this->db->delete('tb_user');
    }
}