<?php
    $heading_class = isset($args['heading_class']) ? $args['heading_class'] : 'h1';
    $title = isset($args['title']) ? $args['title'] : '';
    $description = isset($args['description']) ? $args['description'] : '';
    $button_text = isset($args['button_text']) ? $args['button_text'] : '';
    $button_url = isset($args['button_url']) ? $args['button_url'] : '';
    $banner_border_radius = isset($args['banner_border_radius']) ? (bool) $args['banner_border_radius'] : false;
    $banner_size = isset($args['banner_size']) ? $args['banner_size'] : '';

    $banner_class = [];
    if($banner_size == 'small'){
        $banner_class[] = 'small';
    }
    if($banner_border_radius){
        $banner_class[] = 'border-radius';
    }
?>

<section class="sec-banner bg-main-color color-white <?php echo implode(' ', $banner_class); ?>">
    <div class="container">
        <div class="banner-content text-center">
            <h3 class="title <?php echo $heading_class; ?>"><?php echo $title; ?></h3>
            <p class="description">
                <?php echo $description; ?>
            </p>
            <a href="<?php echo $button_url; ?>" class="btn btn-white rounded">
                <?php echo $button_text; ?>
            </a>
        </div>
    </div>
</section>