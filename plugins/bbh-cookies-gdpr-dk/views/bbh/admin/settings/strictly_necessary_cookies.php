<?php
    $gdpr_default_content = new bbh_GDPR_Content();
    $option_name    = $gdpr_default_content->bbh_gdpr_get_option_name();
    $gdpr_options   = get_option( $option_name );
    $wpml_lang      = $gdpr_default_content->bbh_gdpr_get_wpml_lang();
    $gdpr_options   = is_array( $gdpr_options ) ? $gdpr_options : array();
    if ( isset( $_POST ) && isset( $_POST['bbh_gdpr_nonce'] ) ) :
        $nonce = sanitize_key( $_POST['bbh_gdpr_nonce'] );
        if ( ! wp_verify_nonce( $nonce, 'bbh_gdpr_nonce_field' ) ) :
            die( 'Security check' );
        else :
            if ( is_array( $_POST ) ) :
                foreach ( $_POST as $form_key => $form_value ) :
                    if ( $form_key === 'bbh_gdpr_strict_necessary_cookies_tab_content' ) :
                        $value  = apply_filters( 'the_content', wp_unslash( $form_value ) );
                        $gdpr_options[$form_key.$wpml_lang] = $value;
                        update_option( $option_name, $gdpr_options );
                        $gdpr_options = get_option( $option_name );
                    elseif ( $form_key === 'bbh_gdpr_strictly_necessary_cookies_warning' ) :
                        $value  = apply_filters( 'the_content', wp_unslash( $form_value ) );
                        $gdpr_options[$form_key.$wpml_lang] = $value;
                        update_option( $option_name, $gdpr_options );
                        $gdpr_options = get_option( $option_name );
                    elseif ( $form_key !== 'bbh_gdpr_strictly_necessary_cookies_enable' ) :
                        $value  = sanitize_text_field( $form_value );
                        $gdpr_options[$form_key] = $value;
                        update_option( $option_name, $gdpr_options );
                        $gdpr_options = get_option( $option_name );
                    endif;
                endforeach;
            endif;
            ?>
                <script>
                    jQuery('#bbh-gdpr-setting-error-settings_updated').show();
                </script>
            <?php
        endif;
    endif;
?>
<br />
<?php
    $nav_label  = isset( $gdpr_options['bbh_gdpr_strictly_necessary_cookies_tab_title'.$wpml_lang] ) && $gdpr_options['bbh_gdpr_strictly_necessary_cookies_tab_title'.$wpml_lang] ? $gdpr_options['bbh_gdpr_strictly_necessary_cookies_tab_title'.$wpml_lang] : __('Strictly Necessary Cookies','bbh-gdpr');
?>
<h2><?php echo $nav_label; ?></h2>
<hr />
<form action="?page=bbh-gdpr&amp;tab=strictly_necessary_cookies" method="post" id="bbh_gdpr_tab_strictly_necessary_cookies">
    <?php wp_nonce_field( 'bbh_gdpr_nonce_field', 'bbh_gdpr_nonce' ); ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="bbh_gdpr_strictly_necessary_cookies_tab_title"><?php _e('Tab Title','bbh-gdpr'); ?></label>
                </th>
                <td>
                    <input name="bbh_gdpr_strictly_necessary_cookies_tab_title<?php echo $wpml_lang; ?>" type="text" id="bbh_gdpr_strictly_necessary_cookies_tab_title" value="<?php echo $nav_label; ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row" colspan="2" style="padding-bottom: 0;">
                    <label for="bbh_gdpr_strict_necessary_cookies_tab_content"><?php _e('Tab Content','bbh-gdpr'); ?></label>
                </th>
            </tr>
            <tr class="bbh_gdpr_table_form_holder">
                <th colspan="2" scope="row">
                    <?php
                        $content =  isset( $gdpr_options['bbh_gdpr_strict_necessary_cookies_tab_content'.$wpml_lang] ) && $gdpr_options['bbh_gdpr_strict_necessary_cookies_tab_content'.$wpml_lang] ? wp_unslash( $gdpr_options['bbh_gdpr_strict_necessary_cookies_tab_content'.$wpml_lang] ) : false;
                        if ( ! $content ) :
                            $content    = $gdpr_default_content->bbh_gdpr_get_strict_necessary_content();
                        endif;
                        ?>
                    <?php
                        $settings = array (
                            'media_buttons'     =>  false,
                            'editor_height'     =>  150,
                        );
                        wp_editor( $content, 'bbh_gdpr_strict_necessary_cookies_tab_content', $settings );
                    ?>
                </th>
            </tr>

            <tr>
                <th scope="row" style="padding-bottom: 0;" colspan="2">
                    <label for="bbh_gdpr_strictly_necessary_cookies_warning"><?php _e('Tab Warning Message','bbh-gdpr'); ?></label>
                </th>
            </tr>
            <tr>
                <th style="padding-top: 10px;"  colspan="2">
                    <?php $content = isset( $gdpr_options['bbh_gdpr_strictly_necessary_cookies_warning'.$wpml_lang] ) && $gdpr_options['bbh_gdpr_strictly_necessary_cookies_warning'.$wpml_lang] ? $gdpr_options['bbh_gdpr_strictly_necessary_cookies_warning'.$wpml_lang] : $gdpr_default_content->bbh_gdpr_get_strict_necessary_warning(); ?>

                    <?php
                        $settings = array (
                            'media_buttons'     =>  false,
                            'editor_height'     =>  50,
                        );
                        wp_editor( $content, 'bbh_gdpr_strictly_necessary_cookies_warning', $settings );
                    ?>
                    <p class="description" id="bbh_gdpr_strictly_necessary_cookies_warning-description"><?php _e('Will be displayed below the Checkbox in the front-end!','bbh-gdpr'); ?></p>
                </th>
            </tr>
        </tbody>
    </table>

    <hr />
    <br />
    <button type="submit" class="button button-primary"><?php _e('Save changes','bbh-gdpr'); ?></button>
</form>