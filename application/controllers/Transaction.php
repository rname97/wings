<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    function __construct(){
        parent::__construct();
        // check_not_bidang();
        check_not_user();
        $this->load->model(['Product_m', 'Transaction_m', 'Cart_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['dataTransaction'] = $this->Transaction_m->getAllDetail()->result();
        // echo json_encode($data);
		$this->load->view('admin/transaction/transaction_data', $data);
	}

    public function addBuyProduct(){
        $userNameID = $this->fungsi->user_login()->userID;
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $id = $this->Transaction_m->addTransactionHeader($post, $userNameID);
        if($this->db->affected_rows() > 0){
            if($post['statusBuy'] == 'buyNow'){
                $this->Transaction_m->addTransactionDetail($post, $id);
                if($this->db->affected_rows() > 0){
                    $response = array(
                        'status' 	=> 'success',
                    );
                }
                
            }else if($post['statusBuy'] == 'buyCart'){
                for($i=1; $i<=count($post['productcart_id']); $i++){
                    $postx['product_id'] = $post['productcart_id'][$i];
                    $postx['qty'] = $post['qty'][$i];
                    $postx['subTotal'] = $post['subTotal'][$i];
                    $this->Transaction_m->addTransactionDetail($postx, $id);
                    if($this->db->affected_rows() > 0){
                        $response = array(
                            'status' 	=> 'success',
                        );

                        $this->Cart_m->deleteCart($userNameID);
                    }
                }



            }
        }



       
        
        echo json_encode($response);
    }

    public function addProduct(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        if($post['statusBuy'] = 'buyNow'){
            $id = $this->Product_m->addProduct($post);
            if($this->db->affected_rows() > 0){
                $response = array(
                    'status' 	=> 'success',
                );
            }
        }else if($post['statusBuy'] = 'buyCart'){

            for($i=0; $i<count($post['product_id']); $i++){
                $post['product_id'][$i];
            }

        }
        
        echo json_encode($response);
    }

    

}
