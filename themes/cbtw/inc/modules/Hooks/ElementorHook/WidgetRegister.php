<?php

namespace MyTheme\Hooks\ElementorHook;

class WidgetRegister{


    public function init(){
        add_action('elementor/widgets/register', [$this, 'registerWidgets']);
        add_action('wp_enqueue_scripts', [$this, 'addElementorWidgetScriptsAndStyles']);
        add_action( 'elementor/elements/categories_registered', [$this, 'addElementorWidgetCategories'] );
    }

    public function addElementorWidgetCategories($elementor_manager){
        $elementor_manager->add_category(
            'cbtw-widgets',
            [
                'title' => 'CBTW Widgets',
                'icon' => 'fa fa-plug',
            ]
        );
    }

    public function registerWidgets($widgets_manager){
        $custom_widgets = get_custom_elementor_widgets();
        foreach ($custom_widgets as $info) {
            require_once THEME_PATH . $info['root_file'];
            
            $class_name = $info['class_name'];
            $widgets_manager->register(new $class_name());
        }
    }

    public function addElementorWidgetScriptsAndStyles(){
        $ubq_widgets = get_custom_elementor_widgets();

        foreach ($ubq_widgets as $info) {
            if (!empty($info['register_styles'])) {
                foreach ($info['register_styles'] as $css_id => $url) {
                    wp_register_style($css_id, $url, array(), THEME_VERSION);
                }
            }
            if (!empty($info['register_scripts'])) {
                foreach ($info['register_scripts'] as $js_id => $url) {
                    wp_register_script($js_id, $url, array(), THEME_VERSION, true);
                }
            }
        }
    }

}