<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_m extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'pesanan';
        $this->data['primary_key'] = 'id_pesanan';
    }
}
