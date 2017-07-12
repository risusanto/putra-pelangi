<?php

class MY_Model extends CI_Model
{
	protected $data = [];

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @author Ryan Fadholi
	 * Method untuk menentukan jumlah baris yang berubah dari sebuah query.
	 *
	 * @return type Integer
	 **/
	public function affected_rows()
	{
		return $this->db->affected_rows();
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk mengambil data dari suatu table
	 *
	 * @return type Array of Object
	 * @param Associative Array (opsional jika mengambil data berdasarkan kondisi)
	 **/
	public function get($cond = '')
	{
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);

		$query = $this->db->get($this->data['table_name']);

		return $query->result();
	}

	/**
	 * @author Ryan Fadholi
	 * Method untuk mengambil data dari suatu table dengan urutan tertentu
	 *
	 * @return type Array of Object
	 * @param String (atribut yang menjadi acuan order)
	 *		  String ("asc" dari terkecil, "desc" dari terbesar)
	 * 		  Associative Array (opsional jika mengambil data berdasarkan kondisi)
	 **/
	public function get_by_order($ref, $order, $cond = '')
	{
		if (is_array($cond))
			$this->db->where($cond);

		$this->db->order_by($ref, $order);
		$query = $this->db->get($this->data['table_name']);

		return $query->result();
	}


	/**
	 * @author Rezi Apriliansyah
	 * Method untuk mengambil 1 data dari suatu table dengan urutan tertentu
	 *
	 * @return type Array of Object
	 * @param String (tabel yang menjadi acuan order)
	 *		  String ("asc" dari terkecil, "desc" dari terbesar)
	 * 		  Associative Array (opsional jika mengambil data berdasarkan kondisi)
	 **/
	public function get_by_order_limit($ref, $order,$limit, $cond = '')
	{
		if (is_array($cond))
			$this->db->where($cond);

		$this->db->order_by($ref, $order);
		$this->db->limit($limit);
		$query = $this->db->get($this->data['table_name']);

		return $query->result();
	}
		/**
	 * @author Azhary Arliansyah
	 * Method untuk mengambil data dari suatu table
	 *
	 * @return type Object
	 * @param Associative Array
	 **/
	public function get_row($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->data['table_name']);

		return $query->row();
	}

	/**
 * @author Ari Susanto
 * Method untuk mengambil jumlah rows pada table
 *
 * @return type Object
 * @param Associative Array
 **/

	public function get_num_row($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->data['table_name']);

		return $query->num_rows();
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk insert data dari suatu table
	 *
	 * @return type void(?)
	 * @param Associative Array
	 **/
	public function insert($data)
	{
		return $this->db->insert($this->data['table_name'], $data);
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk update data dari suatu table berdasarkan primary key
	 *
	 * @return type void(?)
	 * @param 1 Mixed
	 * @param 2 Associative Array
	 **/
	public function update($pk, $data)
	{
		$this->db->where($this->data['primary_key'], $pk);
		return $this->db->update($this->data['table_name'], $data);
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk update data dari suatu table berdasarkan primary key
	 *
	 * @return type void(?)
	 * @param 1 Associative Array
	 * @param 2 Associative Array
	 **/
	public function update_where($cond, $data)
	{
		$this->db->where($cond);
		return $this->db->update($this->data['table_name'], $data);
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk delete data dari suatu table berdasarkan primary key
	 *
	 * @return type void(?)
	 * @param Mixed
	 **/
	public function delete($pk)
	{
		$this->db->where($this->data['primary_key'], $pk);
		return $this->db->delete($this->data['table_name']);
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk delete data dari suatu table berdasarkan kondisi
	 *
	 * @return type void(?)
	 * @param Associative Array
	 **/
	public function delete_by($cond)
	{
		$this->db->where($cond);
		return $this->db->delete($this->data['table_name']);
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk mengambil data secara terurut berdasarkan primary key
	 *
	 * @return type Array of Object
	 * @param String
	 **/
	public function getOrdered($order = 'ASC')
	{
		$query = $this->db->query('SELECT * FROM ' . $this->data['table_name'] . ' ORDER BY ' . $this->data['primary_key'] . ' ' . $order);
		return $query->result();
	}

	public function getLast($order = 'DESC')
	{
		$query = $this->db->query('SELECT * FROM ' . $this->data['table_name'] . ' ORDER BY ' . $this->data['primary_key'] . ' ' . $order.' LIMIT 1');
		return $query->row();
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk mengambil data yang memiliki kemiripan dengan query
	 *
	 * @return type Array of Object
	 * @param Associative Array
	 **/
	public function getDataLike($like)
	{
		$this->db->select('*');
		$this->db->like($like);
		$query = $this->db->get($this->data['table_name']);
		return $query->result();
	}

	public function getDataJoin($tables, $jcond, $cond = '')
	{
		if (is_array($cond))
			$this->db->where($cond);
		if (is_string($cond) && strlen($cond) > 3)
			$this->db->where($cond);
		$this->db->select('*');
		for ($i = 0; $i < count($tables); $i++)
			$this->db->join($tables[$i], $jcond[$i]);
		return $this->db->get($this->data['table_name'])->result();
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk mengambil data berupa JSON API
	 *
	 * @return type Array of Object
	 * @param String
	 **/
	public function getJSON($url)
	{
		$content = file_get_contents($url);
		$data = json_decode($content);
		return $data;
	}


	 /**
	 * @author Azhary Arliansyah
	 * Method untuk melakukan form validation.
	 *
	 * @return boolean
	 * @param config Array untuk form_validation
	 **/
	public function validate($conf)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($conf);
		return $this->form_validation->run();
	}

	/**
	 * @author Azhary Arliansyah
	 * Method untuk generate required input.
	 *
	 * @return boolean
	 * @param array of string input names
	 **/
	public function required_input($input_names)
	{
		$rules = [];
		foreach ($input_names as $input)
		{
			$rules []= [
				'field'		=> $input,
				'label'		=> ucfirst($input),
				'rules'		=> 'required'
			];
		}

		return $this->validate($rules);
	}


	/**
	 * @author Azhary Arliansyah
	 * Method untuk pesan flash.
	 *
	 * @return void
	 * @param String
	 * @param String (opsional)
	 **/
	public function flashmsg($msg, $type = 'success')
	{
		return $this->session->set_flashdata('msg', '<div class="alert alert-'.$type.'">'.$msg.'</div>');
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
