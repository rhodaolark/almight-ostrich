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
        
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>
	
	    <table class="form-table">
      <tr valign="top">
	  <th scope="row">Show Olark on my site</th>
	  <tr>
	  <label for="<?php echo $this->plugin_name; ?>-enable_olark">
	  <td><input type="checkbox" id="<?php echo $this->plugin_name; ?>-enable_olark" name="<?php echo $this->plugin_name; ?>[enable_olark]" value="1" <?php checked($enable_olark, 1); ?>/><span><?php esc_attr_e('Enable Olark', $this->plugin_name); ?></span></td>
	  </label>
	<tr>
      <th scope="row">My Olark Site ID</th>
	  <tr>
	  <label for="<?php echo $this->plugin_name; ?>-olark_site_ID">
      <td><input type="text" id="<?php echo $this->plugin_name; ?>-olark_site_ID" name="<?php echo $this->plugin_name; ?>[olark_site_ID]" value="<?php if(!empty($olark_site_ID)) echo $olark_site_ID; ?>"/><span><?php esc_attr_e('Olark Site ID', $this->plugin_name); ?></span></td>
	  </label>
      </tr>
    </table>
	<p>If you don't know your site ID, you can get it from the Olark website on the <a href="http://olark.com/install">install page</a></p>
    <?php submit_button(); ?>
  </form>
	
</div><!--wrap-->