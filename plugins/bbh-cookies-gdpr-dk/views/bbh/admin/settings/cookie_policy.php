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
                if ( isset( $_POST['bbh_gdpr_cookie_policy_enable'] ) && intval( $_POST['bbh_gdpr_cookie_policy_enable'] ) === 1 ) :
                    $value  = 1;
                else :
                    $value  = 0;
                endif;
                $gdpr_options['bbh_gdpr_cookie_policy_enable'] = $value;
                update_option( $option_name, $gdpr_options );
                $gdpr_options = get_option( $option_name );
                foreach ( $_POST as $form_key => $form_value ) :
                    if ( $form_key === 'bbh_gdpr_cookies_policy_tab_content' ) :
                        $value  = apply_filters( 'the_content', wp_unslash( $form_value ) );
                        $gdpr_options[$form_key.$wpml_lang] = $value;
                        update_option( $option_name, $gdpr_options );
                        $gdpr_options = get_option( $option_name );
                    elseif ( $form_key !== 'bbh_gdpr_cookie_policy_enable' ) :
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
    $nav_label  = isset( $gdpr_options['bbh_gdpr_cookie_policy_tab_nav_label'.$wpml_lang] ) && $gdpr_options['bbh_gdpr_cookie_policy_tab_nav_label'.$wpml_lang] ? $gdpr_options['bbh_gdpr_cookie_policy_tab_nav_label'.$wpml_lang] : __('Cookie Policy','bbh-gdpr');
?>
<h2><?php echo $nav_label; ?></h2>
<hr />
<form action="?page=bbh-gdpr&amp;tab=cookie_policy" method="post" id="bbh_gdpr_tab_cookie_policy">
    <?php wp_nonce_field( 'bbh_gdpr_nonce_field', 'bbh_gdpr_nonce' ); ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="bbh_gdpr_cookie_policy_enable"><?php _e('Turn','bbh-gdpr'); ?></label>
                </th>
                <td>
                    <input name="bbh_gdpr_cookie_policy_enable" type="radio" value="1" id="bbh_gdpr_cookie_policy_enable_on" <?php echo isset( $gdpr_options['bbh_gdpr_cookie_policy_enable'] ) ? ( intval( $gdpr_options['bbh_gdpr_cookie_policy_enable'] ) === 1  ? 'checked' : '' ) : 'checked'; ?> class="regular-text on-off"> <label for="bbh_gdpr_cookie_policy_enable_on"><?php _e('On','bbh-gdpr'); ?></label> <span class="separator"></span>
                    <input name="bbh_gdpr_cookie_policy_enable" type="radio" value="0" id="bbh_gdpr_cookie_policy_enable_off" <?php echo isset( $gdpr_options['bbh_gdpr_cookie_policy_enable'] ) ? ( intval( $gdpr_options['bbh_gdpr_cookie_policy_enable'] ) === 0  ? 'checked' : '' ) : 'checked'; ?> class="regular-text on-off"> <label for="bbh_gdpr_cookie_policy_enable_off"><?php _e('Off','bbh-gdpr'); ?></label>

                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="bbh_gdpr_cookie_policy_tab_nav_label"><?php _e('Tab Title','bbh-gdpr'); ?></label>
                </th>
                <td>
                    <input name="bbh_gdpr_cookie_policy_tab_nav_label<?php echo $wpml_lang; ?>" type="text" id="bbh_gdpr_cookie_policy_tab_nav_label" value="<?php echo $nav_label; ?>" class="regular-text">
                </td>
            </tr>

            <tr>
                <th scope="row" colspan="2" style="padding-bottom: 0;">
                    <label for="bbh_gdpr_cookies_policy_tab_content"><?php _e('Tab Content','bbh-gdpr'); ?></label>
                </th>
            </tr>
            <tr class="bbh_gdpr_table_form_holder">
                <th colspan="2" scope="row">
                    <?php
                        $content =  isset( $gdpr_options['bbh_gdpr_cookies_policy_tab_content'.$wpml_lang] ) && $gdpr_options['bbh_gdpr_cookies_policy_tab_content'.$wpml_lang] ? wp_unslash( $gdpr_options['bbh_gdpr_cookies_policy_tab_content'.$wpml_lang] ) : false;
                        if ( ! $content ) :
                            $_content   = $gdpr_default_content->bbh_gdpr_get_cookie_policy_content();
                            $content    = apply_filters( 'the_content', $_content );
                        endif;
                        ?>
                    <?php
                        $settings = array (
                            'media_buttons'     =>  false,
                            'editor_height'     =>  150,
                        );
                        wp_editor( $content, 'bbh_gdpr_cookies_policy_tab_content', $settings );
                    ?>
                </th>
            </tr>

        </tbody>
    </table>

    <hr />
    <br />
    <button type="submit" class="button button-primary"><?php _e('Save changes','bbh-gdpr'); ?></button>
</form>