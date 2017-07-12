<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keberangkatan_m extends MY_Model {
    
    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'keberangkatan';
        $this->data['primary_key'] = 'id_keberangkatan';
    }
}
