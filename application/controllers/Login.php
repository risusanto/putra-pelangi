<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    public function __construct(){
        parent::__construct();
		$this->data['username'] = $this->session->userdata('username');

		if (isset($this->data['username']))
		{
			$this->data['id_role'] = $this->session->userdata('id_role');
			switch ($this->data['id_role'])
			{
				case 1:
					redirect('direktur');
					break;
				case 2:
					redirect('admin');
					break;
				case 3:
					redirect('pelanggan');
					break;
			}
			exit;
		}
    }
    
	public function index()
	{
		if ($this->POST('login')) {
			$this->load->model('user_m');
			$required = ['email','password'];
			if (!$this->user_m->required_input($required)) {
				$this->flashmsg('Isi login data dengan lengkap!', 'warning');
				redirect('login');
				exit;
			}
			$data_login = [
				'username' => $this->POST('email'),
				'password' => md5($this->POST('password'))
			];
			$result = $this->user_m->login($data_login);
			if (!isset($result)) {
				$this->flashmsg('Username atau password salah!', 'danger');
				redirect('login');
				exit;
			}
			redirect('login');
			exit;
		}
		$this->load->view('login');
	}
}
