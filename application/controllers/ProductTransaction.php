<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductTransaction extends CI_Controller {
    function __construct(){
        parent::__construct();
        // check_not_bidang();
        check_not_user();
        $this->load->model(['Product_m', 'Transaction_m']);
        $this->load->library('form_validation');
    }



    public function viewTransactionProduct($id){
        $data['rowProduct'] = $this->Product_m->getById($id)->row();
        $data['dataTransaction'] = $this->Transaction_m->getAll()->row();
        $urutan = 0;
        if($data['dataTransaction'] == null){
            $data['rowTransactionxx'] = "001";
        }else{
            $z = $data['dataTransaction']->documentNumber;

            $urutan = (int) substr($data['dataTransaction']->documentNumber, 2);

            $urutan = $urutan + 1;
            
            // $huruf = "BRG";
            $data['dataTransaction']->documentNumber = sprintf("%03s", $urutan);
            $data['rowTransactionxx1']=  $data['dataTransaction']->documentNumber;
        }
        // echo json_encode($urutan);
        $this->load->view('admin/product_transaction/product_transaction', $data);
    }

    public function addProduct(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $id = $this->Product_m->addProduct($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }
        echo json_encode($response);
    }

    public function viewEditProduct($id){
        $data['rowProduct'] = $this->Product_m->getById($id)->row();
        // echo json_encode($data);
        $this->load->view('admin/product/product_edit', $data);
    }

    public function editProduct(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $this->Product_m->editProduct($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }
        echo json_encode($response);
    }

    public function deleteProduct(){
        $id = $this->input->post('id');
        $idx = $this->Product_m->getById($id)->row();
        $this->Product_m->deleteProduct($idx->productCode);
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
        echo json_encode($response);
    }

}
