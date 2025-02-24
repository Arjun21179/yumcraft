<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');


// $routes->get('testing', 'Site_Controller::index');

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxx  Admin Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// -----------------------Login and Profile--------------------------->
// Admin Routes

// login view page route
$routes->get('login', 'Admin_Controller::login');

// login logic page route
$routes->post('login_logic', 'Admin_Controller::login_logic');

// logout logic
$routes->get('admin_logout', 'Admin_Controller::admin_logout');

// profile page
$routes->get('profile', 'Admin_Controller::profile');

// profile update
$routes->post('admin_profile_update', 'Admin_Controller::admin_profile_update');







// --------------------------------Recipes----------------------------------------------->
// recipes Page
$routes->get('recipes', 'Admin_Controller::recipes');
// add recipes
$routes->get('addrecipes', 'Admin_Controller::addrecipes');
$routes->post('addrecipes_insert', 'Admin_Controller::addrecipes_insert');
// edit recipes
$routes->post('editrecipes-view', 'Admin_Controller::editrecipes_view');
$routes->post('editrecipes_logic', 'Admin_Controller::editrecipes_logic');
// delete recipes
$routes->post('recipes_delete', 'Admin_Controller::recipes_delete');


// active deactive recipe
$routes->post('deactive_recipe', 'Admin_Controller::deactive_recipe');
$routes->post('active_recipe', 'Admin_Controller::active_recipe');

// deactivate all recipes at time
$routes->post('recipes_attime_deleteall', 'Admin_Controller::recipes_attime_deleteall');


// faq section
// faq recipe question anwer insert data
$routes->post('under_edit_section_faq_recipe_add','Admin_Controller::under_edit_section_faq_recipe_add');
// faq recipe delete 
$routes->post('faq_recipe_delete','Admin_Controller::faq_recipe_delete');


// //////
// recipes preview url mapping
$routes->get('recipe/preview/(:any)', 'Admin_Controller::recipe_mapurl_preview/$1');











// -------------------------------- Blog section ----------------------------------------------->
// Blog view file
$routes->get('blog-list', 'Admin_Controller::blog_list');

// insert Blog view
$routes->get('addblog', 'Admin_Controller::add_blog');
// insert logic Blog
$routes->post('addblog_logic', 'Admin_Controller::addblog_logic');

// edit Blog view
$routes->post('editblog', 'Admin_Controller::ediblog_view');
// edit Blog logic
$routes->post('editblog_logic', 'Admin_Controller::editblog_logic');

// Blog delete 
$routes->post('blog_delete', 'Admin_Controller::blog_delete');

// deactivate Blog
$routes->post('deactive_blog', 'Admin_Controller::deactive_blog');
// activate Blog
$routes->post('active_blog', 'Admin_Controller::active_blog');


// at a time delete or deactivate Blog
$routes->post('blog_attime_deleteAll', 'Admin_Controller::blog_attime_deleteAll');


// faq blog section
// faq blog question anwer insert data
$routes->post('under_edit_blog_faq_add','Admin_Controller::under_edit_blog_faq_add');
// faq blog delete 
$routes->post('faq_blog_delete','Admin_Controller::faq_blog_delete');


// //////
// blog preview url mapping
$routes->get('blog/preview/(:any)', 'Admin_Controller::blog_mapurl_preview/$1');







// ----------------------------Category--------------------------------------------------->
// category Page
$routes->get('category-section', 'Admin_Controller::category_section');
// add category
$routes->post('add_category', 'Admin_Controller::add_category');
// edit category
// $routes->get('edit-category/(:any)','Admin_Controller::edit_category_view/$1');
$routes->post('edit-category', 'Admin_Controller::edit_category_view');
$routes->post('edit-categorylogic', 'Admin_Controller::edit_category_logic');
// delete category
$routes->post('category_delete', 'Admin_Controller::category_delete');

// active deactive category
$routes->post('deactive_category', 'Admin_Controller::deactive_category');
$routes->post('active_category', 'Admin_Controller::active_category');



// category Url Mapping  active=0
$routes->get('category/preview/(:any)','Admin_Controller::category_mapurl_preview/$1');



 



// ------------------------------Banner image & Mobile iMage------------------------------------------------->
$routes->get('banner', 'Admin_Controller::banner_view');
// insert banner image mobile image
$routes->post('insert_banner_img_logic', 'Admin_Controller::insert_banner_img_logic');
// edit banner data
$routes->post('edit_banner_img_view', 'Admin_Controller::edit_banner_img_view');
$routes->post('edit_banner_img_logic', 'Admin_Controller::edit_banner_img_logic');
// delete banner
$routes->post('delete_banner', 'Admin_Controller::delete_banner');

// active deactive banner image
$routes->post('deactive_banner', 'Admin_Controller::deactive_banner');
$routes->post('active_banner', 'Admin_Controller::active_banner');





// --------------------------- Dynamic Gallery Section Backend for frontend img section -------------------------------------------------------------------->
// gallery section view
$routes->get('gallery-section-images','Admin_Controller::gallery_section_images_dynamic');

// insert images in gallery
$routes->post('add_img_dynamic','Admin_Controller::add_img_dynamic');
// edit galler image dynamic
$routes->post('edit_gallery_dynamic_view','Admin_Controller::edit_gallery_dynamic_view');
$routes->post('editlogic_gallery_dynamic','Admin_Controller::editlogic_gallery_dynamic');
// delete data gallery dynamic
$routes->post('gallery_dynamic_delete','Admin_Controller::gallery_dynamic_delete');

// set the sequence
$routes->post('gallery_update_sequence', 'Admin_Controller::gallery_update_sequence'); // Adjust accordingly






// ---------------------------Video link-------------------------------------------------------------------->
// video link Page display
$routes->get('video', 'Admin_Controller::video');
// add video link
$routes->post('add_video_link', 'Admin_Controller::add_video_link');
// edit video
$routes->post('edit_video_img_view', 'Admin_Controller::edit_video_img_view');
$routes->post('video_editlogic', 'Admin_Controller::video_editlogic');
// delete video
$routes->post('video_delete', 'Admin_Controller::video_delete');



// ---------------------------logo info Manages pages link---------------------------------------------------->
// logo info view page
$routes->get('logo-info', 'Admin_Controller::logo_info');
// insert view logic
// $routes->post('edit_logo_info_logic','Admin_Controller::edit_logo_info_logic');

$routes->post('edit_logo_info_logic', 'Admin_Controller::edit_logo_info_logic1');




// --------------------------- Home page section backend ---------------------------------------------------->
// section view page
$routes->get('homepage-sections', 'Admin_Controller::homepage_sections');


// Allergen category section add trending category
$routes->post('homepage_Allergencategory_section', 'Admin_Controller::homepage_Allergen_category_section');

// Main category section
$routes->post('homepagemain_category_section', 'Admin_Controller::homepage_maincategory_section');


// youtbue section add
$routes->post('homepage-youtube-section', 'Admin_Controller::homepage_youtube_section');

//  first section add 
$routes->post('homepage-first-section', 'Admin_Controller::homepage_first_section');

// second section add 
$routes->post('homepage-second-section', 'Admin_Controller::homepage_second_section');

// third third add trending recipe
$routes->post('homepage_third_section', 'Admin_Controller::homepage_third_section');

// four add Blog recipe
$routes->post('homepage_four_section', 'Admin_Controller::homepage_four_section');




// ---------------------------Import Export Recipes---------------------------------------------------->
// main view file
$routes->get('import-export-recipes', 'Admin_Controller::import_export_recipes_view');
// date vise export recipes
$routes->post('export_recipes_date_vise', 'Admin_Controller::export_recipes_date_vise');

//download format Import excel format
$routes->get('download_recipes_csv_format', 'Admin_Controller::excel_format_import_recipes');
// Import recipes data csv format
$routes->post('import_recipes_data', 'Admin_Controller::import_recipes_data');




// ---------------------------Subscriber Ads permission---------------------------------------------------->
// Subscriber List Page
$routes->get('subcribers', 'Admin_Controller::subcribers_list');
// subscriber excel_download_subscribers
$routes->get('excel_download_subscribers', 'Admin_Controller::excel_download_subscribers');
// delete subscriber data
$routes->post('subscriber_delete', 'Admin_Controller::subscriber_delete');


// at time delete or deactivate all
$routes->post('subscribers_attime_deleteAll', 'Admin_Controller::subscribers_attime_deleteAll');




// --------------------------- Subscriber newsletter ---------------------------------------------------->
// subscriber newsletter section
$routes->get('subscriber-newsletter-section', 'Admin_Controller::subscriber_newsletter_section');
// Excel Download subscriber newsletter 
$routes->get('excel_download_subscribers_newsletter', 'Admin_Controller::excel_download_subscribers_newsletter');

// delete subscriber data
$routes->post('subscriber_newsletter_delete', 'Admin_Controller::subscriber_newsletter_delete');


// at time delete or deactivate all
$routes->post('subscribers_newsletter_attime_deleteAll', 'Admin_Controller::subscribers_newsletter_attime_deleteAll');




// ----------------------------Contact Us--------------------------------------------------->
// Contact Us list Page
$routes->get('contact-list', 'Admin_Controller::contact');
// excel contact download
$routes->get('excel_download_contact', 'Admin_Controller::excel_download_contact');
// delete contact data
$routes->post('contact_delete', 'Admin_Controller::contact_delete');

// at time delete or deactivate all
$routes->post('contactus_attime_deleteAll', 'Admin_Controller::contactus_attime_deleteAll');





// ----------------------------Comment List--------------------------------------------------->
// comment view list

// ---------------------------------------------------->Comments recipe section
// commentes recipes
$routes->get('comments-recipes', 'Admin_Controller::comments_recipes');

// comments active deactive recipe
$routes->post('active_recipe_comments', 'Admin_Controller::active_recipe_comments');
$routes->post('deactive_recipes_comments', 'Admin_Controller::deactive_recipes_comments');

// delte comments recipe
$routes->post('comments_recipe_delete', 'Admin_Controller::comments_recipe_delete');


//  at time delete or deactivate all
$routes->post('comments_recipe_attime_deleteAll', 'Admin_Controller::comments_recipe_attime_deleteAll');






// ---------------------------------------------------->Comments Blog section
// commentes blogs
$routes->get('comments-blog', 'Admin_Controller::comments_blog');

// comments active deactive blogs
$routes->post('active_blog_comments', 'Admin_Controller::active_blog_comments');
$routes->post('deactive_blog_comments', 'Admin_Controller::deactive_blog_comments');

// delte comments blogs
$routes->post('comments_blog_delete', 'Admin_Controller::comments_blog_delete');

//  at time delete or deactivate all
$routes->post('comments_blog_attime_deleteAll', 'Admin_Controller::comments_blog_attime_deleteAll');





// ----------------------------Uploads Folder All img Gallery Section -------------------------------------------------->
// gallery section

// --------------------->
// gallery view section
$routes->get('gallery-section', 'Admin_Controller::gallery_view_section');
// --------------------->
// gallery image insert
$routes->post('gallery_img_insert', 'Admin_Controller::gallery_img_insert_logic');
// --------------------->
// edit gallery img
$routes->post('website_gallery_edit', 'Admin_Controller::website_gallery_edit');
// gallery website image edit
$routes->post('edit_logic_gallery_website', 'Admin_Controller::edit_logic_gallery_website');
// --------------------->

// gallery image delete
$routes->post('gallery_imgdelete', 'Admin_Controller::gallery_imgdelete');
// --------------------->
// gallery_img_attime_deleteAll
$routes->post('gallery_img_attime_deleteAll', 'Admin_Controller::gallery_img_attime_deleteAll');

// --------------------->
// refresh button insert new uploads img data in data
$routes->get('refresh_gallery','Admin_Controller::call_get_and_insert_img');





// ------------------------->
// gallery recipe image
$routes->get('recipe-gallery', 'Admin_Controller::gallery_recipe_img');
// get alt data in recipes table
$routes->post('get_recipe_alt_recipe_gallery','Admin_Controller::get_recipe_alt_recipe_gallery');
// gallery recipes edit logic
$routes->post('gallery_recipe_edit_logic','Admin_Controller::gallery_recipe_edit_logic');


// ------------------------->
// gallery blog image
$routes->get('blog-gallery', 'Admin_Controller::gallery_blog_img');
// get alt data in blog table
$routes->post('get_blog_alt_img_gallery','Admin_Controller::get_blog_alt_img_gallery');
// gallery blog edit logic
$routes->post('gallery_blog_edit_logic','Admin_Controller::gallery_blog_edit_logic');






















// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxx  Site Panel     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// -------------------------------------------------->
// Site Routes


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx>>>>
// Sitemap xml routes
$routes->get('sitemap.xml', 'Site_Controller::site_xml');




// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// schema section
//------------------------------------------------------------------------> 
// videos recipe section
$routes->get('videos_recipe', 'Site_Controller::videos_recipe');



// ------------------------------------------------------------------------------------------------>
// privacy policy
$routes->get('privacypolicy','Site_Controller::privacypolicy');


// xxxxxxxx Home Page xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxx Home Page xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// home page routes 
$routes->get('/', 'Site_Controller::site_home');




// ----------------------- All Recipe category Page---------------------------------------------------------->
// Recipe Page section
$routes->get('recipe', 'Site_Controller::site_recipe_view');
// recipe or category
$routes->get('recipe/(:any)', 'Site_Controller::recipe_or_category/$1');


// ----------------------- All Allergy-free Page---------------------------------------------------------->
// Allergy-free Page section
$routes->get('allergen-recipe', 'Site_Controller::site_allergen_recipe_view');




// ----------------------- Gallery recipe Page---------------------------------------------------------->
// Gallery recipe Page section
$routes->get('gallery', 'Site_Controller::site_gallery_recipe_view');



// ----------------------- Video recipe Page---------------------------------------------------------->
// Video recipe Page section
$routes->get('video-recipe', 'Site_Controller::site_video_recipe_view');


// ----------------------- podcast recipe Page---------------------------------------------------------->
// podcast recipe Page section
$routes->get('podcast', 'Site_Controller::site_podcast_view');





// ---------------------------Details recipePage vise display---------------------------------------------------->
// details page section
$routes->get('details/(:any)', 'Site_Controller::details_page/$1');




// -----------------------Category Page---------------------------------------------------------->
// category page section
$routes->get('category', 'Site_Controller::category_visedisplay_recipes');

// ---------------------------Details category vise display recipes---------------------------------------------------->
// details page section
$routes->get('category/(:any)', 'Site_Controller::category_visedisplay_recipes/$1');


// --------------------------- Uncategorized section ---------------------------------------------------->
$routes->get('uncategorized', 'Site_Controller::uncategorized_section');




// -----------------------Tag recipes Page vise display recipes ---------------------------------------------------------->
// tag page section
$routes->get('tag/(:any)', 'Site_Controller::tag_page/$1');



// -----------------------Tag Blog Page vise display recipes ---------------------------------------------------------->
// tag page section
$routes->get('tag/(:any)', 'Site_Controller::tag_page/$1');



// ----------------------- Blogs Section Frontend ---------------------------------------------------------->
// Blogs page
// Blogs view
$routes->get('blog', 'Site_Controller::blog_data');
// blog url mapping
$routes->get('blog/(:any)', 'Site_Controller::blog_mapurl/$1');
// blog details page
$routes->get('blog-details/(:any)', 'Site_Controller::blog_details/$1');
// ragint blog
$routes->post('rating-lead', 'Site_Controller::rating_lead');




// -----------------------Subscribers in details page---------------------------------------------------------->
$routes->post('subscriber_insert_for_recipe_blog', 'Site_Controller::subscriber_insert_for_recipe_blog');


// subscriber newsletter view file
$routes->get('subscriber-newsletter', 'Site_Controller::subscriber_newsletter');




// --------------------------- Subscriber newsletter  form insert---------------------------------------------------->
// subscriber newsletter section

$routes->post('subscriber_newsletter_insert', 'Site_Controller::subscriber_newsletter_insert');





// ----------------------- Contact Page ---------------------------------------------------------->
// Contact page section
$routes->get('contact', 'Site_Controller::contact_page');
// contact insert
$routes->post('contact_insert', 'Site_Controller::contact_insert');



// ------------------------------faq frontend ------------------------------------------------->
$routes->get('faq', 'Site_Controller::faq_view');




// ---------------------- Search logic ------------------------------------------------->
// site home page search logics
// search logic home page site 
$routes->post('search-data', 'Site_Controller::site_search_logic');

// search output route recipe details show
$routes->get('search-result/(:any)', 'Site_Controller::search_result/$1');



// ----------------------- Author_aboutpage Page ---------------------------------------------------------->
// author_about page
$routes->get('author-about', 'Site_Controller::author_aboutpage');


// ----------------------- cookbook Page ---------------------------------------------------------->
// cookbook section
// $routes->get('books', 'Site_Controller::cookbook');




































// xxxxxxxxxxxxxxxx  Boss of All Url Mapping xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// $routes->get('/(:any)', 'Site_Controller::all_urls/$1');

$routes->get('/(:any)', 'Site_Controller::all_urls_map/$1');






// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxx   404 redirect     xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// $routes->set404Override('Site_Controller::handle404');
$routes->set404Override(function () {
    return view('errors/html/error_404');
});
