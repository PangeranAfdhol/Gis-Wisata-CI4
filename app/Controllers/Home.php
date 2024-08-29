<?php namespace App\Controllers;

class Home extends BaseController
{
    //menampilkan halaman Home
	public function index()
	{
        //jika ada session
        if(session()->get('id_user'))
        {
            return redirect()->to(base_url('dashboard'));
        }
        //jika tidak ada session
        else
        {
            $data = [
                'title' => 'Home'
            ];

            return view('home', $data);
        }
    }
}