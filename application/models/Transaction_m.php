<?php

class Transaction_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_transaction_header');
        $this->db->join('tb_user', 'tb_user.userID  = tb_transaction_header.user_id');
        $query = $this->db->get();
        return $query;
    }

    public function getAllDetail(){
        $this->db->select('*');
        $this->db->from('tb_transaction_detail');
        $this->db->join('tb_transaction_header', 'tb_transaction_header.transactionID = tb_transaction_detail.transaction_id');
        $this->db->join('tb_product', 'tb_product.productID = tb_transaction_detail.product_id');
        $query = $this->db->get();
        return $query;
    }

    public function getAllMax(){
        $this->db->select_max('documentNumber');
        $this->db->from('tb_transaction_header');
        $query = $this->db->get();
        return $query;
    }
    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_transaction_header');
        $this->db->where('productCode', $id);
        $query = $this->db->get();
        return $query;
    }


    public function addTransactionHeader($post, $userID){
        $params = array(
            'documentCode' => $post['documentCode'],
            'documentNumber' => $post['documentNumber'],
            'user_id' => $userID,
            'total' => $post['total']
        );
        $this->db->insert('tb_transaction_header', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function addTransactionDetail($post, $id){
        $params = array(
            'transaction_id' => $id,
            'product_id' => $post['product_id'],
            'quantity' => $post['qty'],
            'subTotal' => $post['subTotal'],

        );
        $query = $this->db->insert('tb_transaction_detail', $params);
        // $id = $this->db->insert_id();
        // return $id;
        return $query;
    }

    public function editproduct($post){
        $params = array(
            'productName' => $post['productName'],
            'price' => $post['price'],
            'currency' => $post['currency'],
            'discount' => $post['discount'],
            'dimension' => $post['dimension'],
            'unit' => $post['unit'],
        );
        $this->db->where('productCode ', $post['productCode']);
        $query = $this->db->update('tb_transaction_header',$params);
        return $query;
    }

    public function deleteProduct($id){
        $this->db->where('productCode', $id);
        $this->db->delete('tb_transaction_header');
    }
}