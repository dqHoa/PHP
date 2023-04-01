$(document).on('click', '.delete-phieu', function () {
    var maSoPhieu = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '?route=delete-ajax',
        data: { id: maSoPhieu },
        success: function (response) {
            var data = JSON.parse(response);
            if (data.success) {
                $('#phieu-container div#' + maSoPhieu).remove();
            } else {
                alert("Xoá không thành công!");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

function showPopup() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("popup-content").innerHTML = this.responseText;
            document.getElementById("popup").style.display = "block";
        }
    };
    xmlhttp.open("GET", "popup.php", true);
    xmlhttp.send();
}

function hidePopup() {
    document.getElementById("popup").style.display = "none";
}

$(document).ready(function () {
    $('#categoryTable').DataTable();
});


// Create Category Modal
function addCategory() {
    var formData = $("#addCategoryForm").serialize();
    $.ajax({
        type: "POST",
        url: "?route=create-category",
        data: formData,
        success: function (response) {
            console.log(response);
            $("#addCategoryModal").modal("hide");
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

// Delete Category Modal
$(document).on('click', '.delete-category-btn', function () {
    var categoryId = $(this).data('id');
    $.ajax({
        url: '?route=delete-category',
        method: 'POST',
        data: { CategoryId: categoryId },
        success: function (response) {
            console.log(response);
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
});

// Edit Category Modal
$(document).ready(function(){
    $('#editCategoryForm').submit(function(event) {
      // prevent default form submission action
      event.preventDefault();
  
      var categoryId = $(this).data('id');
      // get form data
      var formData = $(this).serialize();
  
      // send ajax request to update data
      $.ajax({
        type: 'POST',
        url: '?route=update-category',
        data: formData,
        success: function(response) {
          // handle successful response
          console.log(response);
          $('#editCategoryModal-' + categoryId).load('#editCategoryModal-' + categoryId);
        //   location.reload();
        },
        error: function(error) {
          // handle error response
          console.log(error);
        }
      });
    });
  });
  

