<?php namespace App\Controllers;

use App\Models\M_Login;

class Wisata extends BaseController
{
    protected $M_Login;
    
    public function __construct()
    {
        $this->M_Login = new M_Login();
    }

    //halaman daftar pendataan wisata
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
            $login_terakhir = $this->M_Login->getLogin_user_limit(session()->get('id_user'));
            foreach($login_terakhir as $login):
                $data = [
                    'title'          => 'Data Wisata',
                    'lat_terakhir'   => $login->latitude_login,
                    'long_terakhir'  => $login->longitude_login
                ];
            endforeach;
            return view('data-wisata', $data);
        }
    }

    //halaman wisata terdekat
	public function wisata_terdekat()
	{
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            $login_terakhir = $this->M_Login->getLogin_user_limit(session()->get('id_user'));
            foreach($login_terakhir as $login):
                $data = [
                    'title'          => 'Wisata Terdekat',
                    'lat_terakhir'   => $login->latitude_login,
                    'long_terakhir'  => $login->longitude_login
                ];
            endforeach;
            return view('wisata-terdekat', $data);
        }
    }
}