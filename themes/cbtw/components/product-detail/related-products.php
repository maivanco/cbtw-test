<?php 

$related_products = $args['related_products'];
if (empty($related_products)) {
    return;
}
?>

<section class="sec-list-products related-products">

    <h3 class="h2 text-center"><?php _e('Related Products Title', 'cbtw'); ?></h3>

    <ul class="list-products d-flex flex-wrap">
        <?php foreach($related_products as $product){ ?>
            <li class="col">
                <?php load_elementor_component('product-gallery/item-product', [
                    'product_item' => $product,
                    'permalink' => MyTheme\Product\ProductApi::getProductPermalink($product['id'])
                ]); ?>
            </li>
        <?php } ?>
    </ul>
</section>