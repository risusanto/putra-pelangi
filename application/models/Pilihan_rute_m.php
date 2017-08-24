<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan_rute_m extends MY_Model {
    
    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'pilihan_rute';
        $this->data['primary_key'] = 'id';
    }
}
