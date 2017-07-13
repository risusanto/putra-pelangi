<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends MY_Model {

    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'pelanggan';
        $this->data['primary_key'] = 'email';
    }
}
