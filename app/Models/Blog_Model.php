<?php


namespace App\Models;

use CodeIgniter\Model;

class Blog_Model extends Model
{

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // table details
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    // protected $allowedFields = ['username', 'password', 'email']; // Define the fields that can be filled




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Blog View
    public function allblog()
    {
        return $this->db->table('blog')
            ->select('*')
            ->orderBy('blog_id', 'DESC')
            ->get()->getResultArray();
    }


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Blog insert
    public function blog_insert($data)
    {
        $this->db->table('blog')->insert($data);

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
    //edit blog view
    public function edit_blog($blog_id)
    {
        return $this->db->table('blog')
            ->select('*')
            // ->where('active', 1)
            ->where('blog_id', $blog_id)
            ->get()->getRow();
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //edit Blog logic
    public function edit_blog_logicdata($data, $blog_id)
    {
        $this->db->table('blog')
            ->where('blog_id', $blog_id)
            ->update($data);


        $insertedRows = $this->db->affectedRows();
        if ($insertedRows > 0) {
            return $blog_id;
        } else {
            return false;
        }
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Blog delete
    function blog_deletedata($blog_id)
    {
        $this->db->table('blog')
            ->where('blog_id', $blog_id)
            ->delete();


        $insertedRows = $this->db->affectedRows();
        if ($insertedRows > 0) {
            return true;
        } else {
            return false;
        }
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    //  activate deactivate
    // ---------------------------------->  
    // deactive blog check
    function deactive_blog($blog_id)
    {
        $data['active'] = 0;

        return $this->db->table('blog')
            ->where('blog_id', $blog_id)
            ->update($data);
    }

    // ----------------------------------->
    // active blog check
    function active_blog_row($blog_id)
    {
        $data['active'] = 1;

        return $this->db->table('blog')
            ->where('blog_id', $blog_id)
            ->update($data);
    }




    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // deactivate attime data
    public function blog_attime_deleteall_data($blog_id)
    {
        // deactivate logic
        //  $data['active']=2;

        //  return $this->db->table('blog')
        //                  ->whereIn('blog_id',$blog_id)
        //                  ->update($data);


        // delete logic
        return $this->db->table('blog')
            ->whereIn('blog_id', $blog_id)
            ->delete();
    }






    // ---------------------------------------------------------------------->
    // backend side
    // blog only for home page section function 
    public function for_homesection_allblog()
    {
        return $this->db->table('blog')
            ->select('blog_id,blog_name')
            ->orderBy('blog_id', 'DESC')
            ->get()->getResultArray();
    }



    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // for comments section logic
    // ---------------------------------------------------------->
    // blog id vise get blog
    public function get_blog_data($blog_id)
    {
        return $this->db->table('blog')
            ->select('*')
            ->whereIn('blog_id', $blog_id)
            ->get()->getResultArray();
    }









    // -------------------------------------------------------------->
    // Gallery Section get Blog images
    public function get_blog_img_all()
    {
        return [
            'all_blog_img_desc' => $this->orderBy('blog_id', 'DESC')->paginate(10),
            'pager' => $this->pager,
        ];
    }


    // ------------->
    // get search data
    public function search_get_blog_img($search_value)
    {
        return [
            'search_all_blog_img_desc' => $this->orderBy('blog_id', 'DESC')->like('blog_img',$search_value)->orlike('blog_img_alt',$search_value)->paginate(10),
            'pager'=>$this->pager,
        ];
    }









    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Site Home (Frontend Side)  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


    // ---------------------------------------------------------------------->
    // blog only for home page section function
    public function homepage_section_blog($blog_ids)
    {
        return $this->db->table('blog')
            ->select('*')
            ->whereIn('blog_id', $blog_ids)
            ->orderBy('blog_id', 'DESC')
            ->get()->getResultArray();
    }

    public function blogs_pagination()
    {
        $this->where('active!=', 2)
            // ->like('author_name', $searchtext)
            ->orderBy('blog_id', 'ASC');
        return [
            'allblog_desending' => $this->paginate(10),
            'pager' => $this->pager,
        ];
    }

    public function all_blog()
    {
        // return $this->where('active', 1)
        //     // ->like('author_name', $searchtext)
        //     ->orderBy('blog_id', 'DESC')
        //     ->get()->getResultArray();
        $this->where('active', 1)
            // ->like('author_name', $searchtext)
            ->orderBy('blog_id', 'DESC');
        // ->get()->getResultArray();
        return [
            'allblog_desending' => $this->paginate(20),
            'pager' => $this->pager,
        ];
    }

    public function latest_blog($blog_id)
    {
        if (!empty($blog_id)) {
            return $this->db->table('blog')
                ->where('active', 1)
                ->where('blog_id !=', $blog_id)
                ->orderBy('blog_id', 'DESC')
                ->limit(4)
                ->get()->getResultArray();
        } else {
            return $this->db->table('blog')
                ->where('active', 1)
                ->orderBy('blog_id', 'DESC')
                ->limit(4)
                ->get()->getResultArray();
        }
    }

    public function single_blog($blog_url)
    {
        return $this->where('active', 1)
            ->where('blog_url', $blog_url)
            ->orderBy('blog_id', 'DESC')
            ->get()->getRow();
    }

    public function get_random_blog($blog_id)
    {
        if (!empty($blog_id)) {
            return $this->db->table('blog')
                ->where('active', 1)
                ->where('blog_id !=', $blog_id)
                ->orderBy('RAND()')
                ->limit(4)
                ->get()->getResultArray();
        } else {
            return $this->db->table('blog')
                ->where('active', 1)
                ->orderBy('RAND()')
                ->limit(4)
                ->get()->getResultArray();
        }
    }



    // ------------------------------------------------------------>
    // get two latest blog for details page
    public function get_two_blogs()
    {
        return $this->db->table('blog')
            ->where('active', 1)
            ->orderBy('blog_id', 'DESC')
            ->limit(2)
            ->get()
            ->getResultArray();
    }


    // ---------------------------------------------------------->
    // get single data for frontend details page
    public function single_details_blog($blog_url)
    {
        $blog = $this->db->table('blog')
            ->where('active', 1)
            ->where('blog_url', $blog_url)
            ->orderBy('blog_id', 'DESC')
            ->get()->getRow();

        if (!empty($blog->blog_id)) {
            // echo $currentblog;
            $currentBlog = $blog->blog_id;


            if ($currentBlog) {
                $previousblog = $this->db->table('blog')
                    ->where('active', 1)
                    ->where('blog_id <', $currentBlog)
                    ->orderBy('blog_id', 'DESC')
                    ->limit(1)
                    ->get()
                    ->getRow();

                $nextblog = $this->db->table('blog')
                    ->where('active', 1)
                    ->where('blog_id >', $currentBlog)
                    ->orderBy('blog_id', 'ASC')
                    ->limit(1)
                    ->get()
                    ->getRow();
            }
            return [
                'blog' => $blog,
                'previousBlog' => $previousblog,
                'nextBlog' => $nextblog
            ];
        }

        return null;
    }







      // ---------------------------------------------------------->
    // get single data for Preview Backend details page
    public function preview_single_details_blog($blog_url)
    {
        $blog = $this->db->table('blog')
            // ->where('active', 1)
            ->where('blog_url', $blog_url)
            ->orderBy('blog_id', 'DESC')
            ->get()->getRow();

        if (!empty($blog->blog_id)) {
            // echo $currentblog;
            $currentBlog = $blog->blog_id;


            if ($currentBlog) {
                $previousblog = $this->db->table('blog')
                    ->where('active', 1)
                    ->where('blog_id <', $currentBlog)
                    ->orderBy('blog_id', 'DESC')
                    ->limit(1)
                    ->get()
                    ->getRow();

                $nextblog = $this->db->table('blog')
                    ->where('active', 1)
                    ->where('blog_id >', $currentBlog)
                    ->orderBy('blog_id', 'ASC')
                    ->limit(1)
                    ->get()
                    ->getRow();
            }
            return [
                'blog' => $blog,
                'previousBlog' => $previousblog,
                'nextBlog' => $nextblog
            ];
        }

        return null;
    }




    // ----------------------------------------------------------------------------------------------------->
    // check Blog url or not in the website
    public function find_blog_url($url)
    {
        return $this->db->table('blog')
            ->where('blog_url', $url)
            ->get()
            ->getRow();
    }
}
