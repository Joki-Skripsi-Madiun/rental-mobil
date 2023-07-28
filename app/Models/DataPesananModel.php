<?php

namespace App\Models;


use CodeIgniter\Model;

class DataPesananModel extends Model
{
    protected $table      = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['hari', 'proses', 'tgl_pinjam', 'tgl_kembali', 'id_pemesan', 'id_mobil', 'id_perjalanan', 'id_jenisbayar'];



    public function getPesanan($id_pesanan = false)
    {
        if ($id_pesanan == false) {
            return $this->findAll();
        }
        return $this->where(['id_pesanan' => $id_pesanan])->first();
    }
    public function joinPesanan($id_pesanan = false)
    {
        if ($id_pesanan == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('pesanan');
            $builder->select('*');
            $builder->join('users', 'users.id = pesanan.id_pemesan');
            $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
            $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
            $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
            $query = $builder->get();
            return $query;
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->select('*');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('id_pesanan', $id_pesanan);
        $query = $builder->get();
        return $query;
    }

    public function joinPesananLap($bulan, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->select('*');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('merk', 'merk.id_merk = mobil.id_merk');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('proses', 2);
        $builder->where('MONTH(pesanan.tgl_pinjam)', $bulan);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $builder->orderBy('tgl_pinjam', 'ASC');
        $query = $builder->get();
        return $query;
    }
    public function joinPesananLapTahun($tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->select('*');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('merk', 'merk.id_merk = mobil.id_merk');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('proses', 2);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $builder->orderBy('tgl_pinjam', 'ASC');
        $query = $builder->get();
        return $query;
    }
    public function joinPesananLapSum($bulan, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->selectSum('harga');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('proses', 2);
        $builder->where('MONTH(pesanan.tgl_pinjam)', $bulan);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->harga;
    }
    public function joinPesananLapSumTahun($tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->selectSum('harga');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('proses', 2);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->harga;
    }
    public function PesananMobilSum($id_mobil, $proses, $bulan, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->selectSum('mobil.harga');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('pesanan.id_mobil', $id_mobil);
        $builder->where('proses', $proses);
        $builder->where('MONTH(pesanan.tgl_pinjam)', $bulan);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->harga;
    }
    public function PesananMobilSumTahun($id_mobil, $proses, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->selectSum('mobil.harga');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('pesanan.id_mobil', $id_mobil);
        $builder->where('proses', $proses);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->harga;
    }

    public function PesananHariSum($id_mobil, $proses, $bulan, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->selectSum('pesanan.hari');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('pesanan.id_mobil', $id_mobil);
        $builder->where('proses', $proses);
        $builder->where('MONTH(pesanan.tgl_pinjam)', $bulan);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->hari;
    }
    public function PesananHariSumTahun($id_mobil, $proses, $tahun)
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->selectSum('pesanan.hari');
        $builder->join('users', 'users.id = pesanan.id_pemesan');
        $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
        $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
        $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
        $builder->where('pesanan.id_mobil', $id_mobil);
        $builder->where('proses', $proses);
        $builder->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getRow()->hari;
    }
    public function hitungJumlahMobil($id_mobil, $proses, $bulan, $tahun)
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $query->selectCount('id_pesanan');
        $query->where('id_mobil', $id_mobil);
        $query->where('proses', $proses);
        $query->where('MONTH(pesanan.tgl_pinjam)', $bulan);
        $query->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahMobilTahun($id_mobil, $proses, $tahun)
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $query->selectCount('id_pesanan');
        $query->where('id_mobil', $id_mobil);
        $query->where('proses', $proses);
        $query->where('YEAR(pesanan.tgl_pinjam)', $tahun);
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function joinPesananCust($id_pesanan = false)
    {
        if ($id_pesanan == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('pesanan');
            $id_pemesan = user()->id;
            $builder->select('*');
            $builder->join('users', 'users.id = pesanan.id_pemesan');
            $builder->join('mobil', 'mobil.id_mobil = pesanan.id_mobil');
            $builder->join('perjalanan', 'perjalanan.id_perjalanan = pesanan.id_perjalanan');
            $builder->join('jenis_bayar', 'jenis_bayar.id_jenisbayar = pesanan.id_jenisbayar');
            $builder->where('id_pemesan', $id_pemesan);
            $query = $builder->get();
            return $query;
        }
        return $this->where(['id_pesanan' => $id_pesanan])->first();
    }
    public function hitungJumlahPesananAll()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $query->selectCount('id_pesanan');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahPesanan0()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $query->selectCount('id_pesanan');
        $query->where('proses', '0');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahPesanan1()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $query->selectCount('id_pesanan');
        $query->where('proses', '1');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahPesanan2()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $query->selectCount('id_pesanan');
        $query->where('proses', '2');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahPesananCust0()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $user = user()->id;
        $query->selectCount('id_pesanan');
        $query->where('id_pemesan', $user);
        $query->where('proses', '0');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahPesananCust1()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $user = user()->id;
        $query->selectCount('id_pesanan');
        $query->where('id_pemesan', $user);
        $query->where('proses', '1');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function hitungJumlahPesananCust2()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pesanan');
        $user = user()->id;
        $query->selectCount('id_pesanan');
        $query->where('id_pemesan', $user);
        $query->where('proses', '2');
        $result = $query->countAllResults();
        // $result = $query->get()->getRow()->num_rows;
        return $result;
    }
    public function updatePesanan($data, $id_pesanan)
    {
        $query = $this->db->table('pesanan')->update($data, array('id_pesanan' => $id_pesanan));
        return $query;
    }
    // ...
}
