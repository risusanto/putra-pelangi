<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Web extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->data['title'] = 'Home'.$this->title;
    $this->load->view('home/home',$this->data);
  }

  public function rute()
  {
    $this->load->model('keberangkatan_m');

    $tables = ['rute','bus']; $jcond = ['id_rute','id_bus'];
    $this->data['keberangkatan'] = $this->keberangkatan_m->getDataJoin($tables, $jcond,'status != 0');
    $this->data['title'] = 'Rute '.$this->title;
    $this->load->view('home/rute',$this->data);
  }
}
