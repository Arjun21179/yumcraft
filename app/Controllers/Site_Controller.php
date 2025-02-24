<?php

namespace App\Controllers;

// models
use App\Models\Admin_Model;
use App\Models\Category_Model;
use App\Models\Recipes_Model;
use App\Models\Recipe_Category_tag_Model;
use App\Models\Video_Model;
use App\Models\Contactus_Model;
use App\Models\Blog_Model;
use App\Models\Rating_Leads_Model;
use App\Models\Relation_recipe_category_tag_Model;
use App\Models\Gallery_Dynamic_Model;




// all headings banner
use App\Models\Allheadings_Model;
// logo info
use App\Models\Manage_Pages_Model;
// banner image
use App\Models\Banner_Model;


use CodeIgniter\I18n\Time;


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


class Site_Controller extends BaseController
{


  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // constructor section

  public $session;
  public $db;
  public $upload;
  public $pagination;


  // models variable
  public $Admin_Model;
  public $Category_Model;
  public $Recipes_Model;
  public $Recipe_Category_tag_Model;
  public $Video_Model;
  public $Contactus_Model;
  public $Blog_Model;
  public $Manage_Pages_Model;
  public $Banner_Model;
  public $All_headings;
  public $Rating_Leads_Model;
  public $Relation_recipe_category_tag_Model;
  public $Gallery_Dynamic_Model;



  public function __construct()
  {
    helper("form");
    date_default_timezone_set('Asia/Kolkata');

    $this->session = \Config\Services::session();
    $validation = \Config\services::validation();
    $this->db = \Config\Database::connect();
    $this->upload = service('upload');
    $this->pagination = service('pager');


    // Models
    $this->Admin_Model = new Admin_Model();
    $this->Category_Model = new Category_Model();
    $this->Recipes_Model = new Recipes_Model();
    $this->Recipe_Category_tag_Model = new Recipe_Category_tag_Model();
    $this->Video_Model = new Video_Model();

    $this->Contactus_Model = new Contactus_Model();
    $this->Blog_Model = new Blog_Model();
    $this->All_headings = new Allheadings_Model();
    $this->Rating_Leads_Model = new Rating_Leads_Model();
    $this->Gallery_Dynamic_Model = new Gallery_Dynamic_Model();


    // logo info
    $this->Manage_Pages_Model = new Manage_Pages_Model();
    // banner image 
    $this->Banner_Model = new Banner_Model();

    // relation model
    $this->Relation_recipe_category_tag_Model = new Relation_recipe_category_tag_Model();


  }









  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx




  // xxxxxxx site home page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // main home page
  public function site_home()
  {
    // echo $_GET['s'];
    // die;
    if (isset($_GET['s']) && !empty($_GET['s'])) {


      if (!empty(($_GET['s']))) {
        $data = $this->search_result($_GET['s']);
      } else {
        echo "";
      }


      // get set on header footer menu
      $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();


      $data['content'] = "site/search_result";
      return view('site/layout', $data);
    } else {


      // get set on header footer menu
      $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

      // get header menu for allergen category
      $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();


      // logo favicon image
      $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();

      // categories data list
      $data['category_data'] = $this->Category_Model->get_category_data_site();

      // banner image
      $data['banner_image'] = $this->Banner_Model->get_banner_image_site();


      // get video recipes for home page video
      $data['video_recipes'] = $this->Recipes_Model->get_video_recipes_data();







      // -------------------------------------------------------------------------------------------------start>
      // home page Allergen category section
      $homepage_allergencategory_section = $this->All_headings->get_a_section('homepage-Allergen_category-section');
      $category_id_allergenfree_categorysection = $homepage_allergencategory_section->category_id;
      $data['homepage_allergen_category_section'] = $homepage_allergencategory_section;

      if (!empty($category_id_allergenfree_categorysection)) {
        $array = explode(",", $category_id_allergenfree_categorysection);
      } else {
        $array = [];
      }


      // only decided allergen category
      $data['homepage_Allergencategory_section_data'] = $this->Category_Model->homepage_section_category($array);


      // show the all list allergen category for header
      $data['all_allergen_category_data'] = $this->Category_Model->get_Allergen_category_data_site();



      // -------------------------------------------------------------------------------------------------start>
      // home page category section
      $homepage_category_section = $this->All_headings->get_a_section('homepage-category-section');
      $category_cid_categorysection = $homepage_category_section->category_id;
      $data['homepage_category_section'] = $homepage_category_section;

      if (!empty($category_cid_categorysection)) {
        $array = explode(",", $category_cid_categorysection);
      } else {
        $array = [];
      }


      // only decided category
      $data['all_main_category_data'] = $this->Category_Model->homepage_section_category($array);



      // -----------------------------------------------------------------------------------------------start>
      // home page Youtube section
      $homepage_youtube_sec = $this->All_headings->get_a_section('homepage-youtube-section');
      $recipe_ids = $homepage_youtube_sec->recipe_ids; // Access the heading_id from the returned array
      $data['homepage_youtube_sec'] = $homepage_youtube_sec;


      if (!empty($recipe_ids)) {
        $array = explode(",", $recipe_ids);
        // Process the array as needed
      } else {
        // Handle the case where the string is empty or not set
        $array = [];
      }

      $data['homepage_youtube_sec_recipes'] = $this->Recipes_Model->homepage_section_recipes($array);


      // -----------------------------------------------------------------------------------------------start>
      // home page first section
      $homepage_first_sec = $this->All_headings->get_a_section('homepage-first-section');
      $recipe_ids = $homepage_first_sec->recipe_ids; // Access the heading_id from the returned array
      $data['homepage_first_sec'] = $homepage_first_sec;


      // if (!empty($recipe_ids)) {
      //   $array = explode(",", $recipe_ids);
      //   // Process the array as needed
      // } else {
      //   // Handle the case where the string is empty or not set
      //   $array = [];
      // }

      // $data['homepage_first_sec_recipes'] = $this->Recipes_Model->homepage_section_recipes($array);


      // ------------------------->
      // get new recipe show query  this use new code
      $data['homepage_first_sec_recipes'] = $this->db->table('recipes')
        ->where('active', 1)
        ->orderBy('re_id', 'DESC')
        ->limit(5)
        ->get()
        ->getResultArray();



      // -------------------------------------------------------------------------------------------------start>
      // home page second section
      $data['homepage_second_section'] = $this->All_headings->get_a_section('homepage-second-section');


      // -------------------------------------------------------------------------------------------------start>
      // home page third section
      $homepage_third_section = $this->All_headings->get_a_section('homepage-third-section');
      $recipe_ids_forthirdsection = $homepage_third_section->recipe_ids;
      $data['homepage_third_section'] = $homepage_third_section;

      if (!empty($recipe_ids_forthirdsection)) {
        $array = explode(",", $recipe_ids_forthirdsection);
        // Process the array as needed
      } else {
        // Handle the case where the string is empty or not set
        $array = [];
      }

      $data['homepage_third_sec_recipes'] = $this->Recipes_Model->homepage_section_recipes($array);


      // -------------------------------------------------------------------------------------------------start>
      // home page four section
      // get blog
      $homepage_four_section = $this->All_headings->get_a_section('homepage-four-section');
      $blog_ids_fourirdsection = $homepage_four_section->blog_ids;
      $data['homepage_four_section'] = $homepage_four_section;

      if (!empty($blog_ids_fourirdsection)) {
        $array = explode(",", $blog_ids_fourirdsection);
        // Process the array as needed
      } else {
        // Handle the case where the string is empty or not set
        $array = [];
      }

      // $data['homepage_four_sec_blog'] = $this->Blog_Model->homepage_section_blog($array);
      //  this is the old code 

      // this is the new code 
      $data['homepage_four_sec_blog'] = $this->db->table('blog')
        ->where('active', 1)
        ->orderBy('blog_id', 'DESC')
        ->limit(5)
        ->get()
        ->getResultArray();

      // xxxxxxxxxxxxxxxxxxxxxxx


      // for home page 5 recipes
      $data['limited_recipes_forhomepage'] = $this->Recipes_Model->limited_recipes_forhomepage();

      // echo '<pre>';
      // print_r($data['all_recipes']);
      // die;



      // -------------------------------------------------------------------->
      // get header recipe image 
      $data['get_meta_img_in_recipe'] = $this->db->table('recipes')
        ->orderBy('re_id', 'DESC')
        ->get()
        ->getRow();

      // get blog meta image
      $data['get_meta_img_in_blog'] = $this->db->table('blog')
        ->orderBy('blog_id', 'DESC')
        ->get()
        ->getRow();

      // get category data meta image
      $data['get_meta_img_in_category'] = $this->db->table('category')
        ->orderBy('c_id', 'DESC')
        ->get()
        ->getRow();


      $data['content'] = "site/home_page";
      return view('site/layout', $data);
    }
  }








  // ---------- SEARCH LOGIC------------------------------------------------------------------------->
  // search logic 
  public function site_search_logic()
  {

    //  javascript logic
    $search_value = $_POST['search_item'];

    $results = $this->Admin_Model->get_search_data_site_ajax($search_value);

    $response = [
      'status' => 'success',
      'results' => $results
    ];

    return  $this->response->setJSON($response);
  }



  // ----------------------------------------->
  // search output page
  public function search_result($search_value)
  {

    if (!empty($search_value)) {

      $pages = $this->Recipes_Model->get_search_data_site($search_value);
      $data['search_output'] = $pages['get_search_output'];
      $data['pager'] = $pages['pager'];
    }


    // for right section popular recipe show
    $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();



    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    $data['title'] = "Search Page";
    return $data;
    // $data['content'] = "site/search_result";
    // return view('site/layout', $data);
  }



  // xxxxxxx recipe or category check and then call the functions  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // url is recipe or category checking function
  public function recipe_or_category($recipe_category_url = '')
  {

    if (!empty($recipe_category_url)) {

      // check url in category table
      $c_id = $this->db->table('category')
        ->select('c_id')
        ->where('c_url', $recipe_category_url)
        ->get()
        ->getRow();


      if (!empty($c_id)) {
        return $this->category_visedisplay_recipes($recipe_category_url);
      } else {

        // check url in recipes table
        $re_id = $this->db->table('recipes')
          ->select('re_id')
          ->where('re_titleurl', $recipe_category_url)
          ->get()
          ->getRow();

        if (!empty($re_id)) {
          return $this->details_page($recipe_category_url);
        }
      }
    } elseif ($recipe_category_url == 'recipe') {

      return $this->site_recipe_view();
    } elseif ($recipe_category_url == 'allergen-recipe') {

      // return $this->site_allergen_recipe_view();
      return redirect()->to('allergen-recipe');
    }
  }



  // xxxxxxx site recipe page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // recipe  page
  public function site_recipe_view()
  {


    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // for right section popular recipe show
    $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();

    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();



    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = "Recipe Page";

    $data['content'] = "site/recipe_page";
    return view('site/layout', $data);
  }










  // xxxxxxx allergen recipe page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // allergen  page
  public function site_allergen_recipe_view()
  {


    // ------------------------- start this is header and right side section lgoic 
    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();


    // categories Allegen Right side data list
    $data['category_data_allergen_right_side'] = $this->Category_Model->get_category_data_site_allegenpage();


    $c_id = '';

    foreach ($data['category_data_allergen_right_side'] as $row) {
      // for right section popular recipe show
      $c_id .= $row['c_id'] . ',';
    }


    $multiple_id = rtrim($c_id, ',');


    $category_id_righsie = explode(',', $multiple_id);
    $data['popular_recipe_reighside_category_and_allergen_category'] = $this->Recipes_Model->get_popular_recipe_category_and_allergencategory_page($category_id_righsie);




    // get all allergen categories data
    $data['allergen_categories_for_allergenpage'] = $this->Category_Model->get_all_categories_allergen();





    //  -----------------------Start Middle Content section
    // get middel content recipe data
    // check recipe with category
    // $category_id=explode(',',$multiple_id);
    // $pages = $this->Recipes_Model->get_all_allergenrecipe_for_allergenrecipe_section($category_id);
    // $data['all_allergenrecipe_section'] = $pages['allcategoryise_recipe_desending'];
    // $data['pager'] = $pages['pager'];
    // $data['total'] = $pages['total'];



    // get all relatable data
    // $data['all_relationtable_data'] = $this->Relation_recipe_category_tag_Model->get_relationtable_data();

    // categories data list show the category allergen category tag on the img
    // $data['category_data_tag'] = $this->Category_Model->get_category_data_site_tag();


    // -------------------------------------------------------------------->
    // get header recipe image 
    $data['get_meta_img_in_recipe'] = $this->db->table('recipes')
      ->orderBy('re_id', 'DESC')
      ->get()
      ->getRow();

    // get blog meta image
    $data['get_meta_img_in_blog'] = $this->db->table('blog')
      ->orderBy('blog_id', 'DESC')
      ->get()
      ->getRow();

    // get category data meta image
    $data['get_meta_img_in_category'] = $this->db->table('category')
      ->where('flag', 2)
      ->orderBy('c_id', 'DESC')
      ->get()
      ->getRow();
    // -------------------------------------------------------------------->




    // ----------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = "Allergen Page";

    $data['content'] = "site/allergen_page";
    return view('site/layout', $data);
  }




  // public function index()
  // {
  //      $categoryIds = [78,79,80,81, 82, 83, 84,85,86];

  //      $recipeModel = new Recipes_Model();
  //      $recipes = $recipeModel->getRecipesByCategory($categoryIds);


  //      $data = [
  //          'recipes' => $recipes
  //      ];


  //       echo '<pre>';
  //       print_r($data);
  //       die;
  // }





  // xxxxxxx gallery recipe page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // gallery recipe page
  public function site_gallery_recipe_view()
  {

    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();


    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    $pages = $this->Gallery_Dynamic_Model->get_allgallery_img();
    $data['all_gallery_recipe_img'] = $pages['get_all_gallery_dynamic'];
    $data['pager'] = $pages['pager'];


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = "Recipe Gallery";

    $data['content'] = "site/gallery_page";
    return view('site/layout', $data);
  }









  // xxxxxxx video recipe page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // video recipe page
  public function site_video_recipe_view()
  {
    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();

    // get all video data
    $pages = $this->Video_Model->site_get_all_video_data();
    $data['all_video_section'] = $pages['get_all_video'];
    $data['pager'] = $pages['pager'];


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = "Recipe video";

    $data['content'] = "site/video_page";
    return view('site/layout', $data);
  }










  // xxxxxxx video recipe page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // video recipe page
  public function site_podcast_view()
  {
    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = "Podcast";

    $data['content'] = "site/podcast_page";
    return view('site/layout', $data);
  }








  // xxxxxxx site Details page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // recipe details page
  public function details_page($re_titleurl): mixed
  {

    $data = $this->Recipes_Model->single_details_recipe($re_titleurl);
    //  title check last of this function title
    if (!empty($data['currentRecipe'])) {
      $data['recipeData'] = $data['currentRecipe'];
    }


    if (!empty($data['recipeData']->active) == 1) {
      //  echo "test";


      // for random recipes get data
      if (!empty($data['recipeData']->re_id)) {
        $data['random_recipes'] = $this->Recipes_Model->get_random_recipes($data['recipeData']->re_id);
      }

      // for rating and comments data
      if (!empty($data['recipeData']->re_id)) {
        $data['rating_comments'] = $this->Rating_Leads_Model->get_sectionwise_rating_leads('1', $data['recipeData']->re_id);
      }


      // for cateogry date details page
      if (!empty($data['recipeData']->category_id)) {
        $data['category_data_list'] = $this->Category_Model->get_multiple_category($data['recipeData']->category_id);
      }


      // echo '<pre>'; 
      // print_r($data['random_recipes']);
      // die;


      // for right section popular recipe show
      $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();

      // -----------------------------
      // get set on header footer menu
      $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

      // get header menu for allergen category
      $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();
      // -----------------------------
      // categories data list
      $data['category_data'] = $this->Category_Model->get_category_data_site();

      // ----------------
      // blog data 
      $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();


      // -------------------
      //  faq recipe for home page and schema use
      if (!empty($re_titleurl)) {
        $get_data = $this->db->table('recipes')
          ->select('re_id')
          ->where('re_titleurl', $re_titleurl)
          ->get()
          ->getRow();

        $get_recipe_id = $get_data->re_id;

      }



    


      // ------------------------------------------------------------------------>
      // og image 
      if (!empty($data['recipeData']->re_images)) {
        $data['og_image'] = "recipes_img/" . $data['recipeData']->re_images;
      }

      // og type
      $data['og_type'] = "recipes";



      // logo favicon image
      $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
      $data['title'] = $data['recipeData']->re_title ?? 'yumcreaft';
      // return $data;
      $data['content'] = "site/details_page";
      return view('site/layout', $data);
    } else {
      return view('errors/html/error_404');
    }
  }





  // xxxxxxx site display categories Category page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  public function category_page()
  {

    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    $data['title'] = "Category Page";
    $data['content'] = "site/category_page";
    return view('site/layout', $data);
  }






  // xxxxxxx site category vise display  page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // recipe category vise display details page


  public function category_visedisplay_recipes($c_url)
  {

    $category_data_row = $this->Category_Model->get_category_url($c_url);
    $data['also_categories_data'] = $category_data_row;

    // get recipes using category id
    $c_id = $category_data_row->c_id;
    // get category name
    $c_name = $category_data_row->c_name;

    // get alergen or category data get
    $flag = $category_data_row->flag;


    // ------->
    // check recipe with category
    $pages = $this->Recipes_Model->getrecipes_data_categoryvise($c_id);
    $data['recipes_data_categoryvise'] = $pages['allcategoryise_recipe_desending'];
    $data['pager'] = $pages['pager'];
    $data['total'] = $pages['total'];



    // get all relatable data
    $data['all_relationtable_data'] = $this->Relation_recipe_category_tag_Model->get_relationtable_data();

    // for right section popular recipe [category] list
    $data['popular_recipe_reighside_category_and_allergen_category'] = $this->Recipes_Model->get_popular_recipe_category_and_allergencategory($c_id);

    // // for right side popular recipe
    // $data['popular_allergenrecipe_reighside'] = $this->Recipes_Model->get_allergen_popularrecipe($c_id);

    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // categories data list show the category allergen category tag on the img
    $data['category_data_tag'] = $this->Category_Model->get_category_data_site_tag();

    // categories data allergen category list
    $data['category_data_allergencategory_list'] = $this->Category_Model->get_category_and_allergencategory_data_list($flag);

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    // for right section popular recipe show
    $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();

    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();




    // fix data for all file
    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = $c_name . ' Archives - yumcreaft';
    // return $data;

    // $data['title'] = $c_name;
    $data['content'] = 'site/category_page';
    return view('site/layout', $data);
  }




  // --------------------  Uncategorized
  public function uncategorized_section()
  {


    // get uncategorized data
    $pages = $this->Recipes_Model->get_uncategorized_recipes();
    $data['uncategorized_data'] = $pages['all_Uncategorized_recipe_descending'];
    $data['pager'] = $pages['pager'];


    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();

    // fix data for all file
    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();

    $data['title'] = "Uncategorized";
    $data['content'] = 'site/uncategory_page';
    return view('site/layout', $data);
  }


 
  // xxxxxxx site Recipes videos page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  public function videos_recipe()
  {
    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    $data['get_videos_recipes'] = $this->db->table('recipes')
      ->select('*')
      ->where('active', 1)
      ->get()
      ->getResultArray();


    // echo '<pre>';
    // print_r($data['get_videos_recipes']);
    // die;


    $data['title'] = "Videos Page";
    // $data['content']="site/videos_recipes";
    // return view('site/layout',$data);

    return view('site/videos_recipes', $data);
  }







  // xxxxxxx site Contact Us page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // contact us page
  public function contact_page()
  {

    // random recipes 
    $data['random_recipes_contact'] = $this->Recipes_Model->get_contactrandom_recipes();

    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();

    // for right section popular recipe show
    $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();

    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();



    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();


    $data['title'] = "Have Some Questions ? - yumcreaft";
    $data['content'] = "site/contact_us";
    return view("site/layout", $data);
  }


  // ------------------------------------------------------------------------->
  // contact us insert
  public function contact_insert()
  {

    $name = $_POST['name'];
    $email = $_POST['email'];
    // $mob_no = $_POST['mob_no'];
    $subject = (!empty($_POST['subject'])) ? $_POST['subject'] : '';
    $message = $_POST['message'];
    // $permission = $_POST['permission'];



    // Check if the checkbox was checked
    $permission = $this->request->getPost('permission');


    $data = [
      'contact_name' => $name,
      'contact_email' => $email,
      // 'contact_mob' => $mob_no,
      'subject' => $subject,
      'contact_msg' => (!empty($message)) ? $message : '',
      'permission' => (!empty($permission)) ? 1 : 0
    ];


    $result = $this->db->table('contact_us')->insert($data);

    $response = [
      'status' => $result ? 'success' : 'failure',
      'result' => $result ? 1 : 0,
    ];

    return $this->response->setJSON($response);
  }




  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx>
  // Blog Section
  public function blog_data()
  {

    $data['latest_blog'] = $this->Blog_Model->latest_blog('');


    // $pages = $this->Blog_Model->blog_pagination();
    // $data['allblog_desending'] = $pages['allblog_desending'];
    // $data['pager'] = $pages['pager'];


    $pages = $this->Blog_Model->all_blog();
    $data['blog_pagination'] = $pages['allblog_desending'];
    $data['pager'] = $pages['pager'];


    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();



    // for right section popular recipe show
    $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();


    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();


    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();

    $data['send_all_category'] = $this->Category_Model->send_all_category_wise_receipe_cnt();


    // -------------------------------------------------------------------->
    // get header recipe image 
    $data['get_meta_img_in_recipe'] = $this->db->table('recipes')
      ->orderBy('re_id', 'DESC')
      ->get()
      ->getRow();

    // get blog meta image
    $data['get_meta_img_in_blog'] = $this->db->table('blog')
      ->orderBy('blog_id', 'DESC')
      ->get()
      ->getRow();

    // get category data meta image
    $data['get_meta_img_in_category'] = $this->db->table('category')
      ->where('flag', 1)
      ->orderBy('c_id', 'DESC')
      ->get()
      ->getRow();
    // -------------------------------------------------------------------->





    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = "Blog Archives - yumcreaft";

    $data['content'] = "site/blog";
    return view('site/layout', $data);
  }




  // --------------------------------------------------------------------------------------------->
  // blog map url section 
  public function blog_mapurl($blog_url = '')
  {
    if (!empty($blog_url)) {
      return $this->blog_details($blog_url);
    }
  }



  // --------------------------------------------------------------------------------------------->
  // Blog Detials page
  public function blog_details($blog_url)
  {

    $data = $this->Blog_Model->single_details_blog($blog_url);


    // randome blog
    $data['random_blog'] = $this->Blog_Model->get_random_blog($data['blog']->blog_id);

    $data['rating_comments'] = $this->Rating_Leads_Model->get_sectionwise_rating_leads('2', $data['blog']->blog_id);
    // print_r($data['rating_comments']);
    // die;


    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();


    // for right section popular recipe show
    $data['popular_recipe_reighside'] = $this->Recipes_Model->get_popular_recipe();

    // categories data list
    $data['category_data'] = $this->Category_Model->get_category_data_site();

    // get two recipe for blog details page
    // $data['recipe_two_data_rightside'] = $this->Recipes_Model->get_two_recipe_data();

    // ----------------
    // blog data 
    $data['blog_two_data_rightside'] = $this->Blog_Model->get_two_blogs();


    // -------------------
    //  faq recipe for home page and schema use
    if (!empty($blog_url)) {


      $get_data = $this->db->table('blog')
        ->select('blog_id')
        ->where('blog_url', $blog_url)
        ->get()
        ->getRow();

      $get_blog_id = $get_data->blog_id;

    }



    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
    $data['title'] = (!empty($data['blog']->blog_name)) ? $data['blog']->blog_name : 'yumcreaft';

    // return $data;
    $data['content'] = "site/blog_detailspage";
    return view('site/layout', $data);
  }





  // xxxxxxx rating page  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // ------------------------------------------------>
  // rating lead
  public function rating_lead()
  {
    //  flag to check recipe or blog
    $flag = $_POST['flag'];


    // recipe inser logic
    if (!empty($flag == 1)) {
      $file = $this->request->getFile('profile');


      $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'mob_no' => $_POST['mob_no'],
        'flag' => $_POST['flag'],
        'rel_id' => $_POST['rel_id'],
        'message' => $_POST['message'],
        'rating' => $_POST['rating'],
      ];


      $result = $this->db->table('rating_leads')->insert($data);

      $response = [
        // 'status' => $result ? 'success' : 'failure',
        'result' => $result ? 1 : 0,
      ];

      return $this->response->setJSON($response);


      // 
    } else {
      // 
      //  blog table comments insert logic

      $file = $this->request->getFile('profile');

      if ($file && $file->isValid() && !$file->hasMoved()) {
        // Generate a random name for the uploaded file
        $imagename = $file->getRandomName();

        // Try to move the file to the specified directory
        $file->move('uploads/profile/', $imagename);
      }



      $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        // 'website' => $_POST['website'],
        // 'profile' => $imagename,
        'flag' => $_POST['flag'],
        'rel_id' => $_POST['rel_id'],
        'rating' => $_POST['rating'],
        'message' => $_POST['message'],
      ];


      $result = $this->db->table('rating_leads')->insert($data);

      $response = [
        // 'status' => $result ? 'success' : 'failure',
        'result' => $result ? 1 : 0,
      ];

      return $this->response->setJSON($response);
    }
  }










  // xxxxxxxxxx  Privacy Policy   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // privacypolicy

  public function privacypolicy()
  {
    // echo "test";

    // get set on header footer menu
    $data['set_category_onmenu'] = $this->Category_Model->get_on_menu_category();

    // get header menu for allergen category
    $data['get_all_menu_allergen_category'] = $this->Category_Model->get_on_menu_Allergencategory();


    // logo favicon image
    $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();


    $data['title'] = "yumcreaft-Privacy Policy";
    $data['content'] = "site/privacypolicy";
    return view('site/layout',$data);
  }









  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxx All Url Mapping function xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

  // public function all_urls($url)
  // {
  //   // echo $url;
  //   // if(isset($_GET['s'])){

  //   // }
  //   // die; 


  //   if (!empty($url)) {


  //     $category = $this->Category_Model->get_category_url($url);

  //     $blog = $this->Blog_Model->single_blog($url);

  //     $receipe = $this->Recipes_Model->single_details_recipe($url);


  //     if (!empty($category)) {
  //       // echo 'category';
  //       //category details
  //       $data = $this->category_visedisplay_recipes($url);
  //       // $data['title'] = $c_name;
  //       $data['content'] = 'site/category_page';
  //       return view('site/layout', $data);
  //     } elseif (!empty($blog)) {
  //       // blog page
  //       // echo 'blog';

  //       $data = $this->blog_details($url);

  //       $data['content'] = "site/blog_detailspage";
  //       return view('site/layout', $data);
  //     } elseif (!empty($receipe)) {
  //       // echo 'receipe';
  //       $data = $this->details_page($url);
  //       $data['content'] = "site/details_page";

  //       return view('site/layout', $data);
  //     } else {
  //       return view('errors/html/error_404');
  //     }
  //   } else {
  //     // return redirect()->to('');
  //     return view('errors/html/error_404');
  //   }
  // }




  public function all_urls_map($url)
  {
    // echo $url;
    // if(isset($_GET['s'])){

    // }
    // die; 


    if (!empty($url)) {


      $recipe = $this->Recipes_Model->find_recipes_url($url);

      $category = $this->Category_Model->find_category_url($url);

      $blog = $this->Blog_Model->find_blog_url($url);





      if (!empty($recipe->re_titleurl)) {
        // recipe section
        return redirect()->to('recipe/' . $recipe->re_titleurl);

        // return $this->details_page($recipe->re_titleurl);

      } elseif (!empty($category->c_url)) {
        // Category section
        return redirect()->to('recipe/' . $category->c_url);
      } elseif (!empty($blog->blog_url)) {
        // Blog section
        return redirect()->to('blog/' . $blog->blog_url);
      } elseif (!empty($url == "about-me" || $url == "books")) {
        // Author About section
        return redirect()->to('author-about');
      } elseif (!empty($url == "author")) {
        // Author About section
        return redirect()->to(base_url());
      } else {
        // 404 then url not found section
        return view('errors/html/error_404');
      }
    }
  }





}
