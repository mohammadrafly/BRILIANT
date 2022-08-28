<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDetail extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users_detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'address',
        'sex',
        'phone_number',
        'bio',
        'dob',
        'id_token_ud',
        'wannabe'
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

    public function getTutorByMapel($id)
    {
        $query = $this->db->table('users_detail')
                ->select('
                    users.*,
                    users_detail.*, 
                    users_detail_role_tutor.*, 
                    mapel.name AS mapel_name
                ')
                ->join('users_detail_role_tutor', 'users_detail.id_token_ud = users_detail_role_tutor.id_token_udrt')
                ->join('mapel', 'users_detail_role_tutor.mapel = mapel.id')
                ->join('users', 'users_detail.id_token_ud = users.id_token')
                ->where('users_detail_role_tutor.mapel', $id)
                ->get();
        return $query;
    }
}
