<?php

namespace App\Models;

use CodeIgniter\Model;

class Jadwal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'bridge_token',
        'id_token_tutor',
        'id_mapel',
        'start',
        'end',
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

    public function getDetailJadwal($token)
    {
        $query = $this->db->table('jadwal')
                ->select('
                    users_detail_role_tutor.*,
                    mapel.*,
                    jadwal.*,
                    mapel.id AS id_mapel
                    
                ')
                ->join('mapel', 'jadwal.id_mapel = mapel.id')
                ->join('users_detail_role_tutor', 'jadwal.id_token_tutor = users_detail_role_tutor.id_token_udrt')
                ->where('jadwal.id_token_tutor', $token)
                ->get();
        return $query;
    }

    public function getDetailJadwal2($token)
    {
        $query = $this->db->table('jadwal')
                ->select('
                    users_detail_role_tutor.*,
                    users_detail.*,
                    mapel.*,
                    jadwal.*,
                    mapel.id AS id_mapel,
                    users_detail.name AS user_name
                ')
                ->join('users_detail', 'jadwal.id_token_tutor = users_detail.id_token_ud')
                ->join('mapel', 'jadwal.id_mapel = mapel.id')
                ->join('users_detail_role_tutor', 'jadwal.id_token_tutor = users_detail_role_tutor.id_token_udrt')
                ->where('jadwal.bridge_token', $token)
                ->get();
        return $query;
    }
}
