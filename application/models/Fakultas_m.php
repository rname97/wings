<?php

class Fakultas_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_fakultas');
        $this->db->order_by('fakultasID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

  
    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_fakultas');
        $this->db->where('fakultasID', $id);
        $query = $this->db->get();
        return $query;
    }



    public function addFakultas($post){
        $params = array(
            'fakultasNama' => $post['fakultasNama'],
            'fakultasKD' => $post['fakultasKD'],
        );
        $query = $this->db->insert('tb_fakultas', $params);
        // $id = $this->db->insert_id();
        // return $id;
        return $query;
    }

    public function editFakultas($post){
        $params = array(
            'fakultasNama' => $post['fakultasNama'],
            'fakultasKD' => $post['fakultasKD'],
        );
        $this->db->where('fakultasID ', $post['fakultasID']);
        $query = $this->db->update('tb_fakultas',$params);
        return $query;
    }

    public function deleteFakultas($id){
        $this->db->where('fakultasID', $id);
        $this->db->delete('tb_fakultas');
        
        
    }
}