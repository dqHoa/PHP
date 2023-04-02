<?php
include_once('../app/views/shares/header.php');
?>

<?php if (isset($results)): ?>
    <h2>Search results:</h2>
    <?php if (empty($results)): ?>
        <p>No results found.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($results as $result): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" style="width: 255px;" src="../app/images/<?= $result['ProductImage'] ?>"
                            alt="<?= $produresultct['ProductName'] ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $result['ProductName'] ?>
                            </h5>
                            <p class="card-text">
                                <?= $result['ProductPrice'] ?><sup>đ</sup> <span class="discount-price">
                                    <?= $result['ProductDiscount'] ?><sup>đ</sup>
                                </span>
                            </p>
                            <a href="#" class="btn btn-primary view-item" data-product-id="<?= $result['ProductId'] ?>">View
                                Item</a>
                            <a href="?route=add-cart&productid=<?= $result['ProductId'] ?>" class="btn btn-danger">Add To Cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        </div>
    <?php endif ?>
<?php endif ?>



<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
    aria-hidden="true">
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