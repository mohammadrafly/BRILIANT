<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaction extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_token_siswa',
        'id_token_tutor',
        'token_transaksi',
        'status',
        'is_active',
        'receipt',
        'discount',
        'total',
        'mapel'
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

    public function getDetailTransaction($token)
    {
        $query = $this->db->table('transactions')
                ->select('
                    users_detail_role_tutor.*,
                    transactions.*, 
                    users_detail.*,
                    mapel.*,
                    users_detail.name AS user_name,
                    mapel.name AS nama_mapel,
                    transactions.id AS transaction_id,
                ')//mapel.name as nama_mapel,
                //->join('mapel', 'users_detail_role_tutor.mapel = mapel.id')
                ->join('mapel', 'transactions.mapel = mapel.id')
                ->join('users_detail', 'transactions.id_token_tutor = users_detail.id_token_ud')
                ->join('users_detail_role_tutor', 'transactions.id_token_tutor = users_detail_role_tutor.id_token_udrt')
                ->where('transactions.id_token_siswa', $token)
                ->get();
        return $query;
    }
}
