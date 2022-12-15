<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        // check_not_bidang();
        check_not_user();
        $this->load->model(['Product_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['dataProduct'] = $this->Product_m->getAll()->result();
		$this->load->view('admin/dashboard', $data);
	}
}
