<?php 
class auth_model extends CI_Model{
	function __construct()
    	{
         parent::__construct();
    	}
    public function insert_DB($tabel, $data){
        $this->db->insert($tabel, $data);
    }

    public function getElementbyNim($tabel, $nim){
        return $user = $this->db->get_where($tabel, $nim)->row_array();
    }

    public function aktivate($email){
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function delete_data($tabel,$where){
        return $this->db->delete($tabel, $where);
    }

    public function updateData($tabel,$where,$set){
        $this->db->set($set);
        $this->db->where($where);
        $this->db->update($tabel);
    }

}

?>