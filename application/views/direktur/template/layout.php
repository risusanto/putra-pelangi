<?php
	$this->load->view('direktur/template/header', array('title' => $title));
	$this->load->view('direktur/template/navbar');
	$this->load->view('direktur/template/sidebar');
	$this->load->view($content);
	$this->load->view('direktur/template/footer');
