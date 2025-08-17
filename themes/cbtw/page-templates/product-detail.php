<?php
/** Template Name: CBTW Product Detail  */
get_header();

$product_id = isset($_GET['product_id']) ? sanitize_text_field($_GET['product_id']) : '';
$product_detail = MyTheme\Product\ProductApi::getProductDetail($product_id);


?>


    <div id="page-detail" class="single-product">

        <div class="container">
            <div class="page-wrapper bg-white border-radius">

                <p class="product-category color-main font-bold">
                    <?php _e('Category', 'cbtw'); ?>: <?php echo $product_detail['category']; ?>
                </p>

                <div class="wrapper-product-info d-flex flex-wrap">
                    <div class="side-left">
                        <?php if(!empty($product_detail['thumbnail'])): ?>
                            <div class="thumbnail">
                                <img src="<?php echo $product_detail['thumbnail']; ?>" alt="<?php echo $product_detail['title']; ?>">
                            </div>
                        <?php endif; ?>

                        <div class="product-gallery">
                            <?php if(!empty($product_detail['images'])): ?>
                                <ul class="list d-flex flex-wrap">
                                    <?php foreach($product_detail['images'] as $image): ?>
                                        <li class="item-product-gallery">
                                            <img src="<?php echo $image; ?>" alt="">
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="side-right">
                        <h1 class="product-title h1"><?php echo $product_detail['title']; ?></h1>
                        <p class="product-price color-main">
                            <span class="h2 font-bold">
                                <?php echo '$' . $product_detail['price']; ?>
                            </span>
                            <span class="price-discount">
                                <?php 
                                    echo sprintf( 
                                        __( '%s&percnt; Off', 'cbtw' ), 
                                        $product_detail['discountPercentage']
                                    );
                                ?>
                            </span>
                        </p>
                        <div class="product-description">
                            <?php echo $product_detail['description']; ?>
                        </div>
                    </div>
                </div>

                <?php 
                $related_products = MyTheme\Product\ProductApi::getRelatedProducts($product_detail['category']);
                get_template_part('components/product-detail/related-products', null, [
                    'category' => $product_detail['category'],
                    'related_products' => $related_products,
                ]); 
                
                ?>

            </div>
           
        </div>
    

       
    </div>

<?php

get_footer();
