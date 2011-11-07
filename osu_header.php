<?php
/*
Plugin Name: OSU Header
Version: .1
Description: Adds the OSU masthead to all site headers
Author: John Colvin
*/

class OSUHeaderPlugin {

  private $background_color_option_name, $background_color_options;

  function OSUHeaderPlugin() {
    
    add_action('init', array($this, 'enqueue_scripts'));
    add_action('shutdown', array(&$this, 'add_osu_header'));
    add_action('admin_menu', array(&$this, 'add_options_page'));
    $this->background_color_option_name = 'OSUNavBackgroundColor';
    $this->background_color_options = array('transparent' => 'transparent',
                                            '#ffffff'     => 'white',
                                            '#cccccc'     => 'gray');
  }

  function add_options_page() {
    add_submenu_page('themes.php', 'OSU Header', 'OSU Header', 'edit_theme_options', 'osu-header-options', array(&$this, 'options_page'));
  }
  
  function options_page() { 
    if (!empty($_POST['background-color'])) {
      $background_color = $_POST['background-color'];
      if (array_key_exists($background_color, $this->background_color_options)) {
        update_option($this->background_color_option_name, $background_color);
      }
    }
    ?>
    <p>Choose a background color for the OSU navigation bar:</p>
    <form method=POST>
      <select name="background-color"> <?php
        $current_background_color = get_option($this->background_color_option_name);
        foreach ($this->background_color_options as $code => $color) {
          $selected = ($current_background_color == $code) ? 'selected = "selected"' : '';
          echo '<option ' . $selected . ' value="' . $code .'">' . $color . '</option>';
        }
      ?>
      </select>
      <input type="submit" value="Submit" />
    </form>
    <?php
  }

  function add_osu_header() {
    echo '<script src="' . plugins_url('osu_header.js', __FILE__) .'"></script>';
    echo '<link id="osu-header-css" media="all" type="text/css" href="' . plugins_url('osu_header.css', __FILE__) .'" rel="stylesheet" />';

    if ($background_color = get_option($this->background_color_option_name)) {
      echo '<script>var osuNavBackgroundColor = "' . $background_color . '";</script>';
    }

  }
  
  function enqueue_scripts() {
    wp_enqueue_script('jquery');
  }
}

$osu_header_plugin = new OSUHeaderPlugin();