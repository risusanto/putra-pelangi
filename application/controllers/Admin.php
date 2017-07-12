<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_controller
{
    public function __construct(){
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
        if (!isset($this->data['username']) || $this->data['id_role'] != 2 ) {
            $this->session->unset_userdata('username');
             $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
            redirect('login');
            exit;
        }
    }

    public function index(){
        $this->data['title'] = 'Admin'.$this->title;
        $this->data['content'] = 'admin/dashboard';

        $this->template($this->data,'admin');
    }

    public function jadwal_keberangkatan(){
        $this->load->model('rute_m');
        $this->load->model('keberangkatan_m');
        $this->load->model('bus_m');

        if ($this->POST('add')) {
            $required = ['rute','waktu','tanggal'];
            if (!$this->keberangkatan_m->required_input($required)) {
				$this->flashmsg('Harap isi dengan lengkap!', 'warning');
				redirect('admin/jadwal-keberangkatan');
				exit;
			}
            $data_keberangkatan = [
                'id_rute' => $this->POST('rute'),
                'waktu' => $this->POST('waktu'),
                'tanggal' => $this->POST('tanggal')
            ];
            $this->keberangkatan_m->insert($data_keberangkatan);
            $this->flashmsg('Berhasil menambahkan jadwal keberangkatan!', 'success');
            redirect('admin/jadwal-keberangkatan');
            exit;
        }

        $tables = ['rute','bus']; $jcond = ['id_rute','id_bus'];
        $this->data['keberangkatan'] = $this->keberangkatan_m->getDataJoin($tables, $jcond);
        $this->data['rute'] = $this->rute_m->get();
        $this->data['title'] = 'Admin'.$this->title;
        $this->data['content'] = 'admin/keberangkatan';

        $this->template($this->data,'admin');
    }

    public function armada_bus(){
        $this->load->model('bus_m');

        if ($this->POST('add')) {
            $required = ['no_polisi','tahun','pembuat','nama','kapasitas'];
            if (!$this->bus_m->required_input($required)) {
				$this->flashmsg('Harap isi dengan lengkap!', 'warning');
				redirect('admin/jadwal-keberangkatan');
				exit;
			}
            $data_armada = [
                'nama' => $this->POST('nama'),
                'tahun' => $this->POST('tahun'),
                'pembuat' => $this->POST('pembuat'),
                'kapasitas' => $this->POST('kapasitas'),
                'no_polisi' => $this->POST('no_polisi')
            ];
            $this->bus_m->insert($data_armada);
            $this->flashmsg('Berhasil menambahkan armada bus!', 'success');
            redirect('admin/armada-bus');
            exit;
        }

        $this->data['bus'] = $this->bus_m->get();
        $this->data['title'] = 'Armada Bus'.$this->title;
        $this->data['content'] = 'admin/armada';

        $this->template($this->data,'admin');
    }
}
