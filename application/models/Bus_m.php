<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus_m extends MY_Model {
    
    public function __construct(){
        parent::__construct();
        $this->data['table_name'] = 'bus';
        $this->data['primary_key'] = 'id_bus';
    }
}
