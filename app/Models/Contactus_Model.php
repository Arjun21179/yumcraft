<?php


namespace App\Models;

use CodeIgniter\Model;

class Contactus_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'contact_us';
    protected $primaryKey = 'contact_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled



    // --------Contact show desending order----------------------------------------------------------->
    public function contact_desending()
    {
        return $this->db->query('select * from contact_us where active=1 order by contact_id desc')->getResultArray();
    }


    // --------Contact delete----------------------------------------------------------->
    public function contact_deletedata($contact_id)
    {
       $this->db->table('contact_us')
                ->where('contact_id',$contact_id)
                ->delete();
        
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }




    // --------Contact delete----------------------------------------------------------->
    // deactivate attime data
    public function contactus_attime_deleteall_data($contact_id)
    {
          // deactivate logic
        //  $data['active']=2;

        //  return $this->db->table('contact_us')
        //                  ->whereIn('contact_id',$contact_id)
        //                  ->update($data);


        // delete data
          return $this->db->table('contact_us')
                          ->whereIn('contact_id',$contact_id)
                          ->delete();
    }






    

    
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  contact us (Frontend Side)  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    

}