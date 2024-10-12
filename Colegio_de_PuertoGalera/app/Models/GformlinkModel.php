<?php

namespace App\Models;

use CodeIgniter\Model;

class GformlinkModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'google_forms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['form_link','created_at', 'show_link'];

     // Function to save the Google Form link
     public function saveFormLink($link)
     {
         return $this->insert(['form_link' => $link]);
     }
 
     // Function to retrieve the latest Google Form link
     public function getLatestFormLink()
     {
         // Fetch the latest record as an associative array
         $result = $this->orderBy('created_at', 'DESC')->first();
     
         // Check if the result is an array and return the link string if it exists
        // Return the link string and show_link value if they exist
        return $result ? [
            'form_link' => $result['form_link'],
            'show_link' => $result['show_link'],
        ] : null;
     }

     public function getAllUploadedLinks() {
        return $this->findAll(); // Adjust according to your database table and logic
    }
     
     

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
