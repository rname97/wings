<?php

class Cart_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_cart');
        $this->db->join('tb_user', 'tb_user.userID  = tb_cart.usercart_id');
        $this->db->join('tb_product', 'tb_product.productID  = tb_cart.productcart_id');
        $query = $this->db->get();
        return $query;
    }
    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_cart');
        $this->db->where('cartID', $id);
        $query = $this->db->get();
        return $query;
    }


    public function addCart($post, $userID){
        $params = array(
            'productcart_id' => $post['product_id'],
            'usercart_id' => $userID,
            'qty' => $post['qty'],
            'total' => $post['total']
        );
        $query = $this->db->insert('tb_cart', $params);
        return $query;
    }
    public function deleteCart($id){
        $this->db->where('usercart_id', $id);
        $this->db->delete('tb_cart');
        
        
    }

    public function deleteCartID(){
        $this->db->where('cartID', $id);
        $this->db->delete('tb_cart');
        
    }
 
}