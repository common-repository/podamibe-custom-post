<?php
/**
 * This section includes:
 * This function creates default post type 'CPT' at first and creates other post types as inserted by user . 
 * This function creates the custom post type
 */


/**
 * function init_custom_post_types()
 * This function creates custom post type 'CPT' by default at the first time.
 */

function init_custom_post_types() {
     $labels = array(
        'name' => esc_html__('Custom Post', PNCP_TEXT_DOMAIN),
        'singular_name' => esc_html__('Custom Post', PNCP_TEXT_DOMAIN),
        'add_new' => esc_html__('Add New Custom Post',PNCP_TEXT_DOMAIN),
        'add_new_item' => esc_html__('Add New Post type',PNCP_TEXT_DOMAIN),
        'edit_item' => esc_html__('Edit Custom Post',PNCP_TEXT_DOMAIN),
        'new_item' => esc_html__('New Custom Post',PNCP_TEXT_DOMAIN),
        'all_items' => esc_html__('All Custom Post',PNCP_TEXT_DOMAIN),
        'view_item' => esc_html__('View Custom Post',PNCP_TEXT_DOMAIN),
        'search_items' => esc_html__('Search Custom Post',PNCP_TEXT_DOMAIN),
        'not_found' => esc_html__('No Custom Post found',PNCP_TEXT_DOMAIN),
        'not_found_in_trash' => esc_html__('No Custom Post found in Trash',PNCP_TEXT_DOMAIN),
        'parent_item_colon' => '',
        'menu_name' => esc_html__('Custom Post',PNCP_TEXT_DOMAIN)
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon'   => 'dashicons-sticky',
        'supports' => array('title')
    );

    register_post_type('CPT', $args);

    /**
     * This section includes loop , which is useful to create multiple custom post type.
     * This section includes fields which are essential to build custom post type.
     */

    $the_query = new WP_Query(array('post_type' => array('CPT')));
    while ($the_query->have_posts()) : $the_query->the_post();
        global $post;
        //*************************get the values
        $pcpt_public = esc_html(get_post_meta($post->ID, 'pcpt_public', true));
        $pcpt_public = ($pcpt_public == "on");

        $pcpt_publicly_queryable = esc_html(get_post_meta($post->ID, 'pcpt_publicly_queryable', true));
        $pcpt_publicly_queryable = ($pcpt_publicly_queryable == "on");

        $pcpt_show_in_menu = esc_html(get_post_meta($post->ID, 'pcpt_show_in_menu', true)); //
        $pcpt_show_in_menu = ($pcpt_show_in_menu == "on");
                
        $pcpt_query_var = esc_html(get_post_meta($post->ID, 'pcpt_query_var', true)); //
        $pcpt_query_var = ($pcpt_query_var == "on");
                
        $pcpt_rewrite = esc_html(get_post_meta($post->ID, 'pcpt_rewrite', true)); //
        $pcpt_rewrite = ($pcpt_rewrite == "on");
                
        $pcpt_has_archive = esc_html(get_post_meta($post->ID, 'pcpt_has_archive', true)); //
        $pcpt_has_archive = ($pcpt_has_archive == "on");
                
        $pcpt_hierarchical = esc_html(get_post_meta($post->ID, 'pcpt_hierarchical', true));
        $pcpt_hierarchical = ($pcpt_hierarchical == "on");
        
        $pcpt_capability_type = esc_html(get_post_meta($post->ID, 'pcpt_capability_type', true));
        $pcpt_menu_position = esc_html(get_post_meta($post->ID, 'pcpt_menu_position', true));

        $pcpt_s_title = esc_html(get_post_meta($post->ID, 'pcpt_s_title', true));
        if ($pcpt_s_title == "on") {
            $pcpt_s[] = 'title';
        }
        $pcpt_s_editor = esc_html(get_post_meta($post->ID, 'pcpt_s_editor', true));
        if ($pcpt_s_editor == "on") {
            $pcpt_s[] = 'editor';
        }
        $pcpt_s_author = esc_html(get_post_meta($post->ID, 'pcpt_s_author', true));
        if ($pcpt_s_author == "on") {
            $pcpt_s[] = 'author';
        }
        $pcpt_s_thumbnail = esc_html(get_post_meta($post->ID, 'pcpt_s_thumbnail', true));
        if ($pcpt_s_thumbnail == "on") {
            $pcpt_s[] = 'thumbnail';
        }
        $pcpt_s_excerpt = esc_html(get_post_meta($post->ID, 'pcpt_s_excerpt', true));
        if ($pcpt_s_excerpt == "on") {
            array_push($pcpt_s, 'excerpt');
        }
        $pcpt_s_comments = esc_html(get_post_meta($post->ID, 'pcpt_s_comments', true));
        if ($pcpt_s_comments == "on") {
            array_push($pcpt_s, 'comments');
        }
        $pcpt_singular_name = esc_html(get_post_meta($post->ID, 'pcpt_singular_name', true));
        $pcpt_slug = esc_html(get_post_meta($post->ID, 'pcpt_slug', true));        
        $pcpt_add_new = esc_html(get_post_meta($post->ID, 'pcpt_add_new', true));
        $pcpt_add_new_item = esc_html(get_post_meta($post->ID, 'pcpt_add_new_item', true));
        $pcpt_edit_item = esc_html(get_post_meta($post->ID, 'pcpt_edit_item', true));
        $pcpt_new_item = esc_html(get_post_meta($post->ID, 'pcpt_new_item', true));
        $pcpt_all_items = esc_html(get_post_meta($post->ID, 'pcpt_all_items', true));
        $pcpt_view_item = esc_html(get_post_meta($post->ID, 'pcpt_view_item', true));
        $pcpt_search_items = esc_html(get_post_meta($post->ID, 'pcpt_search_items', true));
        $pcpt_not_found = esc_html(get_post_meta($post->ID, 'pcpt_not_found', true));
        $pcpt_not_found_in_trash = esc_html(get_post_meta($post->ID, 'pcpt_not_found_in_trash', true));
        $pcpt_parent_item_colon = esc_html(get_post_meta($post->ID, 'pcpt_parent_item_colon', true));

        /**
         * 
         * This section creates multiple custom post type as they want with selected parameters. 
         */

        $labels = array(
            'name'                => esc_html__(get_the_title($post->ID), PNCP_TEXT_DOMAIN),
            'singular_name'       => esc_html__($pcpt_singular_name, PNCP_TEXT_DOMAIN),
            'add_new'             => esc_html__($pcpt_add_new, get_the_title($post->ID)),
            'add_new_item'        => esc_html__($pcpt_add_new_item),
            'edit_item'           => esc_html__($pcpt_edit_item),
            'new_item'            => esc_html__($pcpt_new_item),
            'all_items'           => esc_html__($pcpt_all_items),
            'view_item'           => esc_html__($pcpt_view_item),
            'search_items'        => esc_html__($pcpt_search_items),
            'not_found'           => esc_html__($pcpt_not_found),
            'not_found_in_trash'  => esc_html__($pcpt_not_found_in_trash),
            'parent_item_colon'   => esc_html__($pcpt_parent_item_colon),
            'menu_name'           => esc_html__(get_the_title($post->ID))
        );
        $args = array(
            'labels' => $labels,
            'public' => $pcpt_public,
            'publicly_queryable' => $pcpt_publicly_queryable,
            'show_ui' => true,
            'show_in_menu' => $pcpt_show_in_menu,
            'query_var' => $pcpt_query_var,
            'rewrite' => array( 'slug' => $pcpt_slug ),
            'capability_type' => $pcpt_capability_type,
            'has_archive' => $pcpt_has_archive,
            'hierarchical' => $pcpt_hierarchical,
            'menu_position' => (int)$pcpt_menu_position,
            'supports' => $pcpt_s
        );
        register_post_type(get_the_title($post->ID), $args);

    endwhile;
}
