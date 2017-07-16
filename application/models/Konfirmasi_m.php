<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_m extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'konfirmasi';
        $this->data['primary_key'] = 'id_konfirmasi';
    }
}
