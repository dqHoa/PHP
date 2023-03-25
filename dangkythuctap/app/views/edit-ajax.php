<?php
include_once('../app/views/shares/header.php')
    ?>

<button class="btn btn-primary" onclick="showPopup()">Show Popup</button>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Popup Title</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="popup-content">
                <p>Popup content goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showPopup() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
                document.getElementById("popup-content").innerHTML = this.responseText;
            $('#myModal').modal('show');
        }
    };
    xmlhttp.open("GET", "popup.php", true);
    xmlhttp.send();       
</script>
<?php
include_once('../app/views/shares/footer.php')
    ?>