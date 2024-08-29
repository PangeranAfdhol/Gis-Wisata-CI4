<?php namespace App\Models;

use CodeIgniter\Model;

class M_Login extends Model
{
    protected $table      = 'login';
    protected $primaryKey = 'id_login';

    //tampilkan data login semua user untuk map
    public function getLogin_semua_user()
    {
        return $this->db
            ->table($this->table)
            ->join('user','user.id_user = '.$this->table.'.id_user')
            ->groupBy(['latitude_login', 'longitude_login'])
            ->get()->getResult();
    }

    //tampilkan data login semua user untuk list
    public function getLogin_semua_user_list()
    {
        return $this->db
            ->table($this->table)
            ->join('user','user.id_user = '.$this->table.'.id_user', 'RIGHT')
            ->groupBy('user.id_user')
            ->get()->getResult();
    }

    //tampilkan data login user untuk list
    public function getLogin_user_list($id_user)
    {
        return $this->db
            ->table($this->table)
            ->join('user','user.id_user = '.$this->table.'.id_user')
            ->groupBy('user.id_user')
            ->where('user.id_user', $id_user)
            ->get()->getResult();
    }

    //tampilkan data login berdasarkan user
    public function getLogin_user($id_user)
    {
        return $this->db
            ->table($this->table)
            ->where('id_user', $id_user)
            ->get()->getResult();
    }

    //tampilkan data login berdasarkan user (data terakhir)
    public function getLogin_user_limit($id_user)
    {
        return $this->db
            ->table($this->table)
            ->where('id_user', $id_user)
            ->orderBy('tanggal_login', 'DESC')
            ->limit(1)
            ->get()->getResult();
    }

    //hitung data login berdasarkan user
    public function cekLogin_user($id_user)
    {
        return $this->db
            ->table($this->table)
            ->where('id_user', $id_user)
            ->countAllResults();
    }

    //tampilkan detail data login join ke user
    public function getLogin($id)
    {
        return $this->db
            ->table($this->table)
            ->join('user','user.id_user = '.$this->table.'.id_user')
            ->where($this->primaryKey, $id)
            ->get()->getResult();
    }

    //CRUD Login
    public function tambah($data)
    {
        return $this->db
            ->table($this->table)
            ->insert($data);
    }
    //end CRUD Login
}