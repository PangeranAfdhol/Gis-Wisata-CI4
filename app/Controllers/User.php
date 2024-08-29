<?php namespace App\Controllers;

use App\Models\M_User;
use App\Models\M_Login;

class User extends BaseController
{
    protected $M_User;
    protected $M_Login;
    
    public function __construct()
    {
        $this->M_User = new M_User();
        $this->M_Login = new M_Login();
    }
    
    //halaman daftar user
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
            //jika role nya sesuai
            if(session()->get('role') == 'Admin')
            {
                $data = [
                    'title' => 'Pendataan User',
                    'daftar_riwayat_user' => $this->M_Login->getLogin_semua_user(),
                    'daftar_riwayat_user_list' => $this->M_Login->getLogin_semua_user_list()
                ];
                return view('user/daftar', $data);
            }
            //jika role nya tidak sesuai
            else
            {
                return redirect()->to(base_url('dashboard'));
            }
        }
    }

    //halaman data riwayat login User
	public function data_user($id_user)
	{
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            //jika role nya sesuai
            if(session()->get('role') == 'Admin')
            {
                $datauser = $this->M_User->data_user($id_user);
                foreach($datauser as $user):
                    $data = [
                        'title' => 'Data User - '.$user->nama_depan.' '.$user->nama_belakang.' ('.$user->nik.')',
                        'daftar_riwayat' => $this->M_Login->getLogin_user($id_user),
                        'hitung_login'  => $this->M_Login->cekLogin_user($id_user)
                    ];
                endforeach;
                return view('user/data', $data);
            }
            //jika role nya tidak sesuai
            else
            {
                return redirect()->to(base_url('dashboard'));
            }
        }
    }

    //halaman detail User
    public function detail_user($id_login)
    {
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            //jika role nya sesuai
            if(session()->get('role') == 'Admin')
            {
                $detail_login = $this->M_Login->getLogin($id_login);
                foreach($detail_login as $detail_lgn):
                    $data = [
                        'title'             => 'Detail User - '.$detail_lgn->nama_depan.' '.$detail_lgn->nama_belakang.' ('.$detail_lgn->nik.')',
                        'tanggal_login'     => $detail_lgn->tanggal_login,
                        'latitude_login'    => $detail_lgn->latitude_login,
                        'longitude_login'   => $detail_lgn->longitude_login,
                        'nama_depan'        => $detail_lgn->nama_depan,
                        'nama_belakang'     => $detail_lgn->nama_belakang,
                        'nik'               => $detail_lgn->nik,
                        'id_user'           => $detail_lgn->id_user
                    ];
                endforeach;

                return view('user/detail', $data);
            }
            //jika role nya tidak sesuai
            else
            {
                return redirect()->to(base_url('dashboard'));
            }
        }
    }

    //CRUD User
    public function tambah()
    {
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
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
                    'role'              => $this->request->getPost('role'),
                    'pwd'               => $this->request->getPost('pwd'),
                    'konfirmasi_pwd'    => $this->request->getPost('konfirmasi_pwd'),
                    'nik'               => $this->request->getPost('nik'),
                    'nama_depan'        => $this->request->getPost('nama_depan'),
                    'nama_belakang'        => $this->request->getPost('nama_belakang'),
                    'alamat'        => $this->request->getPost('alamat'),
                    'email'        => $this->request->getPost('email'),
                    'telepon'        => $this->request->getPost('telepon')
                );

                //jika ada kesalahan dalam tambah data User
                if($validation->run($data_cek, 'tambah_user') == FALSE)
                {
                    session()->setFlashdata('inputs', $this->request->getPost());
                    session()->setFlashdata('errors', $validation->getErrors());

                    return redirect()->to(base_url('admin/user'));
                }
                //jika tidak ada kesalahan dalam tambah User
                else
                {
                    $data = array(
                        'username'          => trim($this->request->getPost('username')),
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

                    $simpan = $this->M_User->tambah($data);
                    if($simpan)
                    {
                        session()->setFlashdata('success', 'User berhasil ditambah');

                        return redirect()->to(base_url('admin/user')); 
                    }
                }
            }
        }
    }

    public function edit()
    {
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            $validation = \Config\Services::validation();

            $id = $this->request->getPost('id_user');

            //jika password diubah
            if($this->request->getPost('pwd') != null)
            {
                $data_pwd = array(
                    'pwd'               => $this->request->getPost('pwd'),
                    'konfirmasi_pwd'    => $this->request->getPost('konfirmasi_pwd')
                );

                //jika ada kesalahan dalam ubah password edit User
                if($validation->run($data_pwd, 'user_pwd') == FALSE)
                {
                    session()->setFlashdata('errors', $validation->getErrors());

                    return redirect()->to(base_url('admin/user'));
                }
                //jika tidak ada kesalahan dalam ubah password edit User
                else
                {
                    $username = trim($this->request->getPost('username'));
                    $username_db = $this->M_User->cek_username($username, $id);
                    //jika username sudah ada di database
                    if($username_db > 0)
                    {
                        session()->setFlashdata('warning', 'Username sudah ada, silahkan gunakan Username lain');

                        return redirect()->to(base_url('admin/user')); 
                    }
                    //jika username belum ada di database
                    else
                    {
                        $data = array(
                            'username'          => $username,
                            'pwd'               => password_hash($this->request->getPost('pwd'), PASSWORD_DEFAULT),
                            'nik'               => $this->request->getPost('nik'),
                            'nama_depan'        => $this->request->getPost('nama_depan'),
                            'nama_belakang'     => $this->request->getPost('nama_belakang'),
                            'alamat'            => $this->request->getPost('alamat'),
                            'email'             => $this->request->getPost('email'),
                            'telepon'           => $this->request->getPost('telepon')
                        );

                        //jika ada kesalahan dalam edit User
                        if($validation->run($data, 'edit_user') == FALSE)
                        {
                            session()->setFlashdata('errors', $validation->getErrors());
        
                            return redirect()->to(base_url('admin/user'));
                        }
                        //jika tidak ada kesalahan dalam edit User
                        else
                        {
                            $edit = $this->M_User->edit($data, $id);
                            if($edit)
                            {
                                session()->setFlashdata('success', 'User berhasil diubah');

                                return redirect()->to(base_url('admin/user')); 
                            }
                        }
                    }
                }
            }
            //jika password tidak diubah
            else
            {
                $username = trim($this->request->getPost('username'));
                $username_db = $this->M_User->cek_username($username, $id);
                //jika username sudah ada di database
                if($username_db > 0)
                {
                    session()->setFlashdata('warning', 'Username sudah ada, silahkan gunakan Username lain');

                    return redirect()->to(base_url('admin/user')); 
                }
                //jika username belum ada di database
                else
                {
                    $data = array(
                        'username'          => $username,
                        'nik'               => $this->request->getPost('nik'),
                        'nama_depan'        => $this->request->getPost('nama_depan'),
                        'nama_belakang'     => $this->request->getPost('nama_belakang'),
                        'alamat'            => $this->request->getPost('alamat'),
                        'email'             => $this->request->getPost('email'),
                        'telepon'           => $this->request->getPost('telepon')
                    );

                    //jika ada kesalahan dalam edit User
                    if($validation->run($data, 'edit_user') == FALSE)
                    {
                        session()->setFlashdata('errors', $validation->getErrors());
    
                        return redirect()->to(base_url('admin/user'));
                    }
                    //jika tidak ada kesalahan dalam edit User
                    else
                    {
                        $edit = $this->M_User->edit($data, $id);
                        if($edit)
                        {
                            session()->setFlashdata('success', 'User berhasil diubah');

                            return redirect()->to(base_url('admin/user')); 
                        }
                    }
                }
            }
        }
    }

    public function hapus()
    {
        //jika tidak ada session
        if(!session()->get('id_user'))
        {
            return redirect()->to(base_url('autentikasi/login'));
        }
        //jika ada session
        else
        {
            $validation = \Config\Services::validation();
    
            $id = $this->request->getPost('id_user');
    
            $data = array(
                'hapus_user'    => "HAPUS",
                'konfirmasi_hapus'  => $this->request->getPost('konfirmasi_hapus')
            );
    
            //jika ada kesalahan dalam hapus User
            if($validation->run($data, 'hapus_user') == FALSE)
            {
                session()->setFlashdata('errors', $validation->getErrors());
    
                return redirect()->to(base_url('admin/user'));
            }
            //jika tidak ada kesalahan dalam hapus User
            else
            {
                $hapus = $this->M_User->hapus($id);
                if($hapus)
                {
                    session()->setFlashdata('success', 'User berhasil dihapus');
        
                    return redirect()->to(base_url('admin/user'));
                }
            }
        }
    }
    //end CRUD User
}