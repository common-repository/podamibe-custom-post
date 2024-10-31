<?php
/**
 * function cpt_inner_custom_box()
 * This section includes, shows previous values in edit form. 
 * This function creates the custom post type
 */

function cpt_inner_custom_box() {
    global $post;

    $pcpt_public = esc_html(get_post_meta($post->ID, 'pcpt_public', true));
    
    $pcpt_publicly_queryable = esc_html(get_post_meta($post->ID, 'pcpt_publicly_queryable', true));
    $pcpt_show_ui = esc_html(get_post_meta($post->ID, 'pcpt_show_ui', true));
    $pcpt_show_in_menu = esc_html(get_post_meta($post->ID, 'pcpt_show_in_menu', true)); 
    $pcpt_query_var = esc_html(get_post_meta($post->ID, 'pcpt_query_var', true)); 
    $pcpt_slug = esc_html(get_post_meta($post->ID, 'pcpt_slug', true)); 
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
    $pcpt_general_name = esc_html(get_post_meta($post->ID, 'pcpt_general_name', true));
    $pcpt_singular_name = esc_html(get_post_meta($post->ID, 'pcpt_singular_name', true));
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
    
    ?>
    <!-- hide permalink slug -->
    <style>
        #edit-slug-box{
            display: none;
        }
    </style>
    <!--  The form of the custom post type begins -->

    <h4> <?php esc_html_e('Main Settings:',PNCP_TEXT_DOMAIN); ?> </h4>

    <form method="post" action="">

    <?php wp_nonce_field("podamibe_custom_post","podamibe_nonce_field"); ?>

    <table width="100%">
        <tr>
            <td><input type="checkbox" <?php
    if ($pcpt_public == "on") {
        esc_html_e('checked');
    }
    ?> name="pcpt_public" /> <?php esc_html_e(' Public',PNCP_TEXT_DOMAIN); ?> </td>
            <td><input type="checkbox" <?php
                   if ($pcpt_publicly_queryable == "on") {
                       esc_html_e('checked');
                   }
    ?> name="pcpt_publicly_queryable" /> <?php esc_html_e(' Publicly Queryable',PNCP_TEXT_DOMAIN); ?> </td>

            <td><input type="checkbox" <?php
                   if ($pcpt_show_in_menu == "on") {
                       esc_html_e('checked');
                   }
    ?> name="pcpt_show_in_menu" /><?php esc_html_e(' Show in Menu',PNCP_TEXT_DOMAIN); ?> </td>

            <td><input type="checkbox" <?php
                   if ($pcpt_query_var == "on") {
                       esc_html_e('checked');
                   }
    ?> name="pcpt_query_var" /> <?php esc_html_e(' Query Var',PNCP_TEXT_DOMAIN); ?>  </td>

            <td><input type="checkbox" <?php
                   if ($pcpt_has_archive == "on") {
                       esc_html_e('checked');
                   }
    ?> name="pcpt_has_archive" /> <?php esc_html_e(' Has Archive',PNCP_TEXT_DOMAIN); ?> </td>

            <td><input type="checkbox" <?php
                   if ($pcpt_hierarchical == "on") {
                       esc_html_e('checked');
                   }
    ?> name="pcpt_hierarchical" /><?php esc_html_e(' Hierarchical',PNCP_TEXT_DOMAIN); ?>  </td>

        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><?php esc_html_e('Menu Position:',PNCP_TEXT_DOMAIN); ?><br/><select name="pcpt_menu_position">
                    <option value="5" <?php
                   if ($pcpt_menu_position == "5") {
                       esc_html_e('selected');

                   }
    ?>><?php esc_html_e(' below Posts',PNCP_TEXT_DOMAIN); ?></option>
                    <option value="10" <?php
                        if ($pcpt_menu_position == "10") {
                           esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Media',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="15" <?php
                        if ($pcpt_menu_position == "15") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Links',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="20" <?php
                        if ($pcpt_menu_position == "20") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Pages',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="25" <?php
                        if ($pcpt_menu_position == "25") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below comments',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="60" <?php
                        if ($pcpt_menu_position == "60") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below first separator',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="65" <?php
                        if ($pcpt_menu_position == "65") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Plugins',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="70" <?php
                        if ($pcpt_menu_position == "70") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Users',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="75" <?php
                        if ($pcpt_menu_position == "75") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Tools',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="80" <?php
                        if ($pcpt_menu_position == "80") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below Settings',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="100" <?php
                        if ($pcpt_menu_position == "100") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' below second separator',PNCP_TEXT_DOMAIN); ?></option>

                </select></td>


            <td><?php esc_html_e(' Capability Type:',PNCP_TEXT_DOMAIN); ?><br/><select name="pcpt_capability_type">
                    <option value="post" <?php
                        if ($pcpt_capability_type == "post") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' Post',PNCP_TEXT_DOMAIN); ?></option>

                    <option value="page" <?php
                        if ($pcpt_capability_type == "page") {
                            esc_html_e('selected');
                        }
    ?>><?php esc_html_e(' Page',PNCP_TEXT_DOMAIN); ?></option>

                </select></td>

        </tr>
    </table>


    <h4><?php esc_html_e(' Supports:',PNCP_TEXT_DOMAIN); ?></h4>
    <table width="100%">
        <tr>
            <td><input type="checkbox" name="pcpt_s_title" <?php
                        if ($pcpt_s_title == "on") {
                            esc_html_e('checked');
                        }
    ?>/> <?php esc_html_e(' Title',PNCP_TEXT_DOMAIN); ?> </td>

            <td><input type="checkbox" name="pcpt_s_editor" <?php
                   if ($pcpt_s_editor == "on") {
                       esc_html_e('checked');
                   }
    ?>/> <?php esc_html_e(' Editor',PNCP_TEXT_DOMAIN); ?>  </td>

            <td><input type="checkbox" name="pcpt_s_author" <?php
                   if ($pcpt_s_author == "on") {
                       esc_html_e('checked');
                   }
    ?>/> <?php esc_html_e(' Author',PNCP_TEXT_DOMAIN); ?> </td> 

            <td><input type="checkbox" name="pcpt_s_thumbnail" <?php
                   if ($pcpt_s_thumbnail == "on") {
                       esc_html_e('checked');
                   }
    ?>/> <?php esc_html_e(' Thumbnail',PNCP_TEXT_DOMAIN); ?>  </td>

            <td><input type="checkbox" name="pcpt_s_excerpt" <?php
                   if ($pcpt_s_excerpt == "on") {
                       esc_html_e('checked');
                   }
    ?>/> <?php esc_html_e(' Excerpt',PNCP_TEXT_DOMAIN); ?>  </td>

            <td><input type="checkbox" name="pcpt_s_comments" <?php
                   if ($pcpt_s_comments == "on") {
                       esc_html_e('checked');
                   }
    ?>/><?php esc_html_e(' Comments',PNCP_TEXT_DOMAIN); ?>   </td>

        </tr>
    </table>


    <h4><?php esc_html_e(' Lables:',PNCP_TEXT_DOMAIN); ?></h4>
    <table width="100%">
        <tr>

            <td><?php esc_html_e(' Singular name:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_singular_name" required="required" value="<?php
                 esc_html_e($pcpt_singular_name,PNCP_TEXT_DOMAIN); ?>"  />
             </td>
             
            <td><?php esc_html_e(' Slug:',PNCP_TEXT_DOMAIN); ?><br/> 
             <input type="text" name="pcpt_slug" required="required" value="<?php
                 esc_html_e($pcpt_slug,PNCP_TEXT_DOMAIN); ?>"  />
             </td>

            <td><?php esc_html_e(' Add New:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_add_new" value="<?php 
                       if(!empty($pcpt_add_new )) {
                            esc_html_e($pcpt_add_new,PNCP_TEXT_DOMAIN);
                        } else {
                            esc_html_e("Add new",PNCP_TEXT_DOMAIN);
                        }
            ?>"/></td>

        </tr>

        <tr>
            <td><?php esc_html_e(' Add new Item:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_add_new_item"  value="<?php 
                       if(!empty($pcpt_add_new_item )) {
                           esc_html_e($pcpt_add_new_item,PNCP_TEXT_DOMAIN);
                        } else {
                           esc_html_e("Add new item",PNCP_TEXT_DOMAIN);
                        }
            ?>"/></td>

            <td><?php esc_html_e(' Edit Item:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_edit_item"  value="<?php 
                       if(!empty($pcpt_edit_item )) {
                            esc_html_e($pcpt_edit_item,PNCP_TEXT_DOMAIN);
                        } else {
                            esc_html_e("Edit Item",PNCP_TEXT_DOMAIN);
                        } 
            ?>"/></td>

            <td><?php esc_html_e(' New Item:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_new_item"  
            value="<?php 
                       if(!empty($pcpt_new_item )) {
                           esc_html_e($pcpt_new_item,PNCP_TEXT_DOMAIN);
                        } else {
                            esc_html_e("New item",PNCP_TEXT_DOMAIN);
                        }


            ?>"/></td>

        </tr>

        <tr>
            <td>
                <?php esc_html_e(' All Items:',PNCP_TEXT_DOMAIN); ?><br/>
                 <input type="text" name="pcpt_all_items" " value="<?php
                    if(!empty($pcpt_all_items) ) {
                        esc_html_e($pcpt_all_items,PNCP_TEXT_DOMAIN);
                    } else {
                        esc_html_e("All items",PNCP_TEXT_DOMAIN);
                    }
             ?>"/>
             </td>

            <td><?php esc_html_e(' View Item:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_view_item"  value="<?php 
                        if(!empty($pcpt_view_item )) {
                           esc_html_e($pcpt_view_item,PNCP_TEXT_DOMAIN);
                        } else {
                           esc_html_e("View item",PNCP_TEXT_DOMAIN);
                        }
            ?>"/></td>

            <td><?php esc_html_e(' Search Items:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_search_items" value="<?php 
                        if(!empty($pcpt_search_items )) {
                            esc_html_e($pcpt_search_items,PNCP_TEXT_DOMAIN);
                        } else {
                            esc_html_e("Search items",PNCP_TEXT_DOMAIN);
                        }
            ?>"/></td>

        </tr>

        <tr>
            <td><?php esc_html_e(' Not Found:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_not_found"  value="<?php 
                        if(!empty($pcpt_not_found )) {
                            esc_html_e($pcpt_not_found,PNCP_TEXT_DOMAIN);
                        } else {
                             esc_html_e("Not found",PNCP_TEXT_DOMAIN);
                        }    
            ?>"/></td>

            <td><?php esc_html_e(' Not Found In Trash:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_not_found_in_trash" value="<?php 
                        if(!empty($pcpt_not_found_in_trash )) {
                            esc_html_e($pcpt_not_found_in_trash,PNCP_TEXT_DOMAIN);
                        } else {
                            esc_html_e("Not found in trash",PNCP_TEXT_DOMAIN);
                        } 
            ?>"/></td>

            <td><?php esc_html_e(' Parent Item Column:',PNCP_TEXT_DOMAIN); ?><br/> <input type="text" name="pcpt_parent_item_colon"  value="<?php 
                       if(!empty($pcpt_parent_item_colon )) {
                            esc_html_e($pcpt_parent_item_colon,PNCP_TEXT_DOMAIN);
                        } else {
                            esc_html_e("Parent item column",PNCP_TEXT_DOMAIN);
                        } 
            ?>"/></td>

        </tr>

    </table>


    <input type="hidden" name="cpt-hidd" value="true" />

    <!-- The form of custom post type end here -->
<?php } ?>
