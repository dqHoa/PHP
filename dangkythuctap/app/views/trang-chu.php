<?php
include_once('../app/views/shares/header.php');
?>

<div class="row">
    <?php foreach ($productlist as $product): ?>
    <div class="col-md-3" style="margin-top: 20px">
        <div class="card">
            <img class="card-img-top" style="width: 255px; padding: 10px" src="../app/images/<?= $product['ProductImage'] ?>" alt="<?= $product['ProductName'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $product['ProductName'] ?></h5>
                <p class="card-text"><?= $product['ProductPrice'] ?><sup>đ</sup> <span class="discount-price"><?= $product['ProductDiscount'] ?><sup>đ</sup></span></p>
                <a href="#" class="btn btn-primary view-item" data-product-id="<?= $product['ProductId'] ?>">View Item</a>
                <a href="?route=add-cart&productid=<?= $product['ProductId'] ?>" class="btn btn-danger">Add To Cart</a>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="product-details"></div>
      </div>
    </div>
  </div>
</div>


    <?php
    include_once('../app/views/shares/footer.php');
    ?>