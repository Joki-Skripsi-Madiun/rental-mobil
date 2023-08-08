<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use CodeIgniter\Controller;

class DataPengeluaran extends BaseController
{
    public function index()
    {
        session();
        $data = [
            // 'session' => $session,
            'pengeluaran' => $this->datapengeluaranModel->getPengeluaran(),
            'active'  => 'pengeluaran',
            'role' => $this->groups->getGroupsForUser(user()->id),
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_pengeluaran/index', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengeluaran Harus diisi',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Harus diisi',
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->datapengeluaranModel->save([
            'nama_pengeluaran' => $this->request->getVar('nama_pengeluaran'),
            'jumlah' => $this->request->getVar('jumlah'),

        ]);
        session()->setFlashdata('pesan', 'Tambah Data Pengeluaran Berhasil');
        return redirect()->to('/data-pengeluaran');
    }


    public function delete($id_pengeluaran)
    {

        $this->datapengeluaranModel->delete($id_pengeluaran);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/data-pengeluaran');
    }
    public function edit($id_pengeluaran)
    {
        $pengeluaran = $this->datapengeluaranModel->getPengeluaran($id_pengeluaran);
        if (empty($pengeluaran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengeluaran Tidak ditemukan !');
        }
        $data = [
            'title' => 'Ubah Data Pengeluaran| SIA',
            'active'  => 'pengeluaran',
            'validation' => \Config\Services::validation(),
            'role' => $this->groups->getGroupsForUser(user()->id),
            'datapengeluaran' => $this->datapengeluaranModel->getPengeluaran($id_pengeluaran)

        ];
        return view('data_pengeluaran/edit', $data);
    }

    public function update($id_pengeluaran)
    {
        if (!$this->validate([
            'nama_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengeluaran Harus diisi',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Harus diisi',
                ]
            ]

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->datapengeluaranModel->save([
            'id_pengeluaran' => $id_pengeluaran,
            'nama_pengeluaran' => $this->request->getVar('nama_pengeluaran'),
            'jumlah' => $this->request->getVar('jumlah'),

        ]);
        session()->setFlashdata('pesan', 'Ubah Data Pengeluaran Berhasil');
        return redirect()->to('/data-pengeluaran');
    }
    public function laporan()
    {
        session();
        $data = [
            // 'session' => $session,
            'pengeluaran' => $this->datapengeluaranModel->getPengeluaran(),
            'active'  => 'laporan-pengeluaran',
            'role' => $this->groups->getGroupsForUser(user()->id),
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_pengeluaran/laporan', $data);
    }
    public function laporanBulan()
    {
        session();
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');
        $data = [
            // 'session' => $session,
            'pengeluaran' => $this->datapengeluaranModel->where('MONTH(created_at)', $bulan)->where('YEAR(created_at)', $tahun)->findAll(),
            'active'  => 'laporan-pengeluaran',
            'bulan'  => $bulan,
            'tahun'  => $tahun,
            'role' => $this->groups->getGroupsForUser(user()->id),
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_pengeluaran/laporan-bulan', $data);
    }
    public function laporanTahun()
    {
        session();
        $tahun = $this->request->getVar('tahun');
        $data = [
            // 'session' => $session,
            'pengeluaran' => $this->datapengeluaranModel->where('YEAR(created_at)', $tahun)->findAll(),
            'active'  => 'laporan-pengeluaran',
            'tahun'  => $tahun,
            'role' => $this->groups->getGroupsForUser(user()->id),
            // 'validation' => \Config\Services::validation()
        ];
        return view('data_pengeluaran/laporan-tahun', $data);
    }
}
