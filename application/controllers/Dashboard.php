<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
    }

    public function index(){
        $this->data['title'] = 'Dashboard'.$this->title;
        $this->data['content'] = 'pelanggan/dashboard';

        $this->template($this->data);
    }

    public function perjalanan(){
        $this->load->model('keberangkatan_m');
        $this->load->library('encrypt');

        $tables = ['rute','bus']; $jcond = ['id_rute','id_bus'];
        $this->data['keberangkatan'] = $this->keberangkatan_m->getDataJoin($tables, $jcond,'status != 0');
        $this->data['title'] = 'Pilih Tiket Perjalanan'.$this->title;
        $this->data['content'] = 'pelanggan/perjalanan';

        $this->template($this->data);
    }

    public function pesan_tiket(){
        $kode = $this->uri->segment(3);
        if(!isset($kode)){
            redirect('dashboard/perjalanan');
            exit;
        }
        $this->load->model('keberangkatan_m');
        $this->load->model('log_tiket_m');
        $this->load->model('bus_m');
        $this->load->library('encrypt');
        $id = $this->encrypt->decode($kode);
        $result = $this->keberangkatan_m->get_row(['id_keberangkatan' => $id]);
        if (!isset($result)) {
            redirect('dashboard/perjalanan');
            exit;
        }
        $this->data['kapasitas'] = $this->bus_m->get_row(['id_bus' => $result->id_bus])->kapasitas;
        $this->data['title'] = 'Pilih Kursi'.$this->title;
        $this->data['content'] = 'pelanggan/tiket';

        $this->template($this->data);
    }
}
