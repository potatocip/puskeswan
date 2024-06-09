<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelAdmin');
    }

    public function index()
    {
        $this->load->view('temp/header_login_admin');
        $this->load->view('autentifikasi/login-admin');
        $this->load->view('temp/footer_login');
    }

    public function login()
    {
        $admin = htmlspecialchars($this->input->post('username', true));
        $user = $this->ModelAdmin->cekData(['username' => $admin])->row_array();
        //jika usernya ada
        if ($user) {
            //cek password
            $password = $this->input->post('adminPass', true);
            if ($password == $user['adminPass']) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                if ($user['imageAdmin'] == 'default.jpeg') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silakan Ubah Profil Anda untuk ubah foto profil</div>');
                }
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username tidak ada!!</div>');
            redirect('admin');
        }
    }

    public function dashboard()
    {
        $data['judul'] = 'Dashboard';
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['cekUser'] = $this->ModelUser->cekData()->num_rows();
        $data['cekPasien'] = $this->ModelPasien->cekDatahewan()->num_rows();
        $data['rekam'] = $this->ModelRekamMedis->tampil_data_rm()->result_array();
        $data['jumlahKeluhan'] = $this->ModelRekamMedis->getUnprocessedKeluhanCount();
        
        // $data['keluhan'] = $this->ModelRekamMedis->getUnprocessedKeluhan();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('temp/footer');
    }

    public function inputRekam()
    {
        $data['judul'] = "Input Rekam Medis";
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $rekam = $this->ModelRekamMedis->tampil_data_id_rm(['id_rm' => $this->uri->segment(3)])->result_array();
        $data['rekam'] = $rekam;

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/input-rekam', $data);
        $this->load->view('temp/footer');
    }

    public function rekamAct()
{
    $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required', [
        'required' => 'Diagnosa harus diisi'
    ]);
    $this->form_validation->set_rules('obat', 'Obat', 'required', [
        'required' => 'Obat harus diisi'
    ]);
    $this->form_validation->set_rules('dosis', 'Dosis', 'required', [
        'required' => 'Dosis harus diisi'
    ]);

    if ($this->form_validation->run() == FALSE) {
        // Muat ulang data pasien
        $data['judul'] = "Input Rekam Medis";
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $rekam = $this->ModelRekamMedis->tampil_data_id_rm(['id_rm' => $this->input->post('id_rm')])->result_array();
        $data['rekam'] = $rekam;

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/input-rekam', $data);
        $this->load->view('temp/footer');
    } else {
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['rekam'] = $this->ModelRekamMedis->tampil_data_id_rm(['id_rm' => $this->input->post('id_rm')])->result_array();
        $id_rm = $this->input->post('id_rm');

        // Data untuk disimpan
        $dataDetail = [
            'id_rm' => $this->input->post('id_rm'),
            'diagnosa' => $this->input->post('diagnosa'),
            'obat' => $this->input->post('obat'),
            'dosis' => $this->input->post('dosis'),
            'status' => $this->input->post('status')
        ];

        // Simpan detail rekam medis
        $this->ModelRekamMedis->insert_detail($dataDetail);

        // Update status rekam medis jika diperlukan
        $dataUpdate = [
            'status' => $this->input->post('status') // Misal 1 untuk status selesai
        ];

        $this->ModelRekamMedis->updateStatusRM($id_rm, $dataUpdate);

        // Redirect atau menampilkan pesan sukses
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Detail rekam medis berhasil disimpan.</div>');

        redirect('admin/dashboard');
    }
}


    // Menu Data Pasien
    public function dataPasien()
    {
        $data['judul'] = 'Data Pasien';
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['pasien'] = $this->ModelPasien->tampil_data_pasien()->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/data-pasien', $data);
        $this->load->view('temp/footer');
    }

    // Menu Data Pemilik Hewan
    public function dataUser()
    {
        $data['judul'] = 'Data Pemilik Hewan';
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get('user')->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/data-user', $data);
        $this->load->view('temp/footer');
    }

    // Menu Data Rekam Medis
    public function dataRM()
    {
        $data['judul'] = 'Data Rekam Medis';
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['rekam'] = $this->ModelRekamMedis->tampil_data_detail_rm()->result_array();
    
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/data-rekam-medis', $data);
        $this->load->view('temp/footer');
    }

    public function tombolRM()
    {
        $data['judul'] = "Rekam Medis";
        $data['admin'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')])->row_array();
        $id_hewan = $this->uri->segment(3); // Mengambil id_hewan dari URI segment 3
        
        $data['pasien'] = $this->ModelPasien->getPasienWithOwner($id_hewan);
        if ($data['pasien']) {
            // Menggunakan ModelPasien untuk mengambil rekam medis berdasarkan id_hewan
            $data['rekam'] = $this->ModelPasien->getRekamMedisAdmin($id_hewan);
        } else {
            $data['rekam'] = [];
        }

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar-admin', $data);
        $this->load->view('admin/rekam-pasien', $data);
        $this->load->view('temp/footer');
    }

    public function cetakRekamMedis($id_hewan)
    {
        // Load data pasien dan rekam medis
        $data['pasien'] = $this->ModelPasien->getPasienWithOwner($id_hewan);
        $data['rekam'] = $this->ModelPasien->getRekamMedisAdmin($id_hewan);

        // Load library Dompdf
        require_once(APPPATH.'third_party/dompdf/autoload.inc.php');
        $dompdf = new Dompdf\Dompdf();

        // Load view into a variable
        $html = $this->load->view('admin/cetak-rm', $data, true);

        // Set paper size and orientation
        $dompdf->set_paper('A4', 'potrait');

        // Load HTML content
        $dompdf->load_html($html);

        // Render PDF
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream("cetak_rekam_medis.pdf", array('Attachment' => 0));
    }
}
