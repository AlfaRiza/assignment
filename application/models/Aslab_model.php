<?php 

class aslab_model extends CI_Model{
    public function getClass($table,$where){
        $result = $this->db->get_where($table,$where)->result_array();
        return $result;
    }
    public function getClassbyID($table,$where){
        $result = $this->db->get_where($table,$where)->row_array();
        return $result;
    }

    public function insertDB($table,$data){
        $this->db->insert($table,$data);
    }

    public function deleteClassbyID($table,$where){
        $this->db->delete($table,$where);
    }

    public function updateClass($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    public function getTugasbyClass($table,$where){
        $result = $this->db->get_where($table,$where)->result_array();
        return  $result;
    }

    public function getTask($id_kelas,$id_tugas){
        $query = "SELECT u.nama,t.id,t.file,t.id_user,t.nilai FROM task t LEFT JOIN user u ON t.id_user = u.id LEFT JOIN tugas tu ON t.id_tugas = tu.id WHERE t.id_tugas = '$id_tugas' AND tu.id_kelas = '$id_kelas' ORDER BY nim ASC";
        return $this->db->query($query)->result_array();
    }

    public function getAnggota($id_kelas){
        $query = "SELECT * FROM anggota_kelas ak LEFT JOIN user u ON ak.id_user = u.id WHERE ak.id_kelas = '$id_kelas' ORDER BY nim ASC";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getTaskbyID($id_task){
        $query = "SELECT * FROM task t LEFT JOIN user u ON t.id_user = u.id WHERE t.id = '$id_task'";
        $result = $this->db->query($query)->row_array();
        return $result;
    }
}


?>