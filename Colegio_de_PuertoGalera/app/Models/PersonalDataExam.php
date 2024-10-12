<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalDataExam extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'personaldataexam';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
    'LastName',
    'FirstName',
    'MiddleName',
    'DateOfBirth',
    'Gender',
    'Nationality',
    'Religion',
    'Email',
    'PlaceOfBirth',
    'CivilStatus',
    'ContactNumber',
    'q1',
    'q2',
    'q3',
    'q4',
    'q5',
    'q6',
    'q7',
    'q8',
    'q9',
    'q10',
    'q11',
    'q12',
    'q13',
    'q14',
    'q15',
    'q16',
    'q17',
    'q18',
    'q19',
    'q20',
    'q21',
    'q22',
    'q23',
    'q24',
    'q25',
    'q26',
    'q27',
    'q28',
    'q29',
    'q30',
    'q31',
    'q32',
    'q33',
    'q34',
    'q35',
    'q36',
    'q37',
    'q38',
    'q39',
    'q40',
    'q41',
    'q42',
    'q43',
    'q44',
    'q45',
    'q46',
    'q47',
    'q48',
    'q49',
    'q50', 'result'];

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
