<?php

namespace App\Models;

use CodeIgniter\Model;

class Bridge extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bridge';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_bridge',
        'id_user'
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

    public function getBridges($token)
    {
        $query = $this->db->table('bridge')
                ->select('
                    jadwal.*,
                    users.*,
                    users_detail.*,
                    bridge.*,
                    bridge.id AS id_bridge
                ')
                ->join('jadwal', 'bridge.id_bridge = jadwal.bridge_token')
                ->join('users', 'bridge.id_user = users.id_token')
                ->join('users_detail', 'bridge.id_user = users_detail.id_token_ud')
                ->where('id_bridge', $token)
                ->get();
        return $query;
    }
}
