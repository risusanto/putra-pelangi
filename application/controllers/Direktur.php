<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktur extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
        if (!isset($this->data['username']) || $this->data['id_role'] != 1 ) {
            $this->session->unset_userdata('username');
             $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
            redirect('login');
            exit;
        }
    }
    
	public function index()
	{
		$this->data['title'] = 'Direktur'.$this->title;
        $this->data['content'] = 'direktur/dashboard';

        $this->template($this->data,'direktur');
	}

    public function rute_perjalanan(){
        $this->load->model('rute_m');
        if ($this->POST('add')) {
            $data_rute = [
                'rute' => $this->POST('rute'),
                'biaya' => $this->POST('biaya')
            ];
            $this->rute_m->insert($data_rute);
            $this->flashmsg('Berhasil menambahkan rute perjalanan <b>'.$this->POST('rute').'</b>!', 'success');
            redirect('direktur/rute-perjalanan');
        }
        $this->data['rute'] = $this->rute_m->get();
        $this->data['title'] = 'Rute Perjalanan'.$this->title;
        $this->data['content'] = 'direktur/rute';

        $this->template($this->data,'direktur');
    }
}
