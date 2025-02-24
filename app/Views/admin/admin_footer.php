<!-- <footer class="footer"> -->
<!-- © 2018 Agroxa <span class="d-none d-sm-inline-block">- Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Themesbrand.</span> -->
<!-- </footer> -->

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="admin_assets/js/jquery.min.js"></script>
<script src="admin_assets/js/bootstrap.bundle.min.js"></script>
<script src="admin_assets/js/metisMenu.min.js"></script>
<script src="admin_assets/js/jquery.slimscroll.js"></script>
<script src="admin_assets/js/waves.min.js"></script>

<script src="admin_assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Peity JS -->
<script src="admin_assets/plugins/peity/jquery.peity.min.js"></script>

<!-- <script src="admin_assets/plugins/morris/morris.min.js"></script> -->
<script src="admin_assets/plugins/raphael/raphael-min.js"></script>

<!-- <script src="admin_assets/pages/dashboard.js"></script> -->

<!-- App js -->
<script src="admin_assets/js/app.js"></script>















<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
<!-- own links -->


<!-- my script -->
<script src="<?php echo base_url(); ?>admin_assets/js/admin_dynamic.js"></script>

<!--summernotes -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<!-- jquery validation links own ad -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<!-- Data table js links -->
<!-- <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->
<script src="admin_assets/js/admin_links/admin_datatable_link.js"></script>



<!-- select multiple value -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // ------------------------------------------->
    // select 2 add data
    $(document).ready(function() {
        $("#Select1").select2({
            placeholder: "Please Select Category",
            allowClear: true, // Optional: Adds a clear button to the Select2 dropdown
        })

        $("#select_homepage_main_category_section").select2({
            placeholder: "Please Select Category",
            allowClear: true, // Optional: Adds a clear button to the Select2 dropdown
        })

        $("#Select1_allergen_category").select2({
            placeholder: "Please Select Category",
            allowClear: true, // Optional: Adds a clear button to the Select2 dropdown
        })

        $("#Select2").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown

        })

        $("#select2_addtag_blog").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown

        })



        $("#select_youtube_recipes").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown
        });

        $("#select_first_recipes").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown
        });

        $("#select_homepage_third_section").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown
        });

        $("#select_homepage_category_section").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown
        });


        $("#select_homepage_four_section").select2({
            placeholder: "Please Select Tag",
            allowClear: true // Optional: Adds a clear button to the Select2 dropdown
        });
    });







    // --------------------------------------------------->
    // data table
    let table = new DataTable('#recipeslist', {
        "searching": true,
        "pageLength": 50 // This limits the number of rows per page to 25

    });


    let blog_table = new DataTable('#blog_table', {
        "searching": true,
        "pageLength": 50 // This limits the number of rows per page to 25

    });



    let category = new DataTable('#categorylist', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });

    let subscriber = new DataTable('#subscriber_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });

    let subscriber_newsletter_list = new DataTable('#subscriber_newsletter_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });



    let contact_list = new DataTable('#contact_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });

    let video_list = new DataTable('#video_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });

    let tag_list = new DataTable('#tag_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });

    // comment recipes
    let comment_list = new DataTable('#comment_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });

     // comment recipes
     let comment_list_blog = new DataTable('#comment_list_blog', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });


       // gallery dynamic recipes
       let gallery_dynamic_list = new DataTable('#gallery_dynamic_list', {
        "searching": true,
        "pageLength": 25 // This limits the number of rows per page to 25
    });



      // gallery dynamic recipes
      let all_img_gallery_datatable = new DataTable('#all_img_gallery_datatable', {
        "searching": true,
        "pageLength": 100 // This limits the number of rows per page to 25
    });

    

      // gallery  Section
      let gallery_datatable = new DataTable('#gallery_datatable', {
        "searching": true,
        // "pageLength": 10 // This limits the number of rows per page to 25
    });



    

   
</script>






<!-- tiny editor -->
<!-- tint text editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var base_url = '<?= base_url() ?>';
    tinymce.init({
        selector: 'textarea.rte',
        height: '400px',
        pad_empty_with_br: true,
        image_dimensions: false,
        plugins: [
            'template', 'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
            'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
            'powerpaste', 'code', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: ['undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        ],
        content_style: " .border{border: 1px solid;}.lws-editor-columns .row .col-xs-12{position:relative}.lws-editor-columns .row .col-xs-12::before{content:'';display:block;position:absolute;height:100%;width:calc(100% - 30px);border:1px dotted gray}.lws-editor-columns .row .col-xs-12 img{max-width:100%;height:auto}",
        content_css: ["https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", base_url + "assets/tinymce-templates/rich-text.css"],
        content_css_cors: true,
        templates: [{
                "title": "30% and 70% section spacing on both sides",
                "description": "Insert on the page, 4 column and 8 column",
                "url": base_url + "assets/tinymce-templates/row-four-eight.html"
            },
            {
                "title": "70% and 30% section spacing on both sides",
                "description": "Insert on the page, 8 column and 4 column",
                "url": base_url + "assets/tinymce-templates/row-eight-four.html"
            },
            {
                "title": "Full width image with over content",
                "description": "Insert image with content",
                "url": base_url + "assets/tinymce-templates/img-with-over-content.html"
            },
            {
                "title": "Container with 50% and 50% images and content",
                "description": "Insert on the page, 2 columns with the same width",
                "url": base_url + "assets/tinymce-templates/con-with-6-6-cols.html"
            },
            // {
            //     "title": "Container 50% and 50% content no spacing on both sides",
            //     "description": "Insert on the page, 2 columns text with the same width",
            //     "url": base_url + "assets/tinymce-templates/con-with-6-6col-text.html"
            // },
        ],
        image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Full width',
                value: 'full-width'
            },
            {
                title: 'Width Auto',
                value: 'width-auto'
            },
            {
                title: 'Set Height',
                value: 'img-set-height'
            },
            {
                title: 'Height Auto',
                value: 'img-height-auto'
            },

        ],
        style_formats: [{
                title: 'Heading 3 with style',
                selector: 'h3',
                classes: 'main-h3'
            },
            {
                title: 'Heading 2 with style',
                selector: 'h2',
                classes: 'main-h2'
            },
        ]

    });
</script>

</body>

</html>