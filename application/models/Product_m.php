<?php

class Product_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_product');
        $query = $this->db->get();
        return $query;
    }
    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->where('productCode', $id);
        $query = $this->db->get();
        return $query;
    }


    public function addProduct($post){
        $params = array(
            'productCode' => $post['productCode'],
            'productName' => $post['productName'],
            'price' => $post['price'],
            'currency' => $post['currency'],
            'discount' => $post['discount'],
            'dimension' => $post['dimension'],
            'unit' => $post['unit'],
        );
        $query = $this->db->insert('tb_product', $params);
        return $query;
    }

    public function editproduct($post){
        $params = array(
            'productCode' => $post['productCode'],
            'productName' => $post['productName'],
            'price' => $post['price'],
            'currency' => $post['currency'],
            'discount' => $post['discount'],
            'dimension' => $post['dimension'],
            'unit' => $post['unit'],
        );
        $this->db->where('productID ', $post['productID']);
        $query = $this->db->update('tb_product',$params);
        return $query;
    }

    public function deleteProduct($id){
        $this->db->where('productCode', $id);
        $this->db->delete('tb_product');
    }
}