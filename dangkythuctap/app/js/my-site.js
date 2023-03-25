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
$(document).on('click', '.edit-phieu', function () {
  var maSoPhieu = $(this).data('id');
  $.ajax({
      type: 'POST',
      url: '?route=edit-ajax',
      data: { id: maSoPhieu },
      
      success: function (response) {                  
          var data = JSON.parse(response);
          if (data.success) {           
            $("#exampleModal-" + maSoPhieu).modal("show");
          } else {
              alert(" không thành công!");
          }
      },
      error: function (xhr) {
          console.log(xhr.responseText);
      }
  });
});
$(document).on('click', '.update-phieu', function () {
  var maSoPhieu = $(this).data('id');
  var data = $('#editForm-'+maSoPhieu).serialize();
  debugger
  $.ajax({
      type: 'POST',
      url: '?route=update-ajax',
      data: data,     
      success: function (response) {                  
          var data = JSON.parse(response);
          debugger
          if (data.success) {                      ;
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