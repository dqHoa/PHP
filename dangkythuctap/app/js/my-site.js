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
    xmlhttp.onreadystatechange = function() {
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