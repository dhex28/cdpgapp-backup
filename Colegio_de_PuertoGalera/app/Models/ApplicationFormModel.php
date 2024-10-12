<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationFormModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'applicationform';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'first_name',
        'middle_initial',
        'last_name',
        'birth_date',
        'gender',
        'citizenship',
        'phone',
        'email',
        'street_address',
        'city',
        'state',
        'zip_code',
        'emergency_first_name',
        'emergency_relationship',
        'emergency_last_name',
        'emergency_email',
        'emergency_phone'
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
}
