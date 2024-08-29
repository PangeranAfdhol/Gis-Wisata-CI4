<?php namespace App\Controllers;

use App\Models\M_User;
use App\Models\M_Login;

class RiwayatLogin extends BaseController
{
    protected $M_User;
    protected $M_Login;
    
    public function __construct()
    {
        $this->M_User = new M_User();
        $this->M_Login = new M_Login();
    }
    
    //halaman daftar riwayat login
	public function index()
	{
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            $data = [
                'title' => 'Riwayat Login',
                'daftar_riwayat' => $this->M_Login->getLogin_user(session()->get('id_user')),
                'hitung_login'  => $this->M_Login->cekLogin_user(session()->get('id_user'))
            ];
            return view('riwayat_login/daftar', $data);
        }
    }

    //halaman detail login
    public function riwayat_login($id)
    {
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            $detail_login = $this->M_Login->getLogin($id);
            foreach($detail_login as $detail_lgn):
                $data = [
                    'title'             => 'Detail Login',
                    'tanggal_login'     => $detail_lgn->tanggal_login,
                    'latitude_login'    => $detail_lgn->latitude_login,
                    'longitude_login'   => $detail_lgn->longitude_login,
                    'nik'               => $detail_lgn->nik,
                    'nama_depan'        => $detail_lgn->nama_depan,
                    'nama_belakang'     => $detail_lgn->nama_belakang,
                    'alamat'     => $detail_lgn->alamat,
                    'email'     => $detail_lgn->email,
                    'telepon'     => $detail_lgn->telepon
                ];
            endforeach;

            return view('riwayat_login/detail', $data);
        }
    }
}