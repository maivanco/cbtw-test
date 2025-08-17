<?php

$widget_title = $args['widget_title'];
$widget_description = $args['widget_description'];
$products = $args['products'];


$sort_by = isset($_GET['product_sort_by']) ? sanitize_text_field($_GET['product_sort_by']) : 'price_asc';
$sorting_options = [
    'price_asc' => __('Sort by Price Low/High', 'cbtw'),
    'price_desc' => __('Sort by Price High/Low', 'cbtw'),
];
?>

<section class="sec-list-products">
    <h3 class="widget-title h1 text-center"><?php echo $widget_title; ?></h3>
    <div class="widget-description text-center"><?php echo $widget_description; ?></div>

    <div class="sorting-products text-right">
        <select name="product_sort_by">
            <?php foreach($sorting_options as $key => $value){ ?>
                <option value="<?php echo $key; ?>" <?php selected($sort_by, $key); ?>><?php echo $value; ?></option>
            <?php } ?>
        </select>
    </div>

    <ul class="list-products d-flex flex-wrap">
        <?php if(empty($products)){ ?>
            <li class="no-products">
                <p><?php _e('No products found', 'cbtw'); ?></p>
            </li>
        <?php }else{ ?>
            <?php foreach($products as $product_item){ ?>
                <li class="col">
                    <?php load_elementor_component('product-gallery/item-product', [
                        'product_item' => $product_item,
                        'permalink' => MyTheme\Product\ProductApi::getProductPermalink($product_item['id'])
                    ]); ?>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</section>