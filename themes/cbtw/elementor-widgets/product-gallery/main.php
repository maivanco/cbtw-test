<?php
class CBTW_Product_Gallery extends \Elementor\Widget_Base {
	
    public function get_name() {
        return 'cbtw_product_gallery';
    }

	public function get_title() {
        return esc_html__( 'CBTW Product Gallery', 'cbtw' );
    }

	public function get_icon() {}

	public function get_categories() {
        return [ 'cbtw-widgets' ];
    }

	public function get_keywords() {}

	public function get_custom_help_url() {}

	protected function get_upsale_data() {}

	public function get_script_depends() {
		$all_widgets = get_custom_elementor_widgets();
		$widget_name = $this->get_name();

		$script_ids = [];

		if (!empty($all_widgets[$widget_name]['register_scripts']) ) {
			$script_ids = array_keys($all_widgets[$widget_name]['register_scripts']);
		}

		return $script_ids;
	}

	public function get_style_depends() {

		$all_widgets = get_custom_elementor_widgets();
		$widget_name = $this->get_name();

		$style_ids = [];

		if (!empty($all_widgets[$widget_name]['register_styles']) ) {
			$style_ids = array_keys($all_widgets[$widget_name]['register_styles']);
		}

		return $style_ids;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Settings', 'cbtw' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'widget_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Widget title', 'cbtw' ),
				'placeholder' => esc_html__( 'Enter your widget title', 'cbtw' ),
			]
		);
        $this->add_control(
			'widget_description',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Widget description', 'cbtw' ),
				'placeholder' => esc_html__( 'Enter your description', 'cbtw' ),
			]
		);


		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$products = MyTheme\Product\ProductApi::getProducts();

		load_elementor_component('product-gallery/section-products', [
			'widget_title' => $settings['widget_title'],
			'widget_description' => $settings['widget_description'],
			'products' => $products,
			'order_by' => '',
			'order' => '',
		]);

	}

	protected function content_template() { // Live preview
		
	}

}