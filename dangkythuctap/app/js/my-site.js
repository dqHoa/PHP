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
    $('#cartTable').DataTable();
});

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
$(document).on('click', '.edit-category', function () {
    var categoryId = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '?route=edit-category',
        data: { id: categoryId },

        success: function (response) {

            console.log(response);
            $("#editCategoryModal-" + categoryId).modal("show");

        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$(document).on('click', '.update-phieu', function () {
    var maSoPhieu = $(this).data('id');
    var data = $('#editForm-' + maSoPhieu).serialize();
    debugger
    $.ajax({
        type: 'POST',
        url: '?route=update-ajax',
        data: data,
        success: function (response) {
            var data = JSON.parse(response);
            debugger
            if (data.success) {
                ;
                $("#exampleModal-" + maSoPhieu).modal("hide");
                $('#phieu-container div#' + maSoPhieu).load('#phieu-container div#' + maSoPhieu);
            } else {
                alert(" không thành công!");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$(document).ready(function () {
    $('#productTable').DataTable();
});


// Create Product Modal
function addProduct() {
    var formData = $("#addProductForm").serialize();
    $.ajax({
        type: "POST",
        url: "?route=create-product",
        data: formData,
        success: function (response) {
            console.log(response);
            $("#addProductModal").modal("hide");
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
}


// Delete Product Modal
$(document).on('click', '.delete-product-btn', function () {
    var productId = $(this).data('id');
    $.ajax({
        url: '?route=delete-product',
        method: 'POST',
        data: { ProductId: productId },
        success: function (response) {
            console.log(response);
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
});

