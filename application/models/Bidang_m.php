<?php

class Bidang_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_bidang');
        $this->db->order_by('bidangID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

  
    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_bidang');
        $this->db->where('bidangID', $id);
        $query = $this->db->get();
        return $query;
    }



    public function addBidang($post){
        $params = array(
            'bidangNama' => $post['bidangNama'],
            'bidangKD' => $post['bidangKD'],
        );
        $this->db->insert('tb_bidang', $params);
        $id = $this->db->insert_id();
        return $id;
        // return $query;
    }

    public function editBidang($post){
        $params = array(
            'bidangNama' => $post['bidangNama'],
            'bidangKD' => $post['bidangKD'],
        );
        $this->db->where('bidangID ', $post['bidangID']);
        $query = $this->db->update('tb_bidang',$params);
        return $query;
    }

    public function deleteBidang($id){
        $this->db->where('bidangID', $id);
        $this->db->delete('tb_bidang');
        
        
    }

    //////////////////////////////////////////////////////////////////

    public function getByIDBidangKeahlian($id){
        // $this->db->select('*');
        $this->db->from('tb_bidang_keahlian');
        $this->db->where('bk_bidangID', $id);
        // $this->db->order_by('skID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function addBidangKeahlian($post){
        $params = array(
            'bk_bidangID' => $post['bk_bidangID'],
            'bk_prodiID' => $post['bk_prodiID'],
            // 'sertifikasi_prodiID' => $post['sertifikasiProdiID'],
        );
        $query = $this->db->insert('tb_bidang_keahlian', $params);
        // $id = $this->db->insert_id();
        return $query;
    }

    public function deleteBidangKeahlian($id){
        $this->db->where('bk_bidangID', $id);
        $this->db->delete('tb_bidang_keahlian');
    }
}