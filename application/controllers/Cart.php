<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    function __construct(){
        parent::__construct();
        // check_not_bidang();
        check_not_user();
        $this->load->model(['Product_m', 'Cart_m', 'Transaction_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['dataTransaction'] = $this->Transaction_m->getAllMax()->row();
        $urutan = 0;
        if($data['dataTransaction'] == null){
            $data['rowTransactionxx'] = "001";
        }else{
            $z = $data['dataTransaction']->documentNumber;

            $urutan = (int) substr($data['dataTransaction']->documentNumber, 2);

            $urutan++;
            
            // $huruf = "BRG";
            $data['dataTransaction']->documentNumber = sprintf("%03s", $urutan);
            $data['rowTransactionxx1']=  $data['dataTransaction']->documentNumber;
        }

        $data['dataCart'] = $this->Cart_m->getAll()->result();
        $x1 = 0;
        foreach($data['dataCart'] as $rowx){
            $x1 += $rowx->total;
        }
        $data['totalAll'] = $x1;
		$this->load->view('admin/cart/cart_data', $data);
        // echo json_encode($data);
	}

    public function addCart(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        if($post['total'] == ""){
            $post['total'] = $post['subTotal'];
        }
        $userNameID = $this->fungsi->user_login()->userID;
         $this->Cart_m->addCart($post, $userNameID);
        if($this->db->affected_rows() > 0){
           
            if($this->db->affected_rows() > 0){
                $response = array(
                    'status' 	=> 'success',
                );
           
            }
       
    }
    echo json_encode($response);
}

public function deleteCartID(){
    $id = $this->input->post('id');
    $idx = $this->Cart_m->getById($id)->row();
    $this->Cart_m->deleteCartID($idx->cartID);
    $error = $this->db->error();
    if($error['code'] != 0){
        $response = array(
            'status' 	=> 'gagal',
        );
    }else{
        $response = array(
            'status' 	=> 'success',
        );
    }
    echo json_encode($idx);
}
}
