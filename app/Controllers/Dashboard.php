<?php namespace App\Controllers;

use App\Models\M_User;

class Dashboard extends BaseController
{
    protected $M_User;
    
    public function __construct()
    {
        $this->M_User = new M_User();
    }

    //menampilkan halaman Dashboard
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
                'title'    => 'Dashboard',
                'user'      => $this->M_User->getUser()
            ];

            return view('dashboard', $data);
        }
    }
}