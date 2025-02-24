<?php


namespace App\Models;

use CodeIgniter\Model;

class Recipes_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'recipes';
    protected $primaryKey = 'r_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // recipes insert

    public function recipes_insert($data)
    {
        $this->db->table('recipes')
            ->insert($data);

        // Get the ID of the inserted row
        $insertedId = $this->db->insertID();

        // Check if the insert was successful
        if ($this->db->affectedRows() == 1) {
            // Fetch the inserted data
            return $insertedId;
        } else {
            // Insertion failed
            return false;
        }
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // recipes display
    public function allrecipes()
    {
        // return $this->db->query("select * from recipes where active=1 order by re_id desc");

        // return [
        //     'allrecipes' => $this->paginate(2),
        //     'pager' => $this->pager,
        // ];


        $query = $this->db->table('recipes')
            ->select('*')
            // ->where('active', 1)
            ->orderBy('re_id', 'DESC')
            ->get();

        return $result = $query->getResultArray();


    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // recipes re_id only
    public function re_id_data()
    {
        return $this->db->query("select re_id from recipes where active=1")->getResultArray();
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // recipes edit
    public function editrecipes($re_id)
    {
        // return $this->db->query("select * from recipes where active=1 and re_id=$re_id")->getRow();

        $query = $this->db->table('recipes')
            ->where('recipes.re_id', $re_id);

        $result = $query->get()->getRow();

        return $result;
    }


    public function editrecipes_logicdata($data, $re_id)
    {
        $this->db->table('recipes')
            ->where('re_id', $_POST['re_id'])
            ->update($data);

        $insertedRows = $this->db->affectedRows();
        if ($insertedRows > 0) {
            return $re_id;
        } else {
            return false;
        }
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // recipes delete
    function recipes_deletedata($re_id)
    {
        $this->db->table('recipes')
            ->where('re_id', $re_id)
            ->delete();


        $insertedRows = $this->db->affectedRows();
        if ($insertedRows > 0) {
            return true;
        } else {
            return false;
        }
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // deactive recipe check
    function deactive_recipe($re_id)
    {
        $data['active'] = 0;

        return $this->db->table('recipes')
            ->where('re_id', $re_id)
            ->update($data);
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // active recipe check
    function active_recipe($re_id)
    {
        $data['active'] = 1;

        return $this->db->table('recipes')
            ->where('re_id', $re_id)
            ->update($data);
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // deactivate attime data
    public function recipes_attime_deleteall_data($re_id)
    {
        // deactivate logic
        //  $data['active']=2;

        //  return $this->db->table('recipes')
        //                  ->whereIn('re_id',$re_id)
        //                  ->update($data);


        // delete logic
        return $this->db->table('recipes')
            ->whereIn('re_id', $re_id)
            ->delete();
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // for get all recipes for section  
    public function for_homesection_allrecipes()
    {
        // return $this->db->table('recipes')
        //     ->select('re_id,re_title')
        //     ->where('active', 1)
        //     ->orderBy('re_id', 'DESC')
        //     ->get()->getResultArray();


        return $this->db->table('recipes')
            ->select('recipes.re_id, recipes.re_title')
            ->join('recipe_category_tag', 'recipes.re_id = recipe_category_tag.recipe_id')
            ->join('category', 'recipe_category_tag.category_id = category.c_id')
            ->where('category.c_id IS NOT NULL')
            ->orderBy('recipes.re_id', 'DESC')
            ->get()->getResultArray();
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // for get all Youtube recipes for section  
    public function for_homesection_youtube_allrecipes()
    {
        return $this->db->table('recipes')
            ->select('re_id, re_title')
            ->where('active', 1)
            ->orderBy('re_id', 'DESC')
            ->where('video_url IS NOT NULL') // Ensures the video URL is not null
            ->where('video_url !=', '') // Ensures the video URL is not empty
            ->get()
            ->getResultArray();
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // for comments section logic
    // ---------------------------------------------------------->
    // recpe id vise get recipes
    public function get_recipes_data($recipe_ids)
    {
        return $this->db->table('recipes')
            ->select('*')
            ->whereIn('re_id', $recipe_ids)
            ->get()->getResultArray();
    }






    // -------------------------------------------------------------->
    // Gallery Section get recipe images
    public function get_recipe_img_all()
    {
        return [
            'all_recipes_img_desc' => $this->orderBy('re_id', 'DESC')->paginate(10),
            'pager' => $this->pager,
        ];
    }


    // ------------->
    // get search data
    public function search_get_recipe_img($search_value)
    {
        return [
            'search_all_recipes_img_desc' => $this->orderBy('re_id', 'DESC')->like('re_images', $search_value)->orlike('img_alt', $search_value)->paginate(10),
            'pager' => $this->pager,
        ];
    }








    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Site Home (Frontend Side)  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx



    // ---------------------------------------------------------->
    // get recipes 
    public function limited_recipes_forhomepage()
    {
        return $this->db->table('recipes')
            ->orderBy('re_id', 'DESC')
            ->limit(5)
            ->get()->getResultArray();
    }



    // --------------------------------------------------------------->
    // get Two recipes for blog details page
    public function get_two_recipe_data()
    {
        return $this->db->table('recipes')
            ->orderBy('re_id', 'DESC')
            ->limit(2)
            ->get()
            ->getResultArray();
    }


    // -------------------------------------------------------------->
    // get all recipe for recipe section
    public function get_all_recipe_for_recipe_section()
    {
        // $this->db->table('recipes')
        //     ->orderBy('re_id', 'DESC');

        // return [
        //     'get_allrecipe' => $this->paginate(50),
        //     'pager' => $this->pager,
        // ];


        // Apply ordering and return paginated results
        return [
            'get_allrecipe' => $this->orderBy('re_id', 'DESC')->paginate(50),
            'pager' => $this->pager,
        ];
    }



    // -------------------------------------------------------------------->
    // get all allergen recipe using category id
    public function get_all_allergenrecipe_for_allergenrecipe_section($categoryIds = [])
    {
        $request = \Config\Services::request(); // Get the request object

        // Use a Builder instance for the query
        $builder = $this->db->table('recipes');
        $builder->select('recipes.*, category.c_id as category_id, category.c_name, category.c_url');
        $builder->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left');
        $builder->join('category', 'category.c_id = recipe_category_tag.category_id', 'left');

        // Handle multiple category IDs
        if (!empty($categoryIds)) {
            $conditions = [];
            foreach ($categoryIds as $c_id) {
                $conditions[] = 'FIND_IN_SET(' . $this->db->escape($c_id) . ', recipe_category_tag.category_id)';
            }
            // Join conditions with OR
            $builder->where('(' . implode(' OR ', $conditions) . ')');
        }

        $builder->where('recipes.active', 1);
        $builder->where('category.active', 1);
        $builder->orderBy('recipe_category_tag.recipe_category_tag_id', 'DESC');

        // Get the total count of records for pagination
        $total = $builder->countAllResults(false); // false to avoid executing the query

        // Get the current page from the request
        $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
        $perPage = 20;
        $offset = ($currentPage - 1) * $perPage;

        // Get the paginated results
        $data = $builder->limit($perPage, $offset)->get()->getResultArray();

        // Create pager
        $pager = \Config\Services::pager();

        return [
            'allcategoryise_recipe_desending' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total),
            'total' => $total
        ];
    }



    public function getRecipesByCategory($categoryIds = [])
    {
        $request = \Config\Services::request(); // Get the request object

        // Use a Builder instance for the query
        $builder = $this->db->table('recipes');
        $builder->select('recipes.*, category.c_id as category_id, category.c_name, category.c_url');
        $builder->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left');
        $builder->join('category', 'category.c_id = recipe_category_tag.category_id', 'left');

        // Handle multiple category IDs
        if (!empty($categoryIds)) {
            $conditions = [];
            foreach ($categoryIds as $c_id) {
                $conditions[] = 'FIND_IN_SET(' . $this->db->escape($c_id) . ', recipe_category_tag.category_id)';
            }
            // Join conditions with OR
            $builder->where('(' . implode(' OR ', $conditions) . ')');
        }

        $builder->where('recipes.active', 1);
        $builder->where('category.active', 1);
        $builder->orderBy('recipe_category_tag.recipe_category_tag_id', 'DESC');

        // Get the total count of records for pagination
        $total = $builder->countAllResults(false); // false to avoid executing the query

        // Get the current page from the request
        $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
        $perPage = 20;
        $offset = ($currentPage - 1) * $perPage;

        // Get the paginated results
        $data = $builder->limit($perPage, $offset)->get()->getResultArray();

        // Create pager
        $pager = \Config\Services::pager();

        return [
            'allcategoryise_recipe_desending' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total),
            'total' => $total
        ];
    }


    // ---------------------------------------------------------------------->
    // recipes only for home page section function
    public function homepage_section_recipes($recipe_ids)
    {
        return $this->db->table('recipes')
            ->select('re_id,re_title,re_titleurl,re_images,video_url,publish_data')
            ->where('active', 1)
            ->whereIn('re_id', $recipe_ids)
            ->orderBy('re_id', 'DESC')
            ->get()->getResultArray();
    }


    public function get_search_data_site($search_item)
    {



        $this->select('recipes.*, category.c_id, category.c_name, category.c_url')
            ->join('recipe_category_tag', 'recipes.re_id = recipe_category_tag.recipe_id')
            ->join('category', 'recipe_category_tag.category_id = category.c_id')
            ->like('recipes.re_title', $search_item)
            ->orderBy('recipes.re_id', 'DESC')
            ->where('recipes.active', 1)
            ->where('category.active', 1);

        return [
            'get_search_output' => $this->paginate(10),
            'pager' => $this->pager,
        ];
    }




    // -------------------------------------------------------------------------------------------------------------->
    // single details page recipes 
    // get data list 
    // (1) recipes data  (2) get category data (3) next recipes data (4) preivious recipe data

    // public function single_details_recipe($re_titleurl)
    // {
    //     return $this->db->table('recipes')
    //         ->select('recipes.*, category.c_id,category.c_name,category.c_url') // Adjust the field names as needed
    //         ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id') // Add the missing join
    //         ->join('category', 'category.c_id = recipe_category_tag.category_id')
    //         ->where('recipes.active', 1)
    //         ->where('recipes.re_titleurl', $re_titleurl)
    //         ->get()
    //         ->getRow();
    // }

    public function single_details_recipe($re_titleurl)
    {

        // Get the current recipe
        $currentRecipe = $this->db->table('recipes')
            ->select('recipes.*, category.c_id, category.c_name, category.c_url,category.flag,recipe_category_tag.category_id,recipe_category_tag.tag_id') // Adjust the field names as needed
            ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left') // Use left join
            ->join('category', 'category.c_id = recipe_category_tag.category_id', 'left') // Use left join
            // ->join('tag', 'tag.tag_id = recipe_category_tag.tag_id')
            ->where('recipes.active', 1)
            ->where('recipes.re_titleurl', $re_titleurl)
            ->get()
            ->getRow();


        if ($currentRecipe) {
            $currentRecipeId = $currentRecipe->re_id;

            // Get the previous recipe
            $previousRecipe = $this->db->table('recipes')
                ->select('recipes.*, category.c_id, category.c_name, category.c_url')
                ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id')
                ->join('category', 'category.c_id = recipe_category_tag.category_id')
                ->where('recipes.active', 1)
                ->where('recipes.re_id <', $currentRecipeId)
                ->orderBy('recipes.re_id', 'DESC')
                ->limit(1)
                ->get()
                ->getRow();

            // Get the next recipe
            $nextRecipe = $this->db->table('recipes')
                ->select('recipes.*, category.c_id, category.c_name, category.c_url')
                ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id')
                ->join('category', 'category.c_id = recipe_category_tag.category_id')
                ->where('recipes.active', 1)
                ->where('recipes.re_id >', $currentRecipeId)
                ->orderBy('recipes.re_id', 'ASC')
                ->limit(1)
                ->get()
                ->getRow();

            // Return an object containing the current, previous, and next recipes
            return [
                'currentRecipe' => $currentRecipe,
                'previousRecipe' => $previousRecipe,
                'nextRecipe' => $nextRecipe
            ];
        }

        return null;
    }



    // ---------------------------------------------------------------------->
    // recipe preview mapping url backend
    public function preview_single_details_recipe($re_titleurl)
    {

        // Get the current recipe
        $currentRecipe = $this->db->table('recipes')
            ->select('recipes.*, category.c_id, category.c_name, category.c_url,category.flag,recipe_category_tag.category_id,recipe_category_tag.tag_id') // Adjust the field names as needed
            ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left') // Use left join
            ->join('category', 'category.c_id = recipe_category_tag.category_id', 'left') // Use left join
            // ->join('tag', 'tag.tag_id = recipe_category_tag.tag_id')
            // ->where('recipes.active', 1)
            ->where('recipes.re_titleurl', $re_titleurl)
            ->get()
            ->getRow();


        if ($currentRecipe) {
            $currentRecipeId = $currentRecipe->re_id;

            // Get the previous recipe
            $previousRecipe = $this->db->table('recipes')
                ->select('recipes.*, category.c_id, category.c_name, category.c_url')
                ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id')
                ->join('category', 'category.c_id = recipe_category_tag.category_id')
                ->where('recipes.active', 1)
                ->where('recipes.re_id <', $currentRecipeId)
                ->orderBy('recipes.re_id', 'DESC')
                ->limit(1)
                ->get()
                ->getRow();

            // Get the next recipe
            $nextRecipe = $this->db->table('recipes')
                ->select('recipes.*, category.c_id, category.c_name, category.c_url')
                ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id')
                ->join('category', 'category.c_id = recipe_category_tag.category_id')
                ->where('recipes.active', 1)
                ->where('recipes.re_id >', $currentRecipeId)
                ->orderBy('recipes.re_id', 'ASC')
                ->limit(1)
                ->get()
                ->getRow();

            // Return an object containing the current, previous, and next recipes
            return [
                'currentRecipe' => $currentRecipe,
                'previousRecipe' => $previousRecipe,
                'nextRecipe' => $nextRecipe
            ];
        }

        return null;
    }




    // ---------------------------------------------------------------------->
    // get recipes category vise 


    //     public function getrecipes_data_categoryvise($c_id)
    // {
    //     $request = \Config\Services::request(); // Get the request object

    //     // Define the base query
    //     $builder = $this->db->table('recipes');
    //     $builder->select('recipes.*, category.c_id, category.c_name, category.c_url');
    //     $builder->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id');
    //     $builder->join('category', 'category.c_id = recipe_category_tag.category_id');
    //     $builder->where('category.c_id', $c_id);
    //     $builder->where('recipes.active', 1);
    //     $builder->where('category.active', 1);
    //     $builder->orderBy('recipes.re_id', 'DESC');

    //     // Get the total count of records for pagination
    //     $total = $builder->countAllResults(false); // false to avoid executing the query

    //     // Get the current page from the request
    //     $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
    //     $perPage = 20;
    //     $offset = ($currentPage - 1) * $perPage;

    //     // Get the paginated results
    //     $builder->limit($perPage, $offset);
    //     $data = $builder->get()->getResultArray();

    //     // Create pager
    //     $pager = \Config\Services::pager();

    //     // Debug the query
    //     // echo $this->db->getLastQuery();

    //     return [
    //         'allcategoryise_recipe_desending' => $data,
    //         'pager' => $pager->makeLinks($currentPage, $perPage, $total),
    //     ];
    // }


    // public function getrecipes_data_categoryvise($c_id)
    // {
    //     $request = \Config\Services::request(); // Get the request object

    //     // Define the base query
    //     $query = $this->db->table('recipes')
    //         ->select('recipes.*, category.c_id, category.c_name, category.c_url')
    //         ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id')
    //         ->join('category', 'category.c_id = recipe_category_tag.category_id')
    //         ->where('category.c_id', $c_id)
    //         ->where('recipes.active', 1)
    //         ->where('category.active', 1)
    //         ->orderBy('recipes.re_id', 'DESC');

    //     // Get the total count of records for pagination
    //     $total = $query->countAllResults(false); // false to avoid executing the query

    //     // Get the current page from the request
    //     $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
    //     $perPage = 20;
    //     $offset = ($currentPage - 1) * $perPage;

    //     // Get the paginated results
    //     $data = $query->limit($perPage, $offset)->get()->getResultArray();


    //     // Create pager
    //     $pager = \Config\Services::pager();

    //     return [
    //         'allcategoryise_recipe_desending' => $data,
    //         'pager' => $pager->makeLinks($currentPage, $perPage, $total),
    //     ];
    // }



    public function getrecipes_data_categoryvise($c_id)
    {
        $request = \Config\Services::request(); // Get the request object

        // Use a Builder instance for the query
        $builder = $this->db->table('recipes');
        $builder->select('recipes.*, category.c_id as category_id, category.c_name, category.c_url');
        $builder->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left');
        $builder->join('category', 'category.c_id = recipe_category_tag.category_id', 'left');
        $builder->where('FIND_IN_SET(' . $this->db->escape($c_id) . ', recipe_category_tag.category_id) > 0');
        $builder->where('recipes.active', 1);
        $builder->where('category.active', 1);
        $builder->orderBy('recipe_category_tag.recipe_category_tag_id', 'DESC');

        // Get the total count of records for pagination
        $total = $builder->countAllResults(false); // false to avoid executing the query

        // Get the current page from the request
        $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
        $perPage = 20;
        $offset = ($currentPage - 1) * $perPage;

        // Get the paginated results
        $data = $builder->limit($perPage, $offset)->get()->getResultArray();

        // Create pager
        $pager = \Config\Services::pager();

        return [
            'allcategoryise_recipe_desending' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total),
            'total' => $total
        ];
    }





    // this logic for backend preview category section
    public function backend_getrecipes_data_categoryvise($c_id)
    {

        $request = \Config\Services::request(); // Get the request object

        // Use a Builder instance for the query
        $builder = $this->db->table('recipes');
        $builder->select('recipes.*, category.c_id as category_id, category.c_name, category.c_url');
        $builder->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left');
        $builder->join('category', 'category.c_id = recipe_category_tag.category_id', 'left');
        $builder->where('FIND_IN_SET(' . $this->db->escape($c_id) . ', recipe_category_tag.category_id) > 0');
        // $builder->where('recipes.active', 1);
        // $builder->where('category.active', 1);
        $builder->orderBy('recipe_category_tag.recipe_category_tag_id', 'DESC');

        // Get the total count of records for pagination
        $total = $builder->countAllResults(false); // false to avoid executing the query

        // Get the current page from the request
        $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
        $perPage = 20;
        $offset = ($currentPage - 1) * $perPage;

        // Get the paginated results
        $data = $builder->limit($perPage, $offset)->get()->getResultArray();

        // Create pager
        $pager = \Config\Services::pager();

        return [
            'backend_allcategoryise_recipe_desending' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total),
            'total' => $total
        ];
    }



    // ----------------------------------------------------------------------------------->
    // Uncategorized Data
    public function get_uncategorized_recipes()
    {
        $request = \Config\Services::request(); // Get the request object

        // Define the base query
        $query = $this->db->table('recipes')
            ->select('recipes.*,recipe_category_tag.category_id')
            ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left') // Use left join
            ->where('recipe_category_tag.category_id IS NULL') // Recipes with no category
            ->where('recipes.active', 1)
            ->orderBy('recipes.re_id', 'DESC');
        // ->get()->getResultArray();


        // Get the total count of records for pagination
        $total = $query->countAllResults(false); // false to avoid executing the query

        // Get the current page from the request
        $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
        $perPage = 10;
        $offset = ($currentPage - 1) * $perPage;

        // Get the paginated results
        $data = $query->limit($perPage, $offset)->get()->getResultArray();

        // Create pager
        $pager = \Config\Services::pager();

        return [
            'all_Uncategorized_recipe_descending' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total),
        ];
    }



    //   --------------------------------------------------------------------------------------------------------------------->
    // get recipes popular right section 
    public function get_popular_recipe()
    {
        return $this->db->table('recipes')
            ->select('recipes.*,category.c_id,category.c_name,category.c_url,category.flag')
            ->join('recipe_category_tag', 'recipe_category_tag.recipe_id=recipes.re_id')
            ->join('category', 'category.c_id=recipe_category_tag.category_id')
            ->where('category.active', 1)
            ->where('recipes.active', 1)
            ->where('category.c_id IS NOT NULL') // Ensure category is present
            ->orderBy('re_id', "DESC")
            ->limit(4)
            ->get()->getResultArray();
    }



    //   --------------------------------------------------------------------------------------------------------------------->
    // get popular recipe for categrory page 
    // public function get_allergen_popularrecipe() {
    //     // return $this->
    // }



    //   --------------------------------------------------------------------------------------------------------------------->
    // mix popular recipe funtion category and allergen [category] list
    public function get_popular_recipe_category_and_allergencategory($c_id)
    {
        return $this->db->table('recipes')
            ->select('recipes.*', 'category.c_id,category.c_name,category.c_url')
            ->join('recipe_category_tag', 'recipe_category_tag.recipe_id=recipes.re_id')
            ->join('category', 'category.c_id=recipe_category_tag.category_id')
            ->where('category.active', 1)
            ->where('recipes.active', 1)
            ->where('category.c_id IS NOT NULL')
            ->where('FIND_IN_SET(' . $this->db->escape($c_id) . ', recipe_category_tag.category_id) > 0')
            ->orderBy('re_id', "DESC")
            ->limit(4)
            ->get()->getResultArray();
    }




    //   ----------------------------------------------------------------------------->
    // alergen page mix popular recipe funtion category and allergen category
    public function get_popular_recipe_category_and_allergencategory_page($categoryIds = [])
    {
        // Use a Builder instance for the query
        $builder = $this->db->table('recipes');
        $builder->select('recipes.*, category.c_id as category_id, category.c_name, category.c_url');
        $builder->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id', 'left');
        $builder->join('category', 'category.c_id = recipe_category_tag.category_id', 'left');

        // Handle multiple category IDs
        if (!empty($categoryIds)) {
            $conditions = [];
            foreach ($categoryIds as $c_id) {
                $conditions[] = 'FIND_IN_SET(' . $this->db->escape($c_id) . ', recipe_category_tag.category_id)';
            }
            // Join conditions with OR
            $builder->where('(' . implode(' OR ', $conditions) . ')');
        }

        $builder->where('recipes.active', 1);
        $builder->where('category.active', 1);
        $builder->orderBy('recipe_category_tag.recipe_category_tag_id', 'DESC');
        $builder->limit(4);

        // Execute the query and get the results
        $data = $builder->get()->getResultArray();

        return $data;
    }


    //   ----------------------------------------------------------------------------->
    //get video recipes for home page
    public function get_video_recipes_data()
    {
        return $this->db->table('recipes')
            ->select('re_id, re_title, re_titleurl,video_url,re_images')
            ->where('active', 1)
            ->where('video_url IS NOT NULL') // Ensures the video URL is not null
            ->where('video_url !=', '') // Ensures the video URL is not empty
            ->limit(9)
            ->get()
            ->getResultArray();
    }




    //   ----------------------------------------------------------------------------->
    // get random recipes for details page
    public function get_random_recipes($recipe_id)
    {


        if (!empty($recipe_id)) {
            return $this->db->table('recipes')
                ->where('active', 1)
                ->where('re_id !=', $recipe_id)
                ->orderBy('RAND()')
                ->limit(6)
                ->get()->getResultArray();
        } else {
            return $this->db->table('recipes')
                ->where('active', 1)
                ->orderBy('RAND()')
                ->limit(6)
                ->get()->getResultArray();
        }
    }



    // reandom recipes for contact page
    public function get_contactrandom_recipes()
    {
        return $this->db->table('recipes')
            ->where('active', 1)
            ->orderBy('RAND()')
            ->limit(4)
            ->get()->getResultArray();
    }





    // get recipes data tag vise
    public function getrecipes_data_tag_vise($tag_id)
    {
        // $this->db->table('recipes')
        //     ->select('recipes.*,tag.tag_id,tag.tag_name,tag.tag_url')
        //     ->join('recipe_category_tag', 'recipe_category_tag.recipe_id=recipes.re_id')
        //     ->join('tag', 'tag.tag_id=recipe_category_tag.tag_id')
        //     ->where('tag.tag_id', 1)
        //     ->where('recipes.active', 1)
        //     ->where('tag.active', 1)
        //     ->orderBy('re_id', 'DESC');

        // return [
        //     'alltagvise_recipe_desending' => $this->paginate(10),
        //     'pager' => $this->pager,
        // ];



        // Get the request object
        $request = \Config\Services::request();

        // Define the base query
        $builder = $this->db->table('recipes')
            ->select('recipes.*, tag.tag_id, tag.tag_name, tag.tag_url, category.c_id,category.c_name,category.c_url') // Select category data
            ->join('recipe_category_tag', 'recipe_category_tag.recipe_id = recipes.re_id')
            ->join('tag', 'tag.tag_id = recipe_category_tag.tag_id')
            ->join('category', 'category.c_id = recipe_category_tag.category_id') // Join with category table
            ->where('tag.tag_id', $tag_id)
            ->where('recipes.active', 1)
            ->where('tag.active', 1)
            ->orderBy('recipes.re_id', 'DESC');

        // Get the total count of records for pagination
        $total = $builder->countAllResults(false);  // false to avoid executing the query

        // Get the current page from the request
        $currentPage = $request->getVar('page') ? (int) $request->getVar('page') : 1;
        $perPage = 10;
        $offset = ($currentPage - 1) * $perPage;

        // Get the paginated results
        $data = $builder->limit($perPage, $offset)->get()->getResultArray();

        // Create pager
        $pager = \Config\Services::pager();

        return [
            'alltagvise_recipe_desending' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total)  // You can specify a pager template if needed
        ];
    }






    // ----------------------------------------------------------------------------------------------------->
    // check recipes url or not in the website
    public function find_recipes_url($url)
    {
        return $this->db->table('recipes')
            ->where('re_titleurl', $url)
            ->get()
            ->getRow();
    }
}
