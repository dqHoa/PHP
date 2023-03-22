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
