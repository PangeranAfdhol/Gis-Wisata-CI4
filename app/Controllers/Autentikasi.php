<?php namespace App\Controllers;

use App\Models\M_User;
use App\Models\M_Login;

class Autentikasi extends BaseController
{
    protected $M_User;
    protected $M_Login;
    
    public function __construct()
    {
        $this->M_User = new M_User();
        $this->M_Login = new M_Login();
    }
    
    //halaman login
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
                'title' => 'Login User'
            ];
            return view('login', $data);
        }
    }

    //halaman register
    public function register()
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
                'title' => 'Register User'
            ];
            return view('register', $data);
        }
    }

    //proses login
    public function proses_login()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'username' => htmlspecialchars($this->request->getPost('username')),
            'pwd'      => htmlspecialchars($this->request->getPost('pwd'))
        );
    
        //jika ada kesalahan dalam login
        if($validation->run($data, 'login') == FALSE)
        {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika tidak ada kesalahan dalam login
        else
        {
            $username   = htmlspecialchars($this->request->getPost('username'));
            $pwd        = htmlspecialchars($this->request->getPost('pwd'));
            $cek_user   = $this->M_User->cek_user($username);
            $cek_login  = $this->M_User->cek_login($username);

            //jika ada data user
            if($cek_user > 0)
            {
                foreach($cek_login as $cek):
                    //jika password benar
                    if(password_verify($pwd, $cek->pwd))
                    {
                        //masukkan data ke session
                        $data_session = [
                            'id_user'       => $cek->id_user,
                            'username'      => $cek->username,
                            'role'          => $cek->role,
                            'nama_depan'    => $cek->nama_depan,
                            'nama_belakang' => $cek->nama_belakang
                        ];
                        session()->set($data_session);

                        //tambah data login ke database
                        $data_login = array(
                            'id_user'        => $cek->id_user,
                            'tanggal_login'  => 'Tanggal: '.date("d-m-Y").' / Pukul: '.date("H:i:s"),
                            'latitude_login' => $this->request->getPost('lat'),
                            'longitude_login'=> $this->request->getPost('lng')
                        );
                        $tambah_login = $this->M_Login->tambah($data_login);
                        
                        //jika berhasil login
                        if($tambah_login)
                        {
                            return redirect()->to(base_url('dashboard'));
                        }
                    }
                    //jika password salah
                    else
                    {
                        session()->setFlashdata('warning', 'Username atau password yang Anda masukan salah!');
                    
                        return redirect()->to(base_url('autentikasi/login'));
                    }
                endforeach;
            }
            //jika tidak ada data user
            else
            {
                session()->setFlashdata('warning', 'Username Anda belum terdaftar!');
                    
                return redirect()->to(base_url('autentikasi/login'));
            }
        }
    }

    //proses register
    public function proses_register()
    {
        $validation =  \Config\Services::validation();

        $username = trim($this->request->getPost('username'));
        $username_db = $this->M_User->cek_tambah_user($username);
        //jika username sudah ada di database
        if($username_db > 0)
        {
            session()->setFlashdata('warning', 'Username sudah ada, silahkan gunakan Username lain');

            return redirect()->to(base_url('admin/user')); 
        }
        //jika username belum ada di database
        else
        {
            $data_cek = array(
                'username'          => $this->request->getPost('username'),
                'pwd'               => $this->request->getPost('pwd'),
                'role'              => $this->request->getPost('role'),
                'konfirmasi_pwd'    => $this->request->getPost('konfirmasi_pwd'),
                'nik'               => $this->request->getPost('nik'),
                'nama_depan'        => $this->request->getPost('nama_depan'),
                'nama_belakang'     => $this->request->getPost('nama_belakang'),
                'alamat'     => $this->request->getPost('alamat'),
                'email'     => $this->request->getPost('email'),
                'telepon'     => $this->request->getPost('telepon')
            );

            //jika ada kesalahan dalam register
            if($validation->run($data_cek, 'tambah_user') == FALSE)
            {
                session()->setFlashdata('inputs', $this->request->getPost());
                session()->setFlashdata('errors', $validation->getErrors());
    
                return redirect()->to(base_url('autentikasi/register'));
            }
            //jika tidak ada kesalahan dalam register
            else
            {
                $data = array(
                    'username'          => htmlspecialchars($this->request->getPost('username')),
                    'pwd'               => password_hash($this->request->getPost('pwd'), PASSWORD_DEFAULT),
                    'role'              => $this->request->getPost('role'),
                    'nik'               => $this->request->getPost('nik'),
                    'nama_depan'        => $this->request->getPost('nama_depan'),
                    'nama_belakang'     => $this->request->getPost('nama_belakang'),
                    'alamat'     => $this->request->getPost('alamat'),
                    'email'     => $this->request->getPost('email'),
                    'telepon'     => $this->request->getPost('telepon'),
                    'tanggal_register'  => 'Tanggal: '.date("d-m-Y").' / Pukul: '.date("H:i:s")
                );
                
                $register = $this->M_User->tambah($data);
                if($register)
                {
                    session()->setFlashdata('success', 'Anda berhasil Registrasi');
    
                    return redirect()->to(base_url('autentikasi/login')); 
                }
            }
        }
    }

    //proses autentikasi logout
    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('autentikasi/login'));
    }
}