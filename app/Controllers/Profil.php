<?php namespace App\Controllers;

use App\Models\M_User;

class Profil extends BaseController
{
    protected $M_User;
    
    public function __construct()
    {
        $this->M_User = new M_User();
    }

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
                'title' => 'Profil',
                'profil'  => $this->M_User->cek_login_data_id(session()->get('id_user'))
            ];
            return view('profil', $data);
        }
    }

    //CRUD profil
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

                    return redirect()->to(base_url('profil'));
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

                        return redirect()->to(base_url('profil')); 
                    }
                    //jika username belum ada di database
                    else
                    {
                        $data = array(
                            'username'          => trim($this->request->getPost('username')),
                            'nama_depan'        => trim($this->request->getPost('nama_depan')),
                            'nama_belakang'     => trim($this->request->getPost('nama_belakang')),
                            'nik'               => trim($this->request->getPost('nik')),
                            'alamat'            => trim($this->request->getPost('alamat')),
                            'email'             => trim($this->request->getPost('email')),
                            'telepon'           => trim($this->request->getPost('telepon')),
                            'pwd'               => password_hash($this->request->getPost('pwd'), PASSWORD_DEFAULT)
                        );
        
                        //jika ada kesalahan dalam edit profil
                        if($validation->run($data, 'edit_user') == FALSE)
                        {
                            session()->setFlashdata('errors', $validation->getErrors());
        
                            return redirect()->to(base_url('profil'));
                        }
                        //jika tidak ada kesalahan dalam edit profil
                        else
                        {
                            $edit = $this->M_User->edit($data, $id);
                            if($edit)
                            {
                                session()->setFlashdata('success', 'Profil berhasil diedit');

                                return redirect()->to(base_url('profil')); 
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

                    return redirect()->to(base_url('profil')); 
                }
                //jika username belum ada di database
                else
                {
                    $data = array(
                        'username'          => $username,
                        'nama_depan'        => trim($this->request->getPost('nama_depan')),
                        'nama_belakang'     => trim($this->request->getPost('nama_belakang')),
                        'nik'               => trim($this->request->getPost('nik')),
                        'alamat'            => trim($this->request->getPost('alamat')),
                        'email'             => trim($this->request->getPost('email')),
                        'telepon'           => trim($this->request->getPost('telepon'))
                    );
    
                    //jika ada kesalahan dalam edit profil
                    if($validation->run($data, 'edit_user') == FALSE)
                    {
                        session()->setFlashdata('errors', $validation->getErrors());
    
                        return redirect()->to(base_url('profil'));
                    }
                    //jika tidak ada kesalahan dalam edit profil
                    else
                    {
                        $edit = $this->M_User->edit($data, $id);
                        if($edit)
                        {
                            session()->setFlashdata('success', 'Profil berhasil diedit');
    
                            return redirect()->to(base_url('profil')); 
                        }
                    }
                }
            }
        }
    }
    //end CRUD user
}