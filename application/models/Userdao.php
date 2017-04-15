<?php
class Userdao extends CI_Model {
	private $table = 'sys_user';

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

	public function get_user($value='')
	{
		$passwd = paramEncrypt($value['passwd']);
		$this->db->where('username', $value['username']);
		$this->db->where('password', $passwd);
		$sql = $this->db->get($this->table);
		return $sql->result();
	}

	public function insert($value='')
	{
		$this->db->trans_begin ();

		$passwd = paramEncrypt($value['new_passwd']);

		$data = array(
			'create_date' => date('Y-m-d H:i:s'),
			'firstname' => $value['firstname'],
            'lastname' => $value['lastname'],
            'gender' => $value['gender'],
            'username' => $value['username'],
            'password' => $passwd,
            'email' => $value['email'],
            'group' => $value['group'],
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
			'update_date' => date('Y-m-d H:i:s'),
			'firstname' => $value['firstname'],
            'lastname' => $value['lastname'],
            'gender' => $value['gender'],
            'username' => $value['username'],
            'email' => $value['email'],
            'group' => $value['group'],
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

	public function update_pass($id='', $value='')
	{
		$this->db->trans_begin ();

		$passwd = paramEncrypt($value['new_passwd']);

		$data = array(
			'update_date' => date('Y-m-d H:i:s'),
			'password' => $passwd,
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