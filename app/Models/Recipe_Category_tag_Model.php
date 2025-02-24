<?php


namespace App\Models;

use CodeIgniter\Model;

class Recipe_Category_tag_Model extends Model
{
  // 

  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // table details
  protected $table = 'recipe_category_tag';
  protected $primaryKey = 'recipe_category_tag_id';
  // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled



  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // Recipe relation data
  public function allcategory_tag_id()
  {
    return $this->db->query('select * from recipe_category_tag where active=1')->getResultArray();

    //  echo '<pre>';
    //  print_r($result);
    //  die;
  }




  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  public function relation_category_tag_id($re_id)
  {
    return $this->db->query('select recipe_category_tag_id ,recipe_id,category_id,tag_id from recipe_category_tag where active=1 and recipe_id="' . $re_id . '" order by recipe_id desc')->getRow();

    //  echo '<pre>';
    //  print_r($result);
    //  die;
  }



  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // get category tag data name for recipes section
  public function relation_category_tag_id_data()
  {
    $re_id = $this->db->query('select re_id from recipes where active=1')->getRow();

    return $this->db->query('select recipe_category_tag_id ,recipe_id,category_id,tag_id from recipe_category_tag where active=1')->getResultArray();
    // echo '<pre>';
    // print_r($data);
    // die;

  }


  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // get category id
  public function get_receipewise_categories($re_id)
  {
    $receipe_row = $this->db->query('select recipe_id,category_id from recipe_category_tag where active=1 and recipe_id=' . $re_id)->getRow();
    return $receipe_row->category_id;
  }



  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // get category id for recipes view section
  public function all_relational_category()
  {
    return $this->db->query('select recipe_id,category_id from recipe_category_tag where active=1')->getResultArray();
  }


  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // get tag id for recipes view section
  public function all_relational_tag()
  {
    return $this->db->query('select recipe_id,tag_id from recipe_category_tag where active=1')->getResultArray();
  }


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
public function all_relational_author()
{
  return $this->db->query('select recipe_id,author_id from recipe_category_tag where active=1')->getResultArray();
}






  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // recipe delete one row
  public function recipe_id_delete($re_id)
  {
    $this->db->table('recipe_category_tag')
      ->where('recipe_id', $re_id)
      ->delete();

    $deleteRows = $this->db->affectedRows();

    if ($deleteRows > 0) {
      return true;
    } else {
      return false;
    }
  }


  

  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // recipe delete at time all data using checkbox
  public function recipe_id_delete_checkbox_data($re_id)
  {
    $this->db->table('recipe_category_tag')
      ->whereIn('recipe_id', $re_id)
      ->delete();

    $deleteRows = $this->db->affectedRows();

    if ($deleteRows > 0) {
      return true;
    } else {
      return false;
    }
  }
}
