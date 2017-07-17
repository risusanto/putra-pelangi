<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends MY_Controller {
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
					redirect('dashboard');
					break;
			}
			exit;
		}
    }

    public function index()
    {
      if ($this->POST('daftar')) {
        $this->load->model('user_m');
        $req = ['email','password','confirm','alamat','nama'];
        if (!$this->user_m->required_input($req)) {
          $this->flashmsg('Data Harus lengkap','warning');
          redirect('daftar');
          exit;
        }
        $cek = $this->user_m->get_row(['username' => $this->POST('email')]);

        if (isset($cek)) {
          $this->flashmsg('Email telah digunakan','warning');
          redirect('daftar');
          exit;
        }
        if ($this->POST('password') != $this->POST('confirm')) {
          $this->flashmsg('Password harus sama!','warning');
          redirect('Daftar');
          exit;
        }
        $data_user = [
          'username' => $this->POST('email'),
          'password' => md5($this->POST('password')),
          'id_role' => 3
        ];
        $this->user_m->insert($data_user);
        $this->load->model('pelanggan_m');
        $data_pelanggan = [
          'email' => $this->POST('email'),
          'alamat' => $this->POST('alamat'),
          'nama' => $this->POST('nama')
        ];
        $this->pelanggan_m->insert($data_pelanggan);
        $this->flashmsg('Pendaftaran berhasil silahkan login');
        redirect('login');
        exit;
      }
      $this->data['title'] = 'Daftar'.$this->title;
  		$this->load->view('daftar',$this->data);
    }
}
