<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="site-header" class="">
        <div class="container d-flex align-center justify-between">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>">
                    <?php echo bloginfo('name'); ?>
                </a>
            </div>

            <?php 
            wp_nav_menu(array(
                'theme_location' => 'header_menu',
                'container' => false,
                'menu_class' => 'list-menu',
                'menu_id' => 'header-menu',
            ));
            ?>
        </div>
    </header>
    <main id="page-body">

