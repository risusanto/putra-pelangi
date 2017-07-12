<?php
	$this->load->view('pelanggan/template/header', array('title' => $title));
	$this->load->view('pelanggan/template/navbar');
	$this->load->view('pelanggan/template/sidebar');
	$this->load->view($content);
	$this->load->view('pelanggan/template/footer');
