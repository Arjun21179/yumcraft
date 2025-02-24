<?php

namespace App\Models;

use CodeIgniter\Model;

class Rating_Leads_Model extends Model
{
    protected $table = 'rating_leads';
    protected $primaryKey = 'lead_id';





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxx Backend Section xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx>>>>
    // Recipes Comments
    // ---------------------------------------------------------->
    // get comments recipe
    public function comment_recipeslist()
    {
        return $this->db->table('rating_leads')
            ->select('*')
            ->where('flag', 1)
            ->orderBy('lead_id', 'DESC')
            ->get()->getResultArray();
    }



    // ---------------------------->
    // delete comments recipe
    public function delete_comments_recipe($lead_id)
    {
        return $this->db->table('rating_leads')
            ->where('lead_id', $lead_id)
            ->delete();
    }


    // 
    // active recipe comments check
    function active_recipe_comments($lead_id)
    {
        $data['active'] = 1;

        return $this->db->table('rating_leads')
            ->where('lead_id', $lead_id)
            ->update($data);
    }

    // 
    // deactive comments recipe check
    function deactive_recipe_comments($lead_id)
    {
        $data['active'] = 0;

        return $this->db->table('rating_leads')
            ->where('lead_id', $lead_id)
            ->update($data);
    }




    // 
    // deactivate comments recipe attime data
    public function comments_recipe_attime_deleteall_data($lead_id)
    {
        // deactivate logic
        //  $data['active']=2;

        //  return $this->db->table('rating_leads')
        //                  ->whereIn('lead_id',$lead_id)
        //                  ->update($data);


        // delete logic
        return $this->db->table('rating_leads')
            ->whereIn('lead_id', $lead_id)
            ->delete();
    }





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx>>>>
    // Blog Comments
    // ---------------------------------------------------------->
    // get comments Blog
    public function comment_blog_list()
    {
        return $this->db->table('rating_leads')
            ->select('*')
            ->where('flag', 2)
            ->orderBy('lead_id', 'DESC')
            ->get()->getResultArray();
    }



    // ---------------------------->
    // delete comments blog
    public function delete_comments_blog($lead_id)
    {
        return $this->db->table('rating_leads')
            ->where('lead_id', $lead_id)
            ->delete();
    }


    // ---------------------------->
    // active blog comments check
    function active_blog_comments($lead_id)
    {
        $data['active'] = 1;

        return $this->db->table('rating_leads')
            ->where('lead_id', $lead_id)
            ->update($data);
    }

    // ---------------------------->
    // deactive comments blog check
    function deactive_blog_data_comments($lead_id)
    {
        $data['active'] = 0;

        return $this->db->table('rating_leads')
            ->where('lead_id', $lead_id)
            ->update($data);
    }




    // ---------------------------->
    // deactivate comments article attime data
    public function comments_blog_attime_deleteall_data($lead_id)
    {
        // deactivate logic
        //  $data['active']=2;

        //  return $this->db->table('rating_leads')
        //                  ->whereIn('lead_id',$lead_id)
        //                  ->update($data);


        // delete logic
        return $this->db->table('rating_leads')
            ->whereIn('lead_id', $lead_id)
            ->delete();
    }






    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxx Frontend Section xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    public function get_sectionwise_rating_leads($flag_id, $rel_id)
    {
        // flag id receipe=1 and article =2
        return $this->db->table('rating_leads')
            ->where('active', 1)
            ->where('flag', $flag_id)
            ->where('rel_id', $rel_id)
            ->orderBy('lead_id', 'DESC')
            ->get()->getResult();
    }
}
