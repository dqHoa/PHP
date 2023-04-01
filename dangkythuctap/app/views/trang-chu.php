<?php
include_once('../app/views/shares/header.php');
?>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="product1.jpg" alt="Product 1">
            <div class="card-body">
                <h5 class="card-title">Product 1</h5>
                <p class="card-text">$10.99 <span class="discount-price">$8.99</span></p>
                <a href="#" class="btn btn-primary view-item" data-id="1">View Item</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="product2.jpg" alt="Product 2">
            <div class="card-body">
                <h5 class="card-title">Product 2</h5>
                <p class="card-text">$14.99 <span class="discount-price">$12.99</span></p>
                <a href="#" class="btn btn-primary view-item" data-id="2">View Item</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="product3.jpg" alt="Product 3">
            <div class="card-body">
                <h5 class="card-title">Product 3</h5>
                <p class="card-text">$19.99 <span class="discount-price">$16.99</span></p>
                <a href="#" class="btn btn-primary view-item" data-id="3">View Item</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="product4.jpg" alt="Product 4">
            <div class="card-body">
                <h5 class="card-title">Product 4</h5>
                <p class="card-text">$24.99 <span class="discount-price">$21.99</span></p>
                <a href="#" class="btn btn-primary view-item" data-id="4">View Item</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="item-modal" tabindex="-1" role="dialog" aria-labelledby="item-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="item-modal-label">Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="item-name"></h5>
                <p id="item-price"></p>
                <p id="item-discount"></p>
                <div class="form-group">
                    <label for="item-size">Size:</label>
                    <select class="form-control" id="item-size">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="item-quantity">Quantity:</label>
                    <input type="number" class="form-control" id="item-quantity" value="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-to-cart" data-id="">Add to Cart</button>
            </div>
        </div>
    </div>


    <?php
    include_once('../app/views/shares/footer.php');
    ?>