<?php
/**
 * function cpt_save_postdata()   
 * This function save the all post values submitted by user from the custom post form
 */

function cpt_save_postdata() {
    global $post;
    if (isset($_POST['cpt-hidd']) && $_POST['cpt-hidd'] == 'true') {
       
        if( wp_verify_nonce( $_POST["podamibe_nonce_field"], "podamibe_custom_post")) {

            $pcpt_public = esc_html(get_post_meta($post->ID, 'pcpt_public', true));
            $pcpt_publicly_queryable = esc_html(get_post_meta($post->ID, 'pcpt_publicly_queryable', true));
            $pcpt_show_ui = esc_html(get_post_meta($post->ID, 'pcpt_show_ui', true));
            $pcpt_show_in_menu = esc_html(get_post_meta($post->ID, 'pcpt_show_in_menu', true)); 
            $pcpt_query_var = esc_html(get_post_meta($post->ID, 'pcpt_query_var', true)); 
            $pcpt_rewrite = esc_html(get_post_meta($post->ID, 'pcpt_rewrite', true)); 
            $pcpt_has_archive = esc_html(get_post_meta($post->ID, 'pcpt_has_archive', true)); 
            $pcpt_hierarchical = esc_html(get_post_meta($post->ID, 'pcpt_hierarchical', true));
            $pcpt_capability_type = esc_html(get_post_meta($post->ID, 'pcpt_capability_type', true));
            $pcpt_menu_position = esc_html(get_post_meta($post->ID, 'pcpt_menu_position', true));
            $pcpt_s_title = esc_html(get_post_meta($post->ID, 'pcpt_s_title', true));
            $pcpt_s_editor = esc_html(get_post_meta($post->ID, 'pcpt_s_editor', true));
            $pcpt_s_author = esc_html(get_post_meta($post->ID, 'pcpt_s_author', true));
            $pcpt_s_thumbnail = esc_html(get_post_meta($post->ID, 'pcpt_s_thumbnail', true));
            $pcpt_s_excerpt = esc_html(get_post_meta($post->ID, 'pcpt_s_excerpt', true));
            $pcpt_s_comments = esc_html(get_post_meta($post->ID, 'pcpt_s_comments', true));
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
             * This section updates  all post values submitted by user from the custom post form after edited
             */
            $post_pcpt_public = '';
            $post_pcpt_publicly_queryable = '';
            $post_pcpt_show_ui = '';
            $post_pcpt_show_in_menu = '';
            $post_pcpt_query_var = '';
            $post_pcpt_has_archive = '';
            $post_pcpt_hierarchical = '';
            $post_pcpt_capability_type = '';
            $post_pcpt_menu_position = '';
            $post_pcpt_s_title = '';
            $post_pcpt_s_editor = '';
            $post_pcpt_s_author = '';
            $post_pcpt_s_thumbnail = '';
            $post_pcpt_s_excerpt = '';
            $post_pcpt_s_comments = '';
            $post_pcpt_singular_name = '';
            $post_pcpt_slug = '';
            $post_pcpt_add_new = '';
            $post_pcpt_add_new_item = '';
            $post_pcpt_edit_item = '';
            $post_pcpt_new_item = '';
            $post_pcpt_all_items = '';
            $post_pcpt_view_item = '';
            $post_pcpt_search_items = '';
            $post_pcpt_not_found = '';
            $post_pcpt_not_found_in_trash = '';
            $post_pcpt_parent_item_colon = '';
            if(isset($_POST['pcpt_public']) && !empty($_POST['pcpt_public'])){$post_pcpt_public = sanitize_text_field($_POST['pcpt_public']);}
            if(isset($_POST['pcpt_publicly_queryable']) && !empty($_POST['pcpt_publicly_queryable'])){$post_pcpt_publicly_queryable = sanitize_text_field($_POST['pcpt_publicly_queryable']);}
            if(isset($_POST['pcpt_show_ui']) && !empty($_POST['pcpt_show_ui'])){$post_pcpt_show_ui = sanitize_text_field($_POST['pcpt_show_ui']);}
            if(isset($_POST['pcpt_show_in_menu']) && !empty($_POST['pcpt_show_in_menu'])){$post_pcpt_show_in_menu = sanitize_text_field($_POST['pcpt_show_in_menu']);}
            if(isset($_POST['pcpt_query_var']) && !empty($_POST['pcpt_query_var'])){$post_pcpt_query_var = sanitize_text_field($_POST['pcpt_query_var']);}
            if(isset($_POST['pcpt_has_archive']) && !empty($_POST['pcpt_has_archive'])){$post_pcpt_has_archive = sanitize_text_field($_POST['pcpt_has_archive']);}
            if(isset($_POST['pcpt_hierarchical']) && !empty($_POST['pcpt_hierarchical'])){$post_pcpt_hierarchical = sanitize_text_field($_POST['pcpt_hierarchical']);}
            if(isset($_POST['pcpt_capability_type']) && !empty($_POST['pcpt_capability_type'])){$post_pcpt_capability_type = sanitize_text_field($_POST['pcpt_capability_type']);}
            if(isset($_POST['pcpt_menu_position']) && !empty($_POST['pcpt_menu_position'])){$post_pcpt_menu_position = sanitize_text_field($_POST['pcpt_menu_position']);}
            if(isset($_POST['pcpt_s_title']) && !empty($_POST['pcpt_s_title'])){$post_pcpt_s_title = sanitize_text_field($_POST['pcpt_s_title']);}
            if(isset($_POST['pcpt_s_editor']) && !empty($_POST['pcpt_s_editor'])){$post_pcpt_s_editor = sanitize_text_field($_POST['pcpt_s_editor']);}
            if(isset($_POST['pcpt_s_author']) && !empty($_POST['pcpt_s_author'])){$post_pcpt_s_author = sanitize_text_field($_POST['pcpt_s_author']);}
            if(isset($_POST['pcpt_s_thumbnail']) && !empty($_POST['pcpt_s_thumbnail'])){$post_pcpt_s_thumbnail = sanitize_text_field($_POST['pcpt_s_thumbnail']);}
            if(isset($_POST['pcpt_s_excerpt']) && !empty($_POST['pcpt_s_excerpt'])){$post_pcpt_s_excerpt = sanitize_text_field($_POST['pcpt_s_excerpt']);}
            if(isset($_POST['pcpt_s_comments']) && !empty($_POST['pcpt_s_comments'])){$post_pcpt_s_comments = sanitize_text_field($_POST['pcpt_s_comments']);}
            if(isset($_POST['pcpt_singular_name']) && !empty($_POST['pcpt_singular_name'])){$post_pcpt_singular_name = sanitize_text_field($_POST['pcpt_singular_name']);}
            if(isset($_POST['pcpt_slug']) && !empty($_POST['pcpt_slug'])){$post_pcpt_slug = sanitize_text_field($_POST['pcpt_slug']);}
            if(isset($_POST['pcpt_add_new']) && !empty($_POST['pcpt_add_new'])){$post_pcpt_add_new = sanitize_text_field($_POST['pcpt_add_new']);}
            if(isset($_POST['pcpt_add_new_item']) && !empty($_POST['pcpt_add_new_item'])){$post_pcpt_add_new_item = sanitize_text_field($_POST['pcpt_add_new_item']);}
            if(isset($_POST['pcpt_edit_item']) && !empty($_POST['pcpt_edit_item'])){$post_pcpt_edit_item = sanitize_text_field($_POST['pcpt_edit_item']);}
            if(isset($_POST['pcpt_new_item']) && !empty($_POST['pcpt_new_item'])){$post_pcpt_new_item = sanitize_text_field($_POST['pcpt_new_item']);}
            if(isset($_POST['pcpt_all_items']) && !empty($_POST['pcpt_all_items'])){$post_pcpt_all_items = sanitize_text_field($_POST['pcpt_all_items']);}
            if(isset($_POST['pcpt_view_item']) && !empty($_POST['pcpt_view_item'])){$post_pcpt_view_item = sanitize_text_field($_POST['pcpt_view_item']);}
            if(isset($_POST['pcpt_search_items']) && !empty($_POST['pcpt_search_items'])){$post_pcpt_search_items = sanitize_text_field($_POST['pcpt_search_items']);}
            if(isset($_POST['pcpt_not_found']) && !empty($_POST['pcpt_not_found'])){$post_pcpt_not_found = sanitize_text_field($_POST['pcpt_not_found']);}
            if(isset($_POST['pcpt_not_found_in_trash']) && !empty($_POST['pcpt_not_found_in_trash'])){$post_pcpt_not_found_in_trash = sanitize_text_field($_POST['pcpt_not_found_in_trash']);}
            if(isset($_POST['pcpt_parent_item_colon']) && !empty($_POST['pcpt_parent_item_colon'])){$post_pcpt_parent_item_colon = sanitize_text_field($_POST['pcpt_parent_item_colon']);}
            
            update_post_meta($post->ID, 'pcpt_public', $post_pcpt_public, $pcpt_public);
            update_post_meta($post->ID, 'pcpt_publicly_queryable', $post_pcpt_publicly_queryable, $pcpt_publicly_queryable);
            update_post_meta($post->ID, 'pcpt_show_ui', $post_pcpt_show_ui, $pcpt_show_ui);
            update_post_meta($post->ID, 'pcpt_show_in_menu', $post_pcpt_show_in_menu, $pcpt_show_in_menu);
            update_post_meta($post->ID, 'pcpt_query_var', $post_pcpt_query_var, $pcpt_query_var);
            update_post_meta($post->ID, 'pcpt_has_archive', $post_pcpt_has_archive, $pcpt_has_archive);
            update_post_meta($post->ID, 'pcpt_hierarchical', $post_pcpt_hierarchical, $pcpt_hierarchical);
            update_post_meta($post->ID, 'pcpt_capability_type', $post_pcpt_capability_type, $pcpt_capability_type);
            update_post_meta($post->ID, 'pcpt_menu_position', $post_pcpt_menu_position, $pcpt_menu_position);
            update_post_meta($post->ID, 'pcpt_s_title', $post_pcpt_s_title, $pcpt_s_title);
            update_post_meta($post->ID, 'pcpt_s_editor', $post_pcpt_s_editor, $pcpt_s_editor);
            update_post_meta($post->ID, 'pcpt_s_author', $post_pcpt_s_author, $pcpt_s_author);
            update_post_meta($post->ID, 'pcpt_s_thumbnail', $post_pcpt_s_thumbnail, $pcpt_s_thumbnail);
            update_post_meta($post->ID, 'pcpt_s_excerpt', $post_pcpt_s_excerpt, $pcpt_s_excerpt);
            update_post_meta($post->ID, 'pcpt_s_comments', $post_pcpt_s_comments, $pcpt_s_comments);
            update_post_meta($post->ID, 'pcpt_singular_name', $post_pcpt_singular_name, $pcpt_singular_name);
            update_post_meta($post->ID, 'pcpt_slug', $post_pcpt_slug, $pcpt_slug);
            update_post_meta($post->ID, 'pcpt_add_new', $post_pcpt_add_new, $pcpt_add_new);
            update_post_meta($post->ID, 'pcpt_add_new_item', $post_pcpt_add_new_item, $pcpt_add_new_item);
            update_post_meta($post->ID, 'pcpt_edit_item', $post_pcpt_edit_item, $pcpt_edit_item);
            update_post_meta($post->ID, 'pcpt_new_item', $post_pcpt_new_item, $pcpt_new_item);
            update_post_meta($post->ID, 'pcpt_all_items', $post_pcpt_all_items, $pcpt_all_items);
            update_post_meta($post->ID, 'pcpt_view_item', $post_pcpt_view_item, $pcpt_view_item);
            update_post_meta($post->ID, 'pcpt_search_items', $post_pcpt_search_items, $pcpt_search_items);
            update_post_meta($post->ID, 'pcpt_not_found', $post_pcpt_not_found, $pcpt_not_found);
            update_post_meta($post->ID, 'pcpt_not_found_in_trash', $post_pcpt_not_found_in_trash, $pcpt_not_found_in_trash);
            update_post_meta($post->ID, 'pcpt_parent_item_colon', $post_pcpt_parent_item_colon, $pcpt_parent_item_colon);
        }
    }
}
?>