<?php


namespace App\Models;

use CodeIgniter\Model;

class Video_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'video';
    protected $primaryKey = 'video_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled







    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxx Admin Section  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


// -----video data desending----------------------------------------------------------->
// show descending data
    public function video_desending()
    {
        return $this->db->query('select * from video where active=1 order by video_id desc')->getResultArray();
    }


// -----video data insert----------------------------------------------------------->
// add data insert
    public function video_add_data($data)
    {
       $this->db->table('video')
                ->insert($data);

        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }


// -----video data ----------------------------------------------------------->
// add data insert
public function video_edit_data($data,$video_edit_id)
{ 
    $this->db->table('video')
             ->where('video_id',$video_edit_id)
             ->update($data);

    if($this->affectedRows()==1)
    {
        return true;
    }
    else 
    {
        return false;
    }
}




// -----video data delete----------------------------------------------------------->
// delete data 
public function video_deletedata($video_id)
{
  $this->db->table('video')
            ->where('video_id',$video_id)
            ->delete();

    if($this->affectedRows()==1)
    {
        return true;
    }
    else{
        return false;
    }
}




   // get only row data using ajax call
   public function video_row_data($video_id)
   {
       return $this->db->query('select * from video where active=1 and video_id="'.$video_id.'"')->getRow();
   }









   
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxx Site Section  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    // get all video data for video section
    public function site_get_all_video_data()
    {
        return [
            'get_all_video'=>$this->orderBy('video_id','DESC')->paginate(10),
            'pager'=>$this->pager,
        ];
    }


}
