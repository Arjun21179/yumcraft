<?php


namespace App\Models;

use CodeIgniter\Model;

class Category_Model extends Model
{

  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // table details
  protected $table = 'category';
  protected $primaryKey = 'c_id';
  // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled







  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxx  Admin Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


  // xxxxxxxxxAll category Desendingxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // view category
  public function allcategory()
  {
    return $this->db->query('select * from category where flag=1 order by c_id desc')->getResultArray();
    //  echo '<pre>';
    //  print_r($result);
    //  die;
  }


  // xxxxxxxxxAll Allergen category Desendingxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // view allergen category
  public function all_allergen_category()
  {
    return $this->db->query('select * from category where flag=2 order by c_id desc')->getResultArray();
  }


  // xxxxxxxxxAll Allergy Free category Desending xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // view allergy free category
  public function all_allergyfree_category()
  {
    return $this->db->query('select * from category where flag=2 order by c_id desc')->getResultArray();
  }



  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // deactivate activate category
  // ---------Deactivate category
  public function deactivate_category($c_id)
  {
    $data['active'] = 0;
    return $this->db->table('category')
      ->where('c_id', $c_id)
      ->update($data);
  }

  // ---------Activate category
  public function activate_category($c_id)
  {
    $data['active'] = 1;
    return $this->db->table('category')
      ->where('c_id', $c_id)
      ->update($data);
  }


  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // add category
  public function addcategory_insert($data)
  {
    $results = $this->db->table('category')->insert($data);

    // Check if the insert was successful
    if ($this->db->affectedRows() == 1) {
      // Fetch the inserted data
      return $data;
    } else {
      // Insertion failed
      return false;
    }
  }


  // get single category
  public function single_category($c_id)
  {
    return $this->db->query('select * from category where c_id="' . $c_id . '"')->getRow();
  }

  // update category
  public function edit_categorydata($data, $c_id)
  {
    $this->db->table('category')
      ->where('c_id', $_POST['c_id'])
      ->update($data);

    $insertedRows = $this->db->affectedRows();
    if ($insertedRows > 0) {
      return true;
    } else {
      return false;
    }
  }



  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // category delete
  function category_deletedata($c_id)
  {

    // $re_id = $this->db->query('select re_id from recipes where active=1 and re_category="' . $c_id . '"')->getResultArray();

    // $this->db->table('recipes')
    //   ->where('re_id', $re_id)
    //   ->delete();

    $this->db->table('category')
      ->where('c_id', $c_id)
      ->delete();



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



  // get category header footer menu
  public function get_on_menu_category()
  {
    return $this->db->query('select c_id,c_name,c_url from category where active=1 and flag=1 and set_on_menu=1 order by c_id desc')->getResultArray();
  }

  // get category for home page
  public function get_category_data_site()
  {
    return $this->db->query('select c_id,c_name,c_img,c_url from category where active=1 and flag=1 order by c_id desc')->getResultArray();
  }


  // get category allergen category show the tag from img
  public function get_category_data_site_tag()
  {
    return $this->db->query('select c_id,c_name,c_img,c_url from category where active=1 order by c_id desc')->getResultArray();
  }



  // get category data also alergen category data
  public function get_category_and_allergencategory_data_list($flag)
  {
    return $this->db->table('category')
      ->where('flag', $flag)
      ->where('active',1)
      ->get()
      ->getResultArray();
  }


  // -------------------------------------------------------------------->
  // get allergen category data
  public function get_Allergen_category_data_site()
  {
    return $this->db->query('select c_id,c_name,c_img,c_url,flag from category where active=1 and flag=2 order by c_id desc')->getResultArray();
  }

  // get allergen category header footer menu
  public function get_on_menu_Allergencategory()
  {
    return $this->db->query('select c_id,c_name,c_url from category where active=1 and flag=2 and set_on_menu=1 order by c_id desc')->getResultArray();
  }






  // -------------------------------------------------------------------------------------------------------------------------------------------------->
  // get right side category allergen for allergen page
  public function get_category_data_site_allegenpage()
  {
    return $this->db->table('category')
      ->where('flag', 2)
      ->where('active',1)
      ->orderBy('c_id', 'DESC')
      ->get()
      ->getResultArray();
  }




  // -------------------------------------------------------------------------------------------------------------------------------------------------->
  // get allergen all categories for allergen view page
  public function get_all_categories_allergen()
  {
    return $this->db->table('category')
    ->where('flag', 2)
    ->where('active',1)
    ->orderBy('c_id', 'DESC')
    ->get()
    ->getResultArray();
  }



  // -------------------------------------------------------------------->
  // homepage_section_category_data
  public function homepage_section_category($array)
  {

    return $this->db->table('category')
      ->whereIn('c_id', $array)
      ->where('active',1)
      ->get()
      ->getResultArray();
  }

  // -------------------------------------------------------------------->
  // get category Url
  public function get_category_url($c_url)
  {
    return $this->db->table('category')
      ->select('*')
      ->where('active', 1)
      ->where('c_url', $c_url)
      ->get()->getRow();
  }



    // -------------------------------------------------------------------->
  // get category Url then active=0
  public function forbackend_get_category_url($c_url)
  {
    return $this->db->table('category')
      ->select('*')
      ->where('c_url', $c_url)
      ->get()->getRow();
  }


  public function send_all_category_wise_receipe_cnt()
  {
    $builder = $this->db->table('category c');
    $builder->select('c.c_id, c.c_name, COUNT(rct.recipe_id) AS recipe_count');
    $builder->join('recipe_category_tag rct', 'c.c_id = rct.category_id', 'left');
    $builder->join('recipes r', 'rct.recipe_id = r.re_id AND r.active = 1', 'left'); // Join recipes table and filter active ones
    $builder->where('FIND_IN_SET(c.c_id, rct.category_id) > 0');
    $builder->where('r.active', 1); // Additional condition to ensure recipes are active
    $builder->groupBy('c.c_id, c.c_name');
    $builder->orderBy('c.c_id', 'ASC');

    $query = $builder->get();

    return $query->getResultArray();
  }



  // ----------------------------------------------------------------------------------------------------->
  // for recipes category details page get category show 
  // public 
  public function get_multiple_category($category_id)
  {
    return $this->db->query("SELECT * FROM category WHERE active=1 and c_id IN($category_id)")->getResultArray();
  }



    // ----------------------------------------------------------------------------------------------------->
    // check category url or not in the website
   public function find_category_url($url)
   {
    return $this->db->table('category')
    ->where('c_url', $url)
    ->get()
    ->getRow();
   }

  
}
