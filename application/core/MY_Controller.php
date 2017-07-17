<?php

class MY_Controller extends CI_Controller
{
	public $title = ' | Putra Pelangi Perkasa';

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function template($data, $template = 'siswa')
	{
		if ($template == 'admin') {
		return $this->load->view('admin/template/layout', $data);
		}
		else if ($template == 'direktur') {
		return $this->load->view('direktur/template/layout', $data);
		}
		return $this->load->view('pelanggan/template/layout', $data);
	}

	public function POST($name)
	{
		return $this->input->post($name);
	}


	public function flashmsg($msg, $type = 'success')
	{
		return $this->session->set_flashdata('msg', '<div class="alert alert-'.$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>');
	}

	public function upload($id, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.jpg');
			$config = [
				'file_name' 		=> $id . '.jpg',
				'allowed_types'		=> 'jpg|png|bmp|jpeg',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
		exit;
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
