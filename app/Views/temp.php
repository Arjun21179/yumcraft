<script>
   

// <!--  article  Delete  -->
function article_delete(article_id, e) {

// alert("helo");
// return;

var base_url = document.getElementById("base_url").value;


Swal.fire({
    title: 'Are you sure?',
    text: 'Confirm to Delete Data',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'

}).then((result) => {

    if (result.isConfirmed) {
        // Make an AJAX request to delete method

        $.ajax({
            type: 'POST',
            url: base_url + "article_delete",
            dataType: 'json',
            data: { del_id: article_id },
            success: function(response) {
                // alert(response.re_id);
                // return;

                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    timer: 3000
                });

                // setTimeout(function() {
                //     location.reload();
                // }, 1500); // 2000 milliseconds = 2 seconds

                let element = e;

                // Example of removing the row from the table:
                element.closest('tr').remove();
                // Reassign serial numbers after deletion
                const rows = document.querySelectorAll('#article_list tbody tr');
                rows.forEach((row, index) => {
                    row.querySelector('.sr-no').innerText = index + 1;
                });

            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while deleting data.',
                    icon: 'error',
                });
            }
        });
    }
});
}


// <!-- END SWEET ALERT LOGIC -->



// ------Deactive article------------------------------------------------------------------>
// <!-- article section  active deactive  -->
function article_deactive(article_id, element) {

var base_url = document.getElementById("base_url").value;


Swal.fire({
    title: '<h2>Are you sure?</h2><h6> Are you sure! You want to Deactivate?</h6>',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'


}).then((result) => {

    if (result.isConfirmed) {
        // Make an AJAX request to delete method

        $.ajax({
            type: 'POST',
            url: base_url + "deactive_article",
            dataType: 'json',
            data: { article_id: article_id },
            success: function(response) {
                // alert(response.results);
                // return;

                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    timer: 3000
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
                var newOnclickValue = onclickValue.replace("article_deactive", "article_active");

                // Set the new onclick attribute value
                anchorElement.setAttribute("onclick", newOnclickValue);
                // Set the new onclick attribute value 


            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while Deactivate data.',
                    icon: 'error',
                });
            }
        });
    }
});
}


// ------active tag logic------------------------------------------------------------------>
// <!-- article section  active loigc for  -->
function article_active(article_id, element) {

var base_url = document.getElementById("base_url").value;


Swal.fire({
    title: '<h2>Are you sure?</h2><h6> Are you sure! You want to active?</h6>',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'


}).then((result) => {

    if (result.isConfirmed) {
        // Make an AJAX request to delete method

        $.ajax({
            type: 'POST',
            url: base_url + "active_article",
            dataType: 'json',
            data: { article_id: article_id },
            success: function(response) {
                // alert(response.results);
                // return;

                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    timer: 3000
                });

                // setTimeout(function() {
                //     location.reload();
                // }, 1500); // 2000 milliseconds = 2 seconds



                // -------------------------------------------------------------
                // this line for active deactive
                element.querySelector("i").className = "fas fa-toggle-on";;


                // -------------------------------------------------------------
                // this code for calling
                // Replace the function name from article_active to article_deactive
                var anchorElement = element;

                // Get the current onclick attribute value
                var onclickValue = anchorElement.getAttribute("onclick");

                // Replace the function name from article_active to article_deactive
                var newOnclickValue = onclickValue.replace("article_active", "article_deactive");

                // Set the new onclick attribute value
                anchorElement.setAttribute("onclick", newOnclickValue);
                // Set the new onclick attribute value


            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while active data.',
                    icon: 'error',
                });
            }
        });
    }
});
}




// --------At Time Deactivate article data -------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate article data-------------------------------------------------------------------------------------------------------->
// --------At Time Deactivate article data-------------------------------------------------------------------------------------------------------->

// -----Checkbox Deactivate Article-------------------------------------------------------------------------------------------------->
// deactivate using checkbox 

$(document).ready(function() {
// Set the number of records per page to 100
table.page.len(100).draw();

var checkedValues = [];

// Event delegation for master checkbox
$(document).on('click', '#article_master_checkbox', function() {
    var masterCheckbox = $(this);
    var childCheckboxes = $('.article_childcheckbox');

    checkedValues = [];

    childCheckboxes.prop('checked', masterCheckbox.prop('checked'));
    updateCheckedValues();

});

// Event delegation for child checkboxes
$(document).on('click', '.article_childcheckbox', function() {
    updateCheckedValues();
});


function updateCheckedValues() {
    checkedValues = []; // Clear checkedValues array

    $('.article_childcheckbox:checked').each(function() {
        checkedValues.push($this.val());
    });
}

});




// calling ajax delete data
// console.log('ready...');
$("#deactivate_article_data_button").click(function() {

if (confirm("Confirm To Delete Data")) {
    // console.log('delete btn click');

    var checkboxes = document.querySelectorAll('input[name="article_active_checkbox[]"]')

    var checkedValues = [];

    for (var i = 0; i < checkboxes.length; i++) {
        var checkbox = checkboxes[i];
        if (checkbox.checked) {
            checkedValues.push(checkbox.value);
        }
    }

    // console.log(checkedValues);

    $.ajax({
        url: base_url + "article_attime_deleteAll",
        type: 'post',
        dataType: 'json',
        data: { article_id: checkedValues },
        success: function(response) {
            // console.log(response.result);

            Swal.fire({
                title: 'Successfully',
                text: 'Delete data',
                icon: response.type,
                timer: 3000
            });

            setTimeout(function() {
                location.reload();
            }, 1000); // 2000 milliseconds = 2 seconds


        },
        error: function(response) {

        }

    });

}

});









</script>





<php 

// article deactivate or delete all
    public function article_attime_deleteAll()
    {
        $checklogin = $this->checklogin();
        if ($checklogin) {
            $article_id = $_POST['article_id'];
            $output = $this->Article_Model->article_attime_deleteall_data($article_id);

            $response = array(
                'article_id' => $article_id,
                'result' => $output,
            );


            return json_encode($response);
        }
    }

?>