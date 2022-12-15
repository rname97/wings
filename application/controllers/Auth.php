<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
    //Menampilkan Halaman Login
	public function login(){
		// check_already_login_petugas();
		$this->load->view('login');
	}

    //Proses Auth Login
	public function ProcessLogin(){
		$post = $this->input->post(null, TRUE);
        // var_dump($post);
		
		if(isset($post['login'])){
			$this->load->model('User_m');
			$query = $this->User_m->loginUser($post);
			
			if($query->num_rows()>0){
				$row = $query->row();
				$params = array(
					'userID' => $row->userID,
					// 'hakAksesID'  => $row->hakAksesID
				);
				$this->session->set_userdata($params);
                // echo "user";
				echo "<script>
						alert('Selamat, Login Berhasil');
						window.location='".site_url('Dashboard')."';
					</script>";
			}
			else{
				echo "<script>
						alert('Login Gagal, Username/Password Salah');
						window.location='".site_url('Auth/login')."';
					</script>";
			}
		}
	}

  

	//Menampilkan Tampilan Registrasi
   
    
    public function logout(){
		$params = array('userID');
		$this->session->unset_userdata($params);
		redirect('Auth/login');

	}
}
