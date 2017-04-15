<?php
class Stokmodel extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct ();
	}

	public function marketing_out($id='',$out='')
	{
		$this->db->trans_begin ();

		$sql = "UPDATE produk SET stok = stok - ".$out." WHERE id = ".$id."";
		$this->db->query($sql);
		
		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function produksi_in($nama='',$in='')
	{
		$this->db->trans_begin ();

		$sql = "UPDATE produk SET stok = stok + ".$in." WHERE nama LIKE ".$this->db->escape($nama)."";
		$this->db->query($sql);

		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function supply_in($nama='',$in='')
	{
		$this->db->trans_begin ();

		$sql = "UPDATE bahan SET stok = stok + ".$in." WHERE nama LIKE ".$this->db->escape($nama)."";
		$this->db->query($sql);
		
		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function bahan_out($value='')
	{
		$this->db->trans_begin ();

		$sql = "UPDATE bahan SET stok = stok - ".$value['stok']." WHERE id = ".$value['nama']."";
		$this->db->query($sql);
		
		if ($this->db->trans_status () === false) {
			$this->db->trans_rollback ();
			return false;
		} else {
			$this->db->trans_commit ();
			return true;
		}
	}

	public function stok_bahan($id='')
	{
		$this->db->select('stok');
		$this->db->where('id', $id);
		$sql = $this->db->get('bahan');
		return $sql->result();
	}

	public function stok_produk($id='')
	{
		$this->db->select('stok');
		$this->db->where('id', $id);
		$sql = $this->db->get('produk');
		return $sql->result();
	}
}