<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email',
        'password',
        'avatar',
        'role',
        'id_token',
        'is_verified',
        'bridge_token'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUnverifiedUser()
    {
        $query = $this->db->table('users')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('is_verified !=', 'yes')
                ->get();
        return $query;
    }

    public function getUserDetailSiswa()
    {
        $query = $this->db->table('users')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('role', 'siswa')
                ->get();
        return $query;
    }

    public function getUserDetailTutor()
    {
        $query = $this->db->table('users')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('role', 'tutor')
                ->get();
        return $query;
    }


    public function getSingleUnverifiedUser($token)
    {
        $query = $this->db->table('users')
                ->where('id', $token)
                ->get();
        return $query;
    }

    public function getAllUser()
    {
        $query = $this->db->table('users')
                ->get();
        return $query;
    }

    public function getAllAdmin()
    {
        $query = $this->db->table('users')
                ->where('role', 'admin')
                ->get();
        return $query;
    }

    public function getAllTutor()
    {
        $query = $this->db->table('users')
                ->select('
                    users.*,
                    users_detail.*,
                    users_detail_role_tutor.*,
                    mapel.*,
                    mapel.name AS mapel_name,
                    users_detail.name AS user_name
                ')
                ->join('users_detail_role_tutor', 'users.id_token = users_detail_role_tutor.id_token_udrt')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->join('mapel', 'users_detail_role_tutor.mapel = mapel.id')
                ->where('role', 'tutor')
                ->get();
        return $query;
    }

    public function getAllSiswa()
    {
        $query = $this->db->table('users')
                ->join('users_detail_role_siswa', 'users.id_token = users_detail_role_siswa.id_token_udrs')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('role', 'siswa')
                ->get();
        return $query;
    }

    public function getAllSiswaByTokenTutor($token)
    {
        $query = $this->db->table('users')
                ->join('users_detail_role_siswa', 'users.id_token = users_detail_role_siswa.id_token_udrs')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('users_detail_role_siswa.token_tutor', $token)
                ->where('bridge_token', NULL)
                ->get();
        return $query;
    }

    public function getSiswaSingle($email)
    {
        $query = $this->db->table('users')
                ->select('
                    users.*, 
                    users_detail.*, 
                    users_detail_role_siswa.*, 
                    users_detail_role_siswa.id as id_ud
                ')
                ->join('users_detail_role_siswa', 'users.id_token = users_detail_role_siswa.id_token_udrs')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('email', $email)
                ->get();
        return $query;
    }

    public function getTutorByMapel($id)
    {
        $query = $this->db->table('users')
                ->select('
                    users.*, 
                    users_detail.*, 
                    users_detail_role_tutor.*, 
                    mapel.name as namamapel,
                ')
                ->join('mapel', 'mapel.id = users_detail_role_tutor.mapel')
                ->join('users_detail_role_tutor', 'users.id_token = users_detail_role_tutor.id_token_udrt')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('users_detail_role_tutor.mapel', $id)
                ->get();
        return $query;
    }

    public function getSingleTutor($email)
    {
        $query = $this->db->table('users')
                ->join('users_detail_role_tutor', 'users.id_token = users_detail_role_tutor.id_token_udrt')
                ->join('users_detail', 'users.id_token = users_detail.id_token_ud')
                ->where('email', $email)
                ->get();
        return $query;
    }
}
