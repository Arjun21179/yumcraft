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
use App\Models\Gallery_Model;
use App\Models\Gallery_Dynamic_Model;
use App\Models\Relation_recipe_category_tag_Model;
use App\Models\img_all_project;




// uploads folder img get
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;





// logo info
use App\Models\Manage_Pages_Model;
// banner image
use App\Models\Banner_Model;
// all headings banner
use App\Models\Allheadings_Model;


// excel 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// read file
use PhpOffice\PhpSpreadsheet\Reader\Csv as CsvReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsReader;
// write file
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class Admin_Controller extends BaseController
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
    public $Rating_Leads_Model;
    public $All_headings;
    public $Gallery_Model;
    public $Gallery_Dynamic_Model;
    public  $Relation_recipe_category_tag_Model;
    public  $img_all_project;






    public function __construct()
    {
        helper("form");

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
        $this->Rating_Leads_Model = new Rating_Leads_Model();
        $this->All_headings = new Allheadings_Model();
        $this->Gallery_Model = new Gallery_Model();
        $this->Gallery_Dynamic_Model = new Gallery_Dynamic_Model();


        // logo info
        $this->Manage_Pages_Model = new Manage_Pages_Model();
        // banner image 
        $this->Banner_Model = new Banner_Model();

        // faq Models 
    
        $this->Relation_recipe_category_tag_Model = new Relation_recipe_category_tag_Model();

        $this->img_all_project = new img_all_project();
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // login view 
    public function login()
    {
        // echo "hello";

        $data['logo_info'] = $this->Manage_Pages_Model->logo_favicon_details_show();

        $data['website_title'] = "Login Page";
        $data['logo_favicon'] = $this->logo_favicon();


        return view('admin/admin_login',$data);
    }


    // ------------------------------------------------------------------------->
    // login logic 
    public function login_logic()
    {

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admindata = $this->Admin_Model->loginuser($email);
        // echo '<pre>';
        // print_r($admindata);
        // die;

        if ($admindata != false) {
            if ($password == $admindata['password']) {
                $this->session->set('admin_loginsession_id', $admindata['id']);
                // echo "login success";
                return redirect()->to('recipes');
            } else {
                // echo "password not match";
                $this->session->set('failed_login_password', 'password_error');
                return redirect()->to('login');
            }
        } else {
            // echo "email not match";
            $this->session->set('failed_login_email', 'email_error');
            return redirect()->to('login');
        }
    }

    // ------------------------------------------------------------------------->
    // logout logic
    public function admin_logout()
    {
        // logout logic
        // destroy all session 
        // $this->session->destroy();

        // remove only one decided session 
        session()->remove('admin_loginsession_id');
        return redirect()->to('login');
    }


    // session function admin login 
    public function checklogin()
    {
        return session()->get('admin_loginsession_id');
        //  echo $result;

    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //Admin profile 
    public function profile()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {

            $data['profile'] = $this->Admin_Model->profiledata();
            $data['content'] = "admin/admin_profile";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // --------------------------------------------------------------->
    // admin profile update
    public function admin_profile_update()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ];

        $results = $this->Admin_Model->adminprofile_update($data);

        if ($results != false) {
            // echo "profile update successfully";
            $this->session->set("success_profile_update", 'true');
            return redirect()->to('profile');
        } else {
            // echo "update failed";
            $this->session->set("error_profile_update", 'false');
            return redirect()->to('profile');
        }
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Url Mainfunction pages

    public function create_url($string)
    {
        // $string = str_replace(' ', '-', $string);

        // Replace spaces with hyphens
        $string = str_replace(' ', '-', trim($string));
        // Remove all special characters except for hyphens
        $string = preg_replace('/[^a-zA-Z0-9-]/', '', $string);
        // Replace multiple consecutive hyphens with a single hyphen
        $string = preg_replace('/-+/', '-', $string);

        return strtolower($string);
    }


    public function logo_favicon()
    {
        return $this->Manage_Pages_Model->get_favicon_img();
    }






    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Recipes pages

    // display recipes
    public function recipes()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {
            // echo "admin page";


            // if (isset($_GET['search_recipe'])) {
            //     $searchtext = $_GET['search_recipe'];
            // } else {
            //     $searchtext = '';
            // }


            $data['allrecipes'] = $this->Recipes_Model->allrecipes();
            // $data['allrecipes'] = $pages['allrecipes'];
            // $data['pager'] = $pages['pager'];

            //   echo '<pre>';
            //   print_r($data['allrecipes']);
            //   die;



            // category id
            $data['all_relational_category'] = $this->Recipe_Category_tag_Model->all_relational_category();
            // tag id
            $data['all_relational_tag'] = $this->Recipe_Category_tag_Model->all_relational_tag();


            // category tag and author model
            $data['allcategories'] = $this->Category_Model->allcategory();


            //   echo '<pre>';
            //   print_r($data['allauthorlist']);
            //   print_r($data['all_relational_author']);

            //   die;

            // get title for website
            $data['website_title'] = "Recipes";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/admin_home";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------------------------------->
    // deactive Recipes 
    public function deactive_recipe()
    {
        $re_id = $this->request->getPost('recipe_id');

        $output = $this->Recipes_Model->deactive_recipe($re_id);

        $response = array(
            'title' => 'Deactivate!',
            'text' => 'Your Data has been deactivate.',
            'type' => 'success',
            're_id' => $re_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }

    // ------------------------------------------------------------------------->
    // active Recipes 
    public function active_recipe()
    {
        $re_id = $this->request->getPost('recipe_id');

        $output = $this->Recipes_Model->active_recipe($re_id);

        $response = array(
            'title' => 'Activate!',
            'text' => 'Your Data has been Activate.',
            'type' => 'success',
            're_id' => $re_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // ------------------------------------------------------------------------->
    // Delete at time all Recipes 
    public function recipes_attime_deleteall()
    {
        $re_id = $_POST['recipes_id'];

        $results = $this->Recipes_Model->recipes_attime_deleteall_data($re_id);

        $results = $this->Recipe_Category_tag_Model->recipe_id_delete_checkbox_data($re_id);


        $response = array(
            're_id' => $re_id,
            'results' => $results,
        );

        if ($results != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }

    // ------------------------------------------------------------------------->
    // Add Recipes insert
    public function addrecipes()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            // all categories
            $data['allcategories'] = $this->Category_Model->allcategory();

            // get title for website
            $data['website_title'] = "Insert-Recipes";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/addrecipes";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }




    public function addrecipes_insert()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            $re_titleurl = $this->create_url($_POST['re_title_url']);


            $file = $this->request->getFile('imgInput');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                $extension = $file->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/recipes_img/';

                // Initialize the new filename
                $imagename = $file->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename)) {
                    $counter++;
                    $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file->move($targetDirectory, $imagename);
            }

           

            $data = [
                're_title' => $_POST['re_title'],
                're_titleurl' => $re_titleurl,
                're_popular_recipe' => (!empty($_POST['popular_recipe'])) ? $_POST['popular_recipe'] : '',
                're_images' => (!empty($imagename)) ? $imagename : '',
                're_shortdescription' => (!empty($_POST['re_shortdescription'])) ? $_POST['re_shortdescription'] : '',
                're_description' => (!empty($_POST['re_description'])) ? $_POST['re_description'] : '',
                'ingredients' => (!empty($_POST['ingredients'])) ? $_POST['ingredients'] : '',
                'publish_data' => $_POST['publish_date'],
            ];


            $insertedId = $this->Recipes_Model->recipes_insert($data);



            //------------------------------------------------------> 
            // Insert (Category) (tag) data and (faq) question

            if ($insertedId != false) {
                // echo "insert successfully";

                $string_category = '';

                // check empty or not category
                if (!empty($_POST['category_data'])) {
                    $string_category = implode(',', $_POST['category_data']);
                }


                $data = [
                    'recipe_id' => $insertedId,
                    'category_id' => $string_category,
                ];
                
                $this->db->table('recipe_category_tag')->insert($data);



                $this->session->set('success_recipe_add', 'success');
                return redirect()->to('recipes');
            } else {
                // echo "Failed insert";
                $this->session->set('error_recipe_add', 'error');
                return redirect()->to('recipes');
            }
        } else {
            return redirect()->to('login');
        }
    }



    // --------------------------------------------------------------------------->
    // edit recipes 
    public function editrecipes_view()
    {
        $re_id = $_POST['re_id'];

        // single recipes data
        $data['single_recipe'] = $this->Recipes_Model->editrecipes($re_id);

        // category tag author model
        $data['allcategories'] = $this->Category_Model->allcategory();

        // relation tables
        $data['relational_categories_tag_id'] = $this->Recipe_Category_tag_Model->relation_category_tag_id($re_id);

        


        // get title for website
        $data['website_title'] = "Edit-Recipes";
        $data['logo_favicon'] = $this->logo_favicon();

        $data['content'] = "admin/editrecipes";
        return view('admin/admin_layout', $data);
    }



    // --------------------------------------->
    public function editrecipes_logic()
    {

        $re_id = $this->request->getPost('re_id');

        // ----------------------------------------->
        // recipe edit section
        // url function 
        $re_titleurl = $this->create_url($_POST['re_title_url']);

        $imagename = '';
        // ------ Image section ------------------------------->
        $file = $this->request->getFile('re_images');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Get the original file name and extension
            $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
            $extension = $file->getExtension();

            // Set the target directory
            $targetDirectory = 'uploads/recipes_img/';

            // Initialize the new filename
            $imagename = $file->getName();
            $counter = 0;

            // Check if a file with the same name exists and modify the name accordingly
            while (file_exists($targetDirectory . $imagename)) {
                $counter++;
                $imagename = $originalName . "($counter)." . $extension; // Create new filename format
            }

            // Move the file to the uploads directory with the new filename
            $file->move($targetDirectory, $imagename);
        }



        $old_img = $this->db->query('select re_images from recipes where re_id="' . $re_id . '"')->getRow();
        if (!empty($imagename)) {
            $imagename = $imagename;
        } else {
            $imagename = $old_img->re_images;
        }


        $data = [
            're_title' => $_POST['re_title'],
            're_titleurl' => $re_titleurl,
            're_popular_recipe' => $_POST['popular_recipe'],
            're_images' => $imagename,
            're_shortdescription' => (!empty(trim($_POST['re_shortdescription']))) ? trim($_POST['re_shortdescription']) : null,
            're_description' => (!empty($_POST['re_description'])) ? $_POST['re_description'] : '',
            'ingredients' => (!empty(trim($_POST['ingredients']))) ? trim($_POST['ingredients']) : null,
            'publish_data' => $_POST['publish_date'],
        ];


        $re_id = $this->Recipes_Model->editrecipes_logicdata($data, $re_id);

        // 
        if ($re_id != false) {
            // echo "profile update successfully";

            if (!empty($re_id)) {

                // ------------------------------------>
                // category allergen category and tag 
                $string_category = "";

                // category and tag
                if (!empty($_POST['category_data'])) {
                    // implode method convert to array 
                    $string_category = implode(',', $_POST['category_data']);
                }

             
                // already here or not
                $re_id_check = $this->db->query('select recipe_id from recipe_category_tag where recipe_id="' . $re_id . '"')->getRow();

                //   echo '<pre>';
                //   print_r($re_id_check->recipe_id);
                //   die;

                if (!empty($re_id_check->recipe_id) == !empty($re_id)) {

                    // ------------------------------------>
                    // category section
                    $data = [
                        'category_id' => $string_category,
                    ];

                    $this->db->table('recipe_category_tag')
                        ->where('recipe_id', $re_id_check->recipe_id)
                        ->update($data);
                } else {

                    $data = [
                        'recipe_id' => $re_id,
                        'category_id' => $string_category,
                    ];
                    $this->db->table('recipe_category_tag')->insert($data);
                }
            }

            // /------------------------------------------------------------>

            $this->session->set('success_recipe_edit', 'success');

            return redirect()->to('recipes');
        } else {
            // echo "update failed";
            $this->session->set('error_recipe_edit', 'error');

            return redirect()->to('recipes');
        }
    }




    // --------------------------------------------------------------------------->
    // delete recipes 
    public function recipes_delete()
    {
        $re_id = $this->request->getPost('del_id');


        // its use for delete recipe
        $results = $this->Recipes_Model->recipes_deletedata($re_id);
        // its use for relation table delete recipe id
        $results = $this->Recipe_Category_tag_Model->recipe_id_delete($re_id);

       


        $response = array(
            're_id' => $re_id,
            'results' => $results,
        );

        if ($results != false) {
            return json_encode($re_id);
        } else {
            return json_encode($response);
        }
    }






    // ------------------------------------------------------------------------------------------>
    // recipe map preivew url
    public function recipe_mapurl_preview($re_titleurl = '')
    {
        if (!empty($re_titleurl)) {
            return $this->preview_recipe_details($re_titleurl);
            // echo "test";
        }

        // echo "test";
    }


    // recipe maping url 
    public function preview_recipe_details($re_titleurl): mixed
    {
        $data = $this->Recipes_Model->preview_single_details_recipe($re_titleurl);
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


            // echo '<pre>';
            // print_r($data['faq_recipe_data_single_recipe']);
            // die;


            // logo favicon image
            $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
            $data['title'] = $data['recipeData']->re_title ?? 'yumcraft';
            // return $data;
            $data['content'] = "site/details_page";
            return view('site/layout', $data);
        } elseif (!empty($data['recipeData']->active) == 0) {


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


            // logo favicon image
            $data['logo_favicon'] = $this->Manage_Pages_Model->get_logo_favicon_site();
            $data['title'] = $data['recipeData']->re_title ?? 'yumcraft';
            // return $data;
            $data['content'] = "site/details_page";
            return view('site/layout', $data);
        } else {
            return view('errors/html/error_404');
        }
    }









    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   blog pages

    // view section Blog list
    public function blog_list()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $data['all_blog'] = $this->Blog_Model->allblog();


            $data['website_title'] = "Blog";
            $data['logo_favicon'] = $this->logo_favicon();


            $data['content'] = "admin/blog_page";
            return view("admin/admin_layout", $data);
        } else {
            return redirect()->to('login');
        }
    }


    // ----------------------------------------------------------------------------------------->
    // insert blog view
    public function add_blog()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

          

            $data['website_title'] = "Add Blog";
            $data['logo_favicon'] = $this->logo_favicon();


            $data['content'] = "admin/add_blog";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // insert logic Blog
    public function addblog_logic()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $blog_url = $this->create_url($_POST['blog_url']);
            $file = $this->request->getFile('imgInput');

         
            // ------ Image section ------------------------------->
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                $extension = $file->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/blog_img/';

                // Initialize the new filename
                $imagename = $file->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename)) {
                    $counter++;
                    $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file->move($targetDirectory, $imagename);
            }



            if (!empty($_POST['publish_date'])) {
                $date = $_POST['publish_date'];
            } else {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                // $date = date('d-m-Y h:i:s A');
            }

            $data = [
                'blog_name' => $_POST['blog_name'],
                'blog_url' => rtrim($blog_url, '-'),
                'blog_img' => (!empty($imagename)) ? $imagename : '',
                'blog_description' => $_POST['blog_description'],
                'blog_publish_date' => $date,
            ];

            $insertedblog_id = $this->Blog_Model->blog_insert($data);


            if ($insertedblog_id != false) {
                // echo "insert successfully";
                $this->session->set('success_blog_add', 'success');
                return redirect()->to('blog-list');
            } else {
                // echo "Failed insert";
                $this->session->set('error_blog_add', 'error');
                return redirect()->to('blog-list');
            }
        } else {
            return redirect()->to('login');
        }
    }



    // --------------------------------------------------------------------------->
    // edit blog view
    public function ediblog_view()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {
            $blog_id = $_POST['blog_id'];

        
            // single recipes data
            $data['single_blog'] = $this->Blog_Model->edit_blog($blog_id);

        

            // get title for website
            $data['website_title'] = "Edit-Blog";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/edit_blog";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // --------------------->
    // edit Blog logic
    public function editblog_logic()
    {

        $blog_id = $_POST['blog_id'];

        if (!empty($blog_id)) {

            $file = $this->request->getFile('imgInput');

            // url function 
            $blog_url = $this->create_url($_POST['blog_url']);

            $imagename = '';
          

            // ------ Image section ------------------------------->
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                $extension = $file->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/blog_img/';

                // Initialize the new filename
                $imagename = $file->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename)) {
                    $counter++;
                    $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file->move($targetDirectory, $imagename);
            }




            $old_img = $this->db->query('select blog_img from blog where blog_id="' . $blog_id . '"')->getRow();
            if (!empty($imagename)) {
                $imagename = $imagename;
            } else {
                $imagename = $old_img->blog_img;
            }

            if (!empty($_POST['publish_date'])) {
                $date = $_POST['publish_date'];
            } else {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                // $date = date('d-m-Y h:i:s A');
            }

            $data = [
                'blog_name' => $_POST['blog_name'],
                'blog_url' => rtrim($blog_url, '-'),
                'blog_img' => (!empty($imagename)) ? $imagename : '',
                'blog_description' => $_POST['blog_description'],
                'blog_publish_date' => $date,
            ];

            // print_r($data);
            // die;

            $blog_id = $this->Blog_Model->edit_blog_logicdata($data, $blog_id);

            if (!empty($blog_id) || !empty($faq_output)) {
                // echo "profile update successfully";
                $this->session->set('success_blog_edit', 'success');

                return redirect()->to('blog-list');
            } else {
                // echo "update failed";
                $this->session->set('error_blog_edit', 'error');

                return redirect()->to('blog-list');
            }
        } else {

            $this->session->set('success_blog_edit', 'success');

            return redirect()->to('blog-list');
        }
    }



    // --------------------------------------------------------------------------->
    // delete blog 
    public function blog_delete()
    {
        $blog_id = $_POST['blog_id'];

        // its for delete blog
        $results = $this->Blog_Model->blog_deletedata($blog_id);
        // its for delete faq of blog

        $response = array(
            'blog_id' => $blog_id,
            'results' => $results,
        );


        if (
            $results != false
        ) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }



    // ------------------------------------------------------------------------->
    // deactive blog 
    public function deactive_blog()
    {
        $blog_id = $_POST['blog_id'];

        $output = $this->Blog_Model->deactive_blog($blog_id);

        $response = array(
            'status' => 'success',
            'blog_id' => $blog_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // ------------------------------------------------------------------------->
    // activate blog 
    public function active_blog()
    {
        $blog_id = $_POST['blog_id'];

        $output = $this->Blog_Model->active_blog_row($blog_id);

        $response = array(
            'status' => 'success',
            'blog_id' => $blog_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // ------------------------------------------------------------------------->
    // ------ at time delete or deactivate blog data --------------------------------------------------------------------------------------------------->
    // at time delete deactivate blog
    public function blog_attime_deleteAll()
    {
        $blog_id = $_POST['blog_id'];

        $result = $this->Blog_Model->blog_attime_deleteall_data($blog_id);

        $response = [
            'status' => $result ? 'success' : 'failure',
            'result' => $result ? 1 : 0,
        ];

        return $this->response->setJSON($response);
    }




    // ------------------------------------------------------------------------------------------>
    // ------------------------------------------------------------------------------------------->
    // faq blog section 

    // faq recipe delete under edit recipe section
    public function faq_blog_delete()
    {
        // echo "test";
        $faq_blog_id  = $_POST['faq_blog_id'];


        $result = $this->db->table('faq_blog')
            ->where('faq_blog_id ', $faq_blog_id)
            ->delete();

        $response = [
            'status' => $result ? 1 : 0,
            'result' => $result
        ];


        return $this->response->setJSON($response);
    }





    // faq_blog_add
    // ------------------------------------------------------------------------------------------>
    // faq blog insert under edit recipe section
    public function  under_edit_blog_faq_add()
    {
        $faq_question = $_POST['faq_question'];
        $faq_answer = $_POST['faq_answer'];


        if ($_POST['blog_id']) {


            if (isset($_POST['blog_id']) && is_array($_POST['blog_id'])) {
                // Get the first blog_id if it's an array
                $blog_id = $_POST['blog_id'][0];
            } elseif (isset($_POST['blog_id'])) {
                // Directly assign if it's not an array
                $blog_id = $_POST['blog_id'];
            } else {
                // Handle the case where blog_id is not set
                echo 'Blog ID is not set';
                return;
            }


            $data = [];

            $count = count($faq_question);
            for ($i = 0; $i < $count; $i++) {
                $data[] = [
                    'blog_id' => $blog_id,
                    'faq_blog_question' => $faq_question[$i],
                    'faq_blog_answer' => $faq_answer[$i],
                ];
            }


            // Insert all data at once
            $result = $this->db->table('faq_blog')->insertBatch($data);
        }


        $response = [
            'status' => $result ? 1 : 0,
            'result' => $result
        ];

        return $this->response->setJSON($response);
    }




    // ------------------------------------------------------------------------------------------>
    // blog map preivew url
    public function blog_mapurl_preview($blog_url = '')
    {
        if (!empty($blog_url)) {
            return $this->preview_blog_details($blog_url);
        }

        // echo "test";
    }



    // --------------------------------------------------------------------------------------------->
    // Blog Detials page
    public function preview_blog_details($blog_url)
    {

        // $data['blog_pagination'] = $this->Blog_Model->all_blog();

        // echo '<pre>';
        // print_r($data['blog_pagination']);
        // echo '<pre>';
        // echo $blog_url;
        // die;

        $data = $this->Blog_Model->preview_single_details_blog($blog_url);
        // echo '<pre>';
        // print_r($data);
        // echo $data['blog']->blog_name;
        // die;
        // $data['blog'] = $blog = $this->Blog_Model->single_blog($blog_url);

        $data['seo_title'] = (!empty($data['blog']->blog_seo_title)) ? $data['blog']->blog_seo_title : $data['blog']->blog_name;
        $data['seo_desc'] = $data['blog']->blog_seo_description;
        $data['seo_keywords'] = $data['blog']->blog_seo_keyword;

    

        // latest blog
        // $data['latest_blog'] = $this->Blog_Model->latest_blog($data['blog']->blog_id);


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
        $data['title'] = (!empty($data['blog']->blog_name)) ? $data['blog']->blog_name : 'yumcraft';

        // return $data;
        $data['content'] = "site/blog_detailspage";
        return view('site/layout', $data);
    }








  





    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Category pages
    public function category_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $data['category'] = $this->Category_Model->allcategory();

            // get title for websiteg
            $data['website_title'] = "Category";
            $data['logo_favicon'] = $this->logo_favicon();


            $data['content'] = "admin/category";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------------------------------->
    // deactive category
    public function deactive_category()
    {
        $c_id = $this->request->getPost('category_id');

        $output = $this->Category_Model->deactivate_category($c_id);

        $response = array(
            'title' => 'Deactivate!',
            'text' => 'Your Data has been deactivate.',
            'type' => 'success',
            'c_id' => $c_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }

    // ------------------------------------------------------------------------->
    // Activevate category
    public function active_category()
    {
        $c_id = $this->request->getPost('category_id');

        $output = $this->Category_Model->activate_category($c_id);

        $response = array(
            'title' => 'Activate!',
            'text' => 'Your Data has been Activate.',
            'type' => 'success',
            'c_id' => $c_id,
            'results' => $output,
        );


        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // ------------------------------------------------------------------------>
    // add category
    public function add_category()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {


            // ----------------------------------------------------------------------->
            if ($_POST['flag'] == 1) {

                // url function
                $c_name_url = $this->create_url($_POST['c_name']);
                // 
                $file = $this->request->getFile('c_img');

                // if ($file && $file->isValid() && !$file->hasMoved()) {
                //     $imagename = $file->getRandomName();
                //     $file->move('uploads/recipes_img', $imagename);
                // }
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    // Get the original file name and extension
                    $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                    $extension = $file->getExtension();

                    // Set the target directory
                    $targetDirectory = 'uploads/recipes_img/';

                    // Initialize the new filename
                    $imagename = $file->getName();
                    $counter = 0;

                    // Check if a file with the same name exists and modify the name accordingly
                    while (file_exists($targetDirectory . $imagename)) {
                        $counter++;
                        $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                    }

                    // Move the file to the uploads directory with the new filename
                    $file->move($targetDirectory, $imagename);
                }



                $data = [
                    'c_name' => $_POST['c_name'],
                    'c_url' => $c_name_url,
                    'c_img' => $imagename,
                    'category_img_alt' => (!empty($_POST['category_img_alt'])) ? $_POST['category_img_alt'] : '',
                    'popular_category' => $_POST['popular_category'],
                    'set_on_menu' => $_POST['Set_on_top_menu'],
                    'flag' => $_POST['flag'],
                ];

                $result = $this->Category_Model->addcategory_insert($data);

                if ($result != false) {
                    // echo "insert successfully";
                    $this->session->set('success_category_add', 'success');
                    return redirect()->to('category-section');
                } else {
                    // echo "Failed insert";
                    $this->session->set('error_category_add', 'error');
                    return redirect()->to('category-section');
                }
            }


            // ----------------------------------------------------------------------->

            if ($_POST['flag'] == 2) {

                // img section
                $file = $this->request->getFile('allergy_free_category_img');

                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $imagename = $file->getRandomName();
                    $file->move('uploads/recipes_img', $imagename);
                }


                // url function
                $allergy_free_c_name_url = $this->create_url($_POST['allergy_free_category_name']);


                $data = [
                    'c_name' => $_POST['allergy_free_category_name'],
                    'c_url' => $allergy_free_c_name_url,
                    'c_img' => $imagename,
                    'category_img_alt' => (!empty($_POST['category_img_alt'])) ? $_POST['category_img_alt'] : '',
                    'set_on_menu' => $_POST['Set_on_top_menu_allergyfree'],
                    'flag' => $_POST['flag'],
                ];

                $result = $this->Category_Model->addcategory_insert($data);

                if ($result != false) {
                    // echo "insert successfully";
                    $this->session->set('success_allergy_freecategory_add', 'success');
                    return redirect()->to('allergy-free-category-section');
                } else {
                    // echo "Failed insert";
                    $this->session->set('error_allergy_freecategory_add', 'error');
                    return redirect()->to('allergy-free-category-section');
                }
            }
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------------------------------>
    // Edit category
    public function edit_category_view()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {

            $c_id = $_POST['c_id'];

            $data['single_category'] = $this->Category_Model->single_category($c_id);

            $data['allcategories'] = $this->Category_Model->allcategory();

            // get title for website
            $data['website_title'] = "Edit-Category";
            $data['logo_favicon'] = $this->logo_favicon();


            $data['content'] = "admin/category_edit";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('category-section');
        }
    }

    public function edit_category_logic()
    {

        if ($_POST['flag'] == 1) {


            $c_id = $this->request->getPost('c_id');
            $file = $this->request->getFile('c_img');

            // url function
            $c_name_url = $this->create_url($_POST['c_nameedit']);

            $imagename = '';
            // if ($file && $file->isValid() && !$file->hasMoved()) {
            //     $imagename = $file->getRandomName();
            //     $file->move('uploads/recipes_img', $imagename);
            // }

            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                $extension = $file->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/recipes_img/';

                // Initialize the new filename
                $imagename = $file->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename)) {
                    $counter++;
                    $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file->move($targetDirectory, $imagename);
            }




            $old_img = $this->db->query('select c_img from category where c_id="' . $c_id . '"')->getRow();
            if (!empty($imagename)) {
                $imagename = $imagename;
            } else {
                $imagename = $old_img->c_img;
            }

            $data = [
                'c_name' => $_POST['c_nameedit'],
                'c_url' => $c_name_url,
                'c_img' => $imagename,
                'category_img_alt' => (!empty($_POST['category_img_alt'])) ? $_POST['category_img_alt'] : '',
                'popular_category' => $_POST['popular_categoryedit'],
                'set_on_menu' => $_POST['Set_on_top_menuedit'],
            ];

            $results = $this->Category_Model->edit_categorydata($data, $c_id);

            if ($results != false) {
                $this->session->set('success_category_edit', 'true');
                return redirect()->to('category-section');
            } else {
                $this->session->set('error_category_edit', 'false');
                return redirect()->to('category-section');
            }
        }



        // edit allergy free recipe
        if ($_POST['flag'] == 2) {


            $c_id = $this->request->getPost('c_id');
            $file = $this->request->getFile('c_img');

            // url function
            $c_name_url = $this->create_url($_POST['c_nameedit']);

            $imagename = '';
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $imagename = $file->getRandomName();
                $file->move('uploads/recipes_img', $imagename);
            }

            $old_img = $this->db->query('select c_img from category where c_id="' . $c_id . '"')->getRow();
            if (!empty($imagename)) {
                $imagename = $imagename;
            } else {
                $imagename = $old_img->c_img;
            }

            $data = [
                'c_name' => $_POST['c_nameedit'],
                'c_url' => $c_name_url,
                'c_img' => $imagename,
                'category_img_alt' => (!empty($_POST['category_img_alt'])) ? $_POST['category_img_alt'] : '',
                'popular_category' => $_POST['popular_categoryedit'],
                'set_on_menu' => $_POST['Set_on_top_menuedit'],
            ];

            $results = $this->Category_Model->edit_categorydata($data, $c_id);

            if ($results != false) {
                $this->session->set('success_allergy_freecategory_edit', 'true');
                return redirect()->to('allergy-free-category-section');
            } else {
                $this->session->set('error_allergy_freecategory_edit', 'false');
                return redirect()->to('allergy-free-category-section');
            }
        }
    }



    // --------------------------------------------------------------------------->
    // delete category 
    public function category_delete()
    {
        $c_id = $this->request->getPost('del_id');


        $results = $this->Category_Model->category_deletedata($c_id);

        $response = array(
            'title' => 'Deleted!',
            'text' => 'Your data has been deleted.',
            'type' => 'success',
            'c_id' => $c_id,
            'results' => $results,
        );

        if ($results != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }







    // ------------------------------------------------------------------------------------------>
    // category map preivew url
    public function category_mapurl_preview($category_url = '')
    {
        if (!empty($category_url)) {
            // echo '<pre>';
            // print_r($category_url);
            // die;
            return $this->backend_data_categoryvise($category_url);
        }

        // echo "test";
    }



    // category previeww recipes data using category url
    public function backend_data_categoryvise($c_url)
    {

        $category_data_row = $this->Category_Model->forbackend_get_category_url($c_url);
        $data['also_categories_data'] = $category_data_row;

        // get recipes using category id
        $c_id = $category_data_row->c_id;
        // get category name
        $c_name = $category_data_row->c_name;

        // get alergen or category data get
        $flag = $category_data_row->flag;


        // ------->
        // check recipe with category
        $pages = $this->Recipes_Model->backend_getrecipes_data_categoryvise($c_id);
        $data['recipes_data_categoryvise'] = $pages['backend_allcategoryise_recipe_desending'];
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
        $data['title'] = $c_name . ' Archives - yumcraft';
        // return $data;

        // $data['title'] = $c_name;
        $data['content'] = 'site/category_page';
        return view('site/layout', $data);
    }











    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   banner desktop and mobile image page
    public function banner_view()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $data['banner_desending'] = $this->Banner_Model->desending_banner();

            // get title for website
            $data['website_title'] = "Banner-Image";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/banner_img";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }



    // ------------------------------------------------------------->
    // insert image banner mobile
    public function insert_banner_img_logic()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $file1 = $this->request->getFile('banner_img');
            $file2 = $this->request->getFile('mobile_img');

            // if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            //     $imagename1 = $file1->getRandomName();
            //     $file1->move('uploads/banner_img', $imagename1);
            // }

            // if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            //     $imagename2 = $file2->getRandomName();
            //     $file2->move('uploads/banner_img', $imagename2);
            // }

            // --------------->
            // desktop image
            if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file1->getName(), PATHINFO_FILENAME);
                $extension = $file1->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/banner_img/';

                // Initialize the new filename
                $imagename1 = $file1->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename1)) {
                    $counter++;
                    $imagename1 = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file1->move($targetDirectory, $imagename1);
            }


            // --------------->
            // Mobile image
            if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file2->getName(), PATHINFO_FILENAME);
                $extension = $file2->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/banner_img/';

                // Initialize the new filename
                $imagename2 = $file2->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename2)) {
                    $counter++;
                    $imagename2 = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file2->move($targetDirectory, $imagename2);
            }

            // ---

            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s');

            $data = [
                'banner_title' => $_POST['banner_title'],
                'banner_shortdescription' => $_POST['banner_shortdescription'],
                'banner_site_img' => !empty($imagename1) ? $imagename1 : '',
                'banner_mobile_img' => !empty($imagename2) ? $imagename2 : '',
                'publish_date' => $date,
            ];

            // ---

            $results = $this->Banner_Model->insert_banner($data);

            if ($results != false) {
                // echo "banner add successfully";
                $this->session->set('banner_insert_success', 'success');
                return redirect()->to('banner');
            } else {
                // echo "banner add failed";
                $this->session->set('banner_insert_error', 'error');
                return redirect()->to('banner');
            }
        } else {
            return redirect()->to('login');
        }
    }




    // ------------------------------------------------------>
    // edit banner section view
    public function edit_banner_img_view()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $banner_id = $_POST['banner_id'];
            $response = $this->Banner_Model->banner_row_data($banner_id);

            if (!empty($response)) {
                return json_encode($response);
            } else {
                return 0;
            }
        } else {
            return redirect()->to('login');
        }
    }


    public function edit_banner_img_logic()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            $banner_edit_id = $_POST['banner_edit_id'];

            $file1 = $this->request->getFile('banner_img');
            $file2 = $this->request->getFile('mobile_img');


            if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
                $imagename1 = $file1->getRandomName();
                $file1->move('uploads/banner_img', $imagename1);
            }

            if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
                $imagename2 = $file2->getRandomName();
                $file2->move('uploads/banner_img', $imagename2);
            }

            // ---

            $old_img = $this->db->query('select banner_site_img,banner_mobile_img from banner where banner_id="' . $banner_edit_id . '"')->getRow();
            if (!empty($imagename1)) {
                $imagename1 = $imagename1;
            } elseif (!empty($old_img->banner_site_img)) {
                $imagename1 = $old_img->banner_site_img;
            } else {
                $imagename1 = "";
            }
            // 
            if (!empty($imagename2)) {
                $imagename2 = $imagename2;
            } elseif (!empty($old_img->banner_mobile_img)) {
                $imagename2 = $old_img->banner_mobile_img;
            } else {
                $imagename2 = "";
            }


            // ---

            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s');

            $data = [
                'banner_title' => $_POST['banner_title'],
                'banner_shortdescription' => $_POST['banner_shortdescription'],
                'banner_site_img' => !empty($imagename1) ? $imagename1 : '',
                'banner_mobile_img' => !empty($imagename2) ? $imagename2 : '',
                'publish_date' => $date,
            ];

            // ---
            $results = $this->Banner_Model->edit_banner($data, $banner_edit_id);

            if ($results != false) {
                // echo "update data banner";
                $this->session->set('edit_banner_success', 'success');
                return redirect()->to('banner');
            } else {
                // echo "failed update";
                $this->session->set('edit_banner_error', 'error');
                return redirect()->to('banner');
            }
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------------------>
    // delete banner 
    public function delete_banner()
    {
        $banner_id = $_POST['banner_id_data'];

        $results = $this->Banner_Model->banner_delete($banner_id);

        $response = array(
            'title' => 'Deleted!',
            'text' => 'Your data has been deleted.',
            'type' => 'success',
            'banner_id' => $banner_id,
        );

        if ($results != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }



    // ------------------------------------------------------------------------->
    // deactive banner
    public function deactive_banner()
    {
        $banner_id = $this->request->getPost('banner_id_data');

        $output = $this->Banner_Model->deactivate_banner($banner_id);

        $response = array(
            'title' => 'Deactivate!',
            'text' => 'Your Data image has been deactivate.',
            'type' => 'success',
            'banner_id' => $banner_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }

    // ------------------------------------------------------------------------->
    // Activevate category
    public function active_banner()
    {
        $banner_id = $this->request->getPost('banner_id_data');

        $output = $this->Banner_Model->activate_banner($banner_id);

        $response = array(
            'title' => 'Activate!',
            'text' => 'Your Banner Image has been Activate.',
            'type' => 'success',
            'banner_id' => $banner_id,
            'results' => $output,
        );


        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // gallery image dynamic

    // -------------------------------------------------->
    // gallery view page
    public function gallery_section_images_dynamic()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            $data['gallery_dynamic_desending'] = $this->Gallery_Dynamic_Model->gallery_dynamic_desending();


            // get title for website
            $data['website_title'] = "Recipe Gallery";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/gallery_dynamic";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }





    // ------------------------------------------------------------>
    // insert img gallery logic 
    public function add_img_dynamic()
    {
        $title = $_POST['title'];
        // $files = $this->request->getFiles(); // Get all files from the request
        $file = $this->request->getFile('image');

        // $data = [];

        // foreach ($files['image'] as $file) {
        //     if ($file && $file->isValid() && !$file->hasMoved()) {
        //         $imagename = $file->getRandomName();
        //         $file->move('uploads/gallery_dynamic', $imagename);

        //         $data[] = [
        //             'image' => $imagename
        //         ];
        //     }
        // }


        // if ($file && $file->isValid() && !$file->hasMoved()) {
        //     $imagename = $file->getRandomName();
        //     $file->move('uploads/gallery_dynamic', $imagename);
        // }


        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Get the original file name and extension
            $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
            $extension = $file->getExtension();

            // Set the target directory
            $targetDirectory = 'uploads/gallery_dynamic/';

            // Initialize the new filename
            $imagename = $file->getName();
            $counter = 0;

            // Check if a file with the same name exists and modify the name accordingly
            while (file_exists($targetDirectory . $imagename)) {
                $counter++;
                $imagename = $originalName . "($counter)." . $extension; // Create new filename format
            }

            // Move the file to the uploads directory with the new filename
            $file->move($targetDirectory, $imagename);
        }



        // get count of sequence column
        $gallery_img_count = $this->db->table('gallery_dynamic')
            ->where('sequence IS NOT NULL') // Adjust this condition as needed
            ->countAllResults();



        $data = [
            'title' => $title,
            'image' => $imagename,
            'sequence' => $gallery_img_count + 1
        ];


        // Insert data into the database
        if (!empty($data)) {
            // $result = $this->db->table('gallery_dynamic')->insertBatch($data);
            $result = $this->db->table('gallery_dynamic')->insert($data);
        } else {
            $result = false;
        }


        $response = [
            'status' => 'success',
            'result' => $result
        ];

        return $this->response->setJSON($response);
    }


    // ------------------------------------------------------------>
    // edit gallery image
    public function edit_gallery_dynamic_view()
    {
        $g_id = $_POST['g_id'];

        $response = $this->db->table('gallery_dynamic')
            ->where('g_id', $g_id)
            ->get()
            ->getResultArray();

        return $this->response->setJSON($response);
    }


    // --------------------------------------------.
    // edit galley logic
    public function editlogic_gallery_dynamic()
    {
        $g_id = $_POST['gallery_edit_id'];
        $title = $_POST['title'];

        $file = $this->request->getFiles('image'); // Get all files from the request


        $file = $this->request->getFile('image');


        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imagename = $file->getRandomName();
            $file->move('uploads/gallery_dynamic', $imagename);
        }

        $old_img = $this->db->query('select image from gallery_dynamic where g_id=' . $g_id . '')->getRow();
        if (!empty($imagename)) {
            $imagename = $imagename;
        } else {
            $imagename = $old_img->image;
        }

        $data = [
            'title' => $title,
            'image' => $imagename
        ];

        if (!empty($data)) {
            $result = $this->db->table('gallery_dynamic')
                ->where('g_id', $g_id)
                ->update($data);

            // Check if rows were affected
            if ($this->db->affectedRows() > 0) {
                $this->session->set('success_gallery_edit', 'success');
                return redirect()->to('gallery-section-images');
            } else {
                $this->session->set('error_gallery_edit', 'errors');
                return redirect()->to('gallery-section-images');
            }
        }
    }



    // ------------------------------------------------------------------------>
    // gallery delete data
    public function gallery_dynamic_delete()
    {
        $g_id = $_POST['g_id'];

        $result = $this->db->table('gallery_dynamic')
            ->where('g_id', $g_id)
            ->delete();

        $response = [
            'status' => $result ? 1 : 0,
            'result' => $result
        ];



        return $this->response->setJSON($response);
    }



    // --------------------------------------------------------------------------------->
    // gallery dynamic set sequnce
    public function gallery_update_sequence()
    {
        // Check if form was submitted
        $g_id = $this->request->getPost('gallery_dynamic_id'); // Use $this->request for consistency
        $sequences = $this->request->getPost('newSequence'); // Get the sequences array

        // Check if both arrays are provided
        if (empty($g_id) || empty($sequences)) {
            return $this->response->setJSON(['status' => 0, 'message' => 'Missing data.']);
        }

        // Merge the gallery IDs with their new sequences
        $merge_data = array_combine($g_id, $sequences);



        // Initialize a variable to track the result
        $result = true;

        foreach ($merge_data as $index => $sequence) {
            // Prepare the data for updating
            $data = [
                'sequence' => $sequence
            ];

            // Update each record individually
            $update_result = $this->db->table('gallery_dynamic')
                ->where('g_id', $index)
                ->update($data);

            // Check if the update was successful
            if (!$update_result) {
                $result = false; // If any update fails, set result to false
                break; // Exit the loop on the first failure
            }
        }

        // Prepare the response
        $response = [
            'status' => $result ? 1 : 0,
            'result' => $result
        ];

        return $this->response->setJSON($response);
    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Video Url page
    public function video()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            // get title for website
            $data['website_title'] = "Video Url";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['video_desending'] = $this->Video_Model->video_desending();
            $data['content'] = "admin/video";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // ----------Add video link------------------------------------------------------------------
    public function add_video_link()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $data = [
                'video_link' => $_POST['video_link'],
                'videourl' => $_POST['video_link'],
            ];

            $result = $this->Video_Model->video_add_data($data);

            if ($result != false) {
                // echo "insert successfully";
                $this->session->set('success_video_add', 'success');
                return redirect()->to('video');
            } else {
                // echo "insert failed";
                $this->session->set('error_video_add', 'error');
                return redirect()->to('video');
            }
        } else {
            return redirect()->to('login');
        }
    }


    // ----------Edit video ------------------------------------------------------------------
    // ------------------------------------------------------>
    // edit banner section view
    public function edit_video_img_view()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $video_id = $_POST['video_id'];
            $response = $this->Video_Model->video_row_data($video_id);

            if (!empty($response)) {
                return json_encode($response);
            } else {
                return 0;
            }
        } else {
            return redirect()->to('login');
        }
    }


    public function video_editlogic()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $video_edit_id = $_POST['video_edit_id'];
            $data = [
                'video_link' => $_POST['video_link'],
                'videourl' => $_POST['video_link'],
            ];

            $result = $this->Video_Model->video_edit_data($data, $video_edit_id);

            if ($result != false) {
                // echo "insert successfully";
                $this->session->set('success_video_edit', 'success');
                return redirect()->to('video');
            } else {
                // echo "insert failed";
                $this->session->set('error_video_edit', 'error');
                return redirect()->to('video');
            }
        } else {
            return redirect()->to('login');
        }
    }




    // ----------Delete video ------------------------------------------------------------------
    public function video_delete()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {

            $video_id = $_POST['del_id'];

            $results = $this->Video_Model->video_deletedata($video_id);

            $response = array(
                'title' => 'Deleted!',
                'text' => 'Your data has been deleted.',
                'type' => 'success',
                'video_id' => $video_id,
                'results' => $results,
            );

            if ($results != false) {
                return json_encode($response);
            } else {
                return json_encode($response);
            }
        } else {
            return redirect()->to('login');
        }
    }






    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Manage Pages Logo info  page
    public function logo_info()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $data['logo_info'] = $this->Manage_Pages_Model->logo_favicon_details_show();

            // get title for website
            $data['website_title'] = "Logo-Info";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/logo_info";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }



    // --------Logo Info---------------------------------------------------------------------------------->
    // insert logo and info 
    public function edit_logo_info_logic1()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $manages_pages_id = $_POST['manages_pages_id'];

            // // check image valid or not
            // if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            //     $imagename1 = $file1->getRandomName();
            //     $file1->move('uploads', $imagename1);
            // }

            // if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            //     $imagename2 = $file2->getRandomName();
            //     $file2->move('uploads', $imagename2);
            // }

            // Handle file uploads
            $file = $_FILES;

            // Example usage of file handling (adjust as per your form field names)
            if ($file['logo']['error'] === UPLOAD_ERR_OK) {
                $newName = $file['logo']['name'];
                move_uploaded_file($file['logo']['tmp_name'], ROOTPATH . 'uploads/logo_info/' . $newName);
                $imagename1 = $newName;
            }

            if ($file['favicon_logo']['error'] === UPLOAD_ERR_OK) {
                $newName = $file['favicon_logo']['name'];
                move_uploaded_file($file['favicon_logo']['tmp_name'], ROOTPATH . 'uploads/logo_info/' . $newName);
                $imagename2 = $newName;
            }


            // old images
            $old_img = $this->db->query('select manages_pages_logo,manages_pages_favicon from manages_pages where manages_pages_id="' . $manages_pages_id . '" ')->getRow();
            if (!empty($imagename1)) {
                $imagename1 = $imagename1;
            } else {
                $imagename1 = $old_img->manages_pages_logo;
            }
            // 
            if (!empty($imagename2)) {
                $imagename2 = $imagename2;
            } else {
                $imagename2 = $old_img->manages_pages_favicon;
            }
            //    
            // 

            // store in array data
            $data = [
                'manages_pages_logo' => $imagename1,
                'manages_pages_favicon' => $imagename2
            ];


            $result = $this->Manage_Pages_Model->logo_info_insert($data, $manages_pages_id);


            if ($result != false) {
                // $this->session->set('success_logo_info_add', 'success');
                // return redirect()->to('logo-info');
                // return $this->response->setJSON($result);

                return $this->response->setJSON($result);
                // echo 1;
            } else {
                // $this->session->set('error_logo_info_add', 'error');
                // return redirect()->to('logo-info');
                return $this->response->setJSON(0);
                // echo 0;
            }
        } else {
            return redirect()->to('login');
        }
    }












    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //  home page backend section

    // home page view section
    public function homepage_sections()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            // all recipes list
            $data['for_home_section_allrecipes'] = $this->Recipes_Model->for_homesection_allrecipes();

            // all allergen category list
            $data['for_home_section_all_allergy_freeCategory'] = $this->Category_Model->get_Allergen_category_data_site();

            // all main category list
            $data['for_home_section_all_main_Category'] = $this->Category_Model->get_category_data_site();


            // all blog list
            $data['for_home_section_allblog'] = $this->Blog_Model->for_homesection_allblog();




            // xxxxxxxxxxxxxxxxxxxxxxxxxxx
            // Home page section

            // Allergen category section
            $data['homepage_Allergen_category_section'] = $this->All_headings->get_a_section('homepage-Allergen_category-section');

            // main category section
            $data['homepage_main_category_section'] = $this->All_headings->get_a_section('homepage-category-section');

            // youtube section
            $data['forhome_youtube_section_allrecipes'] = $this->Recipes_Model->for_homesection_youtube_allrecipes();
            $data['homepage_youtube_sec'] = $this->All_headings->get_a_section('homepage-youtube-section');

            // first section
            $data['homepage_first_sec'] = $this->All_headings->get_a_section('homepage-first-section');

            // second section
            $data['homepage_secound_sec'] = $this->All_headings->get_a_section('homepage-second-section');


            // third section
            $data['homepage_third_section'] = $this->All_headings->get_a_section('homepage-third-section');


            // fourth section
            $data['homepage_four_section'] = $this->All_headings->get_a_section('homepage-four-section');


            // get title for website
            $data['website_title'] = "Homepage Section";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/homepage_section";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }





    // ------------------------------------------------------------------------------->
    //  Allergen Free Category section  trending_category_add 
    public function homepage_Allergen_category_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $trending_category_data = '';

            $section_id = $_POST['section_id'];
            $heading = $_POST['heading'];
            $sub_heading = $_POST['sub_heading'];
            $trending_category_data = $_POST['trending_category_data'];

            if (!empty($trending_category_data)) {
                $category_id = implode(",", $trending_category_data);

                $data = [
                    'heading' => $heading,
                    'sub_heading' => $sub_heading,
                    'category_id' => $category_id,
                ];
            }


            $result = $this->All_headings->update_section($section_id, $data);

            if ($result == 1) {
                $this->session->set('success_allergen_categorysection_add', 'success');
            } else {
                $this->session->set('error_allergen_categorysection_add', 'error');
            }
            // print_r($data);
            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }



    // ------------------------------------------------------------------------------->
    //  Category section  trending_category_add 
    public function homepage_maincategory_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            $section_id = $_POST['section_id'];
            $heading = $_POST['heading'];
            $sub_heading = $_POST['sub_heading'];
            $trending_category_data = !empty($_POST['trending_category_data']) ? $_POST['trending_category_data'] : '';


            if (!empty($trending_category_data)) {
                $category_id = implode(",", $trending_category_data);

                $data = [
                    'heading' => $heading,
                    'sub_heading' => $sub_heading,
                    'category_id' => $category_id,
                ];
            }


            $result = $this->All_headings->update_section($section_id, $data);

            if ($result == 1) {
                $this->session->set('success_categorysection_add', 'success');
            } else {
                $this->session->set('error_categorysection_add', 'error');
            }
            // print_r($data);
            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------------>
    // homepage Youtube section
    public function homepage_youtube_section()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $section_id = $_POST['section_id'];
            $heading = $_POST['heading'];
            if (!empty($_POST['recipes_data'])) {
                $recipes_data = implode(",", $_POST['recipes_data']);
            }

            $data = [
                'heading' => $heading,
                'recipe_ids' => $recipes_data ?? '',
            ];

            $result = $this->All_headings->update_section($section_id, $data);

            if ($result == 1) {
                $this->session->set('success_youtbue_add', 'success');
            } else {
                $this->session->set('error_youtbue_add', 'error');
            }

            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }



    // ------------------------------------------------------>
    // homepage first section
    public function homepage_first_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            if (!empty($_POST['heading'])) {
                $data['heading'] = $_POST['heading'];


                if (!empty($_POST['recipes_data'])) {
                    $data['recipe_ids'] = implode(",", $_POST['recipes_data']);
                }

                $result = $this->All_headings->update_section($_POST['section_id'], $data);

                if ($result == 1) {
                    $this->session->set('success_fristsection_add', 'success');
                } else {
                    $this->session->set('error_fristsection_add', 'error');
                }
            }
            // print_r($data);
            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------->
    // homepage second section
    public function homepage_second_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            // other-img c_img
            $section_id = $_POST['section_id'];
            $file = $this->request->getFile('homepage_second_img');

            //  image logic
            // if ($file && $file->isValid() && !$file->hasMoved()) {
            //     $imagename = $file->getRandomName();
            //     $file->move('uploads/other-img', $imagename);
            // }


            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Get the original file name and extension
                $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                $extension = $file->getExtension();

                // Set the target directory
                $targetDirectory = 'uploads/other-img/';

                // Initialize the new filename
                $imagename = $file->getName();
                $counter = 0;

                // Check if a file with the same name exists and modify the name accordingly
                while (file_exists($targetDirectory . $imagename)) {
                    $counter++;
                    $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                }

                // Move the file to the uploads directory with the new filename
                $file->move($targetDirectory, $imagename);
            }




            // old images
            $old_img = $this->db->query('select image from all_headings where section_id="' . $section_id . '" ')->getRow();
            if (!empty($imagename)) {
                $imagename = $imagename;
            } else {
                $imagename = $old_img->image;
            }

            $data = [
                'heading' => $_POST['heading'],
                'link' => $_POST['link_url'],
                'desc' => $_POST['second_section_description'],
                'image' => $imagename
            ];

            // print_R($data);
            // die;
            $result = $this->All_headings->update_section($section_id, $data);
            // echo $res;
            // die;
            if ($result == 1) {
                $this->session->set('success_secondsection_add', 'success');
            } else {
                $this->session->set('error_secondsection_add', 'error');
            }
            // print_r($data);
            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }



    // ------------------------------------------------------------------------------->
    //third section  trending_recipes_add 
    public function homepage_third_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            $section_id = $_POST['section_id'];
            $heading = $_POST['heading'];
            $trending_recipes_data = $_POST['trending_recipes_data'];

            if (!empty($trending_recipes_data)) {
                $recipe_ids = implode(",", $trending_recipes_data);

                $data = [
                    'heading' => $heading,
                    'recipe_ids' => $recipe_ids,
                ];
            }


            $result = $this->All_headings->update_section($section_id, $data);

            if ($result == 1) {
                $this->session->set('success_thirssection_add', 'success');
            } else {
                $this->session->set('error_thirssection_add', 'error');
            }
            // print_r($data);
            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }






    // ------------------------------------------------------------------------------->
    //four section  
    public function homepage_four_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {


            $section_id = $_POST['section_id'];
            $heading = $_POST['heading'];

            $data = [
                'heading' => $heading,
            ];

            if (!empty($_POST['four_sectiondata_select_data'])) {

                $four_sectiondata_select_data = $_POST['four_sectiondata_select_data'];

                $blog_ids = implode(",", $four_sectiondata_select_data);

                $data = [
                    'heading' => $heading,
                    'blog_ids' => $blog_ids,
                ];
            }


            $result = $this->All_headings->update_section($section_id, $data);

            if ($result == 1) {
                $this->session->set('success_foursection_add', 'success');
            } else {
                $this->session->set('error_foursection_add', 'error');
            }
            // print_r($data);
            return redirect()->to('homepage-sections');
        } else {
            return redirect()->to('login');
        }
    }






    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Import Export Recipes

    // ------------------------------------------------------------------>
    // Import recipes data section
    public function import_export_recipes_view()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {

            // get title for website
            $data['website_title'] = "Import Export Recipes";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/import_export_recipes";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }




    public function excel_format_import_recipes()
    {
        // Generate a filename with the current date
        // $filename = 'format_' . date('Ymd') . '.csv';
        $filename = 'yumcraft_importformat' . '.csv';

        // Set headers to initiate file download
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // Open a file pointer connected to the output stream
        $file = fopen('php://output', 'w');

        // Define the CSV header row
        $header = array(
            "Recipe Title",
            "Recipe Url",
            "Popular Recipe",
            "Image Url",
            "Alt Image data",
            "Main Category Id / Allergen Category Id",
            "Tag Id",
            "Recipe Shortdescription",
            "Recipe Description",
            "Video Url",
            "Serving",
            "Prep Time",
            "Cook Time",
            "Total Time",
            "Ingredients",
            "Method",
            "Free From",
            "Recipe Notes",
            "Conclusion",
            "Nutrition",
            "Seo Title",
            "Seo Keyword",
            "Seo Description",
            "Publish Date"
        );

        // Write the header row to the CSV
        fputcsv($file, $header);

        // Define a row of dummy data
        $dummyData = array(
            "Sample Recipe Title",
            "Recipe Url",
            "yes OR no",          // Assuming "Popular Recipe" is a Yes/No field
            "image.jpg",
            "Alt Image data",
            "1,2,3,4,5,6",            // Example Category Id with allergen category
            "5,6,7",            // Example Tag Id
            "This is a sample Short description.",
            "This is a sample description.",
            "http://example.com/video-url",
            "10",
            "15",
            "20",
            "55",
            "Ingredients Enter Here",
            "Enter Method",
            "Enter Free From",
            "Enter Recipe Notes",
            "Enter Conclusion",
            "Enter Nutrition",
            "Sample SEO Title",
            "Sample SEO keywords",
            "Sample SEO Description",
            "Month/Day/Year ex (20/09/2024)"
        );

        // Write the dummy data row to the CSV
        fputcsv($file, $dummyData);

        // Close the file pointer
        fclose($file);

        // Exit to ensure no further output is sent
        exit;
    }





    // ----- Import recipes  ----------------------------------------------------------------------------------->

    public function import_recipes_data()
    {
        $file = $this->request->getFile('csv_recipe_file');

        // Check if the file is uploaded and valid
        if ($file->isValid() && !$file->hasMoved()) {
            // Get the file extension
            $extension = $file->getClientExtension();

            // Define allowed file extensions
            $allowedExtensions = ['csv', 'xls', 'xlsx'];

            // Validate file extension
            if (!in_array($extension, $allowedExtensions)) {
                echo "Unsupported file format. Please upload a CSV, XLS, or XLSX file.";
                return;
            }

            // Load the file using the appropriate reader
            $spreadsheet = null;
            try {
                if ($extension === 'csv') {
                    $reader = new CsvReader();
                    $spreadsheet = $reader->load($file->getTempName());
                } elseif ($extension === 'xlsx') {
                    $reader = new XlsxReader();
                    $spreadsheet = $reader->load($file->getTempName());
                } elseif ($extension === 'xls') {
                    $reader = new XlsReader();
                    $spreadsheet = $reader->load($file->getTempName());
                }
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                echo "Error loading file: " . $e->getMessage();
                return;
            }

            // Now you can access the data in the spreadsheet
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            // Array to store imported data
            $csvData = [];
            $category_data = [];
            $tags_data = [];

            // Process the data
            // date_default_timezone_set('Asia/Kolkata');
            // $date = date('d-m-Y H:i:s A');



            $flag = 2;  // Number of rows to skip
            $rowCount = 0;   // Counter to track the number of rows processed
            // $flag = 1;

            foreach ($sheetData as $row) {
                $rowCount++;

                // Skip rows until $rowCount is greater than $skipCount
                if ($rowCount <= $flag) {
                    continue;
                }

                // skip first row heading
                // if ($flag == 1) {
                //     $flag = 0;
                //     continue;
                // }


                // skip then title isnot found
                if (empty($row[0])) {
                    continue;
                }
                // else{
                //     // echo $row[0]."<br>";
                // }


                // Example: converting 'yes' or 'Yes' to 1, otherwise 0
                $popularRecipe = (isset($row[2]) && strtolower($row[2]) === 'yes' || $row[2] == 'Yes') ? 1 : 0;

                // ----------------------------------------------------
                // recipes url logic 
                // title url function
                $re_titleurl = $this->create_url(isset($row[1]) ? $row[1] : '');


                // ---------------------------
                //  get date format date
                $dateString = isset($row[22]) ? $row[22] : '';
                $formattedDate = date('Y-m-d', strtotime($dateString));



                // re_titleurl
                // Prepare recipe data
                $csvData[] = [
                    're_title' =>  trim(isset($row[0])) ? $row[0] : '',
                    're_titleurl' => preg_replace('/[�]/', '', trim($re_titleurl)) ?? '', // Example: this could be a URL-friendly version of the title
                    're_popular_recipe' => $popularRecipe,
                    're_images' => isset($row[3]) ? $row[3] : '',
                    'img_alt' => isset($row[4]) ? $row[4] : '',
                    're_shortdescription' => preg_replace('/[�]/', '', trim($row[7])) ?? '',
                    're_description' => preg_replace('/[�]/', '', trim($row[8])) ?? '',
                    'video_url' => isset($row[9]) ? trim($row[9]) : '',


                    'serving' => preg_replace('/[�]/', '', trim($row[10])) ?? '',
                    'prep_time' => preg_replace('/[�]/', '', trim($row[11])) ?? '',
                    'cook_time' => preg_replace('/[�]/', '', trim($row[12])) ?? '',
                    'total_time' => preg_replace('/[�]/', '', trim($row[13])) ?? '',
                    'ingredients' => preg_replace('/[�]/', '', trim($row[14])) ?? '',
                    'method' => preg_replace('/[�]/', '', trim($row[15])) ?? '',
                    'free_from' => preg_replace('/[�]/', '', trim($row[16])) ?? '',
                    'Recipe_Notes' => preg_replace('/[�]/', '', trim($row[17])) ?? '',
                    'conclusion' => preg_replace('/[�]/', '', trim($row[18])) ?? '',
                    'nutrition' => preg_replace('/[�]/', '', trim($row[19])) ?? '',

                    'seo_title' => isset($row[20]) ? $row[20] : '',
                    'seo_keyword' => isset($row[21]) ? $row[21] : '',
                    'seo_description' => isset($row[22]) ? $row[22] : '',
                    'publish_data' => $formattedDate,
                ];


                // Prepare category data
                $category_data[] = [
                    'category_id' => isset($row[5]) ? $row[5] : '',
                ];

                // Prepare tags data
                $tags_data[] = [
                    'tag_id' => isset($row[6]) ? $row[6] : '',
                ];
            }

            // echo '<pre>';
            // print_r($csvData);
            // die;




            // Move the file to the uploads directory
            $uploadPath = 'uploads/excel_recipe_import/';
            if ($file->move($uploadPath, $file->getRandomName())) {
                echo "File moved successfully to: " . $uploadPath . $file->getRandomName();
            } else {
                echo "File upload failed. Error: " . $file->getError();
                return;
            }


            //  echo "hello";
            //  die;



            // Process data insertion into database
            foreach ($csvData as $index => $data) {
                // Insert recipe data
                $insertedId = $this->Recipes_Model->recipes_insert($data);

                // Handle category and tag data if they exist
                if (isset($category_data[$index])) {
                    $cat_data = $category_data[$index];
                    $cat_data = implode(',', $cat_data); // Assuming 'category_id' should be comma-separated string

                    $tag_data = isset($tags_data[$index]) ? $tags_data[$index] : [];
                    $tag_data = implode(',', $tag_data); // Assuming 'tag_id' should be comma-separated string

                    $catdata = [
                        'recipe_id' => $insertedId,
                        'category_id' => $cat_data,
                        'tag_id' => $tag_data,
                    ];

                    // Insert category and tag data
                    $this->db->table('recipe_category_tag')->insert($catdata);
                }
            }

            $this->session->set('success_import_data', 'success');
            return redirect()->to('import-export-recipes');
        } else {
            $this->session->set('error_import_data', 'error');
            return redirect()->to('import-export-recipes');
        }
    }






    // ----- Export recipes  data ----------------------------------------------------------------------------------->

    // public function export_recipes_date_vise()
    // {

    //     if ($_POST['download_from'] && $_POST['download_to']) {
    //         $from = date('d-m-Y', strtotime($_POST['download_from']));
    //         $to = date('d-m-Y', strtotime($_POST['download_to']));


    //         $next_date_to = date('d-m-Y', strtotime($to . ' +1 day'));

    //         //   echo '<pre>';
    //         //   print_r($from);
    //         //   echo "<br>";
    //         //   print_r($next_date_to);
    //         //   die;

    //         // query
    //         $result = $this->db->table('recipes');
    //         if (!empty($_POST['download_from']) && !empty($_POST['download_to'])) {
    //             $result->select('re_id, re_title, re_titleurl, re_popular_recipe, re_images, re_description,video_url,serving,prep_time,cook_time,total_time,ingredients,method,free_from,Recipe_Notes,conclusion,seo_title,seo_keyword,seo_description,active, publish_data');
    //             $result->where('publish_data >=', $from); // Publish date is on or after $from
    //             $result->where('publish_data <=', $next_date_to); // Publish date is on or before $to
    //         }
    //         // Execute the query
    //         $query = $result->get();
    //         $data = $query->getResultArray();
    //     } else {
    //         $data = $this->db->query("select re_id, re_title, re_titleurl, re_popular_recipe, re_images, re_description,video_url,serving,prep_time,cook_time,total_time,ingredients,method,free_from,Recipe_Notes,conclusion,seo_title,seo_keyword,seo_description,active, publish_data from recipes")->getResultArray();
    //     }


    //     //   echo '<pre>';
    //     //   print_r($data);
    //     //   die;
    //     // -------------------------------------->
    //     // export logic
    //     // Set CSV file path
    //     $filePath = 'Downloads/recipes_list.csv';

    //     // Create 'Downloads' directory if it doesn't exist
    //     if (!is_dir('Downloads')) {
    //         mkdir('Downloads', 0777, true);
    //     }

    //     // Open the CSV file for writing
    //     $file = fopen($filePath, 'w');

    //     // Manually set headers to the CSV file
    //     $headers = [
    //         'Id',
    //         'Recipes Title',
    //         'Recipe Url',
    //         'Popular Recipe',
    //         'Image Url',
    //         'Recipe Description',
    //         'video_url',
    //         'seo_title',
    //         'seo_keyword',
    //         'seo_description',
    //         'Active',
    //         'Publish Date',
    //     ];

    //     fputcsv($file, $headers);

    //     // Write data to the CSV file
    //     foreach ($data as $row) {
    //         fputcsv($file, $row);
    //     }




    //     // Close the CSV file
    //     fclose($file);

    //     // Prompt the user to download the file
    //     header('Content-Type: application/csv');
    //     header('Content-Disposition: attachment; filename="recipes_list.csv"');
    //     readfile($filePath);

    //     // Delete the file after sending it to the user
    //     unlink($filePath);
    // }





    public function export_recipes_date_vise()
    {

        if ($_POST['download_from'] && $_POST['download_to']) {
            $from = date('d-m-Y', strtotime($_POST['download_from']));
            $to = date('d-m-Y', strtotime($_POST['download_to']));


            $next_date_to = date('d-m-Y', strtotime($to . ' +1 day'));

            //   echo '<pre>';
            //   print_r($from);
            //   echo "<br>";
            //   print_r($next_date_to);
            //   die;

            // query
            $result = $this->db->table('recipes');
            if (!empty($_POST['download_from']) && !empty($_POST['download_to'])) {
                $result->select('re_id, re_title, re_titleurl, re_popular_recipe, re_images,img_alt, re_shortdescription,re_description,video_url,serving,prep_time,cook_time,total_time,ingredients,method,free_from,Recipe_Notes,conclusion,nutrition,seo_title,seo_keyword,seo_description,active, publish_data');
                $result->where('publish_data >=', $from); // Publish date is on or after $from
                $result->where('publish_data <=', $next_date_to); // Publish date is on or before $to
            }
            // Execute the query
            $query = $result->get();
            $data = $query->getResultArray();
        } else {
            $data = $this->db->query("select re_id, re_title, re_titleurl, re_popular_recipe, re_images,img_alt, re_shortdescription,re_description,video_url,serving,prep_time,cook_time,total_time,ingredients,method,free_from,Recipe_Notes,conclusion,nutrition,seo_title,seo_keyword,seo_description,active, publish_data from recipes")->getResultArray();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Define the CSV header row
        $headers = [
            'Id',
            'Recipes Title',
            'Recipe Url',
            'Popular Recipe',
            'Image Url',
            'img_alt',
            'Recipe Short Description',
            'Recipe Description',
            'video_url',
            'Seving',
            'Prep Time',
            'Cook Time',
            'Total Time',
            'Ingredients',
            'Method',
            'Free From',
            'Recipe Notes',
            'Conclusion',
            'Nutrition',
            'seo_title',
            'seo_keyword',
            'seo_description',
            'Active',
            'Publish Date',
        ];

        // Write the header row to the sheet
        $sheet->fromArray($headers, NULL, 'A1');

        // Write data to the sheet
        $rowNum = 2;
        foreach ($data as $row) {
            $row['re_titleurl'] = base_url($row['re_titleurl']);
            $row['re_images'] = base_url('uploads/recipes_img/' . $row['re_images']);

            $sheet->fromArray($row, NULL, 'A' . $rowNum);
            $rowNum++;
        }

        // Generate a filename
        $filename = 'Recipes_list.csv';

        // Set headers to initiate file download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Create a CSV writer
        $writer = new Csv($spreadsheet);

        // Write the file to the output
        $writer->save('php://output');

        // Exit to ensure no further output is sent
        exit;
    }









    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Contact List page
    public function contact()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $data['contact_desending'] = $this->Contactus_Model->contact_desending();

            // get title for website
            $data['website_title'] = "Contacts";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/contactus";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // -----Contact us download excel file--------------------------------------------------------------------->
    public function excel_download_contact()
    {
        // Get data from the database
        // $data = $this->db->query('select contact_id,contact_name,contact_email,contact_mob,contact_msg,timestamp from contact_us where active=1 order by contact_id desc')->getResultArray();

        $data = $this->db->table('contact_us')
            ->select('contact_id, contact_name, contact_email, contact_mob, contact_msg, DATE(timestamp) AS date_only')
            // ->where('active', 1)
            // ->orderBy('contact_id', 'DESC')
            ->get()
            ->getResultArray();


        // Set CSV file path
        $filePath = 'Downloads/Contact_list.csv';

        // Create 'Downloads' directory if it doesn't exist
        if (!is_dir('Downloads')) {
            mkdir('Downloads', 0777, true);
        }

        // Open the CSV file for writing
        $file = fopen($filePath, 'w');

        // Manually set headers to the CSV file
        // $headers = ['ID', 'Email Address', 'First Name', 'Last Name', 'Active', 'Created At', 'Updated At'];
        $headers = ['Contact Id', 'Contact Name', 'Contact Email Id', 'Mobile No', 'Message', 'Date & Time'];
        fputcsv($file, $headers);

        // Write data to the CSV file
        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        // Close the CSV file
        fclose($file);

        // Prompt the user to download the file
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="Contact_list.csv"');
        readfile($filePath);

        // Delete the file after sending it to the user
        unlink($filePath);
    }




    // -----Contact us delete--------------------------------------------------------------------->
    public function contact_delete()
    {
        $checklogin = $this->checklogin();
        if (isset($checklogin)) {
            $contact_id = $_POST['del_id'];

            $results = $this->Contactus_Model->contact_deletedata($contact_id);

            $response = array(
                'title' => 'Deleted!',
                'text' => 'Your data has been deleted.',
                'type' => 'success',
                'contact_id' => $contact_id,
                'results' => $results,
            );

            if ($results != false) {
                return json_encode($response);
            } else {
                return json_encode($response);
            }
        } else {
            return redirect()->to('login');
        }
    }


    // ------ at time delete or deactivate contact us data --------------------------------------------------------------------------------------------------->
    // at time delete deactivate contact us
    public function contactus_attime_deleteAll()
    {
        $contact_id = $_POST['contact_id'];

        $result = $this->Contactus_Model->contactus_attime_deleteall_data($contact_id);

        $response = [
            'status' => $result ? 'success' : 'failure',
            'result' => $result ? 1 : 0,
        ];

        return $this->response->setJSON($response);
    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //   Comments List page section


    // ----------------------------------------------------------->comments recipe
    // comments recipes section
    public function comments_recipes()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            $commentrecipe = $this->Rating_Leads_Model->comment_recipeslist();
            $data['comment_recipe_data'] = $commentrecipe;

            // Extracting recipe_ids from the result array
            $recipe_ids['re_id'] = array_column($commentrecipe, 'rel_id');

            if (!empty($recipe_ids['re_id'])) {
                $data['recipe_details'] = $this->Recipes_Model->get_recipes_data($recipe_ids['re_id']);
            }




            //   echo '<pre>';
            //   print_r($data['recipe_details']);
            //   die;

            // logo and title
            $data['website_title'] = "Recipes Comments";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/comment_recipes";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }



    // -------------------------------------------------->
    // recipe comments delete
    public function comments_recipe_delete()
    {
        $lead_id = $_POST['lead_id'];

        $result = $this->Rating_Leads_Model->delete_comments_recipe($lead_id);

        $response = array(
            'status' => 'success',
            'lead_id' => $lead_id,
            'results' => $result,
        );

        if ($result != 0) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // --------
    // active comment recipe
    public function active_recipe_comments()
    {
        $lead_id = $_POST['lead_id'];

        $output = $this->Rating_Leads_Model->active_recipe_comments($lead_id);

        $response = array(
            'status' => 'success',
            'lead_id' => $lead_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // --------
    // deactive comments recipe 
    public function deactive_recipes_comments()
    {
        $lead_id = $_POST['lead_id'];

        $output = $this->Rating_Leads_Model->deactive_recipe_comments($lead_id);

        $response = array(
            'status' => 'success',
            'lead_id' => $lead_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // ------ at time delete or deactivate comments recipe data --------------------------------------------------------------------------------------------------->
    // at time delete deactivate comments recipe
    public function comments_recipe_attime_deleteAll()
    {
        $lead_id = $_POST['lead_id'];

        $result = $this->Rating_Leads_Model->comments_recipe_attime_deleteall_data($lead_id);

        $response = [
            'status' => $result ? 'success' : 'failure',
            'result' => $result ? 1 : 0,
        ];

        return $this->response->setJSON($response);
    }







    
    // ------------------------------------->
    // ----------------------------------------------------------->comments Blog
    //    blog list
    public function comments_blog()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {



            $commentblog = $this->Rating_Leads_Model->comment_blog_list();
            $data['comment_blog_data'] = $commentblog;


            // Extracting recipe_ids from the result array
            $blog_ids['blog_id'] = array_column($commentblog, 'rel_id');


            if (!empty($blog_ids['blog_id'])) {
                $data['blog_details'] = $this->Blog_Model->get_blog_data($blog_ids['blog_id']);
            }

            //   echo '<pre>';
            //   print_r($data['recipe_details']);
            //   die;

            // title and logo
            $data['website_title'] = "Blog Comments";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/comment_blog";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }



    // -------------------------------------------------->
    // blog comments delete
    public function comments_blog_delete()
    {
        $lead_id = $_POST['lead_id'];

        $result = $this->Rating_Leads_Model->delete_comments_blog($lead_id);

        $response = array(
            'status' => 'success',
            'lead_id' => $lead_id,
            'results' => $result,
        );

        if ($result != 0) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // --------
    // active comment blog
    public function active_blog_comments()
    {
        $lead_id = $_POST['lead_id'];

        $output = $this->Rating_Leads_Model->active_blog_comments($lead_id);

        $response = array(
            'status' => 'success',
            'lead_id' => $lead_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // --------
    // deactive comments blog 
    public function deactive_blog_comments()
    {
        $lead_id = $_POST['lead_id'];

        $output = $this->Rating_Leads_Model->deactive_blog_data_comments($lead_id);

        $response = array(
            'status' => 'success',
            'lead_id' => $lead_id,
            'results' => $output,
        );

        if ($output != false) {
            return json_encode($response);
        } else {
            return json_encode($response);
        }
    }


    // ------ at time delete or deactivate comments blog data --------------------------------------------------------------------------------------------------->
    // at time delete deactivate comments blog
    public function comments_blog_attime_deleteAll()
    {
        $lead_id = $_POST['lead_id'];

        $result = $this->Rating_Leads_Model->comments_blog_attime_deleteall_data($lead_id);

        $response = [
            'status' => $result ? 'success' : 'failure',
            'result' => $result ? 1 : 0,
        ];

        return $this->response->setJSON($response);
    }







    // xxxxx   Uploads   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //  Gallery Section 


    // // this logic for getting for all image
    // public function getAllImages($folder)
    // {
    //     $images = [];
    //     $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']; // Allowed image extensions

    //     // Check if the folder exists
    //     if (is_dir($folder)) {
    //         $dirIterator = new RecursiveDirectoryIterator($folder);
    //         $iterator = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::SELF_FIRST);

    //         foreach ($iterator as $file) {
    //             if ($file->isFile()) {
    //                 // Get file extension
    //                 $fileExtension = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
    //                 // Check if file is an image
    //                 if (in_array($fileExtension, $allowedExtensions)) {
    //                     $images[] = $file->getPathname();
    //                 }
    //             }
    //         }
    //     }

    //     return $images;
    // }




    // ----------------------------------->
    // gallery view section
    public function gallery_view_section()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

          
            $data['allgallery_img_desc_data'] = $this->Gallery_Model->get_image_data();



            $data['website_title'] = "Gallery Section";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/gallery";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------->
    // gallery image insert logic

    public function gallery_img_insert_logic()
    {
        $files = $this->request->getFiles(); // Get all files from the request
        $alt_data = $_POST['gallery_image_alt'];

        $data = [];

        if (isset($files) && isset($alt_data)) {




            foreach ($files['gallery_image'] as $index => $file) {
                // if ($file && $file->isValid() && !$file->hasMoved()) {
                //     $imagename = $file->getRandomName();
                //     $file->move('uploads/gallery', $imagename);

                if ($file && $file->isValid() && !$file->hasMoved()) {
                    // Get the original file name and extension
                    $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
                    $extension = $file->getExtension();

                    // Set the target directory
                    $targetDirectory = 'uploads/gallery/';

                    // Initialize the new filename
                    $imagename = $file->getName();
                    $counter = 0;

                    // Check if a file with the same name exists and modify the name accordingly
                    while (file_exists($targetDirectory . $imagename)) {
                        $counter++;
                        $imagename = $originalName . "($counter)." . $extension; // Create new filename format
                    }

                    // Move the file to the uploads directory with the new filename
                    $file->move($targetDirectory, $imagename);


                    // Assign the corresponding alt text (if exists) to each image
                    $alt_text = isset($alt_data[$index]) ? $alt_data[$index] : '';


                    $data[] = [
                        'image' => $imagename,
                        'gallery_image_alt' => $alt_text
                    ];
                }

                // }
            }






            // Insert data into the database
            if (!empty($data)) {
                $result = $this->db->table('gallery')->insertBatch($data); // Use insertBatch for multiple records
            } else {
                $result = false;
            }

            return $this->response->setJSON([
                'status' => $result ? 1 : 0,
                'result' => $result
            ]);
        }
    }



    // ----------------------------------------------------------------------->
    // ----------------------------------------------------------------------->

    // Gallery image edit section
    public function website_gallery_edit()
    {

        // echo "test";
        $gallery_id = $_POST['gallery_id'];

        $response = $this->db->table('gallery')
            ->where('gallery_id', $gallery_id)
            ->get()
            ->getRow();

        return $this->response->setJSON($response);
    }


    // ----------------------------------------------------------------------->
    // websit4 gallery edit logic
    public function edit_logic_gallery_website()
    {
        $gallery_id = $_POST['gallery_id'];
        $file = $this->request->getFile('gallery_image');


        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imagename = $file->getRandomName();
            $file->move('uploads/gallery', $imagename);
        }

        $old_img = $this->db->query('select image from gallery where gallery_id=' . $gallery_id . '')->getRow();
        if (!empty($imagename)) {
            $imagename = $imagename;
        } else {
            $imagename = $old_img->image;
        }

        $data = [
            'gallery_image_alt' => $_POST['gallery_image_alt'],
            'image' => $imagename,

        ];



        // ------ Database insert
        $result = $this->db->table('gallery')
            ->where('gallery_id', $gallery_id)
            ->update($data);


        $response = [
            'status' => $result ? 1 : 0,
            'result' => $result
        ];

        return $this->response->setJSON($response);
    }


    // ----------------------------------------------------------------------->
    // gallery image delete
    public function gallery_imgdelete()
    {
        $gallery_id = $_POST['gallery_id'];

        $result = $this->db->table('gallery')
            ->where('gallery_id', $gallery_id)
            ->delete();

        $response = [
            'status' => $result ? 'success' : 'failure',
            'result' => $result ? 1 : 0
        ];

        return $this->response->setJSON($response);
    }


    // ----------------------------------------------------------------------------->
    // gallery_img_attime_deleteAll
    public function gallery_img_attime_deleteAll()
    {
        $gallery_id = $this->request->getPost('gallery_id');  // Use CodeIgniter method to fetch POST data

        // Ensure gallery_id is valid
        if (empty($gallery_id)) {
            return $this->response->setJSON([
                'status' => 'failure',
                'message' => 'Invalid gallery_id'
            ]);
        }

        $result = $this->Gallery_Model->gallery_attime_delete_all($gallery_id);

        $response = [
            'status' => $result ? 'success' : 'failure',
            'result' => $result,
        ];

        return $this->response->setJSON($response);
    }






    // ------------------------------------------------------------------------------------------>
    // recipe galllery section
    public function gallery_recipe_img()
    {
        $checklogin = $this->checklogin();

        if (isset($checklogin)) {

            // ---------------------------------------------------------------------------------------------------->
            // main recipe section
            if (!empty($_GET['search_here_recipe_img'])) {
                $pages = $this->Recipes_Model->search_get_recipe_img($_GET['search_here_recipe_img']);
                $data['all_recipes_img_desc'] = $pages['search_all_recipes_img_desc'];
                $data['pager_recipe'] = $pages['pager'];

                // input value for show the input value
                $data['search_recipe_img'] = $_GET['search_here_recipe_img'];
            } else {
                $pages = $this->Recipes_Model->get_recipe_img_all();
                $data['all_recipes_img_desc'] = $pages['all_recipes_img_desc'];
                $data['pager_recipe'] = $pages['pager'];
            }



            $data['website_title'] = "Recipe Gallery";
            $data['logo_favicon'] = $this->logo_favicon();

            $data['content'] = "admin/gallery_recipes_img";
            return view('admin/admin_layout', $data);
        } else {
            return redirect()->to('login');
        }
    }


    // ------------------------------------------------->
    // edit alt data recipes get alt data
    public function get_recipe_alt_recipe_gallery() 
    {
        $recipe_id=$_POST['recipe_id'];

        $response=$this->db->table('recipes')
                            ->select('re_id ,img_alt')
                            ->where('re_id',$recipe_id)
                            ->get()
                            ->getRow();
        
        return $this->response->setJSON($response);
    }


    // ------------------->
    // gallery recipes edit logic
    public function gallery_recipe_edit_logic()
    {
        $recipe_id=$_POST['recipe_id'];
        $img_alt=$_POST['gallery_recipe_image_alt'];

        $data=[
            'img_alt'=>$img_alt,
        ];

        $result=$this->db->table('recipes')
                            ->where('re_id',$recipe_id)
                            ->update($data);

        $response=[
            'status'=>$result ? 1 : 0,
            'result'=>$result
        ];

        return $this->response->setJSON($response);
    }

 


}
