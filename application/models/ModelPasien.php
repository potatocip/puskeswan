<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class ModelPasien extends CI_Model
{   

    // Menggabungkan dan menampilkan nama pemilik hewan di view data-pasien (model ini ada di cont. dataPasien)
    public function tampil_data_pasien()
    {
        $query = $this->db->query("select pasien.*, 
            user.nama
            from pasien 
            inner join user on pasien.id_user=user.id_user");
        return $query;
    }

    // Menampilkan data hewan berdasarkan id_user
    public function get_data_by_user_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('pasien');
    }

    // Mengambil data pasien tertentu yang ingin diedit. Dengan memberikan kondisi dalam parameter $where
    public function edit_data($where)
    {
        return $this->db->get_where('pasien', $where);
    }
    
    // Update/Ubah data pasien dari database pasien
    public function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('pasien', $data);
    }
    
    // Hapus data pasien dari database pasien
    public function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('pasien', $where);
    }

    // Mengambil data pasien dari database pasien, dapat dipanggil tanpa memberikan parameter $where
    public function cekDatahewan($where = null)
    {
        return $this->db->get_where('pasien', $where);
    }

    // Membuat kode unik hewan
    public function get_new_id_hewan() {
        $this->db->select('id_hewan');
        $this->db->from('pasien');
        $this->db->order_by('id_hewan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $last_id = $query->row();

        if ($last_id) {
            $last_number = (int)substr($last_id->id_hewan, 2);
            $new_number = $last_number + 1;
            $new_id_hewan = 'P' . str_pad($new_number, 3, '0', STR_PAD_LEFT);
        } else {
            $new_id_hewan = 'P001';
        }

        return $new_id_hewan;
    }
    
    // Menyimpan id hewan dengan kode unik
    public function insert_pasien($data) {
        $data['id_hewan'] = $this->get_new_id_hewan();
        return $this->db->insert('pasien', $data);
    }

    // Menggabungkan dan menampilkan data pasien, user, rekam medis, dan detail rm setelah menekan tombol Rekam Medis (model ini diletakkan di cont. User bagian rekamID)
    public function getRekamMedisUser($id_hewan, $id_user)
    {
        $this->db->select('rekam_medis.id_rm, rekam_medis.tgl_sekarang, rekam_medis.keluhan, detail_rm.diagnosa, detail_rm.obat, detail_rm.dosis, pasien.nama_hewan, pasien.jns_hewan, pasien.jns_klmn');
        $this->db->from('rekam_medis');
        $this->db->join('detail_rm', 'rekam_medis.id_rm = detail_rm.id_rm');
        $this->db->join('pasien', 'rekam_medis.id_hewan = pasien.id_hewan');
        $this->db->where('rekam_medis.id_hewan', $id_hewan);
        $this->db->where('rekam_medis.id_user', $id_user);
        return $this->db->get();
    }

    // Menggabungkan dan menampilkan data rekam medis berdasarkan id_hewan
    public function getRekamMedisByHewan($id_hewan)
    {
        $this->db->select('rekam_medis.id_rm, rekam_medis.tgl_sekarang, rekam_medis.keluhan, detail_rm.diagnosa, detail_rm.obat, detail_rm.dosis, pasien.nama_hewan, pasien.jns_hewan, pasien.jns_klmn');
        $this->db->from('rekam_medis');
        $this->db->join('detail_rm', 'rekam_medis.id_rm = detail_rm.id_rm');
        $this->db->join('pasien', 'rekam_medis.id_hewan = pasien.id_hewan');
        $this->db->where('rekam_medis.id_hewan', $id_hewan);
        return $this->db->get();
    }

    // Menggabungkan dan menampilkan data pasien dengan nama pemilik nya
    public function getPasienWithOwner($id_hewan)
    {
        $this->db->select('pasien.*, user.nama AS nama_pemilik');
        $this->db->from('pasien');
        $this->db->join('user', 'pasien.id_user = user.id_user', 'left');
        $this->db->where('pasien.id_hewan', $id_hewan);
        return $this->db->get()->row_array();
    }

    // Menggabungkan dan menampilkan data pasien, user, rekam medis, dan detail rm setelah menekan tombol Rekam Medis (model ini diletakkan di cont. Admin bagian tombolRM)
    public function getRekamMedisAdmin($id_hewan) {
        $this->db->select('rekam_medis.id_rm, rekam_medis.tgl_sekarang, rekam_medis.keluhan, detail_rm.diagnosa, detail_rm.obat, detail_rm.dosis, pasien.id_hewan, pasien.nama_hewan, pasien.jns_hewan, pasien.jns_klmn, user.nama as nama_pemilik');
        $this->db->from('rekam_medis');
        $this->db->join('pasien', 'rekam_medis.id_hewan = pasien.id_hewan');
        $this->db->join('user', 'pasien.id_user = user.id_user');
        $this->db->join('detail_rm', 'rekam_medis.id_rm = detail_rm.id_rm');
        $this->db->where('rekam_medis.id_hewan', $id_hewan);
        // $this->db->where('pasien.id_user', $id_user);
        
        return $this->db->get()->result_array();
    }
}
