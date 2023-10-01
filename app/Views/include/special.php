<?= $this->include('include/top') ?>
<?= $this->include('include/nav') ?>
<!-- collection -->
<section id="collection" class="py-5">
    <div class="container">
        <div class="title text-center">
            <h2 class="position-relative d-inline-block">Special</h2>
        </div>

        <div class="row g-0">
            <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                <div class="btn-group" role="group" aria-label="Filter Buttons">
                    <button type="button" class="btn m-4 text-dark active-filter-btn" data-filter="*">All</button>
                    <ul class="list-unstyled mt-3 d-flex justify-content-center">
                        <?php foreach ($categories as $category) : ?>
                            <li class="mx-2">
                                <a href="/categories/<?= $category['category_id'] ?>" class="btn m-2 text-dark" data-filter=".<?= $category['category_name'] ?>">
                                    <?= $category['category_name'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>

            <div class="collection-list mt-4 row gx-0 gy-3">
                <?php foreach ($products as $prod) : ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
                        <a href="#" class="collection-link text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#productModal" data-product-info='
                        <?= htmlentities(json_encode([
                            'id' => $prod['product_id'],
                            'name' => $prod['name'],
                            'price' => $prod['price'],
                            'image' => $prod['image'],
                            'description' => $prod['description'],
                            'category' => $category['category_name'],
                            'quantity' => $prod['quantity']
                        ])) ?>'>
                            <div class="collection-img position-relative">
                                <img src="<?= $prod['image'] ?>" class="w-100" id="modalProductImage<?= $prod['product_id'] ?>">
                                <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                            </div>
                            <div class="text-center">
                                <div class="rating mt-3">
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                    <span class="text-primary"><i class="fas fa-star"></i></span>
                                </div>
                                <p class="text-capitalize my-1">
                                    <?= $prod['name'] ?>
                                </p>
                                <span class="fw-bold">
                                    ₱
                                    <?= $prod['price'] ?>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</section>
<!-- end of collection -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="productModalLabel">Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="collection-img position-relative">
                    <img src="" class="w-100 mx-auto d-block" id="modalProductImage" style="max-width: 300px;">
                </div>
                <div class="text-justify">
                    <p class="text-capitalize my-1 mb-2" id="modalProductName"></p>
                    <p class="text-capitalize my-1 mb-2" id="modalProductCat"></p>
                    <p class="my-1 mb-2" id="modalProductDesc"></p>
                    <span class="fw-bold mb-2" id="modalProductPrice"></span>
                    <p class="my-1 mb-2" id="modalProductQuan"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('productModal'));

        document.querySelectorAll('.collection-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var productInfo = JSON.parse(this.getAttribute('data-product-info'));
                var modalTitle = document.querySelector('#productModal .modal-title');
                var modalImage = document.querySelector('#modalProductImage');
                var modalProductName = document.querySelector('#modalProductName');
                var modalProductCat = document.querySelector('#modalProductCat');
                var modalProductDesc = document.querySelector('#modalProductDesc');
                var modalProductPrice = document.querySelector('#modalProductPrice');
                var modalProductQuan = document.querySelector('#modalProductQuan');

                modalImage.src = productInfo.image;
                modalProductName.innerHTML = '<strong>Product Name:</strong> ' + productInfo.name;
                modalProductCat.innerHTML = '<strong>Category:</strong> ' + productInfo.category;
                modalProductDesc.innerHTML = '<strong>Description:</strong><br>' + productInfo.description;
                modalProductPrice.innerHTML = '<strong>Price:</strong> ' + '₱' + productInfo.price;
                modalProductQuan.innerHTML = '<strong>Quantity:</strong> ' + productInfo.quantity;


                myModal.show();
            });
        });
    });
</script>
<?= $this->include('include/end') ?>