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

$('.edit-phieu').click(function() {
    var maSoPhieu = $(this).data('id');
    $.ajax({
      url: '?route=edit-ajax',
      type: 'POST',
      data: { id: maSoPhieu },     
      success: function (response) {            
        var data = JSON.parse(response);
        if (data.success) {
          // Populate the popup form with the data returned from the server
          $('#hoTen').val(data.hoTen);
          $('#maSinhVien').val(data.maSinhVien);
          $('#chuyenNganh').val(data.chuyenNganh);
          $('#congTy').val(data.congTy);
  
          // Show the popup form
          $('#edit-modal').modal('show');
        } else {
          alert('Failed to retrieve data.');
        }
      },
      error: function(xhr, status, error) {
        alert('Failed to retrieve data: ' + error);
      }
    });
  });

  $(document).ready(function(){
    $('#updateForm').submit(function(event) {
      // prevent default form submission action
      event.preventDefault();
  
      var maSoPhieu = $(this).data('id');
      // get form data
      var formData = $(this).serialize();
  
      // send ajax request to update data
      $.ajax({
        type: 'POST',
        url: '?route=edit-ajax',
        data: formData,
        success: function(response) {
          // handle successful response
          console.log(response);
          $('#exampleModal-' + maSoPhieu).load('#exampleModal-' + maSoPhieu);
          location.reload();
        },
        error: function(error) {
          // handle error response
          console.log(error);
        }
      });
    });
  });
  
