<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \Myth\Auth\Authorization\GroupModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $mobil = $this->datamobilModel;
        $pemesan = $this->datapemesanModel;
        $pesanan = $this->datapesananModel;
        if (user()->status == 1) {
            $pesananNover = $this->datapesananModel->hitungJumlahPesanan0();
            $pesananVer = $this->datapesananModel->hitungJumlahPesanan1();
            $pesananSel = $this->datapesananModel->hitungJumlahPesanan2();
        }
        if (user()->status == 2) {
            $pesananNover = $this->datapesananModel->hitungJumlahPesananCust0();
            $pesananVer = $this->datapesananModel->hitungJumlahPesananCust1();
            $pesananSel = $this->datapesananModel->hitungJumlahPesananCust2();
        }
        $akun = $this->dataakunModel;
        $groupModel = new GroupModel();
        $data = [
            'session' => $session,
            'role' => $groupModel->getGroupsForUser(user()->id),
            'akun' => $akun->hitungJumlahAkun(),
            'mobil' => $mobil->hitungJumlahMobil(),
            'pemesan' => $pemesan->hitungJumlahPemesan(),
            'pesananAll' => $pesanan->hitungJumlahPesananAll(),
            'pesananVer' => $pesananVer,
            'pesananNover' => $pesananNover,
            'pesananSel' => $pesananSel,
            'active'  => 'dashboard'
        ];
        return view('dashboard/index', $data);
    }
}
