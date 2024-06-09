<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class ModelUser extends CI_Model
{
    // Menyimpan data user
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    // Update data user
    public function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('user', $data);
    }

    // Mengambil data dari tabel 'user' berdasarkan kondisi tertentu yang diberikan 
    // melalui parameter $where, null berarti kita dapat memanggil fungsi cekData 
    // tanpa memberikan nilai untuk parameter $where
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    // Mengambil data dengan melakukan join antara tabel pasien dan user
    public function joinid($where)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('user', 'user.id_user = pasien.id_user', 'inner');
        $this->db->where($where);
        return $this->db->get();
    }

    // Membuat kode unik User
    public function get_new_id_user() {
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $last_id = $query->row();

        if ($last_id) {
            $last_number = (int)substr($last_id->id_user, 2);
            $new_number = $last_number + 1;
            $new_id_user = 'U' . str_pad($new_number, 3, '0', STR_PAD_LEFT);
        } else {
            $new_id_user = 'U001';
        }

        return $new_id_user;
    }
    
    // Menyimpan data user dengan kode unik
    public function insert_user($data) {
        $data['id_user'] = $this->get_new_id_user();
        return $this->db->insert('user', $data);
    }
}
