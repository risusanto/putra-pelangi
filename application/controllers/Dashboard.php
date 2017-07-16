<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
        $this->data['id_role'] = $this->session->userdata('id_role');
        if (!isset($this->data['username']) || $this->data['id_role'] != 3 ) {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
			      $this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
            redirect('login');
            exit;
        }
        $this->load->model('pelanggan_m');
        $this->data['profile'] = $this->pelanggan_m->get_row(['email' => $this->data['username']]);
    }

    public function index(){
        if ($this->cek_pesanan() == 1) {
          redirect('dashboard/pesan-tiket/'.$this->data['profile']->pesanan);
          exit;
        }
        $this->data['title'] = 'Dashboard'.$this->title;
        $this->data['content'] = 'pelanggan/dashboard';

        $this->template($this->data);
    }

    public function perjalanan(){
        if ($this->cek_pesanan() == 1) {
          redirect('dashboard/pesan-tiket/'.$this->data['profile']->pesanan);
          exit;
        }
        $this->load->model('log_tiket_m');
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
        $this->load->model('pesanan_m');
        $this->load->model('bus_m');
        $this->load->model('rute_m');
        $this->load->library('encrypt');
        $id = $this->encrypt->decode($kode);

        $result = $this->keberangkatan_m->get_row(['id_keberangkatan' => $id]);
        if (!isset($result)) {
            redirect('dashboard/perjalanan');
            exit;
        }

        if ($this->cek_pesanan() == NULL) {
          $this->pelanggan_m->update($this->data['username'],['pesanan'=>$kode]);
          $this->data['profile'] = $this->pelanggan_m->get_row(['email' => $this->data['username']]);
          $data_pesanan = [
            'pelanggan' => $this->data['profile']->email,
            'id_keberangkatan' => $id
          ];
          $this->pesanan_m->insert($data_pesanan);
        }

        $data_pesanan = [
          'pelanggan' => $this->data['profile']->email,
          'id_keberangkatan' => $id,
          'status' => 3
        ];

        if ($this->POST('pesan')) {
          $data_pesan = [
            'id_pesanan' => $this->POST('id_pesanan'),
            'kursi' => $this->POST('kursi'),
            'id_keberangkatan' => $id,
            'pelanggan' => $this->data['username'],
            'status' => 3,
            'id_rute' => $result->id_rute
          ];
          $this->log_tiket_m->insert($data_pesan);
        }

        if ($this->POST('batal')) {
          $this->pesanan_m->delete($this->POST('id_pesanan'));
          exit;
        }

        if ($this->POST('selesai')) {
          $this->pesanan_m->update($this->POST('id_pesanan'),['status' => 2]);
          exit;
        }

        $this->data['id_pesanan'] = $this->pesanan_m->get_row($data_pesanan)->id_pesanan;
        $this->data['biaya'] = $this->rute_m->get_row(['id_rute' => $result->id_rute])->biaya;
        $this->data['pesanan'] = $this->log_tiket_m->get(['id_pesanan'=>$this->data['id_pesanan'],'status' => 3]);
        $this->data['kapasitas'] = $this->bus_m->get_row(['id_bus' => $result->id_bus])->kapasitas;
        $this->data['title'] = 'Pilih Kursi'.$this->title;
        $this->data['content'] = 'pelanggan/tiket';

        $this->template($this->data);
    }

    private function cek_pesanan(){
      $this->load->model('pesanan_m');
      $result = $this->pesanan_m->get_row(['pelanggan' => $this->data['username'],'status' => 3]);
      if (!isset($result)) {
        return $result;;
      }
      return 1;
    }

    public function tagihan(){
      $this->load->model('pesanan_m');
      $this->load->model('bus_m');
      $this->load->model('rute_m');
      $this->load->library('encrypt');

      $tables = ['keberangkatan']; $jcond = ['id_keberangkatan'];
      $cond = [
        'pelanggan' => $this->data['username'],
        'pesanan.status' => 2
      ];
      $this->data['pesanan'] = $this->pesanan_m->getDataJoin($tables,$jcond,$cond);
      $this->data['title'] = 'Daftar Tagihan'.$this->title;
      $this->data['content'] = 'pelanggan/tagihan';

      $this->template($this->data);
    }

    public function invoice()
    {
      $this->load->library('encrypt');
      $this->load->model('pesanan_m');
      $this->load->model('rute_m');
      $this->load->model('keberangkatan_m');
      $this->load->model('log_tiket_m');
      $this->load->model('konfirmasi_m');

      $kode = $this->uri->segment(3);
      if (!isset($kode)) {
        redirect('dashboard/tagihan');
        exit;
      }
      $cek = $this->pesanan_m->get_row(['id_pesanan' => $this->encrypt->decode($kode)]);
      if (!isset($cek)) {
        redirect('dashboard/tagihan');
        exit;
      }

      if ($this->POST('add')) {
        $req = ['tanggal_pembayaran','jumlah_pembayaran',''];
        if (!$this->konfirmasi_m->required_input($req)) {
          redirect('dashboard/invoice/'.$kode);
          $this->flashdata('Data harus lengkap!');
          exit;
        }
        $data = [
          'tanggal_pembayaran' => $this->POST('tanggal_pembayaran'),
          'id_pesanan' => $cek->id_pesanan,
          'pelanggan' => $this->data['profile']->email,
          'jumlah_pembayaran' => $this->POST('jumlah_pembayaran'),
          'pesan' => $this->POST('pesan')
        ];
        $this->konfirmasi_m->insert($data);
        $this->upload($this->db->insert_id(),'bukti');
        $this->pesanan_m->update($cek->id_pesanan,['status_pembayaran' => 'menunggu konfirmasi']);
        $this->flashmsg('Berhasil disimpan!');
        redirect('dashboard/invoice/'.$kode);
        exit;
      }

      $id_rute = $this->keberangkatan_m->get_row(['id_keberangkatan' => $cek->id_keberangkatan])->id_rute;
      $this->data['invoice'] = $cek;
      $this->data['total'] = $this->rute_m->get_row(['id_rute' => $id_rute])->biaya * $this->log_tiket_m->get_num_row(['id_pesanan' => $cek->id_pesanan]);
      $this->data['pesanan'] = $this->log_tiket_m->get(['id_pesanan' => $cek->id_pesanan]);
      $this->data['title'] = 'Invoice'.$this->title;
      $this->data['content'] = 'pelanggan/invoice';

      $this->template($this->data);
    }

    public function print()
    {
      $this->load->library('encrypt');
      $this->load->model('pesanan_m');
      $this->load->model('rute_m');
      $this->load->model('keberangkatan_m');
      $this->load->model('log_tiket_m');

      $kode = $this->uri->segment(3);
      if (!isset($kode)) {
        redirect('dashboard/tagihan');
        exit;
      }
      $cek = $this->pesanan_m->get_row(['id_pesanan' => $this->encrypt->decode($kode)]);
      if (!isset($cek)) {
        redirect('dashboard/tagihan');
        exit;
      }
      $id_rute = $this->keberangkatan_m->get_row(['id_keberangkatan' => $cek->id_keberangkatan])->id_rute;
      $this->data['invoice'] = $cek;
      $this->data['total'] = $this->rute_m->get_row(['id_rute' => $id_rute])->biaya * $this->log_tiket_m->get_num_row(['id_pesanan' => $cek->id_pesanan]);
      $this->data['pesanan'] = $this->log_tiket_m->get(['id_pesanan' => $cek->id_pesanan]);
      $this->data['title'] = 'Invoice'.$this->title;

      $this->load->view('pelanggan/print',$this->data);
    }
}
