<?php

namespace App\Models;

use CodeIgniter\Model;

class Soal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'soal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_mapel',
        'pertanyaan',
        'pilihan',
        'correct_answer',
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

    public function getSoalByMapel($id)
    {
        $query = $this->db->table('soal')
                ->where('id_mapel', $id)
                ->orderBy('id', 'RANDOM')
                ->get();
        return $query;
    }

    public function getSoal($id)
    {
        $query = $this->db->table('soal')
                ->where('id_mapel', $id)
                ->get();
        return $query;
    }
}
