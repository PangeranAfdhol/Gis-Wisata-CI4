<?php namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    //tampilkan data user
    public function getUser()
    {
        return $this->db
            ->table($this->table)
            ->get()->getResult();
    }

    //cek ada atau tidak adanya user
    public function cek_user($username)
    {
        return $this->db
            ->table($this->table)
            ->where('username', $username)
            ->countAllResults();
    }

    //data riwayat login user
    public function data_user($id)
    {
        return $this->db
            ->table($this->table)
            ->where('id_user', $id)
            ->get()->getResult();
    }

    //cek data login
    public function cek_login($username)
    {
        return $this->db
            ->table($this->table)
            ->where('username', $username)
            ->get()->getResult();
    }
    public function cek_login_data_id($id)
    {
        return $this->db
            ->table($this->table)
            ->where($this->primaryKey, $id)
            ->get()->getResult();
    }

    //edit profil (cek username sudah ada atau belum, kecuali dirinya sendiri)
    public function cek_username($username, $id)
    {
        return $this->db
            ->table($this->table)
            ->where('username', $username)
            ->notLike($this->primaryKey, $id)
            ->countAllResults();
    }

    //tambah user (cek username sudah ada atau belum)
    public function cek_tambah_user($username)
    {
        return $this->db
            ->table($this->table)
            ->where('username', $username)
            ->countAllResults();
    }

    //CRUD User
    public function tambah($data)
    {
        return $this->db
            ->table($this->table)
            ->insert($data);
    }
    public function edit($data, $id)
    {
        return $this->db
            ->table($this->table)
            ->update($data, array($this->primaryKey => $id));
    }
    public function hapus($id)
    {
        return $this->db
            ->table($this->table)
            ->delete(array($this->primaryKey => $id));
    }
    //end CRUD User
}