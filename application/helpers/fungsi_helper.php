<?php

function check_already_login_petugas(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('petugasID');
    if($user_session){
        // echo "Masuk";
        redirect('admin/Dashboard');
    }
}

function check_not_petugas(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userID');
    if(!$user_session){
        redirect('Auth/login');
    }
}

function check_admin(){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->pengguna_login()->petugasRules != 1){
        redirect('index');
    }

}



function check_pengguna_page($idPage){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    $data = $ci->fungsi->hakAkses()->hakAksesPageRules;
    $zx = unserialize($data);
    if(!in_array($idPage, $zx)){
         redirect('index');
       
    } else{
       
    }
}



//user



function check_already_login_user(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userID');
    if($user_session){
        redirect('Dashboard');
    }
}



function check_not_user(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userID');
    if(!$user_session){
        redirect('AuthUser/login');
    }
}






