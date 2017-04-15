<?php
class Invoicedao extends CI_Model {
	private $table = 'invoice';

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
			'customer' => $value['customer'],
            'produk' => $value['produk'],
            'jumlah' => $value['jumlah'],
            'total' => $value['total'],
            'status' => $value['status'],
            'keterangan' => $value['keterangan'],
            'kategori' => $value['kategori'],
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
			'customer' => $value['custmoer'],
            'produk' => $value['produk'],
            'jumlah' => $value['jumlah'],
            'total' => $value['total'],
            'status' => $value['status'],
            'keterangan' => $value['keterangan'],
            'kategori' => $value['kategori'],
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

	public function update_status($id='')
	{
		$this->db->trans_begin ();

		$data = array(
			'status' => 1,
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