<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class ModelRekamMedis extends CI_Model
{
    // Mengambil data dari database rekam_medis
    public function tampil_data()
    {
       return $this->db->get('rekam_medis');
    }

    // Menampilkan data semua id_rm
    public function tampil_data_rm()
    {
        $query = $this->db->query("select rekam_medis.*, 
            user.nama,
            pasien.id_hewan, 
            pasien.nama_hewan, 
            pasien.jns_hewan, 
            pasien.jns_klmn
            from rekam_medis 
            inner join user on rekam_medis.id_user=user.id_user
            inner join pasien on rekam_medis.id_hewan=pasien.id_hewan
            WHERE rekam_medis.status = 'Belum Diperiksa'");
        return $query;
    }

    // Menampilkan data rekam medis berdasarkan id_user, ada di cont.User bagian periksa
    public function tampil_data_rm_by_user($id_user)
    {
        $this->db->select('rekam_medis.*, pasien.nama_hewan, pasien.jns_hewan, pasien.jns_klmn');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'rekam_medis.id_hewan = pasien.id_hewan');
        $this->db->where('rekam_medis.id_user', $id_user);
        $this->db->where('rekam_medis.status', 'Belum Diperiksa');
        $query = $this->db->get();
        return $query;
    }

    // Menampilkan data berdasarkan id_rm, ada di cont.Admin bagian inputRekam dan rekamAct
    public function tampil_data_id_rm($where)
    {
        $query = $this->db->query("select rekam_medis.*, 
            user.nama,
            pasien.id_hewan, 
            pasien.nama_hewan, 
            pasien.jns_hewan, 
            pasien.jns_klmn
            from rekam_medis 
            inner join user on rekam_medis.id_user=user.id_user
            inner join pasien on rekam_medis.id_hewan=pasien.id_hewan
            WHERE rekam_medis.id_rm = ?", array($where));
        return $query;
    }

    // Menampilkan data rekam medis beserta detail rekam medis nya juga (Function ini di letakkan di cont. Admin dataRM)
    public function tampil_data_detail_rm()
    {
        $query = $this->db->query("select rekam_medis.*, 
            user.nama,
            pasien.id_hewan, 
            pasien.nama_hewan, 
            pasien.jns_hewan, 
            pasien.jns_klmn,
            detail_rm.diagnosa,
            detail_rm.obat,
            detail_rm.dosis
            from rekam_medis 
            inner join user on rekam_medis.id_user=user.id_user
            inner join pasien on rekam_medis.id_hewan=pasien.id_hewan
            INNER JOIN detail_rm ON rekam_medis.id_rm = detail_rm.id_rm");
        return $query;
    }

    // 
    public function cekDatarekam($where = null)
    {
        return $this->db->get_where('rekam_medis', $where);
    }

    // Menyimpan data ke database detail_rm
    public function insert_detail($data)
    {
        $this->db->insert('detail_rm', $data);
    }

    // Mengambil data rekam medis tertentu yang ingin diedit. Dengan memberikan kondisi dalam parameter $where
    public function edit_data_rm($where)
    {
        return $this->db->get_where('rekam_medis', $where);
    }

    // Menghapus data di database rekam_medis
    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('rekam_medis', $where);
    }

    // Mengupdate data berdasarkan id_rm ke database rekam_medis
    public function updateStatusRM($id_rm, $data)
    {
        $this->db->set($data);
        $this->db->where('id_rm', $id_rm);
        $this->db->update('rekam_medis',$data);
    }

    // Membuat kode unik Rekam Medis
    public function generate_unique_id_rm() {
        // Mendapatkan tanggal hari ini dalam format ddmmyy
        $date_code = date('dmy');

        // Query untuk mendapatkan jumlah rekam medis pada hari ini
        $this->db->like('id_rm', 'RM' . $date_code, 'after');
        $this->db->from('rekam_medis');
        $count = $this->db->count_all_results();

        // Membuat kode unik berdasarkan jumlah + 1
        $unique_number = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        $unique_id_rm = 'RM' . $date_code . $unique_number;

        return $unique_id_rm;
    }

    // Menyimpan data rekam medis dengan kode unik
    public function insert_rekam_medis($data) {
        // Generate ID RM unik
        $data['id_rm'] = $this->generate_unique_id_rm();
        $data['status'] = 'Belum Diperiksa';
        // Simpan data ke database
        return $this->db->insert('rekam_medis', $data);
    }

    // Mengambil data dari database detail_rm berdasarkan kondisi tertentu yang diberikan melalui parameter $where
    public function detailRMWhere($where)
    {
        return $this->db->get_where('detail_rm', $where);
    }

    // Menampilkan data dari database rekam_medis yang statusnya 'Belum Diperiksa'
    public function getUnprocessedKeluhanCount()
    {
        $this->db->where('status', 'Belum Diperiksa');
        return $this->db->count_all_results('rekam_medis');
    }    

}
