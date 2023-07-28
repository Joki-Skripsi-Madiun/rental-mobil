<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMobilModel extends Model
{
    protected $table      = 'mobil';
    protected $primaryKey = 'id_mobil';
    protected $allowedFields = ['id_merk', 'nama_mobil', 'warna', 'jumlah_kursi', 'no_polisi', 'tahun_beli', 'harga', 'gambar', 'status'];



    public function getMobil($id_mobil = false)
    {
        if ($id_mobil == false) {
            return $this->findAll();
        }
        return $this->where(['id_mobil' => $id_mobil])->first();
    }
    public  function getMobilStatus()
    {
        return $this->table('mobil')->where('status', 1);
    }
    public function getMobilStatusUsers($status = false, $id_users = false)
    {
        if ($status == false) {
            return $this->findAll();
        }
        return $this->where(['status' => $status])->where(['id_users' => $id_users])->first();
    }
    public function joinMobil($id_mobil = false)
    {
        if ($id_mobil == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('mobil');
            $builder->select('*');
            $builder->join('merk', 'merk.id_merk = mobil.id_merk');
            $query = $builder->get();
            return $query;
        }
        return $this->where(['id_mobil' => $id_mobil])->first();
    }

    public function hitungJumlahMobil()
    {
        $mobil = $this->query('SELECT * FROM mobil');
        return $mobil->getNumRows();
    }
    public function updateMerk($data, $id_mobil)
    {
        $query = $this->db->table('mobil')->update($data, array('id_mobil' => $id_mobil));
        return $query;
    }
    // ...
}
