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
        $this->load->model('rekening_m');

        if ($this->POST('rekening')) {
          $this->rekening_m->update(1,['rekening' => $this->POST('no_rekening')]);
          redirect('admin');
          exit;
        }

        $this->data['bayar'] = $this->rekening_m->get_row(['id' => 1]);
        $this->data['title'] = 'Admin'.$this->title;
        $this->data['content'] = 'admin/dashboard';

        $this->template($this->data,'admin');
    }

    public function jadwal_keberangkatan(){
        $this->load->model('rute_m');
        $this->load->model('keberangkatan_m');
        $this->load->model('bus_m');
        $this->load->model('log_tiket_m');

        if ($this->POST('berangkat')) {
          $this->load->model('pesanan_m');
          $index = [
            'id_keberangkatan' => $this->POST('id'),
            'status' => 2
          ];
          $this->pesanan_m->update_where($index,['status' => 1]);
          $this->keberangkatan_m->update($this->POST('id'),['status' => 3]);
          exit;
        }

        if ($this->POST('add')) {
            $required = ['rute','waktu','tanggal','bus'];
            if (!$this->keberangkatan_m->required_input($required)) {
				$this->flashmsg('Harap isi dengan lengkap!', 'warning');
				redirect('admin/jadwal-keberangkatan');
				exit;
			}
            $data_keberangkatan = [
                'id_rute' => $this->POST('rute'),
                'waktu' => $this->POST('waktu'),
                'tanggal' => $this->POST('tanggal'),
                'id_bus' => $this->POST('bus')
            ];
            $this->keberangkatan_m->insert($data_keberangkatan);
            $this->flashmsg('Berhasil menambahkan jadwal keberangkatan!', 'success');
            redirect('admin/jadwal-keberangkatan');
            exit;
        }

        if ($this->POST('get') && $this->POST('id_keberangkatan')) {
				$data = $this->keberangkatan_m->get_row(['id_keberangkatan' => $this->POST('id_keberangkatan')]);
				echo json_encode($data);
				exit;
		}

        if ($this->POST('edit')) {
            $required = ['edit_waktu','edit_tanggal'];
            if (!$this->keberangkatan_m->required_input($required)) {
				$this->flashmsg('Harap isi dengan lengkap!', 'warning');
				redirect('admin/jadwal-keberangkatan');
				exit;
			}
            $data_keberangkatan = [
                'waktu' => $this->POST('edit_waktu'),
                'tanggal' => $this->POST('edit_tanggal')
            ];
            if ($this->POST('rute')) {
                $data_keberangkatan['id_rute'] = $this->POST('rute');
            }
            if ($this->POST('bus')) {
                $data_keberangkatan['id_bus'] = $this->POST('bus');
            }
            $this->keberangkatan_m->update($this->POST('edit_keberangkatan'),$data_keberangkatan);
            $this->flashmsg('Berhasil disimpan!', 'success');
            redirect('admin/jadwal-keberangkatan');
            exit;
        }

        if ($this->POST('delete') && $this->POST('id')) {
            $this->keberangkatan_m->delete($this->POST('id'));
        }

        $tables = ['rute','bus']; $jcond = ['id_rute','id_bus'];
        $this->data['keberangkatan'] = $this->keberangkatan_m->getDataJoin($tables, $jcond);
        $this->data['bus'] = $this->bus_m->get();
        $this->data['rute'] = $this->rute_m->get();
        $this->data['title'] = 'Admin'.$this->title;
        $this->data['content'] = 'admin/keberangkatan';

        $this->template($this->data,'admin');
    }

    public function armada_bus(){
        $this->load->model('bus_m');

        if ($this->POST('add')) {
            $required = ['no_polisi','telepon','nama','kapasitas'];
            if (!$this->bus_m->required_input($required)) {
				$this->flashmsg('Harap isi dengan lengkap!', 'warning');
				redirect('admin/jadwal-keberangkatan');
				exit;
			}
            $data_armada = [
                'nama' => $this->POST('nama'),
                'telepon' => $this->POST('telepon'),
                'kapasitas' => $this->POST('kapasitas'),
                'no_polisi' => $this->POST('no_polisi')
            ];
            $this->bus_m->insert($data_armada);
            $this->flashmsg('Berhasil menambahkan armada bus!', 'success');
            redirect('admin/armada-bus');
            exit;
        }

         if ($this->POST('get') && $this->POST('id_bus')) {
				$this->data['ab'] = $this->bus_m->get_row(['id_bus' => $this->POST('id_bus')]);
				echo json_encode($this->data['ab']);
				exit;
		}

        if ($this->POST('edit')) {
            $required = ['edit_no_polisi','edit_telepon','edit_nama'];
            if (!$this->bus_m->required_input($required)) {
				$this->flashmsg('Harap isi dengan lengkap!', 'warning');
				redirect('admin/jadwal-keberangkatan');
				exit;
			}
            $data_armada = [
                'nama' => $this->POST('edit_nama'),
                'telepon' => $this->POST('edit_telepon'),
                'no_polisi' => $this->POST('edit_no_polisi')
            ];
            if ($this->POST('kapasitas') != 0) {
                $data_armada['kapasitas'] = $this->POST('kapasitas');
            }
            $this->bus_m->update($this->POST('id_bus'),$data_armada);
            $this->flashmsg('Berhasil disimpan!', 'success');
            redirect('admin/armada-bus');
            exit;
        }

        if ($this->POST('delete') && $this->POST('id')) {
            $this->bus_m->delete($this->POST('id'));
        }

        $this->data['bus'] = $this->bus_m->get();
        $this->data['title'] = 'Armada Bus'.$this->title;
        $this->data['content'] = 'admin/armada';

        $this->template($this->data,'admin');
    }

    public function konfirmasi_pembayaran()
    {
      $this->load->model('konfirmasi_m');
      $this->load->library('encrypt');
      $this->load->model('pesanan_m');

      if ($this->POST('konfirmasi')) {
        $get = $this->konfirmasi_m->get_row(['id_konfirmasi' => $this->POST('id')])->id_pesanan;
        $this->konfirmasi_m->delete($this->POST('id'));
        $this->pesanan_m->update($get,['status_pembayaran' => 'LUNAS']);
        exit;
      }

      $this->data['konfirmasi'] = $this->konfirmasi_m->get_by_order('id_pesanan','asc');
      $this->data['title'] = 'Konfirmasi Pembayaran'.$this->title;
      $this->data['content'] = 'admin/konfirmasi';

      $this->template($this->data,'admin');
    }

    public function pesanan()
    {
      $this->load->library('encrypt');
      $this->load->model('pesanan_m');
      $this->load->model('rute_m');
      $this->load->model('keberangkatan_m');
      $this->load->model('log_tiket_m');
      $this->load->model('pelanggan_m');

      $kode = $this->uri->segment(3);
      if (!isset($kode)) {
        redirect('admin/konfirmasi-pembayaran');
        exit;
      }
      $cek = $this->pesanan_m->get_row(['id_pesanan' => $this->encrypt->decode($kode)]);
      if (!isset($cek)) {
        redirect('admin/konfirmasi-pembayaran');
        exit;
      }
      $this->data['profile'] = $this->pelanggan_m->get_row(['email' => $cek->pelanggan]);
      $id_rute = $this->keberangkatan_m->get_row(['id_keberangkatan' => $cek->id_keberangkatan])->id_rute;
      $this->data['invoice'] = $cek;
      $this->data['total'] = $this->rute_m->get_row(['id_rute' => $id_rute])->biaya * $this->log_tiket_m->get_num_row(['id_pesanan' => $cek->id_pesanan]);
      $this->data['pesanan'] = $this->log_tiket_m->get(['id_pesanan' => $cek->id_pesanan]);
      $this->data['title'] = 'Invoice'.$this->title;

      $this->load->view('admin/detail',$this->data);
    }

    public function daftar_pelanggan()
    {
      $this->load->model('pelanggan_m');
      $this->load->model('user_m');

      if ($this->POST('edit')) {
        $req = ['email','nama','telepon'];
        if (!$this->pelanggan_m->required_input($req)) {
          $this->flashmsg('Data harus lengkap','warning');
          redirect('admin/daftar-pelanggan');
          exit;
        }
        $this->user_m->update($this->POST('id'),['username' => $this->POST('email')]);
        $data = [
          'nama' => $this->POST('nama'),
          'telepon' => $this->POST('telepon')
        ];
        $this->pelanggan_m->update($this->POST('email'),$data);
        $this->flashmsg('Data disimpan!');
        redirect('admin/daftar-pelanggan');
        exit;
      }

      if ($this->POST('get')) {
      $data = $this->pelanggan_m->get_row(['email' => $this->POST('id')]);
      echo json_encode($data);
      exit;
      }

      if ($this->POST('delete')) {
        $this->user_m->delete($this->POST('id'));
        exit;
      }

      if ($this->POST('reset')) {
        $this->user_m->update($this->POST('id'),['password' => md5('123456')]);
        exit;
      }

      $this->data['pelanggan'] = $this->pelanggan_m->get();
      $this->data['title'] = 'Invoice'.$this->title;
      $this->data['content'] = 'admin/pelanggan';

      $this->template($this->data,'admin');
    }
}
