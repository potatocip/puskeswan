<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function cetak_laporan_user()
    {
        $data['user'] = $this->ModelUser->getUser()->result_array();

        $this->load->view('laporan/user/cetak-laporan-user', $data);
    }

    public function pdf_laporan_user()
    {
        $data['user'] = $this->ModelUser->getUser()->result_array();

        
        // Load library Dompdf
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/puskeswan2/application/third_party/dompdf/autoload.inc.php";
        
        // Initialize Dompdf
        $dompdf = new Dompdf\Dompdf();
        
        // Load view
        $this->load->view('laporan/user/pdf-laporan-user', $data);
        
        // Set paper size and orientation
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape
        
        // Get output
        $html = $this->output->get_output();
        
        // Set paper and render
        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        
        // Stream the PDF to the browser
        $dompdf->stream("laporan_data_pemilik_hewan.pdf", array('Attachment' => 0));
        // nama file pdf yang dihasilkan
    }

    public function excel_laporan_user()
    {
        $data = array( 'title' => 'Laporan Data Pemilik Hewan',
        'user' => $this->ModelUser->getUser()->result_array());
        $this->load->view('laporan/user/excel-laporan-user', $data);
    }


    public function cetak_laporan_pasien()
    {
        $data['pasien'] = $this->ModelPasien->tampil_data_pasien()->result_array();

        $this->load->view('laporan/pasien/cetak-laporan-pasien', $data);
    }

    public function pdf_laporan_pasien()
    {
        $data['pasien'] = $this->ModelPasien->tampil_data_pasien()->result_array();

        
        // Load library Dompdf
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/puskeswan2/application/third_party/dompdf/autoload.inc.php";
        
        // Initialize Dompdf
        $dompdf = new Dompdf\Dompdf();
        
        // Load view
        $this->load->view('laporan/pasien/pdf-laporan-pasien', $data);
        
        // Set paper size and orientation
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape
        
        // Get output
        $html = $this->output->get_output();
        
        // Set paper and render
        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        
        // Stream the PDF to the browser
        $dompdf->stream("laporan_data_pasien.pdf", array('Attachment' => 0));
        // nama file pdf yang dihasilkan
    }

    public function excel_laporan_pasien()
    {
        $data = array( 'title' => 'Laporan Data Pasien',
        'pasien' => $this->ModelPasien->tampil_data_pasien()->result_array());
        $this->load->view('laporan/pasien/excel-laporan-pasien', $data);
    }

    public function cetak_laporan_rm()
    {
        $data['rekam'] = $this->ModelRekamMedis->tampil_data_detail_rm()->result_array();

        $this->load->view('laporan/rekam/cetak-laporan-rm', $data);
    }

    public function excel_laporan_rm()
    {
        $data = array( 'title' => 'Laporan Data Rekam Medis',
        'rekam' => $this->ModelRekamMedis->tampil_data_detail_rm()->result_array());
        $this->load->view('laporan/rekam/excel-laporan-rm', $data);
    }

    public function pdf_laporan_rm()
    {
        $data['rekam'] = $this->ModelRekamMedis->tampil_data_detail_rm()->result_array();

        
        // Load library Dompdf
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/puskeswan2/application/third_party/dompdf/autoload.inc.php";
        
        // Initialize Dompdf
        $dompdf = new Dompdf\Dompdf();
        
        // Load view
        $this->load->view('laporan/rekam/pdf-laporan-rm', $data);
        
        // Set paper size and orientation
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        
        // Get output
        $html = $this->output->get_output();
        
        // Set paper and render
        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        
        // Stream the PDF to the browser
        $dompdf->stream("laporan_data_rekam_medis.pdf", array('Attachment' => 0));
        // nama file pdf yang dihasilkan
    }
}