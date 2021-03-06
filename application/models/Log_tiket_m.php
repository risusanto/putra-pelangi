<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_tiket_m extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'log_tiket';
        $this->data['primary_key'] = 'id_log';
    }

    public function countTicket($cond = ''){
        if (is_array($cond))
			  $this->db->where($cond);
		    return $this->db->get($this->data['table_name'])->num_rows();
	  }

    public function cek_kursi($no_kursi,$id){
      $result = $this->get_row(['kursi' => $no_kursi,'id_keberangkatan' => $id]);
      if (isset($result)) {
        return 0;
      }
      return 1;
    }
}
