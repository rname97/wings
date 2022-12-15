<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
        parent::__construct();
        // check_not_bidang();
        check_not_user();
        $this->load->model(['User_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['dataUser'] = $this->User_m->getAll()->result();
		$this->load->view('admin/user/user_data', $data);
	}

    public function viewAdduser(){
        $this->load->view('admin/user/user_add');
    }

    public function addUser(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $id = $this->User_m->addUser($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }
        echo json_encode($response);
    }

    public function viewEdituser($id){
        $data['rowUser'] = $this->User_m->getById($id)->row();
        // echo json_encode($data);
        $this->load->view('admin/user/user_edit', $data);
    }

    public function editUser(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $this->User_m->editUser($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }
        echo json_encode($response);
    }

    public function deleteUser(){
        $id = $this->input->post('id');
        $idx = $this->User_m->getById($id)->row();
        $this->User_m->deleteUser($idx->userID);
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
