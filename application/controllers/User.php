<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser');
        $this->load->model('ModelPasien');
        $this->load->model('ModelRekamMedis');
    }

    public function register()
    {
        $data['judul'] = 'Daftar';
        $this->load->view('temp/header_login_regis', $data);
        $this->load->view('autentifikasi/daftar', $data);
        $this->load->view('temp/footer_login');
    }


    public function index()
{
    $data['judul'] = 'Home';
    $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $user;

    $data['pasien'] = $this->ModelPasien->get_data_by_user_id($user['id_user'])->result_array();
    
    
    $this->form_validation->set_rules('nama_hewan', 'Nama Hewan', 'required', [
        'required' => 'Nama hewan harus diisi',
    ]);
    $this->form_validation->set_rules('jns_hewan', 'Jenis Hewan', 'required', [
        'required' => 'Jenis hewan harus diisi',
    ]);
    $this->form_validation->set_rules('jns_klmn', 'Jenis Kelamin', 'required', [
        'required' => 'Jenis kelamin harus diisi',
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('temp/footer');
    } else {
        // Periksa apakah metode joinid sudah ada dan benar
        $id_user = $this->ModelUser->joinid(['pasien.id_user' => $user['id_user']])->result_array();

        // Siapkan data yang akan disimpan
        $data = [
            'id_user' => $user['id_user'],
            'nama_hewan' => $this->input->post('nama_hewan', true),
            'jns_hewan' => $this->input->post('jns_hewan', true),
            'jns_klmn' => $this->input->post('jns_klmn', true)
        ];

        // Simpan data ke tabel 'pasien'
        $this->ModelPasien->insert_pasien($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Hewan berhasil ditambahkan</div>');
        redirect('user/index');
    }
}

public function profile()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
                'required' => 'Nama tidak Boleh Kosong'
        ]
    );
        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|trim',
            [
                'required' => 'NIK tidak Boleh Kosong'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            [
                'required' => 'Alamat tidak Boleh Kosong'
            ]
        );
        $this->form_validation->set_rules(
            'no_telp',
            'Nomor Telepon',
            'required|trim',
            [
                'required' => 'Nomor Telepon tidak Boleh Kosong'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/header', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('temp/topbar', $data);
            $this->load->view('user/profile');
            $this->load->view('temp/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $nik = $this->input->post('nik', true);
            $alamat = $this->input->post('alamat', true);
            $no_telp = $this->input->post('no_telp', true);
            $email = $data['user']['email'];
            
            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './asset/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'asset/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else { }
            }
            $this->db->set('nama', $nama);
            $this->db->set('nik', $nik);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil berhasil diubah </div>');

            redirect('user/profile');
        }
    }

public function ubahHewan()
{
    $data['judul'] = 'Ubah Data Hewan';
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $id_hewan = $this->uri->segment(3);
    $data['pasien'] = $this->ModelPasien->edit_data(['id_hewan' => $id_hewan])->row_array();

    $this->form_validation->set_rules('nama_hewan', 'Nama Hewan', 'required', [
        'required' => 'Nama hewan harus diisi'
    ]);
    $this->form_validation->set_rules('jns_hewan', 'Jenis Hewan', 'required', [
        'required' => 'Jenis hewan harus diisi',
    ]);
    $this->form_validation->set_rules('jns_klmn', 'Jenis Kelamin', 'required', [
        'required' => 'Jenis kelamin harus diisi',
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/ubah-hewan', $data);
        $this->load->view('temp/footer');
    } else {
        $data_update = [
            'nama_hewan' => $this->input->post('nama_hewan', true),
            'jns_hewan' => $this->input->post('jns_hewan', true),
            'jns_klmn' => $this->input->post('jns_klmn', true)
        ];

        $this->ModelPasien->update_data($data_update, ['id_hewan' => $this->input->post('id_hewan')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil diubah</div>');
        redirect('user/index');
    }
}

    public function hapusHewan()
    {
        $where = ['id_hewan' => $this->uri->segment(3)];
        $this->ModelPasien->hapus_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data berhasil dihapus</div>');
        redirect('user/index');
    }

    public function periksa()
    {
        $data['judul'] = 'Periksa';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['pasien'] = $this->ModelPasien->get_data_by_user_id($user['id_user'])->result_array();
        $data['rekam'] = $this->ModelRekamMedis->tampil_data_rm_by_user($user['id_user'])->result_array();
    

        $id_user = $this->ModelUser->joinid(['pasien.id_user' => $user['id_user']])->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/periksa', $data);
        $this->load->view('temp/footer');

    }

    public function keluhanAct()
    {
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required', [
            'required' => 'Keluhan harus diisi'
        ]);
    
        if ($this->form_validation->run() == FALSE) {
            // Muat ulang data pasien
            $data['hewan'] = $this->ModelPasien->cekDatahewan()->result_array();
            $data['judul'] = "Input Keluhan";
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['pasien'] = $this->ModelPasien->edit_data(['id_hewan' => $this->input->post('hewan')])->result_array();
    
            $this->load->view('temp/header', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('temp/topbar', $data);
            $this->load->view('user/keluhan', $data);
            $this->load->view('temp/footer');

        } else {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
            $data['hewan'] = $this->ModelPasien->cekDatahewan()->result_array();
            $tglsekarang = date('Y-m-d');
            
            // Prepare data to save
            $data = [
                'id_user' => $user['id_user'],
                'id_hewan' => $this->input->post('hewan'),
                'keluhan' => $this->input->post('keluhan', true),
                'tgl_sekarang' => date($tglsekarang)
            ];
    
            // Save data to the 'rekam_medis' table
            $this->ModelRekamMedis->insert_rekam_medis($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Keluhan tersimpan. Silakan datang ke Puskeswan :)</div>');
            redirect('user/periksa');
        }
    }
    
    public function keluhan()
    {

        $data['hewan'] = $this->ModelPasien->cekDatahewan()->result_array();

        $data['judul'] = "Input Keluhan";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->ModelPasien->edit_data(['id_hewan' => $this->uri->segment(3)])->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/keluhan', $data);
        $this->load->view('temp/footer');
    }

    public function rekamId()
    {
        $data['judul'] = "Rekam Medis";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $id_hewan = $this->uri->segment(3); // Mengambil id_hewan dari URI segment 3
        $id_user = $data['user']['id_user'];
        
        // Menggunakan ModelPasien untuk mengambil informasi hewan
        $data['hewan'] = $this->ModelPasien->edit_data(['id_hewan' => $id_hewan])->row_array();

        // Menggunakan ModelPasien untuk mengambil rekam medis berdasarkan id_hewan dan id_user
        $data['rekam'] = $this->ModelPasien->getRekamMedisUser($id_hewan, $id_user)->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/rekam-id', $data);
        $this->load->view('temp/footer');
    }

    public function cetakRMHewan()
{
    // Load data pasien dan rekam medis
    $id_hewan = $this->uri->segment(3); // Mengambil id_hewan dari URI segment 3
    $id_user = $this->session->userdata('id_user'); // Pastikan id_user diambil dari session
    
    // Menggunakan ModelPasien untuk mengambil informasi hewan
    $data['hewan'] = $this->ModelPasien->cekDataHewan(['id_hewan' => $id_hewan])->row_array();

    // Menggunakan ModelPasien untuk mengambil rekam medis berdasarkan id_hewan dan id_user
    $data['rekam'] = $this->ModelPasien->getRekamMedisUser($id_hewan, $id_user)->result_array();


    // Load library Dompdf
    require_once(APPPATH.'third_party/dompdf/autoload.inc.php');
    $dompdf = new Dompdf\Dompdf();

    // Load view into a variable
    $html = $this->load->view('user/cetak-rm-hewan', $data, true);

    // Set paper size and orientation
    $dompdf->set_paper('A4', 'potrait');

    // Load HTML content
    $dompdf->load_html($html);

    // Render PDF
    $dompdf->render();

    // Output PDF to browser
    $dompdf->stream("cetak_rekam_medis_hewan.pdf", array('Attachment' => 0));
}

}