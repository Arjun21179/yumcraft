<?php


namespace App\Models;

use CodeIgniter\Model;

class Gallery_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // gallery table details
    protected $table = 'gallery';
    protected $primaryKey = 'gallery_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled







   
    




    // ---------------------------------------------------------->
    // get gallery image data
    // public function get_image_data()
    // {
    //      $this->db->table('gallery')
    //                     ->select('*')
    //                     ->orderBy('gallery_id','DESC');
    //                     // ->get()
    //                     // ->getResultArray();

    //     return [
    //              'allgallery_img_desc'=>$this->paginate(50),
    //              'pager'=>$this->pager,
    //     ];
    // }




    // public function get_image_data()
    // {
    //     return [
    //         'allgallery_img_desc' => $this->orderBy('gallery_id', 'DESC')->paginate(10),
    //         'pager' => $this->pager,
    //     ];
    // }


    public function get_image_data()
    {
       return $this->db->table('gallery')
                        ->orderBy('gallery_id ','DESC')
                        ->get()
                        ->getResultArray();
    }







    // ---------------------------------------------------------------------------------------->
    // search value get data

    public function get_image_search_data($search_value)
    {
            return[
                'search_value_data_desc'=>$this->orderBy('gallery_id','DESC')->like('image',$search_value)->orLike('gallery_image_alt',$search_value)->paginate(10),
                'pager'=>$this->pager,
            ];
    }
    



    // gallery_img_attime_deleteAll
    public function gallery_attime_delete_all($gallery_id)
    {
        return $this->db->table('gallery')
            ->whereIn('gallery_id', $gallery_id)
            ->delete();
    }
}
