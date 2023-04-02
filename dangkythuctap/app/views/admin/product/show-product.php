<?php
include_once('../app/views/shares/admin-header.php');
?>

<div class="container mt-5">
    <h1>Product List</h1>
    <a href="?route=add-product" class="btn btn-primary">Thêm Sản Phẩm</a>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
        Add Product
    </button> -->
    <hr>
    <table id="productTable" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productlist as $product): ?>
                <tr>
                    <td>
                        <?= $product['ProductId'] ?>
                    </td>
                    <td>
                        <?= $product['ProductName'] ?>
                    </td>
                    <td>
                        <?= $product['ProductDes'] ?>
                    </td>
                    <td>
                        <?= $product['ProductSize'] ?>
                    </td>
                    <td>
                        <?= $product['ProductPrice'] ?>
                    </td>
                    <td>
                        <?= $product['ProductDiscount'] ?>
                    </td>
                    <td>
                        <?= $product['ProductNumber'] ?>
                    </td>
                    <td>
                    <img src='../app/images/<?= $product['ProductImage'] ?>' width='50' height='50'> 
                    </td>
                    <td>
                        <a href="?route=edit-product&productid=<?= $product['ProductId'] ?>" class="btn btn-primary">Edit</a>
                        <a href="?route=delete-product&productid=<?= $product['ProductId'] ?>" class="btn btn-danger">Delete</a>
                        <!-- <button class="btn btn-primary edit-Product" data-toggle="modal" data-target="#editProductModal"
                            data-id="<?= $product['ProductId']; ?>" data-name="<?= $product['ProductId']; ?>">Edit</button>

                        <button data-toggle="modal" data-target="#deleteProductModal"
                            class="btn btn-danger delete-product-btn"
                            data-id="<?= $product['ProductId']; ?>">Delete</button> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="form-group">
                        <label for="productname">Product Name</label>
                        <input type="text" class="form-control" id="productname" name="productname" required>
                    </div>
                    <div class="form-group">
                        <label for="productdes">Description</label>
                        <input type="text" class="form-control" id="productdes" name="productdes" required>
                    </div>
                    <div class="form-group">
                        <label for="productsize">Size</label>
                        <input type="text" class="form-control" id="productsize" name="productsize" required>
                    </div>
                    <div class="form-group">
                        <label for="productprice">Price</label>
                        <input type="text" class="form-control" id="productprice" name="productprice" required>
                    </div>
                    <div class="form-group">
                        <label for="productdiscount">Discount</label>
                        <input type="text" class="form-control" id="productdiscount" name="productdiscount" required>
                    </div>
                    <div class="form-group">
                        <label for="productnumber">Quantity</label>
                        <input type="text" class="form-control" id="productnumber" name="productnumber" required>
                    </div>
                    <div class="form-group">
                        <label for="productnumber">Image</label>
                        <select name="categoryid" class="form-control">
                        <?php foreach ($catagorylist as $category): ?>
                            <option value="<?= $category['CategoryId'] ?>"><?= $category['CategoryName'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addProduct()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal-<?= $product['ProductId'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="POST">
                    <input type="hidden" id="editProductId" name="ProductId" value="<?= $product['ProductId'] ?>">
                    <div class="form-group">
                        <label for="editProductName">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="ProductName"
                            value="<?= $product['ProductName'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary update-Product"
                        data-id="<?= $product['ProductId'] ?>">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Product Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Product?</p>
                <input type="hidden" id="deleteProductId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteProductBtn">Delete</button>
            </div>
        </div>
    </div>
</div>



<?php
include_once('../app/views/shares/admin-footer.php');
?>