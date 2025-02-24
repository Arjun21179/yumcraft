<?php


namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled






    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxx  Admin Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //  login logic model
    public function loginuser($email)
    {

        if (!empty($email)) {
            $result = $this->db->table('admin')
                // ->select('id')
                ->where('email', $email)
                ->get();

            if (count($result->getResultArray()) == 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // profile admin details
    public function profiledata()
    {
        $results = $this->db->table('admin')
            ->get();

        if (count($results->getResultArray()) == 1) {
            return $results->getRowArray();
        } else {
            return false;
        }
    }

    // ----------------------------------------------------------------->
    public function adminprofile_update($data)
    {
        $this->db->table('admin')->where('id', $_POST['id'])->update($data);
        $insertedRows = $this->db->affectedRows();

        if ($insertedRows > 0) {
            return true;
        } else {
            return false;
        }
    }







    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxx  site Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    public function get_search_data_site_ajax($search_value)
    {
        // return $this->db->table('recipes')
        //         ->select('re_id, re_title')  // Specify the columns you want to select
        //         ->where('active !=', 2)
        //         ->groupStart()
        //             ->like('re_title', $search_item)
        //             // ->orLike('re_description', $search_item)  // Uncomment if you want to search in description as well
        //         ->groupEnd()
        //         ->orderBy('re_id', 'DESC')
        //         ->get()
        //         ->getResultArray();  // Use getResultArray() to fetch all matching records as an array


        // return $this->db->table('recipes')
        //     ->select('re_id,re_title,re_images')
        //     ->like('re_title', $search_item)
        //     ->orderBy('re_id', 'DESC')
        //     ->limit(30)
        //     ->get()
        //     ->getResultArray();  // Use getResultArray() to fetch all matching records as an array


        return $this->db->table('recipes')
            ->select('re_id, re_title, re_titleurl')
            ->where('active', 1)
            ->groupStart() // Start grouping the LIKE conditions
            ->like('re_title', $search_value)
            ->orLike('ingredients', $search_value)
            ->orLike('method', $search_value)
            ->orLike('free_from', $search_value)
            ->groupEnd() // End grouping the LIKE conditions
            ->orderBy('re_id', 'DESC')
            ->limit(20)
            ->get()
            ->getResultArray();
    }
}
