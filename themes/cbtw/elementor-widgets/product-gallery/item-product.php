<?php 

$product_item = $args['product_item'];
$permalink = $args['permalink'];

?>
<div class="item-product border-radius bg-gray">
   <div class="image border-radius">
    <img src="<?php echo $product_item['thumbnail'] ?>" alt="<?php echo $product_item['title']; ?>">
   </div>
   <h4 class="title"><?php echo $product_item['title']; ?></h4>
   <div class="short-desc">
    <?php echo $product_item['description']; ?>
   </div>

   <div class="wrapper-price d-flex justify-between">
      <span class="price color-main font-bold h3">$<?php echo $product_item['price']?></span>
      <span class="price-discount">
         <?php 
         echo sprintf( 
            __( '%s&percnt; Off', 'cbtw' ), 
            $product_item['discountPercentage']
         );
         ?>
      </span>
   </div>

   <a href="<?php echo $permalink; ?>" class="btn view-product"><?php _e( 'View product', 'cbtw' ); ?></a>

</div>