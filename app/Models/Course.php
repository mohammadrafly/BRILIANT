<?php

namespace App\Models;

use CodeIgniter\Model;

class Course extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'course';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_mapel',
        'id_token_tutor',
        'hari',
        'start_time',
        'end_time',
        'status',
        'kode',
        'score'
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

    public function ExampsByToken($token)
    {
        $query = $this->db->table('course')
                ->select('
                    course.*, 
                    mapel.*,  
                    course.id as id_course,
                ')
                ->join('mapel', 'course.id_mapel = mapel.id')
                ->where('id_token_tutor', $token)
                ->get();
        return $query;
    }

    public function ExampsByID($id)
    {
        $query = $this->db->table('course')
                ->select('
                    course.*, 
                    mapel.*,  
                    course.id as id_course,
                ')
                ->join('mapel', 'course.id_mapel = mapel.id')
                ->where('course.id', $id)
                ->get();
        return $query;
    }

    public function Examps($id)
    {
        $query = $this->db->table('course')
                ->where('id', $id)
                ->get();
        return $query;
    }

    public function getDetailCourse()
    {
        $query = $this->db->table('course')
                ->select('
                    users.*,
                    users_detail.*,
                    users_detail_role_tutor.*,
                    mapel.*,
                    mapel.name As mapel_name,
                    users_detail.name AS user_name,
                    course.id AS id_course,
                    course.start_time AS start_time,
                    course.end_time AS end_time,
                    course.created_at AS created_at_course,
                    course.updated_at AS updated_at_course,
                    course.status AS status_course,
                    course.kode AS kode,
                    course.score AS score
                ')
                ->join('mapel', 'course.id_mapel = mapel.id')
                ->join('users_detail_role_tutor', 'course.id_token_tutor = users_detail_role_tutor.id_token_udrt')
                ->join('users_detail', 'course.id_token_tutor = users_detail.id_token_ud')
                ->join('users', 'course.id_token_tutor = users.id_token')
                ->where('users.role', 'tutor')
                ->get();
        return $query;
    }
}
