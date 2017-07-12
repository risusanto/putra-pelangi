<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_tiket_m extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'log_tiket';
        $this->data['primary_key'] = 'id_log';
    }

    public function cek_kursi($no_kursi){
      $result = $this->get_row(['kursi' => $no_kursi]);
      if (isset($result)) {
        return false;
      }
      return true;
    }
}
