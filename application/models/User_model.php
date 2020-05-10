<?php 

class user_model extends CI_Model{
    public function getData($tabel,$where){
        return $this->db->get_where($tabel, $where)->row_array();
    }

    public function updateData($tabel,$set,$where){
        $this->db->set($set);
        $this->db->where($where);
        $this->db->update($tabel);
    }

    public function getElementClassbyid($table,$id){
        $query = "SELECT k.nama_kelas, k.id , k.image , k.deskripsi , k.date_create FROM kelas k JOIN anggota_kelas ak ON k.id = ak.id_kelas WHERE ak.id_user = $id AND ak.is_active = 1 ";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getAllClass($table){
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function addClass($table,$data){
        $this->db->insert($table,$data);
    }

    public function getAllAslab($table,$where){
        $result = $this->db->get_where($table,$where)->result_array();
        return $result;
    }

    public function getClassbyID($table,$where){
        $result = $this->db->get_where($table,$where)->row_array();
        return $result;
    }

    public function getAslabatClass($id){
        $query = "SELECT u.nama , u.nim , u.email, u.foto , u.no_telp FROM user u JOIN kelas k ON u.id = k.id_user_created WHERE k.id = $id";
        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function getAnggota($id){
        $user = $this->session->userdata('id');
        $query = "SELECT * FROM anggota_kelas WHERE id_kelas='$id' AND id_user = '$user'";
        return $this->db->query($query)->row_array();
    }

    public function getTask($table,$where){
        return $this->db->get_where($table,$where)->row_array();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_kelas', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get('kelas')->result_array();
    }
}


?>