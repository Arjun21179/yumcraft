<?php


namespace App\Models;

use CodeIgniter\Model;

class img_all_project extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // gallery table details
    protected $table = 'all_project_images';
    protected $primaryKey = 'id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled









    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    // get search images in project get query
    public function all_project_search_img_get($search_value)
    {
        // Use the model to search with LIKE and apply pagination directly
        $result = $this->select('id, image') // Select gallery_id and image fields
            ->like('image', $search_value) // Search based on the 'image' field
            ->orderBy('id', 'DESC') // Order by 'gallery_id' in descending order
            ->paginate(25); // Paginate the results with 25 per page

        // Return the results and the pager
        return [
            'allgallery_img_desc' => $result,
            'pager' => $this->pager,
        ];
    }



    // ------------------------------------------------------------>
    // get all project images in database
    public function all_project_img_get_without_paramter()
    {
        // Select the required fields from the database
        // $this->select('all_project_images.*')
        //     ->where('active', 1)
        //     ->groupBy('image');  // Replace 'id' with the column you want to group by

        // // Fetch the data using paginate and specify the correct number of results per page
        // $perPage = 10;  // You can adjust the number of results per page if needed

        // return [
        //     'allgallery_img_desc' => $this->paginate($perPage),  // This will paginate the results
        //     'pager' => $this->pager,  // Include the pager to navigate pages
        // ];


        // return $this->db->table('all_project_images')
        //                     ->where('active',1)
        //                     ->get()
        //                     ->getResultArray();




        $request = \Config\Services::request(); // Get the request object

        // Define the base query
        $query = $this->db->table('all_project_images')
            ->select('all_project_images.*')
            ->where('active', 1)
            ->orderBy('id', 'DESC');
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
            'allgallery_img_desc' => $data,
            'pager' => $pager->makeLinks($currentPage, $perPage, $total),
        ];
    }
}
