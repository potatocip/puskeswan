<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser');
    }

    public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Harus diisi!!',
                'valid_email' => 'Email Tidak Benar!!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi!!'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';

            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            $this->load->view('temp/header_login_regis', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('temp/footer_login');
        } else {
            $this->_login();
        }
    }

    public function info()
    {
        $this->load->view('temp/header_login_regis');
        $this->load->view('autentifikasi/info');
        $this->load->view('temp/footer_login');
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        //jika usernya ada
        if ($user) {
            //cek password
            $password = $this->input->post('password', true);
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                ];

                $this->session->set_userdata($data);
                if ($user['image'] == 'default.jpg') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan ubah profil Anda untuk ubah foto profil</div>');
                }
                redirect('user');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Salah!!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }

    public function daftar()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => "Nama belum diisi"
            ]
        );
        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|trim|numeric|exact_length[16]',
            [
                'required' => "NIK belum diisi",
                'numeric' => "NIK harus berupa angka",
                'exact_length' => "NIK harus 16 digit angka"
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            [
                'required' => "Alamat belum diisi"
            ]
        );
        $this->form_validation->set_rules(
            'no_telp',
            'Nomor Telepon',
            'required|trim|numeric|min_length[11]|max_length[13]',
            [
                'required' => "Nomor Telepon belum diisi",
                'numeric' => "Nomor Telepon harus berupa angka",
                'min_length' => "Nomor Telepon terlalu pendek",
                'max_length' => "Nomor Telepon terlalu panjang"
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email' => 'Email Salah.',
                'required' => "Email belum diisi",
                'is_unique' => "Email sudah terdaftar"
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[confirmPassword]',
            [
                'required' => "Password belum diisi",
                'matches' => "Password tidak sama",
                'min_length' => "Password terlalu pendek"
            ]
        );
        $this->form_validation->set_rules(
            'confirmPassword',
            'Repeat Password',
            'required|trim|matches[password]',
            [
                'required' => "Konfirmasi password harus diisi."
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Daftar';
            $this->load->view('temp/header_login_regis', $data);
            $this->load->view('autentifikasi/daftar');
            $this->load->view('temp/footer_login');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default.jpg'
            ];
            $this->ModelUser->insert_user($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun berhasil didaftarkan</div>');
            redirect('autentifikasi');
        }
    }

    public function logout()
    {
        if ($this->session->userdata('email')) {
            $this->session->unset_userdata('email');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
            redirect('autentifikasi');
        } else {
            $this->session->unset_userdata('username');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
            redirect('admin');
        }
    }
}
