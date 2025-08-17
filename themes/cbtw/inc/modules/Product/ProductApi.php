<?php
namespace MyTheme\Product;

class ProductApi{

    const API_PRODUCTS_URL = 'https://dummyjson.com/products';
    const API_PRODUCTS_URL_BY_CATEGORY = 'https://dummyjson.com/products/category';

    const PRODUCTS_PER_PAGE = 9;

    public function __construct(){
        add_action('rest_api_init', [$this, 'register_routes']);
    }


    public static function makeRequest($url){

        try {
            $response = wp_remote_get($url);
            return json_decode($response['body'], true);
        } catch (\Exception $e) {
            return [];
        }
    }
    public static function getProducts(){

        $parameters = [
            'limit' => self::PRODUCTS_PER_PAGE,
            'sortBy' => 'price',
            'order' => 'asc',
        ];

        if(!empty($_GET['product_sort_by'])){
            $product_sort_by = sanitize_text_field($_GET['product_sort_by']);
            $product_sort_by = explode('_', $product_sort_by);

            if (count($product_sort_by) == 2){
                $parameters['sortBy'] = $product_sort_by[0];
                $parameters['order'] = $product_sort_by[1];
            }
           
        }

        $parameters = build_query($parameters);
       
        $response = self::makeRequest(self::API_PRODUCTS_URL . '?' . $parameters);

        return isset($response['products']) ? $response['products'] : [];

    }

    public static function getRelatedProducts($category){

        $response = self::makeRequest(self::API_PRODUCTS_URL_BY_CATEGORY . '/' . $category);
        return isset($response['products']) ? $response['products'] : [];
    }

    public static function getProductPermalink($product_id){
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-templates/product-detail.php'
        ));

        if(!empty($pages)){
            $permalink = get_permalink($pages[0]->ID);
            $permalink = add_query_arg('product_id', $product_id, $permalink);
            return $permalink;
        }
        return '';
    }

    public static function getProductDetail($product_id){
        return self::makeRequest(self::API_PRODUCTS_URL . '/' . $product_id);
    }

    

    
}