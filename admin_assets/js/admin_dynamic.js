// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// var base_url = document.getElementById("base_url").value;
var base_url = document.getElementById("base_url") ?
    document.getElementById("base_url").value :
    "";

$(document).ready(function() {
    // alert("hello");
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  DOCUMENT READY FUNCTION START xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // admin login validation
    $("#admin_login_validation").validate({
        // set rules
        rules: {
            email: {
                required: true,
            },

            password: {
                required: true,
                // minlength: 2
            },
        },

        // show the message
        messages: {
            email: {
                required: "This field is required.",
                email: "Enter Valid Username",
            },

            password: {
                required: "This field is required.",
                password: "Please Enter valid password",
            },
        },
    });

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // recipe add validation
    // $("#recipeadd_validation").validate({

    //     // set rules
    //     rules: {

    //         re_title: {
    //             required: true,
    //         },

    //         re_title_url: {
    //             required: true,
    //         },
    //         popular_recipe: {
    //             required: true,
    //         },

    //         imgInput: {
    //             required: true,
    //         },

    //         re_shortdescription: {
    //             required: true,
    //         },

    //         'category_data[]': {
    //             required: true,
    //         },

    //         'tag_data[]': {
    //             required: true,
    //         },

    //         re_description: {
    //             required: true
    //         },

    //         author_table_id: {
    //             required: true,
    //         },

    //         video_url: {
    //             required: true,
    //         },

    //         seo_title: {
    //             required: true,
    //         },

    //         seo_keyword: {
    //             required: true,
    //         },

    //         seo_description: {
    //             required: true,
    //         },

    //     },

    //     // show the message
    //     messages: {

    //         re_title: {
    //             required: "Please enter Recipe Name",
    //         },

    //         re_title_url: {
    //             required: "Please enter Recipe Url",
    //         },

    //         popular_recipe: {
    //             required: "Please Select Popular Recipe",
    //         },

    //         imgInput: {
    //             required: "Please Add Image",
    //         },

    //         re_shortdescription: {
    //             required: "Please enter short description",
    //         },

    //         'category_data[]': {
    //             required: "Please select at least one category",
    //         },

    //         'tag_data[]': {
    //             required: "Please select at least one Tag",
    //         },

    //         re_description: {
    //             required: "Please enter a description"
    //         },

    //         author_table_id: {
    //             required: "Please enter author name",
    //         },

    //         video_url: {
    //             required: "Please enter Video Url",
    //         },

    //         seo_title: {
    //             required: "Please enter Seo title",
    //         },

    //         seo_keyword: {
    //             required: "Please enter Seo keword",
    //         },

    //         seo_description: {
    //             required: "Please enter Seo Description",
    //         },

    //         // errorPlacement: function(error, element) {

    //         //     element
    //         //     if (element.is("select")) {
    //         //         // error.insertAfter("#Select1");
    //         //         alert('test');
    //         //     } else {
    //         //         error.appendTo($("#Select1-error"));
    //         //     }

    //         //     if (element.attr("name") == "tag_data[]") {
    //         //         error.insertAfter("#Select2");
    //         //     } else {
    //         //         error.insertAfter(element);
    //         //     }
    //         // }

    //     },

    // });

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // <!- Summernote Editior remove css when copy and paste text -->

    function summer() {
        $("tag").removeAttr("style");

        $(".summernote").summernote({
            // height: 400,
            callbacks: {
                onPaste: function(e) {
                    e.preventDefault();

                    navigator.clipboard
                        .readText()
                        .then((clipboardText) =>
                            document.execCommand("insertText", false, clipboardText)
                        )
                        .catch((error) =>
                            console.error("Failed to read clipboard data:", error)
                        );
                },
            },
        });
    }

    // // calling function
    summer();

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  DOCUMENT READY FUNCTION End xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
});

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx javascript section   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx javascript section   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx javascript section   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx javascript section   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// select image then show in the side
// add recipes image show
// file name addrecipes

document.addEventListener("DOMContentLoaded", function() {
    var imgInput = document.querySelector(".imgInput");
    var previewImg = document.querySelector(".previewImg");

    if (imgInput) {
        imgInput.addEventListener("change", function() {
            var file = this.files[0]; // Get the selected file
            var reader = new FileReader();

            reader.onload = function(event) {
                previewImg.src = event.target.result; // Set the preview image source to the uploaded file
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    // var imgInput = document.getElementById('imgInp');
    // var previewImg = document.getElementById('blah');

    var imgInput = document.querySelector(".imgInput2");
    var previewImg = document.querySelector(".previewImg2");

    if (imgInput) {
        imgInput.addEventListener("change", function() {
            var file = this.files[0]; // Get the selected file
            var reader = new FileReader();

            reader.onload = function(event) {
                previewImg.src = event.target.result; // Set the preview image source to the uploaded file
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        });
    }
});

// xxxxxxxxxx Seo Section xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// seo details
function seo_edit_data() {
    // console.log('test_console');

    var form = document.getElementById("seo_edit_form");

    if (form) {
        var formData = new FormData(form);

        $.ajax({
            url: base_url + "edit_form_data",
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // console.log(response);

                if (response.status == 1) {
                    iziToast.success({
                        title: "Update",
                        message: "Details Successfuly.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "green",
                    });
                } else {
                    iziToast.error({
                        title: "Failed",
                        message: "To Update Details.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                }
            },
            error: function() {
                // console.log('Error');

                iziToast.error({
                    title: "Failed",
                    message: "To Update Details.",
                    timeout: 3000,
                    position: "topRight",
                    theme: "black",
                    color: "red",
                    backgroundColor: "#ff0000",
                    messageColor: "white",
                    titleColor: "white",
                    progressBarColor: "black",
                });
            },
        });
    }
}

// xxxxxxxxxx Recipes Section  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// <!-- (2) recipes section  Delete  -->

function recipes_delete(re_id, e) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "recipes_delete",
                dataType: "json",
                data: { del_id: re_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();
                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#recipeslist tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function(response) {
                    console.log(response);
                    // Swal.fire({
                    //     title: 'Error!',
                    //     text: 'An error occurred while deleting data.',
                    //     icon: 'error',
                    // });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ---------------------------------------------------------------->
// recipe deactive
function recipe_deactive(re_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate ?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_recipe",
                dataType: "json",
                data: { recipe_id: re_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_deactive to recipe_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "recipe_deactive",
                        "recipe_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactive data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ---------------------------------------------------------------->
// recipe active
function recipe_active(re_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to activate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_recipe",
                dataType: "json",
                data: { recipe_id: re_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_active to recipe_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "recipe_active",
                        "recipe_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while activate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate recipe data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate recipe data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate recipe data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

// calling ajax delete data
// console.log('ready...');
$("#delete_recipe_data_button").click(function() {
    if (confirm("Confirm To Delete Data ")) {
        // console.log('delete btn click');
        // var base_url = document.getElementById("base_url").value;

        var checkboxes = document.querySelectorAll(
            'input[name="active_checkox[]"]'
        );

        // Array to store the values of checked checkboxes
        var checkedValues = [];

        for (var i = 0; i < checkboxes.length; i++) {
            var checkbox = checkboxes[i];
            if (checkbox.checked) {
                checkedValues.push(checkbox.value);
            }
        }

        // Log the array of checked values
        // console.log(checkedValues);
        // return;

        $.ajax({
            url: base_url + "recipes_attime_deleteall",
            type: "post",
            dataType: "json",
            data: { recipes_id: checkedValues },
            success: function(response) {
                // console.log(response);
                // return;

                if (response.result != 0) {
                    Swal.fire({
                        title: "Successfully",
                        text: "Delete data",
                        icon: response.type,
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 500); // 2000 milliseconds = 2 seconds

                    // let element = row_data;

                    // // Example of removing the row from the table:
                    // element.closest('tr').remove();
                    // // Reassign serial numbers after deletion
                    // const rows = document.querySelectorAll('#recipeslist tbody tr');
                    // rows.forEach((row, index) => {
                    //     row.querySelector('.sr-no').innerText = index + 1;
                    // });
                } else {
                    console.log(response);
                    console.log("error response");
                }
            },
            error: function(response) {
                console.log(response);
            },
        });
    }
});

// --------------------------------------------------------------------->
// --------------------------------------------------------------------->
// recipes faq question and answer

// Add Row function recipe faq
function addRow_recipe_data() {
    // Add Row Dynamic content

    $("#faqContainer_recipe_data").append(`
      <div id="faqContainer_recipe_data">
                            <div class="faq_row_recipe_data col-lg-12 d-flex mt-4">
                                <div class="col-lg-5">
                                    <label>FAQ Question</label>
                                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Your Question">
                                </div>
                                <div class="col-lg-5">
                                    <label>FAQ Answer</label>
                                    <input type="text" name="faq_answer[]" class="form-control" placeholder="Enter Your Answer">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <button type="button" class="btn btn-danger removeRow_recipe_data" onclick="RemoveRow_recipe_data()">Remove</button>
                                </div>
                            </div>
                        </div>
    `);
}

// remove faq recipe question & answer
function RemoveRow_recipe_data() {
    // Use event delegation to handle the click event
    document.addEventListener("click", function(event) {
        // Check if the clicked element has the class 'removeRow_recipe_data'
        if (event.target.classList.contains("removeRow_recipe_data")) {
            // Find the closest parent element with the class '.faq_row_recipe_data' and remove it
            const faqRow = event.target.closest(".faq_row_recipe_data");
            if (faqRow) {
                faqRow.remove();
            }
        }
    });
}

// delete faq recipe data row
function Delete_Row_recipe_data(faq_recipe_id, element) {
    // console.log(faq_recipe_id);
    // return;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                url: base_url + "faq_recipe_delete",
                type: "POST",
                // dataType: 'json',
                data: { faq_recipe_id: faq_recipe_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    window.location.reload(); // Reload the page if the condition is true

                    // var row = element.closest('.faq_row_recipe_data');
                    // if (row) {
                    //     // Remove the row from the DOM
                    //     row.remove();
                    // }
                },
                error: function() {
                    console.log("Error issue");
                    // Swal.fire({
                    //     title: 'Error!',
                    //     text: 'An error occurred while deleting data.',
                    //     icon: 'error',
                    // });
                },
            });
        }
    });
}






// in the edit section need more the faq for recipe this logic in the edit section
function edit_section_insert_morerows_recipe_data() {
    // console.log('test_console');
    // return;
    // Add Row Dynamic content

    $("#foredit_faqContainer_recipe_data").append(`
    <div id="faqContainer_recipe_data">
                          <div class="faq_row_recipe_data col-lg-12 d-flex mt-4">
                              <div class="col-lg-5">
                                  <label>FAQ Question</label>
                                  <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Your Question">
                                  <span id="faq_question_error" class="error"></span>
                              </div>
                              <div class="col-lg-5">
                                  <label>FAQ Answer</label>
                                  <input type="text" name="faq_answer[]" class="form-control" placeholder="Enter Your Answer">
                                  <span id="faq_answer_error" class="error"></span>
                              </div>
                              <div class="col-lg-12 mt-4">
                                  <button type="button" class="btn btn-danger removeRow_recipe_data" onclick="RemoveRow_recipe_data()">Remove</button>
                              </div>
                          </div>
                      </div>
  `);
}







// ------------------------------------------------------->
// under recipe edit section insert data
function Under_edit_section_faq_recipe_insert() {
    // console.log('test_console');
    // return;

    var faq_question = document.getElementById("faq_question").value;
    var faq_answer = document.getElementById("faq_answer").value;

    if (faq_question != "" && faq_answer != "") {
        var form = document.getElementById("edit_section_insert_data");

        if (form) {
            var formData = new FormData(form);

            $.ajax({
                url: base_url + "under_edit_section_faq_recipe_add",
                type: "post",
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Let the browser set the content type
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.status == 1) {
                        iziToast.success({
                            title: "Insert",
                            message: "Details Successfuly.",
                            timeout: 3000,
                            position: "topRight",
                            theme: "black",
                            color: "green",
                        });

                        // Assuming you have access to the inserted data in the response
                        var newQuestion = $('input[name="faq_question[]"]').last().val();
                        var newAnswer = $('input[name="faq_answer[]"]').last().val();
                        var faq_recipe_id = $('input[name="faq_recipe_id[]"]').last().val();

                        // Create the new row content
                        var newRow = `
                     <div class="faq_row_recipe_data col-lg-12 d-flex mt-4">
                                        <div class="col-lg-5">
                                            <label>FAQ Question</label>
                                            <input type="text" name="faq_question[]" value="${newQuestion}" class="form-control" placeholder="Enter Your Question">
                                        </div>
                                        <div class="col-lg-5">
                                            <label>FAQ Answer</label>
                                            <input type="text" name="faq_answer[]" value="${newAnswer}" class="form-control" placeholder="Enter Your Answer">
                                        </div>

                                        <div class="col-lg-12 mt-4">
                                            <button type="button" class="btn btn-success" id="DeleteRow_recipe_data" onclick="Delete_Row_recipe_data(${faq_recipe_id},this)">Delete</button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="faq_recipe_id[]" value="${faq_recipe_id}">
                    </div>
                `;

                        // Append the new row to the FAQ container
                        $("#faqContainer_recipe_data").append(newRow);
                    } else {
                        iziToast.error({
                            title: "Failed",
                            message: "To Add Details.",
                            timeout: 3000,
                            position: "topRight",
                            theme: "black",
                            color: "red",
                            backgroundColor: "#ff0000",
                            messageColor: "white",
                            titleColor: "white",
                            progressBarColor: "black",
                        });
                    }
                },
                error: function() {
                    // console.log('Error');

                    iziToast.error({
                        title: "Failed",
                        message: "To Add Details.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                },
            });
        }
    } else {
        alert("Please fill in all the required fields.");
    }
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// <!-- Blog section   -->

// blog delete
// <!--  Blog section  Delete  -->
function blog_delete(blog_id, e) {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            
            $.ajax({
                type: "POST",
                url: base_url + "blog_delete",
                dataType: "json",
                data: { blog_id: blog_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();
                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#blog_table tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function(response) {
                    console.log(response);
                    // Swal.fire({
                    //     title: 'Error!',
                    //     text: 'An error occurred while deleting data.',
                    //     icon: 'error',
                    // });
                },
            });
        }
    });
}

// ---------------------------------------------------------------->
// blog deactive
function blog_deactive(blog_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate ?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_blog",
                dataType: "json",
                data: { blog_id: blog_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: "Deactivate!",
                        text: "Your Data has been deactivate.",
                        icon: "success",
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1200); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_deactive to recipe_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "blog_deactive",
                        "blog_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactive data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ---------------------------------------------------------------->
// blog active
function blog_active(blog_id, element) {
    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to activate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_blog",
                dataType: "json",
                data: { blog_id: blog_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: "Activate!",
                        text: "Your Data has been Activate.",
                        icon: "success",
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1200); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_active to recipe_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "blog_active",
                        "blog_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while activate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate blog data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate blog data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate blog data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

// calling ajax delete data
// console.log('ready...');
$("#delete_blog_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkox[]"]'
            );

            // Array to store the values of checked checkboxes
            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "blog_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { blog_id: checkedValues },
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error response");
                },
            });
        }
    });
});

// --------------------------------------------------------------------->
// --------------------------------------------------------------------->
// blog faq question and answer

// Add Row function blog faq
function addRow_blog_data() {
    // Add Row Dynamic content

    // console.log('test_console');

    $("#faqContainer_blog_data").append(`
      <div id="faqContainer_blog_data">
                            <div class="faq_row_blog_data col-lg-12 d-flex mt-4">
                                <div class="col-lg-5">
                                    <label>FAQ Question</label>
                                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Your Question">
                                </div>
                                <div class="col-lg-5">
                                    <label>FAQ Answer</label>
                                    <input type="text" name="faq_answer[]" class="form-control" placeholder="Enter Your Answer">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <button type="button" class="btn btn-danger RemoveRow_blog_data" onclick="RemoveRow_blog_data()">Remove</button>
                                </div>
                            </div>
                        </div>
    `);
}

// remove faq recipe question & answer
function RemoveRow_blog_data() {
    // Use event delegation to handle the click event
    document.addEventListener("click", function(event) {
        // Check if the clicked element has the class 'removeRow_recipe_data'
        if (event.target.classList.contains("RemoveRow_blog_data")) {
            // Find the closest parent element with the class '.faq_row_recipe_data' and remove it
            const faqRow = event.target.closest(".faq_row_blog_data");
            if (faqRow) {
                faqRow.remove();
            }
        }
    });
}

// delete faq blog data row
function Delete_Row_blog_data(faq_blog_id, element) {
    // console.log(faq_recipe_id);
    // return;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                url: base_url + "faq_blog_delete",
                type: "POST",
                // dataType: 'json',
                data: { faq_blog_id: faq_blog_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    window.location.reload(); // Reload the page if the condition is true

                    // var row = element.closest('.faq_row_blog_data');
                    // if (row) {
                    //     // Remove the row from the DOM
                    //     row.remove();
                    // }
                },
                error: function() {
                    console.log("Error issue");
                    // Swal.fire({
                    //     title: 'Error!',
                    //     text: 'An error occurred while deleting data.',
                    //     icon: 'error',
                    // });
                },
            });
        }
    });
}

// in the edit section need more the faq for recipe this logic in the edit section
function edit_section_insert_morerows_blog_data() {
    // console.log('test_console');
    // return;
    // Add Row Dynamic content

    $("#foradd_faqContainer_blog_data").append(`
                         <div class="faq_row_blog_data col-lg-12 d-flex mt-4">
                                <div class="col-lg-5">
                                    <label>FAQ Question</label>
                                    <input type="text" name="faq_question[]" id="faq_question" class="form-control" placeholder="Enter Your Question">
                                </div>
                                <div class="col-lg-5">
                                    <label>FAQ Answer</label>
                                    <input type="text" name="faq_answer[]" id="faq_answer" class="form-control" placeholder="Enter Your Answer">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <button type="button" class="btn btn-danger RemoveRow_blog_data" onclick="RemoveRow_blog_data(this)">Remove</button>
                                </div>
                            </div>
  `);
}

// ---------------------------------------------->
// remove row
function RemoveRow_blog_data(button) {
    // Get the parent row of the button
    var row = button.closest(".faq_row_blog_data");
    // Remove the row from the DOM
    if (row) {
        row.remove();
    }
}

// ------------------------------------------------------->
// under blog edit section insert data
function Under_edit_section_faq_blog_insert() {
    // console.log('test_console');
    // return;

    var faq_question = document.getElementById("faq_question").value;
    var faq_answer = document.getElementById("faq_answer").value;

    if (faq_question != "" && faq_answer != "") {
        var form = document.getElementById("blog_edit_section_insert_data");

        if (form) {
            var formData = new FormData(form);

            $.ajax({
                url: base_url + "under_edit_blog_faq_add",
                type: "post",
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Let the browser set the content type
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.status == 1) {
                        iziToast.success({
                            title: "Insert",
                            message: "Details Successfuly.",
                            timeout: 3000,
                            position: "topRight",
                            theme: "black",
                            color: "green",
                        });

                        // Assuming you have access to the inserted data in the response
                        var newQuestion = $('input[name="faq_question[]"]').last().val();
                        var newAnswer = $('input[name="faq_answer[]"]').last().val();
                        var faq_blog_id = $('input[name="faq_blog_id[]"]').last().val();

                        // Create the new row content
                        var newRow = `
                     <div class="faq_row_blog_data col-lg-12 d-flex mt-4">
                                        <div class="col-lg-5">
                                            <label>FAQ Question</label>
                                            <input type="text" name="faq_question[]" value="${newQuestion}" class="form-control" placeholder="Enter Your Question">
                                        </div>
                                        <div class="col-lg-5">
                                            <label>FAQ Answer</label>
                                            <input type="text" name="faq_answer[]" value="${newAnswer}" class="form-control" placeholder="Enter Your Answer">
                                        </div>

                                        <div class="col-lg-12 mt-4">
                                            <button type="button" class="btn btn-success" onclick="Delete_Row_blog_data(${faq_blog_id},this)">Delete</button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="faq_blog_id[]" value="${faq_blog_id}">
                    </div>
                `;

                        // Append the new row to the FAQ container
                        $("#faqContainer_blog_data").append(newRow);
                    } else {
                        iziToast.error({
                            title: "Failed",
                            message: "To Add Details.",
                            timeout: 3000,
                            position: "topRight",
                            theme: "black",
                            color: "red",
                            backgroundColor: "#ff0000",
                            messageColor: "white",
                            titleColor: "white",
                            progressBarColor: "black",
                        });
                    }
                },
                error: function() {
                    // console.log('Error');

                    iziToast.error({
                        title: "Failed",
                        message: "To Add Details.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                },
            });
        }
    } else {
        alert("Please fill in all the required fields.");
    }
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// <!-- (3) category section  Delete  -->
function category_delete(c_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "category_delete",
                dataType: "json",
                data: { del_id: c_id },
                success: function(response) {
                    // alert(response.re_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();
                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#categorylist tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ------Deactive category------------------------------------------------------------------>
// <!-- category section  active deactive  -->
function category_deactive(c_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_category",
                dataType: "json",
                data: { category_id: c_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1200); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from category_deactive to category_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from category_deactive to category_active
                    var newOnclickValue = onclickValue.replace(
                        "category_deactive",
                        "category_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactivate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// ------active category logic------------------------------------------------------------------>
// <!-- category section  active loigc for  -->
function category_active(c_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to active?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_category",
                dataType: "json",
                data: { category_id: c_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1200); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from category_active to category_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from category_active to category_deactive
                    var newOnclickValue = onclickValue.replace(
                        "category_active",
                        "category_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while active data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Tags Sections

// ------------------------------------------------------------>
// tag edit
function tag_edit(tag_id) {
    // console.log(tag_id);

    $.ajax({
        type: "post",
        url: base_url + "edit-tag-view",
        dataType: "json",
        data: { tag_id, tag_id },
        success: function(response) {
            // console.log(response);

            var tag_id = response.tag_id;
            var tag_url = response.tag_url;
            var tag_name = response.tag_name;

            var tagAppend = "";
            $("#edit_tag_form").empty();

            if (response != 0) {
                tagAppend =
                    `
                <form action="tag_editlogic" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tagname">Tag Name</label>
                                <input type="text" name="tag_name" value="` +
                    tag_name +
                    `" class="form-control">
                            </div>

                             <div class="form-group">
                                <label for="tag_url">Tag Url</label>
                                <input type="text" name="tag_url" value="` +
                    tag_url +
                    `" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="tag_edit_id" value="` +
                    tag_id +
                    `">
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                `;

                $("#edit_tag_form").append(tagAppend);
                $("#edit_tag_form_modal").modal("show");
            }
        },
        error: function(response) {
            console.log(response);
        },
    });
}

// --------------------------------------------------------------->
// <!--  tag section  Delete  -->
function tag_delete(tag_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "tag_delete",
                dataType: "json",
                data: { del_id: tag_id },
                success: function(response) {
                    // alert(response.re_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();
                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#tag_list tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ------Deactive tag------------------------------------------------------------------>
// <!-- tag section  active deactive  -->
function tag_deactive(tag_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_tag",
                dataType: "json",
                data: { tag_id: tag_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from tag_deactive to tag_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from tag_deactive to tag_active
                    var newOnclickValue = onclickValue.replace(
                        "tag_deactive",
                        "tag_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactivate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// ------active tag logic------------------------------------------------------------------>
// <!-- tag section  active loigc for  -->
function tag_active(tag_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to active?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_tag",
                dataType: "json",
                data: { tag_id: tag_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from tag_active to tag_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from tag_active to tag_deactive
                    var newOnclickValue = onclickValue.replace(
                        "tag_active",
                        "tag_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while active data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// <!--  author section  -->

// <!--  author  Delete  -->
function author_delete(author_id, e) {
    // alert(base_url);

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        // Make an AJAX request to delete method

        $.ajax({
            type: "POST",
            url: base_url + "author_delete",
            datatype: "json",
            data: { author_id: author_id },
            success: function(response) {
                // console.log(response);

                Swal.fire({
                    title: "Deleted!",
                    text: "Your data has been deleted.",
                    icon: "success",
                    timer: 3000,
                });

                // setTimeout(function() {
                //     location.reload();
                // }, 1500); // 2000 milliseconds = 2 seconds

                let element = e;

                // Example of removing the row from the table:
                element.closest("tr").remove();
                // Reassign serial numbers after deletion
                const rows = document.querySelectorAll("#author_list tbody tr");
                rows.forEach((row, index) => {
                    row.querySelector(".sr-no").innerText = index + 1;
                });
            },
            error: function() {
                console.log("error");
                Swal.fire({
                    title: "Error!",
                    text: "An error occurred while deleting data.",
                    icon: "error",
                });
            },
        });
    });
}

// ---------------------------------
// ---- Author Deactivate  ------------------------------------------------------>
// author deactivate
function author_deactive(author_id, element) {
    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            // alert('hello');

            $.ajax({
                type: "POST",
                url: base_url + "deactivate_author",
                datatype: "json",
                data: { author_id, author_id },
                success: function(response) {
                    // console.log(response);

                    Swal.fire({
                        title: "Deactivate!",
                        text: "Your Data has been deactivate.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from article_deactive to article_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from article_deactive to article_active
                    var newOnclickValue = onclickValue.replace(
                        "author_deactive",
                        "author_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function(response) {
                    console.log("error");

                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactivate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// -----------------------------------
// ---- Author activate  ------------------------------------------------------>
function author_active(author_id, element) {
    // console.log(author_id);
    // return;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to active?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            // alert('hello');
            $.ajax({
                type: "POST",
                url: base_url + "activate_author",
                datatype: "json",
                data: { author_id, author_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Activate!",
                        text: "Your Data has been Activate.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from author_active to author_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from author_active to author_deactive
                    var newOnclickValue = onclickValue.replace(
                        "author_active",
                        "author_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function(response) {
                    // console.log(response);

                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while active data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// --------At Time Deactivate or delete option  author data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate or delete option author data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate or delete option author data-------------------------------------------------------------------------------------------------------->

// -----Checkbox Deactivate Author-------------------------------------------------------------------------------------------------->
// deactivate using checkbox

$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#author_master_checkbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".author_childcheckbox");

        checkedValues = [];

        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".author_childcheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        $(".author_childcheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

// calling ajax delete data
// console.log('ready...');
$("#deactivate_author_data_button").click(function() {
    if (confirm("Confirm To Delete Data")) {
        // console.log('delete btn click');

        var checkboxes = document.querySelectorAll(
            'input[name="author_active_checkbox[]"]'
        );

        var checkedValues = [];

        for (var i = 0; i < checkboxes.length; i++) {
            var checkbox = checkboxes[i];
            if (checkbox.checked) {
                checkedValues.push(checkbox.value);
            }
        }

        // console.log(checkedValues);
        // return;

        $.ajax({
            url: base_url + "author_attime_deleteAll",
            type: "post",
            dataType: "json",
            data: { author_id: checkedValues },
            success: function(response) {
                // console.log(response);
                // return;

                Swal.fire({
                    title: "Successfully",
                    text: "Delete data",
                    icon: response.type,
                    timer: 3000,
                });

                // setTimeout(function() {
                //     location.reload();
                // }, 1000); // 2000 milliseconds = 2 seconds

                // delete data its remove without refreshing page data tr
                // Remove the deleted elements from the DOM
                for (var i = 0; i < checkboxes.length; i++) {
                    var checkbox = checkboxes[i];
                    if (checkbox.checked) {
                        var row = checkbox.closest("tr"); // Assuming each checkbox is in a table row
                        if (row) {
                            row.remove(); // Remove the row from the DOM
                        }
                    }
                }

                // ------------------------------------------------------------------------------>
                // srno correct logic
                // Reassign serial numbers after deletion
                const rows = document.querySelectorAll("#author_list tbody tr");
                rows.forEach((row, index) => {
                    row.querySelector(".sr-no").innerText = index + 1;
                });

                // ------------------------------------------------------------------------------>
                // remove checkbox values input value
                // Clear the master checkbox
                $("#author_master_checkbox").prop("checked", false);
                // Clear the checkedValues array
                checkedValues = [];
            },
            error: function() {
                console.log("error");
            },
        });
    }
});

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// faq section

// ------------------------------------------------------------------------------------------------->
// add faq insert logic
$(document).ready(function() {
    $("#addRow").click(function() {
        $("#faqContainer").append(`
            <div class="faq_row col-lg-12 d-flex mt-4">
                <div class="col-lg-5">
                    <label>FAQ Question</label>
                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Your Question">
                </div>
                <div class="col-lg-5">
                    <label>FAQ Answer</label>
                    <input type="text" name="faq_answer[]" class="form-control" placeholder="Enter Your Answer">
                </div>
                <div class="col-lg-12 mt-4">
                    <button type="button" class="btn btn-danger removeRow">Remove</button>
                </div>
            </div>
        `);
    });

    // Delegate the click event to dynamically added elements
    $("#faqContainer").on("click", ".removeRow", function() {
        $(this).closest(".faq_row").remove();
    });

    $("#submitForm").click(function() {
        $.ajax({
            url: base_url + "add_faq",
            type: "POST",
            data: $("#faqForm").serialize(), // Serialize form data
            success: function(response) {
                // console.log(response);

                Swal.fire({
                    title: "Success!",
                    text: "Date has been successfully inserted.",
                    icon: "success",
                    confirmButtonText: "OK",
                });

                setTimeout(function() {
                    location.reload();
                }, 1500); // 2000 milliseconds = 2 seconds
            },
            error: function(xhr) {
                console.log("error");
            },
        });
    });
});

// -------faq edit--------------------------------------------------------->
// <!--  faq section  edit  -->
function faq_edit(faq_id) {
    // console.log(faq_id);

    $.ajax({
        type: "post",
        url: base_url + "edit_faq_view",
        dataType: "json",
        data: { faq_id, faq_id },
        success: function(response) {
            // console.log(response.faq_id);

            var faq_id = "";
            var faq_question = "";
            var faq_answer = "";

            faq_id = response.faq_id;
            faq_question = response.faq_question;
            faq_answer = response.faq_answer;

            var faqAppend = "";
            $("#edit_faq_form").empty();

            if (response != 0) {
                faqAppend =
                    `
                <form action="faq_editlogic" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>FAQ Question</label>
                        <input type="text" name="faq_question" value="` +
                    faq_question +
                    `"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label>FAQ Answer</label>
                        <input type="text" name="faq_answer" value="` +
                    faq_answer +
                    `"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="faq_edit_id" value="` +
                    faq_id +
                    `">
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                </div>
            </form>
                `;

                $("#edit_faq_form").append(faqAppend);
                $("#edit_faq_modal_form").modal("show");
            }
        },
        error: function(response) {
            console.log(response);
        },
    });
}

// -------faq delete--------------------------------------------------------->
// <!--  faq section  Delete  -->
function faq_delete(faq_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "faq_delete",
                dataType: "json",
                data: { del_id: faq_id },
                success: function(response) {
                    // alert(response.re_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();
                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#categorylist tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Banner section

// ------Banner Edit-------------------------------------------------------------->
function banner_edit(banner_id) {
    console.log(banner_id);

    $.ajax({
        type: "post",
        url: base_url + "edit_banner_img_view",
        dataType: "json",
        data: { banner_id, banner_id },
        success: function(response) {
            // alert(response.banner_title);
            // console.log(response);
            // return;

            var banner_id = "";
            var banner_title = "";
            var banner_shortdescription = "";
            var banner_site_img = "";
            var banner_mobile_img = "";

            banner_id = response.banner_id;
            banner_title = response.banner_title;
            banner_shortdescription = response.banner_shortdescription;
            banner_site_img = response.banner_site_img;
            banner_mobile_img = response.banner_mobile_img;

            if (response.banner_site_img) {
                var banner_site_img_show = banner_site_img;
                banner_site_img_show =
                    `<img id="imgshow_edit_one" src="` +
                    base_url +
                    `uploads/banner_img/` +
                    banner_site_img +
                    `" alt="" width="80" height="70" class="m-t-10 m-l-15">`;
            } else {
                banner_site_img_show =
                    `<img id="imgshow_edit_one" src="` +
                    base_url +
                    `uploads/banner_img/no-image.jpg" alt="" width="80" height="70" class="m-l-15" style="margin-top:30px;">`;
            }

            if (response.banner_mobile_img) {
                var banner_mobile_img_show = banner_mobile_img;
                banner_mobile_img_show =
                    `<img id="imgshow_edit_two" src="` +
                    base_url +
                    `uploads/banner_img/` +
                    banner_mobile_img +
                    `" alt="" width="80" height="70" class="m-l-15">`;
            } else {
                banner_mobile_img_show =
                    `<img id="imgshow_edit_one" src="` +
                    base_url +
                    `uploads/banner_img/no-image.jpg"
                alt="" width="80" height="70" class="m-t-10 m-l-15">`;
            }

            var dataAppend = "";
            $("#edit_Banner_form").empty();

            if (response != 0) {
                dataAppend =
                    `
                <form action="edit_banner_img_logic" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Banner Title</label>
                            <input type="text" name="banner_title" value="` +
                    banner_title +
                    `" class="form-control">
                        </div>

                        <div class="form-group">
                        <label>Banner Short Description</label>
                        <input type="text" name="banner_shortdescription" value="` +
                    banner_shortdescription +
                    `" placeholder="Enter the Banner Short Description"
                            class="form-control">
                        </div>

                        <div class="row m-t-20">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Banner Image</label>
                                    <input type="file" name="banner_img" id="imgInput" class="form-control">                                                                   
                                    ` +
                    banner_site_img_show +
                    `
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Mobile Image</label>
                                    <input type="file" name="mobile_img" id="imgInput_edit_two" class="form-control">
                                    ` +
                    banner_mobile_img_show +
                    `                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="banner_edit_id" value="` +
                    banner_id +
                    `">
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
                    </div>
                </form>`;

                $("#edit_Banner_form").append(dataAppend);
                $("#edit_banner_modalForm").modal("show");
            }
        },
        error: function() {
            console.log(response);
        },
    });
}

// -----Banner Delete--------------------------------------------------------------->
// <!--  Banner section  Delete  -->

function banner_delete(banner_id, e) {
    // console.log(banner_id);

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "delete_banner",
                dataType: "json",
                data: { banner_id_data: banner_id },
                success: function(response) {
                    // alert(response.banner_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#banner_img tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// ---------------------------------------------------------------->
// recipe deactive
function banner_deactive(banner_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate ?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_banner",
                dataType: "json",
                data: { banner_id_data: banner_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from banner_deactive to banner_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from banner_deactive to banner_active
                    var newOnclickValue = onclickValue.replace(
                        "banner_deactive",
                        "banner_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactive data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ---------------------------------------------------------------->
// recipe active
function banner_active(banner_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> Are you sure! You want to activate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_banner",
                dataType: "json",
                data: { banner_id_data: banner_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from banner_active to banner_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from banner_active to banner_deactive
                    var newOnclickValue = onclickValue.replace(
                        "banner_active",
                        "banner_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while activate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Gallery Image Dynamic section

// ------------------------------------------------------------------->
// insert image
document.addEventListener("DOMContentLoaded", function() {
    var add_img_dynamic = document.getElementById("add_img_dynamic");
    if (add_img_dynamic) {
        add_img_dynamic.addEventListener("submit", function(event) {
            event.preventDefault();

            // console.log('test_console');
            // return;

            let formData = new FormData(this); // Create a FormData object from the form
            $.ajax({
                url: base_url + "add_img_dynamic", // URL to your CI4 controller method
                type: "POST",
                data: formData,
                contentType: false, // Let the browser set the content type
                processData: false, // Prevent jQuery from processing the data
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Success!",
                        text: "Data has been inserted successfully.",
                        icon: "success",
                        confirmButtonText: "OK",
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1500); // 2000 milliseconds = 2 seconds
                },
                error: function() {
                    // console.log('error');

                    Swal.fire({
                        title: "Error!",
                        text: "There was an issue with your submission. Please try again.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
            });
        });
    }
});

// ------Gallery Dynamic img Edit-------------------------------------------------------------->
function gallery_dynamic_edit(g_id) {
    // console.log(g_id);
    // return;

    $.ajax({
        type: "post",
        url: base_url + "edit_gallery_dynamic_view",
        dataType: "json",
        data: { g_id, g_id },
        success: function(response) {
            // console.log(response);
            // return;

            var g_id = "";
            var title = "";
            var image = "";

            g_id = response[0].g_id;
            title = response[0].title;
            image = response[0].image;

            // console.log(g_id);
            // console.log(title);
            // console.log(image);

            var galleryAppend = "";
            $("#edit_gallery_form").empty();

            if (response != 0) {
                galleryAppend =
                    ` 
                <form action="editlogic_gallery_dynamic" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                   <div class="form-group">
                        <label for="title"> Title</label>
                        <input type="text" name="title" value="` +
                    title +
                    `" class="form-control" placeholder="enter the title">
                    </div>

                    <div class="form-group">
                        <label for="tagname">Image</label>
                        <input type="file" name="image" class="imgInput form-control">
                        <img src="uploads/gallery_dynamic/` +
                    image +
                    `" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="gallery_edit_id" value="` +
                    g_id +
                    `">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                </div>
            </form>
            `;
            }

            $("#edit_gallery_form").append(galleryAppend);
            $("#edit_galler_dynamic_modalform").modal("show");
        },
        error: function(resonse) {
            console.log("error");

            Swal.fire({
                title: "Error!",
                text: "There was an issue. Please try again.",
                icon: "error",
                confirmButtonText: "OK",
            });
        },
    });
}

// --------------------------------------------------------------->
// delete gallery image

function gallery_dynamic_delete(g_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "gallery_dynamic_delete",
                dataType: "json",
                data: { g_id: g_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Success!",
                        text: "Data has been successfully deleted.",
                        icon: "success",
                        confirmButtonText: "OK", // Add this line to set the text of the confirm button
                        timer: 2000,
                        showConfirmButton: true, // Ensure this is set to true to display the button
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll(
                        "#gallery_dynamic_list tbody tr"
                    );
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ------Gallery Dynamic sequnce changes -------------------------------------------------------------->
function set_sequnce_gallery() {
    // console.log('test_console');

    var form = document.getElementById("set_sequnce_gallery");

    if (form) {
        var formData = new FormData(form);

        $.ajax({
            url: base_url + "gallery_update_sequence",
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // console.log(response);

                if ($response.status == 1) {
                    iziToast.success({
                        title: "Update",
                        message: "Sequence Successfuly.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "green",
                    });
                } else {
                    iziToast.error({
                        title: "Failed",
                        message: "To Update Sequence.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                }
            },
            error: function() {
                // console.log('Error');

                iziToast.error({
                    title: "Failed",
                    message: "To Update Sequence.",
                    timeout: 3000,
                    position: "topRight",
                    theme: "black",
                    color: "red",
                    backgroundColor: "#ff0000",
                    messageColor: "white",
                    titleColor: "white",
                    progressBarColor: "black",
                });
            },
        });
    }
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Video section

// ------Video Edit-------------------------------------------------------------->
function video_edit(video_id) {
    // alert("helo");
    // return;

    // console.log(video_id);

    $.ajax({
        type: "post",
        url: base_url + "edit_video_img_view",
        dataType: "json",
        data: { video_id, video_id },
        success: function(response) {
            // console.log(response.video_link);

            var video_id = "";
            var video_link = "";

            video_id = response.video_id;
            video_link = response.video_link;

            var videoAppend = "";
            $("#edit_video_form").empty();

            if (response != 0) {
                videoAppend =
                    `
                <form action="video_editlogic" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tagname">Video Url</label>
                        <input type="text" name="video_link" value="` +
                    video_link +
                    `" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="video_edit_id" value="` +
                    video_id +
                    `">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                </div>
            </form>
                `;

                $("#edit_video_form").append(videoAppend);
                $("#edit_video_modalform").modal("show");
            }
        },
        error: function(response) {
            console.log(response);
        },
    });
}

// ----------------------------------------------------------------->
// <!--  video section  Delete  -->
function video_delete(video_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "video_delete",
                dataType: "json",
                data: { del_id: video_id },
                success: function(response) {
                    // alert(response.re_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#video_list tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// logo favicon img section

document.addEventListener("DOMContentLoaded", function() {
    var formElement = document.getElementById("logo_favicon_Form");

    if (formElement) {
        formElement.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = document.getElementById("logo_favicon_Form");

            // Create a new FormData object from the form
            var formData = new FormData(form);

            // // Convert the FormData object to a plain object
            // var formObject = {};
            // formData.forEach((value, key) => {
            //     formObject[key] = value;
            // });

            // // Log the form data to the console
            // console.log(formObject);

            // return;

            $.ajax({
                type: "post",
                url: base_url + "edit_logo_info_logic",
                data: formData,
                processData: false, // Important! Don't process the files
                contentType: false, // Important! Set content type to false
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response != 0) {
                        // ------------------------------------------------------------------------------------------------------
                        // logo image
                        // Update the image source after a successful response
                        var logo_img = response.manages_pages_logo; // Replace with actual response data

                        // Select the image element
                        var img1 = document.querySelector(".logo_class");

                        var url1 = base_url + "uploads/logo_info/" + logo_img;
                        img1.src = url1;

                        // ------------------------------------------------------------------------------------------------------
                        // favicon image
                        // Update the image source after a successful response
                        var favicon_img = response.manages_pages_favicon; // Replace with actual response data

                        // Select the image element
                        var img2 = document.querySelector(".favicon_logo_class");

                        var url2 = base_url + "uploads/logo_info/" + favicon_img;
                        img2.src = url2;

                        // remove input value
                        document.getElementById("logo").value = "";
                        document.getElementById("favicon_logo").value = "";

                        iziToast.success({
                            title: "Update",
                            message: "Details Successfuly.",
                            timeout: 3000,
                            position: "topRight",
                            theme: "black",
                            color: "green",
                        });
                    } else {
                        iziToast.error({
                            title: "Failed",
                            message: "To Update Details.",
                            timeout: 3000,
                            position: "topRight",
                            theme: "black",
                            color: "red",
                            backgroundColor: "#ff0000",
                            messageColor: "white",
                            titleColor: "white",
                            progressBarColor: "black",
                        });
                    }
                },
                error: function() {
                    console.log("Ajax call failed.");
                },
            });
            // ajax end
        });
    }
});

// xxxxxxx Subcriber section xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// subscriber section

// <!--  subscriber section  Delete  -->
function subscriber_delete(subscriber_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "subscriber_delete",
                dataType: "json",
                data: { del_id: subscriber_id },
                success: function(response) {
                    // alert(response.re_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;
                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#subscriber_list tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate subscribers data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate subscribers data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate subscribers data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

$("#delete_subscriber_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkbox[]"]'
            );

            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "subscribers_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { subscriber_id: checkedValues },
                success: function(response) {
                    // console.log(response.status);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error");
                },
            });
        }
    });
});

// xxxxxxx Subcriber News letter section xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// subscriber  News letter section

// <!--  subscriber  News letter section  Delete  -->
function subscriber_newsletter_delete(subscriber_newsletter_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "subscriber_newsletter_delete",
                dataType: "json",
                data: { subscriber_newsletter_id: subscriber_newsletter_id },
                success: function(response) {
                    // alert(response.status);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;
                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll(
                        "#subscriber_newsletter_list tbody tr"
                    );
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate subscribers news letter data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate subscribers news letter data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate subscribers news letter data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

$("#delete_subscribernews_letter_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkbox[]"]'
            );

            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "subscribers_newsletter_attime_deleteAll",
                type: "post",
                // dataType: 'json',
                data: { subscriber_newsletter_id: checkedValues },
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error");
                },
            });
        }
    });
});

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// <!--  contact section  Delete  -->
function contact_delete(contact_id, e) {
    // alert("helo");
    // return;

    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "contact_delete",
                dataType: "json",
                data: { del_id: contact_id },
                success: function(response) {
                    // alert(response.re_id);
                    // return;

                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;
                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#contact_list tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate contact Us data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate contact Us data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate contact Us data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

$("#delete_contactus_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkbox[]"]'
            );

            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "contactus_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { contact_id: checkedValues },
                success: function(response) {
                    // console.log(response.status);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error");
                },
            });
        }
    });
});

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Commentts section

// ---------------------------------------------------------------->
// recipes comments
// ---------------------------------------------------------------->
// recipes comments
// ---------------------------------------------------------------->
// recipes comments
// ---------------------------------------------------------------->
// recipes comments

// --------------------------------------------------------------->
// comments recipe delete
function comments_recipe_delete(lead_id, e) {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "post",
                url: base_url + "comments_recipe_delete",
                dataType: "json",
                data: { lead_id: lead_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#comment_list tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    // console.log("Error");
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// ---------------------------------------------------------------->
// comments recipe active
function comment_recipe_active(lead_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> You want to activate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_recipe_comments",
                dataType: "json",
                data: { lead_id: lead_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: "Activate!",
                        text: "Your Data has been Activate.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_active to recipe_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "comment_recipe_active",
                        "comment_recipe_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while activate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ---------------------------------------------------------------->
// recipe comments deactive
function comment_recipe_deactive(lead_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> You want to Deactivate ?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_recipes_comments",
                dataType: "json",
                data: { lead_id: lead_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: "Deactivate!",
                        text: "Your Data has been deactivate.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_deactive to recipe_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "comment_recipe_deactive",
                        "comment_recipe_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactive data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate comments reicpe data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate comments reicpe data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate comments reicpe data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

// calling ajax delete data
// console.log('ready...');
$("#delete_commentsreicpe_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkox[]"]'
            );

            // Array to store the values of checked checkboxes
            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "comments_recipe_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { lead_id: checkedValues },
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error response");
                },
            });
        }
    });
});

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// <!--  comments rating star show logic  -->

function show_star() {
    // Select all elements with the "i" tag and store them in a NodeList called "stars"
    const stars = document.querySelectorAll(".stars i");

    // Loop through the "stars" NodeList
    stars.forEach((star, index1) => {
        // Add an event listener that runs a function when the "click" event is triggered
        star.addEventListener("click", () => {
            // Loop through the "stars" NodeList Again
            stars.forEach((star, index2) => {
                // Add the "active" class to the clicked star and any stars with a lower index
                // and remove the "active" class from any stars with a higher index
                index1 >= index2 ?
                    star.classList.add("active") :
                    star.classList.remove("active");
            });
        });
    });
}

show_star();

// ---------------------------------------------------------------->
// Blog comments
// ---------------------------------------------------------------->
// Blog comments
// ---------------------------------------------------------------->
// Blog comments
// ---------------------------------------------------------------->
// Blog comments

// --------------------------------------------------------------->
// comments Blog delete
function comment_blog_delete(lead_id, e) {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "post",
                url: base_url + "comments_blog_delete",
                dataType: "json",
                data: { lead_id: lead_id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#comment_list_blog tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    // console.log("Error");
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// ---------------------------------------------------------------->
// comments recipe active
function comment_blog_active(lead_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> You want to activate?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "active_blog_comments",
                dataType: "json",
                data: { lead_id: lead_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: "Activate!",
                        text: "Your Data has been Activate.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-on";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_active to recipe_deactive
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "comment_blog_active",
                        "comment_blog_deactive"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while activate data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// ---------------------------------------------------------------->
// blog comments deactive
function comment_blog_deactive(lead_id, element) {
    var base_url = document.getElementById("base_url").value;

    Swal.fire({
        title: "<h2>Are you sure?</h2><h6> You want to Deactivate ?</h6>",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "deactive_blog_comments",
                dataType: "json",
                data: { lead_id: lead_id },
                success: function(response) {
                    // alert(response.results);
                    // return;

                    Swal.fire({
                        title: "Deactivate!",
                        text: "Your Data has been deactivate.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    // -------------------------------------------------------------
                    // this line for active deactive
                    element.querySelector("i").className = "fas fa-toggle-off";

                    // -------------------------------------------------------------
                    // this code for calling
                    // Replace the function name from recipe_deactive to recipe_active
                    var anchorElement = element;

                    // Get the current onclick attribute value
                    var onclickValue = anchorElement.getAttribute("onclick");

                    // Replace the function name from recipe_deactive to recipe_active
                    var newOnclickValue = onclickValue.replace(
                        "comment_blog_deactive",
                        "comment_blog_active"
                    );

                    // Set the new onclick attribute value
                    anchorElement.setAttribute("onclick", newOnclickValue);
                    // Set the new onclick attribute value
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while Deactive data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// <!-- END SWEET ALERT LOGIC -->

// --------At Time Deactivate comments blog data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate comments blog data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate comments blog data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

// calling ajax delete data
// console.log('ready...');
$("#delete_comments_blog_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkox[]"]'
            );

            // Array to store the values of checked checkboxes
            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "comments_blog_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { lead_id: checkedValues },
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error response");
                },
            });
        }
    });
});

// xxxxx  Uploads xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Gallery Section

// --------------------------------------------?
// add row logic gallery section

function addRow_gallery_data() {
    // add row gallery image
    $("#gallery_container").append(
        `
    <div class="gallery_row_recipe_data col-lg-12 d-flex mt-4">
                          <div class="col-lg-5">
                              <label for="image">Image</label>
                              <input type="file" name="gallery_image[]" id="gallery_image" class="form-control" multiple>
                              <span id="error-message" style="color:red;display:none;">Please Upload Image</span>
                              <img src="` +
        base_url +
        `uploads/recipes_img/no-image.jpg" alt="" width="80" height="70" class="m-t-10 m-l-15">
                          </div>

                          <div class="col-lg-5">
                              <label for="alt">Alt Data</label>
                              <input type="text" name="gallery_image_alt[]" id="gallery_image_alt" class="form-control" placeholder="Enter the Alt Data">
                          </div>

                          <div class="col-lg-2 mt-4">
                              <button type="button" class="btn btn-danger removeRow_gallery_data" onclick="RemoveRow_gallery_data()">Remove</button>
                          </div>
                      </div>
  
  `
    );
}

// remove row logic for gallery image
function RemoveRow_gallery_data() {
    // console.log('test_console');

    // Use event delegation to handle the click event
    document.addEventListener("click", function(event) {
        // Check if the clicked element has the class 'removeRow_recipe_data'
        if (event.target.classList.contains("removeRow_gallery_data")) {
            // Find the closest parent element with the class '.faq_row_recipe_data' and remove it
            const row = event.target.closest(".gallery_row_recipe_data");

            if (row) {
                row.remove();
            }
        }
    });
}

// ------------------------------------------------------------------->
// gallery image image insert logic
function gallery_insert() {
    // console.log('test_console');

    var img = document.getElementById("gallery_image").value; // This should be the image URL or file
    var alt_text = document.getElementById("gallery_image_alt").value; // This should be the alt text field

    if (img && alt_text) {
        var form = document.getElementById("form_gallery_img");

        if (form) {
            var formData = new FormData(form);

            $.ajax({
                url: base_url + "gallery_img_insert",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // console.log(response);

                    if (response.status == 1) {
                        Swal.fire({
                            title: "Success",
                            text: "Data Upload successfully",
                            icon: "success",
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 2000); // 2000 milliseconds = 2 seconds
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Failed to Upload data",
                            icon: "error",
                        });
                    }
                },
                error: function() {
                    console.log("Error");

                    Swal.fire({
                        title: "Error",
                        text: "Failed to Upload data",
                        icon: "error",
                    });
                },
            });
        }
    } else {
        alert("Please Fill All input value");
    }
}

// ----------------------------------------------------------------------->
// copy text in gallery section
function copy_text_data(button) {
    // console.log('test_console');

    // Find the nearest row and the text_data cell in that row
    var row = button.closest("tr"); // Get the closest parent <tr>
    var textTocopy = row.querySelector(".text_data").innerText; // Find the text_data in the same row

    if (textTocopy) {
        navigator.clipboard
            .writeText(textTocopy)
            .then(function() {
                iziToast.success({
                    title: "Successfully",
                    message: "Data copied to clipboard.",
                    timeout: 3000,
                    position: "topRight",
                    theme: "black",
                    color: "green",
                });
            })
            .catch(function(err) {
                console.log("Failed To Copy Text: ", err);
            });
    } else {
        console.error("No text found to copy");
    }
}

// ------------------------------------------------------------------->
// copy gallery image path
function copy_image_path(url) {
    // Create a temporary textarea element to hold the text
    const tempTextArea = document.createElement("textarea");
    tempTextArea.value = url;
    document.body.appendChild(tempTextArea);

    // Select the text and copy it to the clipboard
    tempTextArea.select();
    var success = document.execCommand("copy");

    // Optional: Provide feedback to the user
    // alert('Text copied to clipboard!');

    if (success) {
        iziToast.success({
            title: "Successfully",
            message: "Data copied to clipboard.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",
        });
    } else {
        iziToast.error({
            title: "Error",
            message: "Failed to copy data.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "red",
        });
    }
}

// ----------------------------------------------------------------------------->
// gallery image Edit
function website_gallery_edit(gallery_id) {
    // console.log(gallery_id);

    $.ajax({
        url: base_url + "website_gallery_edit",
        type: "post",
        data: { gallery_id: gallery_id },
        success: function(response) {
            // console.log(response);
            // return;

            var gallery_id = "";
            var image = "";
            var gallery_image_alt = "";

            gallery_id = response.gallery_id;
            image = response.image;
            gallery_image_alt = response.gallery_image_alt;

            if (image) {
                image_data =
                    `<img src="` +
                    base_url +
                    `uploads/gallery/` +
                    image +
                    `" alt="" width="80" height="70" class="previewImg m-t-10 m-l-15">`;
            } else {
                image_data =
                    `<img src="` +
                    base_url +
                    `uploads/no-image.jpg" alt="" width="80" height="70" class="m-l-15" style="margin-top:30px;">`;
            }

            var galleryAppend = "";

            $("#edit_website_gallery_form").empty();

            if (gallery_id != 0) {
                galleryAppend =
                    `
                   <form id="editlogic_gallery_website" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                   <div class="form-group">
                        <label for="title"> Title</label>
                        <input type="file" name="gallery_image" id="gallery_image" class="imgInput form-control">
                       ` +
                    image_data +
                    `
                    </div>

                    <div class="form-group">
                      <label for="alt">Alt Data</label>
                            <input type="text" name="gallery_image_alt" id="gallery_image_alt" value="` +
                    gallery_image_alt +
                    `" class="form-control" placeholder="Enter the Alt Data">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="gallery_id" value="` +
                    gallery_id +
                    `">
                    <button type="button" onclick="website_gallery_edit_logic()" class="btn btn-info waves-effect waves-light">Submit</button>
                </div>
            </form>
                `;
            }

            $("#edit_website_gallery_form").append(galleryAppend);
            $("#edit_website_gallery_modalform").modal("show");
        },
        error: function() {
            console.log("Error");
        },
    });
}

// ----------------------------------------------------------------------------->
// edit logic gallery
function website_gallery_edit_logic() {
    var form = document.getElementById("editlogic_gallery_website");

    if (form) {
        var formData = new FormData(form);

        $.ajax({
            url: base_url + "edit_logic_gallery_website",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                // return;



                if (response.status == 1) {
                    iziToast.success({
                        title: "Update",
                        message: "Details Successfuly.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "green",
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1500); // 2000 milliseconds = 2 second

                } else {
                    iziToast.error({
                        title: "Failed",
                        message: "To Update Details.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                }


            },
            error: function() {
                // console.log('Error');

                Swal.fire({
                    title: "Error!",
                    text: "There was an issue. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
        });
    }
}

// ----------------------------------------------------------------------------->
// gallery image delete
function galler_img_delete(gallery_id, e) {
    // console.log(gallery_id);

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                url: base_url + "gallery_imgdelete",
                type: "post",
                dataType: "json",
                data: { gallery_id: gallery_id },
                success: function(response) {
                    // console.log(response);

                    Swal.fire({
                        title: "Deleted!",
                        text: "Your data has been deleted.",
                        icon: "success",
                        timer: 3000,
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;

                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    // const rows = document.querySelectorAll("#gallery_datatable tbody tr");
                    // rows.forEach((row, index) => {
                    //     row.querySelector(".sr-no").innerText = index + 1;
                    // });
                },
                error: function() {
                    // console.log('error');
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// --------At Time Deactivate comments blog data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate comments blog data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate comments blog data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

// calling ajax delete data
// console.log('ready...');
$("#delete_gallery_img_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkox[]"]'
            );

            // Array to store the values of checked checkboxes
            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "gallery_img_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { gallery_id: checkedValues },
                success: function(response) {
                    // console.log(response);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: "success",
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error response");
                },
            });
        }
    });
});







// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Gallery recipes website
function gallery_recipes_alt_edit(recipe_id) {
    // console.log(recipe_id);
    // return;


    $.ajax({
        url: base_url + 'get_recipe_alt_recipe_gallery',
        type: 'post',
        data: { recipe_id, recipe_id },
        success: function(response) {
            // console.log(response);
            // return;

            var recipe_id = "";
            var img_alt = "";

            recipe_id = response.re_id;
            img_alt = response.img_alt;


            if (img_alt) {
                img_alt = img_alt;
            } else {
                img_alt = "";
            }


            var gallery_recipes_append = "";

            $("#edit_website_gallery_recipes_form").empty();

            if (recipe_id != 0) {
                gallery_recipes_append = `
                          <form id="form_gallery_recipes_img" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div id="gallery_container">

                        <div class="gallery_row_recipe_data col-lg-12 d-flex">
                           
                            <div class="col-lg-12">
                                <label for="alt">Alt Data</label>
                                <input type="text" name="gallery_recipe_image_alt" value="` + img_alt + `" id="gallery_recipe_image_alt" class="form-control" placeholder="Enter the Alt Data">
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="recipe_id" id="recipe_id" class="form-control" value="` + recipe_id + `">
                    <button type="button" onclick="gallery_recipes_edit_logic()" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
                `;
            }


            $("#edit_website_gallery_recipes_form").append(gallery_recipes_append);
            $("#edit_website_gallery_recipes_modalform").modal("show");

        },
        error: function() {
            console.log('Error');
        }
    });

}




// --------------------------->
function gallery_recipes_edit_logic() {
    // console.log('test_console');
    // return;

    var form = document.getElementById("form_gallery_recipes_img");

    if (form) {
        var formData = new FormData(form);

        $.ajax({
            url: base_url + "gallery_recipe_edit_logic",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // console.log(response);
                // return;


                if (response.status == 1) {
                    iziToast.success({
                        title: "Update",
                        message: "Details Successfuly.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "green",
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1500); // 2000 milliseconds = 2 second

                } else {
                    iziToast.error({
                        title: "Failed",
                        message: "To Update Details.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                }

            },
            error: function() {
                // console.log('Error');
                iziToast.error({
                    title: "Failed",
                    message: "To Update Details.",
                    timeout: 3000,
                    position: "topRight",
                    theme: "black",
                    color: "red",
                    backgroundColor: "#ff0000",
                    messageColor: "white",
                    titleColor: "white",
                    progressBarColor: "black",
                });
            }
        });
    }
}







// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// Gallery Blog website
function gallery_blog_alt_edit(blog_id) {
    // console.log(blog_id);
    // return;


    $.ajax({
        url: base_url + 'get_blog_alt_img_gallery',
        type: 'post',
        data: { blog_id, blog_id },
        success: function(response) {
            // console.log(response);
            // return;

            var blog_id = "";
            var img_alt = "";

            blog_id = response.blog_id;
            blog_img_alt = response.blog_img_alt;


            if (blog_img_alt) {
                blog_img_alt = blog_img_alt;
            } else {
                blog_img_alt = "";
            }


            var gallery_blog_append = "";

            $("#edit_website_gallery_blog_form").empty();

            if (blog_id != 0) {
                gallery_blog_append = `
                          <form id="form_gallery_blog_img" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div id="gallery_container">

                        <div class="col-lg-12 d-flex">
                           
                            <div class="col-lg-12">
                                <label for="alt">Alt Data</label>
                                <input type="text" name="gallery_blog_image_alt" value="` + blog_img_alt + `" id="gallery_blog_image_alt" class="form-control" placeholder="Enter the Alt Data">
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="blog_id" id="blog_id" class="form-control" value="` + blog_id + `">
                    <button type="button" onclick="gallery_blog_edit_logic()" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
                `;
            }


            $("#edit_website_gallery_blog_form").append(gallery_blog_append);
            $("#edit_website_gallery_blog_modalform").modal("show");

        },
        error: function() {
            console.log('Error');
        }
    });

}




// --------------------------->
function gallery_blog_edit_logic() {
    // console.log('test_console');
    // return;

    var form = document.getElementById("form_gallery_blog_img");

    if (form) {
        var formData = new FormData(form);

        $.ajax({
            url: base_url + "gallery_blog_edit_logic",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // console.log(response);
                // return;


                if (response.status == 1) {
                    iziToast.success({
                        title: "Update",
                        message: "Details Successfuly.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "green",
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1500); // 2000 milliseconds = 2 second

                } else {
                    iziToast.error({
                        title: "Failed",
                        message: "To Update Details.",
                        timeout: 3000,
                        position: "topRight",
                        theme: "black",
                        color: "red",
                        backgroundColor: "#ff0000",
                        messageColor: "white",
                        titleColor: "white",
                        progressBarColor: "black",
                    });
                }

            },
            error: function() {
                // console.log('Error');
                iziToast.error({
                    title: "Failed",
                    message: "To Update Details.",
                    timeout: 3000,
                    position: "topRight",
                    theme: "black",
                    color: "red",
                    backgroundColor: "#ff0000",
                    messageColor: "white",
                    titleColor: "white",
                    progressBarColor: "black",
                });
            }
        });
    }
}






// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// landing page section

// ------------------------------------------------>
// lead delete
function lp_leads_delete(id, e) {
    // console.log(id);

    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            $.ajax({
                type: "POST",
                url: base_url + "lp_leads_delete",
                dataType: "json",
                data: { id: id },
                success: function(response) {
                    // console.log(response);
                    // return;

                    Swal.fire({
                        title: "Deleted!",
                        text: "The data has been successfully deleted.",
                        icon: "success",
                        confirmButtonText: "OK",
                    });

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 1500); // 2000 milliseconds = 2 seconds

                    let element = e;
                    // Example of removing the row from the table:
                    element.closest("tr").remove();

                    // Reassign serial numbers after deletion
                    const rows = document.querySelectorAll("#lp_lead_list tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector(".sr-no").innerText = index + 1;
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting data.",
                        icon: "error",
                    });
                },
            });
        }
    });
}

// --------At Time Deactivate landing page data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate landing page data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate landing page data-------------------------------------------------------------------------------------------------------->

// click checkbox then active checkbox all
// CHECBOX LOGIC mastercheckbox
$(document).ready(function() {
    // Set the number of records per page to 100
    // table.page.len(100).draw();

    var checkedValues = [];

    // Event delegation for master checkbox
    $(document).on("click", "#masterCheckbox", function() {
        var masterCheckbox = $(this);
        var childCheckboxes = $(".childCheckbox:visible"); // Only consider visible checkboxes

        // Clear checkedValues array
        checkedValues = [];

        // Update child checkboxes
        childCheckboxes.prop("checked", masterCheckbox.prop("checked"));
        updateCheckedValues();
    });

    // Event delegation for child checkboxes
    $(document).on("click", ".childCheckbox", function() {
        updateCheckedValues();
    });

    function updateCheckedValues() {
        checkedValues = []; // Clear checkedValues array

        // Update checkedValues array
        $(".childCheckbox:checked").each(function() {
            checkedValues.push($(this).val());
        });
    }
});

$("#delete_lpleads_data_button").click(function() {
    Swal.fire({
        title: "Are you sure?",
        text: "Confirm to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete method

            var checkboxes = document.querySelectorAll(
                'input[name="active_checkbox[]"]'
            );

            var checkedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                var checkbox = checkboxes[i];
                if (checkbox.checked) {
                    checkedValues.push(checkbox.value);
                }
            }

            // Log the array of checked values
            // console.log(checkedValues);
            // return;

            $.ajax({
                url: base_url + "lpleads_attime_deleteAll",
                type: "post",
                dataType: "json",
                data: { id: checkedValues },
                success: function(response) {
                    // console.log(response.status);
                    // return;

                    if (response.result != 0) {
                        Swal.fire({
                            title: "Successfully",
                            text: "Delete data",
                            icon: response.type,
                            timer: 3000,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // 2000 milliseconds = 2 seconds

                        // let element = row_data;

                        // // Example of removing the row from the table:
                        // element.closest('tr').remove();
                        // // Reassign serial numbers after deletion
                        // const rows = document.querySelectorAll('#recipeslist tbody tr');
                        // rows.forEach((row, index) => {
                        //     row.querySelector('.sr-no').innerText = index + 1;
                        // });
                    } else {
                        console.log(response);
                        console.log("error response");
                    }
                },
                error: function() {
                    console.log("error");
                },
            });
        }
    });
});