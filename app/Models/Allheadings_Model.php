<?php

namespace App\Models;

use CodeIgniter\Model;

class Allheadings_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'all_headings';
    protected $primaryKey = 'section_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled






    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxx  Admin Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx



    // -------------------------------------------->
    // get a section
    public function get_a_section($flag)
    {
        return $this->db->table('all_headings')
            ->select('*')
            ->where('flag', $flag)
            ->where('active', 1)
            ->get()->getRow();
    }


    // ------------------------------------------------->
    // update section for home page section
    public function update_section($section_id, $data)
    {
        // echo $section_id;
        // print_r($data);
        // die;
        $this->db->table('all_headings')
            ->where('section_id', $section_id)
            ->update($data);

        $insertedRows = $this->db->affectedRows();
        if ($insertedRows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    
}
