<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://olark.com
 * @since      1.0.0
 *
 * @package    Olark_Wp
 * @subpackage Olark_Wp/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
	<br><br>

	<form method="post" name="olark_options" action="options.php">

<?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // Olark Site ID
        $olark_site_ID = $options['olark_site_ID'];
		$enable_olark = $options['enable_olark'];
		$start_expanded = $options['start_expanded'];
		$detached_chat = $options['detached_chat'];
		$olark_lang = $options['olark_lang'];
		$olark_api = $options['olark_api'];
        
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>
	
	  <div class="form-table">
	  <h2>My Olark Site ID</h2>
	  <fieldset>
	  <label for="<?php echo $this->plugin_name; ?>-olark_site_ID">
      <p><input type="text" id="<?php echo $this->plugin_name; ?>-olark_site_ID" name="<?php echo $this->plugin_name; ?>[olark_site_ID]" value="<?php if(!empty($olark_site_ID)) echo $olark_site_ID; ?>"/><span><?php esc_attr_e('Olark Site ID', $this->plugin_name); ?></span></p>
	  </label></fieldset>
    
	<p>If you don't know your site ID, you can get it from the Olark website on the <a href="http://olark.com/install">install page</a></p>
    	
      <h2>Show Olark on my site</h2>
	  <fieldset>
	  <label for="<?php echo $this->plugin_name; ?>-enable_olark">
	  <p><input type="checkbox" id="<?php echo $this->plugin_name; ?>-enable_olark" name="<?php echo $this->plugin_name; ?>[enable_olark]" value="1" <?php checked($enable_olark, 1); ?>/><span><?php esc_attr_e('Enable Olark', $this->plugin_name); ?></span></p>
	  </label></fieldset>
	  
	  <h2>Translate the chatbox</h2>
	  <fieldset>
	  <label for="<?php echo $this->plugin_name; ?>-olark_lang">
	  <select id="<?php echo $this->plugin_name; ?>-olark_lang" name="<?php echo $this->plugin_name; ?>[olark_lang]" value="en-US" <?php selected($olark_lang);?>/>
		<option value="en-US" <?php selected( $olark_lang, 'en-US' ); ?>>English</option>
		<option value="fr-FR" <?php selected( $olark_lang, 'fr-FR' ); ?>>French</option>
		<option value="es-ES" <?php selected( $olark_lang, 'es-ES' ); ?>>Spanish</option>
		</select>
		</label>
	  </fieldset>
	  
	<p>To customise the text fully, go to <a href="http://olark.com/customize/behavior">behaviour settings on the Olark website</a></p>
	  
	  <h2>Start with the chatbox expanded</h2>
	  <fieldset>
	  <label for="<?php echo $this->plugin_name; ?>-start_expanded">
	  <p><input type="checkbox" id="<?php echo $this->plugin_name; ?>-start_expanded" name="<?php echo $this->plugin_name; ?>[start_expanded]" value="1" <?php checked($start_expanded, 1); ?>/><span><?php esc_attr_e('Start with the chatbox expanded', $this->plugin_name); ?></span></p>
	  </label></fieldset>
	
	  <h2>Detach the chatbox</h2>
	  <fieldset>
	  <label for="<?php echo $this->plugin_name; ?>-detached_chat">
	  <p><input type="checkbox" id="<?php echo $this->plugin_name; ?>-detached_chat" name="<?php echo $this->plugin_name; ?>[detached_chat]" value="1" <?php checked($detached_chat, 1); ?>/><span><?php esc_attr_e('Detach the chatbox', $this->plugin_name); ?></span></p>
	  </label></fieldset>
	  
	  <h2>Advanced settings</h2>
	  <p>If you wish to add Olark api calls, you may do so here. Do not include script tags. This is recommended for advanced users only.
	  <fieldset>
	  <label for="<?php echo $this->plugin_name; ?>-olark_api">
       <p><input type="text" id="<?php echo $this->plugin_name; ?>-olark_api" name="<?php echo $this->plugin_name; ?>[olark_api]" value="<?php if(!empty($olark_api)) echo $olark_api; ?>"/><span><?php esc_attr_e('Advanced Api Settings', $this->plugin_name); ?></span></p>
	  </label></fieldset>
	
	<?php submit_button(); ?>
	</div>
	
  </form>
	
</div><!--wrap-->