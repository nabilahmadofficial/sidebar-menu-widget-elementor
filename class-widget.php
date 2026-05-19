<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Hamburger_Sidebar_Widget extends \Elementor\Widget_Base {

    public function get_name()       { return 'hamburger_sidebar'; }
    public function get_title()      { return esc_html__( 'Hamburger Sidebar', 'hamburger-sidebar' ); }
    public function get_icon()       { return 'eicon-menu-bar'; }
    public function get_categories() { return [ 'general' ]; }
    public function get_keywords()   { return [ 'hamburger', 'sidebar', 'menu', 'navigation', 'drawer' ]; }

    protected function register_controls() {

        $this->start_controls_section( 'section_content', [
            'label' => esc_html__( 'Content', 'hamburger-sidebar' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'logo', [
            'label'       => esc_html__( 'Logo', 'hamburger-sidebar' ),
            'type'        => \Elementor\Controls_Manager::MEDIA,
            'media_types' => [ 'image' ],
        ] );

        $this->add_control( 'menu', [
            'label'   => esc_html__( 'Select Menu', 'hamburger-sidebar' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => $this->get_wp_menus(),
            'default' => '',
        ] );

        $this->add_control( 'sidebar_template_id', [
            'label'       => esc_html__( 'Additional Template', 'hamburger-sidebar' ),
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'options'     => $this->get_elementor_templates(),
            'default'     => '',
            'label_block' => true,
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'section_logo_style', [
            'label' => esc_html__( 'Logo Style', 'hamburger-sidebar' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_responsive_control( 'logo_width', [
            'label'      => esc_html__( 'Logo Width', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range'      => [ 'px' => [ 'min' => 50, 'max' => 300 ] ],
            'selectors'  => [ '.mobile-logo img' => 'width: {{SIZE}}{{UNIT}};' ],
        ] );

        $this->add_responsive_control( 'logo_margin', [
            'label'     => esc_html__( 'Logo Margin', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [ '.mobile-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'section_hamburger_style', [
            'label' => esc_html__( 'Hamburger Button', 'hamburger-sidebar' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'hamburger_bg', [
            'label'     => esc_html__( 'Background', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#1E407C',
            'selectors' => [ '{{WRAPPER}} .custom-menu-toggle' => 'background-color: {{VALUE}};' ],
        ] );

        $this->add_control( 'hamburger_line_color', [
            'label'     => esc_html__( 'Line Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [ '{{WRAPPER}} .custom-menu-toggle span, {{WRAPPER}} .custom-menu-toggle span::before, {{WRAPPER}} .custom-menu-toggle span::after' => 'background: {{VALUE}};' ],
        ] );

        $this->add_responsive_control( 'hamburger_size', [
            'label'      => esc_html__( 'Size', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 40, 'max' => 120 ] ],
            'default'    => [ 'size' => 60 ],
            'selectors'  => [ '{{WRAPPER}} .custom-menu-toggle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'section_menu_style', [
            'label' => esc_html__( 'Main Menu & Caret', 'hamburger-sidebar' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'menu_layout', [
            'label'   => esc_html__( 'Layout', 'hamburger-sidebar' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [ 'vertical' => 'Vertical', 'horizontal' => 'Horizontal' ],
            'default' => 'vertical',
        ] );

        $this->add_responsive_control( 'menu_margin', [
            'label'      => esc_html__( 'Menu Margin', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );

        $this->add_responsive_control( 'menu_gap', [
            'label'      => esc_html__( 'Gap Between Items', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu > li' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
        ] );

        $this->add_responsive_control( 'menu_item_padding', [
            'label'      => esc_html__( 'Item Padding', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name'     => 'menu_typography',
            'selector' => '{{WRAPPER}} .hsw-nav-menu a',
        ] );

        $this->add_control( 'menu_color', [
            'label'     => esc_html__( 'Text Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu a' => 'color: {{VALUE}};' ],
        ] );

        $this->add_control( 'menu_hover_color', [
            'label'     => esc_html__( 'Hover Text', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu a:hover' => 'color: {{VALUE}};' ],
        ] );

        $this->add_control( 'border_between', [
            'label'     => esc_html__( 'Border Between Items', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu > li:not(:last-child)' => 'border-bottom: 1px solid {{VALUE}};' ],
        ] );

        $this->add_control( 'hover_border_color', [
            'label'     => esc_html__( 'Hover Animated Border Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu > li > a::after' => 'background: {{VALUE}};' ],
        ] );

        $this->add_control( 'show_caret', [
            'label'   => esc_html__( 'Show Caret', 'hamburger-sidebar' ),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes',
        ] );

        $this->add_control( 'caret_open', [
            'label'     => esc_html__( 'Open Icon', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::ICONS,
            'default'   => [ 'value' => 'fas fa-chevron-down', 'library' => 'fa-solid' ],
            'condition' => [ 'show_caret' => 'yes' ],
        ] );

        $this->add_control( 'caret_close', [
            'label'     => esc_html__( 'Close Icon', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::ICONS,
            'default'   => [ 'value' => 'fas fa-chevron-up', 'library' => 'fa-solid' ],
            'condition' => [ 'show_caret' => 'yes' ],
        ] );

        $this->add_responsive_control( 'caret_size', [
            'label'      => esc_html__( 'Caret Size', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 10, 'max' => 30 ] ],
            'default'    => [ 'size' => 18 ],
            'condition'  => [ 'show_caret' => 'yes' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu .menu-item-has-children > a .caret' => 'font-size: {{SIZE}}{{UNIT}};' ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'section_submenu_style', [
            'label' => esc_html__( 'Sub Menu', 'hamburger-sidebar' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_responsive_control( 'submenu_indent', [
            'label'      => esc_html__( 'Indent (padding-left)', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu' => 'padding-left: {{SIZE}}{{UNIT}};' ],
        ] );

        $this->add_responsive_control( 'submenu_gap', [
            'label'      => esc_html__( 'Gap Between Items', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu > li' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
        ] );

        $this->add_responsive_control( 'submenu_item_padding', [
            'label'      => esc_html__( 'Item Padding', 'hamburger-sidebar' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em' ],
            'selectors'  => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name'     => 'submenu_typography',
            'label'    => esc_html__( 'Typography', 'hamburger-sidebar' ),
            'selector' => '{{WRAPPER}} .hsw-nav-menu .sub-menu a',
        ] );

        $this->add_control( 'submenu_color', [
            'label'     => esc_html__( 'Text Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu a' => 'color: {{VALUE}};' ],
        ] );

        $this->add_control( 'submenu_hover_color', [
            'label'     => esc_html__( 'Hover Text Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu a:hover' => 'color: {{VALUE}};' ],
        ] );

        $this->add_control( 'submenu_border_between', [
            'label'     => esc_html__( 'Border Between Items', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu > li:not(:last-child)' => 'border-bottom: 1px solid {{VALUE}};' ],
        ] );

        $this->add_control( 'submenu_hover_border_color', [
            'label'     => esc_html__( 'Hover Animated Border Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu > li > a::after' => 'background: {{VALUE}};' ],
        ] );

        $this->add_control( 'submenu_bg', [
            'label'     => esc_html__( 'Background Color', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .hsw-nav-menu .sub-menu' => 'background: {{VALUE}};' ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'section_sidebar_style', [
            'label' => esc_html__( 'Sidebar Panel', 'hamburger-sidebar' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'sidebar_bg', [
            'label'     => esc_html__( 'Background', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [ '.mobile-sidebar' => 'background: {{VALUE}};' ],
        ] );

        $this->add_responsive_control( 'sidebar_padding', [
            'label'     => esc_html__( 'Sidebar Padding', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [ '.mobile-sidebar .mobile-sidebar-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );

        $this->add_responsive_control( 'sidebar_zindex', [
            'label'     => esc_html__( 'Sidebar Z-Index', 'hamburger-sidebar' ),
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'default'   => 9999,
            'selectors' => [ '.mobile-sidebar' => 'z-index: {{VALUE}};' ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $is_editor = \Elementor\Plugin::$instance->editor->is_edit_mode();

        $logo_url  = ! empty( $settings['logo']['url'] ) ? $settings['logo']['url'] : '';
        $logo_html = $logo_url
            ? '<img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">'
            : '<span>' . esc_html( get_bloginfo( 'name' ) ) . '</span>';

        $show_caret  = ! empty( $settings['show_caret'] ) && 'yes' === $settings['show_caret'];
        $caret_open  = '';
        $caret_close = '';

        if ( $show_caret ) {
            ob_start();
            \Elementor\Icons_Manager::render_icon( $settings['caret_open'],  [ 'class' => 'caret caret-open',  'aria-hidden' => 'true' ] );
            $caret_open  = ob_get_clean();

            ob_start();
            \Elementor\Icons_Manager::render_icon( $settings['caret_close'], [ 'class' => 'caret caret-close', 'aria-hidden' => 'true' ] );
            $caret_close = ob_get_clean();
        }
        ?>

        <div class="custom-menu-toggle" role="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="hsw-sidebar" tabindex="0">
            <span class="hamburger-lines"></span>
        </div>

        <?php if ( $is_editor ) : ?>
            <div style="padding:20px; background:#f0f4ff; border:1px dashed #a0aec0; border-radius:6px; color:#334155; margin-top:15px;">
                <strong>Hamburger Sidebar Widget</strong><br>
                <small>Preview works on front end only.</small>
            </div>
        <?php else : ?>

            <div class="sidebar-overlay" aria-hidden="true"></div>

            <div id="hsw-sidebar" class="mobile-sidebar" role="dialog" aria-modal="true">
                <div class="background-glass"></div>

                <div class="mobile-header">
                    <div class="mobile-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php echo $logo_html; ?>
                        </a>
                    </div>
                    <div class="mobile-close" role="button" aria-label="Close menu" tabindex="0">
                        <span></span>
                    </div>
                </div>

                <div class="mobile-sidebar-inner">
                    <?php
                    if ( ! empty( $settings['menu'] ) ) {
                        $caret_html = $show_caret ? $caret_open . $caret_close : '';

                        wp_nav_menu([
                            'menu'        => $settings['menu'],
                            'menu_class'  => 'hsw-nav-menu ' . sanitize_html_class( $settings['menu_layout'] ),
                            'container'   => false,
                            'fallback_cb' => false,
                            'walker'      => new Hsw_Caret_Walker( $caret_html ),
                        ]);
                    }

                    if ( ! empty( $settings['sidebar_template_id'] ) ) {
                        $template_id = absint( $settings['sidebar_template_id'] );
                        echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $template_id, true );
                    }
                    ?>
                </div>
            </div>

        <?php endif;
    }

    private function get_wp_menus() {
        $menus   = wp_get_nav_menus();
        $options = [ '' => '— Select Menu —' ];
        foreach ( $menus as $menu ) {
            $options[ $menu->term_id ] = $menu->name;
        }
        return $options;
    }

    private function get_elementor_templates(): array {
        $options = [ '' => '— Select Template —' ];
        $posts   = get_posts([
            'post_type'      => 'elementor_library',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ]);
        foreach ( $posts as $post ) {
            $type            = get_post_meta( $post->ID, '_elementor_template_type', true );
            $prefix          = $type ? ucfirst( $type ) . ' · ' : '';
            $options[ $post->ID ] = $prefix . $post->post_title;
        }
        return $options;
    }
}

if ( ! class_exists( 'Hsw_Caret_Walker' ) ) {
    class Hsw_Caret_Walker extends \Walker_Nav_Menu {

        private string $caret_html;

        public function __construct( string $caret_html = '' ) {
            $this->caret_html = $caret_html;
        }

        public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $tmp = '';
            parent::start_el( $tmp, $item, $depth, $args, $id );

            if ( $this->caret_html && in_array( 'menu-item-has-children', $item->classes, true ) ) {
                $tmp = str_replace( '</a>', $this->caret_html . '</a>', $tmp );
            }

            $output .= $tmp;
        }
    }
}
