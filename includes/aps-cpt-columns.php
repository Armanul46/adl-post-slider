<?php

/**
 * Change the columns names for our slider
 * @param $columns
 *
 * @return array
 */
function aps_add_new_columns($new_columns){
    $new_columns = array();
    $new_columns['cb']   = '<input type="checkbox" />';
    $new_columns['title']   = esc_html__('Slider Name', APS_TEXTDOMAIN);
    $new_columns['shortcode']   = esc_html__('Slider Shortcode', APS_TEXTDOMAIN);
    $new_columns['shortcode_2']   = esc_html__('Shortcode For Template File', APS_TEXTDOMAIN);
    $new_columns['date']   = esc_html__('Created at', APS_TEXTDOMAIN);
    return $new_columns;
}
add_filter('manage_adlpostslider_posts_columns', 'aps_add_new_columns');

function aps_manage_custom_columns( $column_name, $post_id ) {

    switch($column_name){
        case 'shortcode': ?>
            <textarea style="resize: none; text-align: center; background-color: #2e85de; color: #fff;" cols="25" rows="1" onClick="this.select();" >[adl-post-slider id=<?php echo $post_id;?>]</textarea>
        <?php
        break;
        case 'shortcode_2':
            ?>
                    <textarea style="resize: none; text-align: center; background-color: #2e85de; color: #fff;" cols="30" rows="1" onClick="this.select();" ><?php echo "<?php adl_post_slider({$post_id}); ?>"; ?></textarea>
            <?php
            break;

        default:
            break;

    }
}



add_action('manage_adlpostslider_posts_custom_column', 'aps_manage_custom_columns', 10, 2);



