<?php 

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}
    public function index(){
        if ($this->session->userdata('nim')) {
            redirect('mahasiswa');
        }
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric|exact_length[9]',[
            'required' => 'NIM harus diisi',
            'numeric'   => 'Harus berupa angka',
            'exact_length' => 'Harus 9 karakter'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
            'required' => 'Password harus diisi',
            'min_length' => 'Minimal 8 karakter'
        ]);

        if($this->form_validation->run() == false){
            $data['judul'] = 'Halaman Login UPN Lab';
            $this->load->view('templates/header_auth',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer_auth');
        }else {
            // validasi
            $this->_login();
        }
    }

    private function _login(){
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');

        $user = $this->auth_model->getElementbyNim('user', ['nim' => $nim]);
        // jika user ada
        if($user){
            // jika user aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password,$user['password'])) {
                        // password benar
                        $data = [
                            'nim' => $user['nim'],
                            'role_id' => $user['role_id'],
                            'id' => $user['id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('aslab');
                        } else {
                            redirect('mahasiswa');
                        }
                    }else {
                        // password salah
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah! </div>');
                        redirect('auth');
                    }
                }else {
                    // tidak aktif
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum di aktivasi! </div>');
                    redirect('auth');
                }
        }else {
            // gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            NIM tidak terdaftar! </div>');
            redirect('auth');
        }
    }

    public function registrasi(){
        if ($this->session->userdata('nim')) {
            redirect('mahasiswa');
        }
        
        $this->form_validation->set_rules('nama','Nama','required|trim',[
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('nim','NIM','required|trim|exact_length[9]|is_unique[user.nim]',[
            'required' => 'NIM harus diisi',
            'exact_length' => 'NIM harus 9 karakter',
            'is_unique' => 'NIM sudah terdaftar'
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'required' => 'Email harus diisi',
            'valid_email' => 'Harus email',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('no_telp','Nomor Telpon','required|trim|numeric',[
            'required'  => 'Nomor telpon harus diisi',
            'numeric'   => 'Harus berupa angka'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required|trim',[
            'required'  => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[8]|matches[password2]',[
            'required' => 'Password harus diisi',
            'matches' => 'Password tidak sama',
            'min_length' => 'Password min 8 karakter',
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|min_length[8]|matches[password1]',[
            'required' => 'Password harus diisi',
            'matches' => 'Password tidak sama',
            'min_length' => 'Password min 8 karakter',
        ]);

        if($this->form_validation->run() == false){
            $data['judul'] = 'Halaman Registrasi UPN Lab';
            $this->load->view('templates/header_auth',$data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/footer_auth');
        }
        else{
            $data= [
                'nama' => htmlspecialchars($this->input->post('nama'),true),
                'nim' => htmlspecialchars($this->input->post('nim'),true),
                'email' => htmlspecialchars($this->input->post('email'),true),
                'jurusan' => 'Teknik Informatika',
                'no_telp' => htmlspecialchars($this->input->post('no_telp'),true),
                'alamat' => htmlspecialchars($this->input->post('alamat'),true),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_create' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];

            $this->auth_model->insert_DB('user',$data);
            $this->auth_model->insert_DB('user_token',$user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Registrasi berhasil! aktivasi akun anda! </div>');
            redirect('auth');
        }
        
    }

    private function _sendEmail($token, $type){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'alfahmada45@gmail.com',
            'smtp_pass' => 'plendungan',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        
        $this->email->initialize($config);  //tambahkan baris ini
        $this->email->from('alfahmada45@gmail.com', 'UPN Lab');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Tekan untuk mengaktifkan akun : <a href="' . base_url('auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token)) . '">Aktivasi</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Tekan untuk reset password : <a href="' . base_url('auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token)) . '">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo 'gagal ' . $this->email->print_debugger();
            die;
        }
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->auth_model->getElementbyNim('user', ['email' => $email]);

        if ($user) {
            $user_token = $this->auth_model->getElementbyNim('user_token', ['token' => $token]);

            if ($user_token) {
                if (time() - $user['date_create'] < (60 * 60 * 24)) {

                    $this->auth_model->aktivate($email);
                    $this->auth_model->delete_data('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email .  ' telah diaktifkan! silahkan login </div>');
                    redirect('auth');
                } else {
                    $this->auth_model->delete_data('user', ['email' => $email]);
                    $this->auth_model->delete_data('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi email gagal! token kadaluarsa </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi email gagal! token tidak valid </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi email gagal! email salah </div>');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Logout berhasil! </div>');
            redirect('auth');
    }

    public function blocked(){
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Forgot Password';
            $this->load->view('templates/header_auth', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/footer_auth');
        } else {
            $email = $this->input->post('email');
            $user = $this->auth_model->getElementbyNim('user', ['email' => $email, 'is_active' => 1]);
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->auth_model->insert_DB('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Cek email untuk reset password!</div>');
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar! atau teraktivasi! </div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->auth_model->getElementbyNim('user', ['email' => $email]);

        if ($user) {
            $user_token = $this->auth_model->getElementbyNim('user_token', ['token' => $token]);
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Reset password gagal! token kadaluarsa </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal! token tidak valid </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal! email salah </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if(!$this->session->userdata('reset_email')){
            redirect('auth');
        }

        $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|matches[repeat_password]',[
            'required' => 'Password harus diisi',
            'min_length' => 'minimal 8 karakter',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('repeat_password','Repeat Password','required|trim|min_length[8]|matches[password]',[
            'required' => 'Password harus diisi',
            'min_length' => 'minimal 8 karakter',
            'matches' => 'Password tidak sama'
        ]);
        if($this->form_validation->run() == false){
            $data['judul'] = 'Ubah Password';
            $this->load->view('templates/header_auth', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templates/footer_auth');
        }else{
            $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->auth_model->updateData('user',['email' => $email],['password' => $password]);

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password telah diganti! silahkan login </div>');
            redirect('auth');
        }
    }

}

?>