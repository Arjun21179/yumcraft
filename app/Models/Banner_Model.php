<?php


namespace App\Models;

use CodeIgniter\Model;

class Banner_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled






       
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxx  Admin Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


    // --------------------------------------------------->
    //  admin page desending display
    public function desending_banner()
    {
        return $this->db->query('select * from banner order by banner_id desc')->getResultArray();
    }



    // --------------------------------------------------->
    // insert banner details
    public function insert_banner($data)
    {
        $this->db->table('banner')
            ->insert($data);

        if ($this->db->affectedRows()) {
            return $data;
        } else {
            return false;
        }

    }


    // ---------------------------------------------------->
    // edit banner detials
    public function edit_banner($data, $banner_edit_id)
    {
        $this->db->table('banner')
            ->where('banner_id', $banner_edit_id)
            ->update($data);

        if ($this->affectedRows() == 1) {
            return $data;
        } else {
            return false;
        }
    }


    // ----------------------------------------------------->
    // delete banner details
    public function banner_delete($banner_id)
    {
        $this->db->table('banner')
            ->where('banner_id', $banner_id)
            ->delete();

        if ($this->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }


    // ----------------------------------------------------->
    // deactivate banner Image 
    public function deactivate_banner($banner_id)
    {
        $data['active'] = 0;

        return $this->db->table('banner')
            ->where('banner_id', $banner_id)
            ->update($data);
    }


    // ----------------------------------------------------->
    // deactivate banner Image 
    public function activate_banner($banner_id)
    {
        $data['active'] = 1;

        return $this->db->table('banner')
            ->where('banner_id', $banner_id)
            ->update($data);
    }


    // ----------------------------------------------------->
    // get only row data using ajax call
    public function banner_row_data($banner_id)
    {
        return $this->db->query('select * from banner where active=1 and banner_id="'.$banner_id.'"')->getRow();
    }





       
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxx  site Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

public function get_banner_image_site()
{
    return $this->db->query('select banner_title,banner_shortdescription,banner_site_img,banner_mobile_img,publish_date from banner where active=1 order by banner_id desc')->getResultArray();

}



}
