<?php
class keuangandao extends CI_Model {
	private $table = 'keuangan';

	function __construct() {
		// Call the Model constructor
		parent::__construct ();
	}

	public function get_by_id($id='')
	{
		$this->db->where('id', $id);
		$sql = $this->db->get($this->table);
		return $sql->result();
	}

	public function get_by_validasi($status='')
	{
		$this->db->where('validasi', $status);
		$sql = $this->db->get($this->table);
		return $sql->result();
	}

	public function get_all()
	{
		$sql = $this->db->get($this->table);
		return $sql->result();
	}

	public function count()
	{
		$sql = $this->db->get($this->table);
		return $sql->num_rows();
	}

	public function insert($value='')
	{
		$this->db->trans_begin ();

		$data = array(
			'tanggal' => date('Y-m-d'),
            'divisi' => $value['divisi'],
            'total' => $value['total'],
            'keperluan' => $value['keperluan'],
            'status' => $value['status'],
            'validasi' => $value['validasi'],
        );
        $this->db->insert($this->table, $data);

		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function update($id='', $value='')
	{
		$this->db->trans_begin ();

		$data = array(
			'tanggal' => date('Y-m-d'),
            'divisi' => $value['divisi'],
            'total' => $value['total'],
            'keperluan' => $value['keperluan'],
            'status' => $value['status'],
            'validasi' => $value['validasi'],
        );
        
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function update_validasi($id='')
	{
		$this->db->trans_begin ();

		$data = array(
            'validasi' => 1,
        );
        
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        
		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function delete($value='')
	{
		$this->db->trans_begin ();
		
		$this->db->where('id', $value);
		$this->db->delete($this->table);
		
		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}
}