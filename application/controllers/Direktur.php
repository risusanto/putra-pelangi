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

        if ($this->POST('get') && $this->POST('id')) {
  				$data = $this->rute_m->get_row(['id_rute' => $this->POST('id')]);
  				echo json_encode($data);
  				exit;
		    }

        if ($this->POST('add')) {
            $data_rute = [
                'asal' => $this->POST('asal'),
                'tujuan' => $this->POST('tujuan'),
                'biaya' => $this->POST('biaya')
            ];
            $this->rute_m->insert($data_rute);
            $this->flashmsg('Berhasil menambahkan rute perjalanan <b>'.$this->POST('rute').'</b>!', 'success');
            redirect('direktur/rute-perjalanan');
        }

        if ($this->POST('delete') && $this->POST('id')) {
            $this->rute_m->delete($this->POST('id'));
        }

        if ($this->POST('edit')) {
          $data = [
              'asal' => $this->POST('asal'),
              'tujuan' => $this->POST('tujuan'),
              'biaya' => $this->POST('biaya')
          ];
          $this->rute_m->update($this->POST('id_rute'),$data);
          $this->flashmsg('data disimpan');
          redirect('direktur/rute-perjalanan');
        }

        $this->data['rute'] = $this->rute_m->get();
        $this->data['title'] = 'Rute Perjalanan'.$this->title;
        $this->data['content'] = 'direktur/rute';

        $this->template($this->data,'direktur');
    }

    public function jadwal_keberangkatan()
    {
      $this->load->model('rute_m');
      $this->load->model('keberangkatan_m');
      $this->load->model('bus_m');
      $this->load->model('log_tiket_m');

      $tables = ['rute','bus']; $jcond = ['id_rute','id_bus'];
      $this->data['keberangkatan'] = $this->keberangkatan_m->getDataJoin($tables, $jcond);
      $this->data['bus'] = $this->bus_m->get();
      $this->data['rute'] = $this->rute_m->get();
      $this->data['title'] = 'Keberangkatan'.$this->title;
      $this->data['content'] = 'direktur/keberangkatan';

      $this->template($this->data,'direktur');
    }

    public function laporan_pembayaran()
    {
      $this->load->model('log_tiket_m');
      $this->load->model('pelanggan_m');
      $this->load->model('rute_m');
      $this->load->model('bus_m');

      $tables = ['keberangkatan','pesanan']; $jcond = ['id_keberangkatan','id_pesanan'];
      $this->data['tiket'] = $this->log_tiket_m->getDataJoin($tables,$jcond);
      $this->data['title'] = 'Laporan Pembayaran'.$this->title;
      $this->data['content'] = 'direktur/log';

      $this->template($this->data,'direktur');
    }

    public function print_pembayaran()
    {
      $this->load->model('log_tiket_m');
      $this->load->model('pelanggan_m');
      $this->load->model('rute_m');
      $this->load->model('bus_m');

      $tables = ['keberangkatan','pesanan']; $jcond = ['id_keberangkatan','id_pesanan'];
      $this->data['tiket'] = $this->log_tiket_m->getDataJoin($tables,$jcond);
      $this->data['title'] = 'Laporan Pembayaran'.$this->title;

      $this->load->view('direktur/print-pembayaran',$this->data);
    }

    public function laporan_penjualan()
    {
      $this->load->model('log_tiket_m');
      $this->load->model('pelanggan_m');
      $this->load->model('rute_m');
      $this->load->model('bus_m');

      $tables = ['keberangkatan','pesanan']; $jcond = ['id_keberangkatan','id_pesanan'];
      $this->data['tiket'] = $this->log_tiket_m->getDataJoin($tables,$jcond);
      $this->data['title'] = 'Laporan Penjualan'.$this->title;
      $this->data['content'] = 'direktur/laporan-penjualan';

      $this->template($this->data,'direktur');
    }

    public function print_penjualan()
    {
      $this->load->model('log_tiket_m');
      $this->load->model('pelanggan_m');
      $this->load->model('rute_m');
      $this->load->model('bus_m');

      $tables = ['keberangkatan','pesanan']; $jcond = ['id_keberangkatan','id_pesanan'];
      $this->data['tiket'] = $this->log_tiket_m->getDataJoin($tables,$jcond);
      $this->data['title'] = 'Laporan Penjualan'.$this->title;

      $this->load->view('direktur/print-penjualan',$this->data);
    }
}
