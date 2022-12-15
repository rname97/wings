<?php

Class Fungsi {
    protected $ci;
    var $pengirim;
    var $subbidangID;

    function __construct(){
        $this->ci =& get_instance();
    }

    // function pengelola_login(){
    //     $this->ci->load->model('Pengelola_m');
    //     $pengelola_id = $this->ci->session->userdata('pengelolaID');
    //     $pengelola_data = $this->ci->Pengelola_m->get($pengelola_id)->row();
    //     return $pengelola_data;
    // }

    function user_login(){
        $this->ci->load->model('User_m');
        $user_id = $this->ci->session->userdata('userID');
        $user_data = $this->ci->User_m->getById($user_id)->row();
        return $user_data;
    }

    


}