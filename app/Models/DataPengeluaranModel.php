<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPengeluaranModel extends Model
{
    protected $table      = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $allowedFields = ['nama_pengeluaran', 'jumlah'];
    protected $useTimestamps = true;



    public function getPengeluaran($id_pengeluaran = false)
    {
        if ($id_pengeluaran == false) {
            return $this->findAll();
        }
        return $this->where(['id_pengeluaran' => $id_pengeluaran])->first();
    }

    public function hitungJumlahMerk()
    {
        $user = $this->query('SELECT * FROM jenis_bayar');
        return $user->getNumRows();
    }
    public function updateBayar($data, $id_pengeluaran)
    {
        $query = $this->db->table('pengeluaran')->update($data, array('id_pengeluaran' => $id_pengeluaran));
        return $query;
    }
    // ...
}
