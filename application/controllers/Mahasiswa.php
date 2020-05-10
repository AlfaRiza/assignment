<?php 

class Mahasiswa extends CI_Controller{
    public function __construct(){
        parent::__construct();
        cek_login();
    }
    public function index(){
        $data['judul'] = 'My Profile';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/index',$data);
        $this->load->view('templates/footer');
    }

    public function edit(){
        $data['judul'] = 'Edit Profile';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);

        $this->form_validation->set_rules('nama','Nama','required|trim',[
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('no_telp','Nomor Telpon','required|trim|numeric',[
            'required'  => 'Nomor telpon harus diisi',
            'numeric'   => 'Harus berupa angka'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required|trim',[
            'required'  => 'Alamat harus diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/edit',$data);
            $this->load->view('templates/footer');
        }else{
            $nama   = $this->input->post('nama');
            $nim    = $this->input->post('nim');
            $no_telp    = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');
            $where = [
                'nim' => $nim
            ];
            $set = [
                'nama' => $nama,
                'no_telp' => $no_telp,
                'alamat' => $alamat
            ];

            // cek gambar yg diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $setw = [
                        'foto'=> $new_image
                    ];
                    $this->user_model->updateData('user', $setw, $where);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->user_model->updateData('user',$set,$where);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profile anda telah di update</div>');
            redirect('mahasiswa');
        }

    }

    public function kelas(){
        $data['judul'] = 'Kelas saya';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
        $id = $this->session->userdata('id');
        $data['kelas'] = $this->user_model->getElementClassbyid('anggota_kelas',$id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/kelasSaya',$data);
        $this->load->view('templates/footer');
    }

    public function katalog(){
        $data['judul'] = 'Katalog Kelas';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
        $data['kelas'] = $this->user_model->getAllClass('kelas');
        if ($this->input->post('keyword')) {
            $data['kelas'] = $this->user_model->CariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/katalogKelas',$data);
        $this->load->view('templates/footer');
    }

    public function tambahKelas($id){

        $this->form_validation->set_rules('token', 'Token' , 'required|trim|exact_length[4]');

        $token_kelas = $this->user_model->getClassbyid('kelas',['id' => $id]);
        if ( $this->form_validation->run() == false ) {
            $data['judul'] = 'Katalog Kelas';
            $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
            $data['kelas'] = $this->user_model->getClassbyid('kelas',['id' => $id]);
            $data['aslab'] = $this->user_model->getAslabatClass($id);
            $data['anggota_kelas'] = $this->user_model->getAllAslab('anggota_kelas',['id_kelas' => $id]);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/tambahKelas',$data);
            $this->load->view('templates/footer');
        }else{
            $token = htmlspecialchars($this->input->post('token'),true);
            $data['kelas'] = $this->user_model->getClassbyid('kelas',['id' => $id]);
            $data['anggota_kelas'] = $this->user_model->getClassbyid('anggota_kelas',[  'id_kelas' => $id,
                'id_user' => $this->session->userdata('id')
            ]);
            if ($token == $token_kelas['token'] ) {
                if ( $data['kelas']['id_user_created'] == $this->session->userdata('id') ) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Anda merupakan aslab kelas ini</div>');
                    redirect('mahasiswa/katalog');
                }elseif ( $data['anggota_kelas'] ) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Maaf Anda sudah pernah mengikuti kelas!</div>');
                    redirect('mahasiswa/katalog');
                }else{
                    $data = [
                        'id_kelas' => $token_kelas['id'],
                        'id_user' => $this->session->userdata('id'),
                        'is_active' => 1,
                        'date_create' => time()
                    ];
                    $this->user_model->addClass('anggota_kelas',$data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Yeayy berhasil gabung kelas</div>');
                    redirect('mahasiswa/kelas');
                }
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Token salah!!!</div>');
            redirect('mahasiswa/katalog');
            }
        }

    }

    public function aslab(){
        $data['judul'] = 'Profil Aslab';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
        $data['aslab'] = $this->user_model->getAllAslab('user',['role_id' => 1]);
        $data['kelas'] = $this->user_model->getAllClass('kelas');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/profilAslab',$data);
        $this->load->view('templates/footer');
    }

    public  function changepassword(){
        $data['judul'] = 'Change Password';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
        // echo 'Selamat datang ' . $data['user']['name'];
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[8]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/changepassword',$data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama salah! </div>');
                redirect('mahasiswa/changepassword');
            } else {
                if ($new_password == $current_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama dengan password lama </div>');
                    redirect('mahasiswa/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $set = [
                        'password' => $password_hash
                    ];
                    $nim = $this->session->userdata('nim');
                    $where = [
                        'nim' => $nim
                    ];
                    $this->user_model->updateData('user',$set,$where);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah </div>');
                    redirect('mahasiswa/changepassword');
                }
            }
        }
    }

    public function detailKelas($id){
        $data['judul'] = 'Kelas saya';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
                $data['kelas'] = $this->aslab_model->getClassbyID('kelas',['id' => $id]);
                $data['tugas'] = $this->aslab_model->getTugasbyClass('tugas',['id_kelas' => $data['kelas']['id']]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/detailKelas',$data);
        $this->load->view('templates/footer');
    }
    public function detailTugas($id){
        $data['judul'] = 'Kelas saya';
        $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
        $data['tugas'] = $this->user_model->getData('tugas',['id' => $id]);
        $data['task'] = $this->user_model->getTask('task',['id_tugas'=>$id,'id_user' => $this->session->userdata('id')]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/detailTugas',$data);
        $this->load->view('templates/footer');
    }

    public function download($id){
        $tugas = $this->user_model->getData('tugas',['id' => $id]);
        force_download('assets/img/tugas/'.$tugas['example'],NULL);
    }

    public function kumpulTugas($id_tugas){
        $new_file = $_FILES['file']['name'];
            if ($new_file) {
                $config['upload_path'] = './assets/img/task/';
                $config['allowed_types'] = 'pdf|zip|rar';
                $config['max_size']     = '20480';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $file = $this->upload->data('file_name');
                    if (!$new_file) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Tugas gagal dikumpul file tidak ada</div>');
                        redirect('mahasiswa/kelas');
                    }else {
                        $new_file = $file;
                }
                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                '.$this->upload->display_errors().'</div>');
                redirect('mahasiswa/kelas');
                }
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Tugas gagal dikumpul</div>');
                        redirect('mahasiswa/kelas');
            }
            $data = [
                'id_tugas' => $id_tugas,
                'id_user' => $this->session->userdata('id'),
                'is_late' => 0,
                'file' => $file,
                'date_create' => time()
            ];
            $this->user_model->addClass('task',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tugas berhasil dikumpul</div>');
            redirect('mahasiswa/kelas');
        }

        public function detailAslab($id){
            $data['judul'] = 'Profil Aslab';
            $data['user'] = $this->user_model->getData('user',['nim' => $this->session->userdata('nim')]);
            $data['aslab'] = $this->user_model->getData('user',['id'=>$id]);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/detailAslab',$data);
            $this->load->view('templates/footer');
        }
    }

?>