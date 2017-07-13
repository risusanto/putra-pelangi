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
        $this->load->model('log_tiket_m');

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
}
