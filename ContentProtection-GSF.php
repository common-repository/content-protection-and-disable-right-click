<?php
/*
Plugin Name: Content Protection and Disable Right Click
Description: Protect your content and disable right click, copy paste, text selection, and view source.
Version: 1.2
Date: January 24th, 2024
Author: WPCopyDefender.com
Author URI: https://www.wpcopydefender.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
More info: http://www.gnu.org/copyleft/gpl.html
*/

/* Make sure plugin remains secure if called directly */
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    
  


global $PLUGINMATRIX_NAME;
$PLUGINMATRIX_NAME='Content_Protect';

if(!class_exists($PLUGINMATRIX_NAME))
{
    class Content_Protect extends WP_Widget
    {
	protected $icon='thumb.png';
	protected $title=null;
	protected $display_mode=null;


        /**
         * Construct the plugin object
         */
        public function __construct()
        {
		// set full url to the icon
		if(!empty($this->icon)){
			$this->icon=rtrim(plugin_dir_url( __FILE__ ),"/").'/'.ltrim($this->icon,"/");
		}

		// register actions
		add_action('admin_init', [$this,'adminInit']);
		add_action('admin_menu', [$this,'addAdminMenu']);
		}

		


	
    
        /**
         * Activate the plugin
         */
        public static function activate()
        {

		add_option(__CLASS__.'InputField2','');
		add_option(__CLASS__.'InputField3','');
		add_option(__CLASS__.'InputField4','');
        }
    
        /**
         * Deactivate the plugin
         */     
        public static function deactivate()
        {
            // Do nothing
        }

	public function adminInit()
	{
	    // Set up the settings for this plugin

		register_setting(__CLASS__, __CLASS__.'InputField2');
			register_setting(__CLASS__, __CLASS__.'InputField3');
			register_setting(__CLASS__, __CLASS__.'InputField4');
	} // 

	public function addAdminMenu() {
		if (function_exists('add_menu_page')) {
			if ( empty ( $GLOBALS['admin_page_hooks'][__CLASS__] ) ){
				add_menu_page(__CLASS__, __CLASS__, 'manage_options', __CLASS__, [$this,'adminMenu'], $this->icon);
			}
		}
	}

	public function adminMenu() {
		if(!current_user_can('manage_options')){
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		global $PLUGINMATRIX_NAME;
		$PLUGINMATRIX_NAME=__CLASS__;
		include_once(sprintf("%s/Settings.php", dirname(__FILE__)));
	}


	public function shortcode($atts){
		$atts=shortcode_atts(['title'=>''], $atts,__CLASS__);
		$this->title=$atts['title'];
		return $this->customCode('shortcode');
	}

	



	

   }
}

if(class_exists($PLUGINMATRIX_NAME))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, [$PLUGINMATRIX_NAME, 'activate']);
	register_deactivation_hook(__FILE__, [$PLUGINMATRIX_NAME, 'deactivate']);

	try{
		$obj = new $PLUGINMATRIX_NAME();
	}
	catch(\Exception $e){
		echo esc_html($e->getMessage());
	}
}




$InputField2=get_option($PLUGINMATRIX_NAME."InputField2");

if ($InputField2 !=''){
	$InputField2=$InputField2;
}
else{
$InputField2='0';	
}

$InputField3=get_option($PLUGINMATRIX_NAME."InputField3");

if ($InputField3 !=''){
	$InputField3=$InputField3;
}
else{
$InputField3='0';	
}


$InputField4=get_option($PLUGINMATRIX_NAME."InputField4");

if ($InputField4 !=''){
	$InputField4=$InputField4;
}
else{
$InputField4='0';	
}


add_action('wp_head', 'Content_Protecthead');
function Content_Protecthead(){
	global $InputField4;
	global $InputField2;
	global $InputField3;
	global $InputField4;




	
if 	($InputField4=='1'){
	echo '<script>
 document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
    }, false);
	</script>
	
	<script>
        window.oncontextmenu = function () {
            alert("This content is protected. Do not copy it.");
            return false;
        }
    </script>';
}

if 	(isset($InputField2) && $InputField2 ==1){
	echo '<style>
html{
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;

}
</style>';
}

if 	(isset($InputField3) && $InputField3 ==1){
	echo '	<script>
	
document.onkeypress = function (event) {
event = (event || window.event);
if (event.keyCode == 123) {
return false;
}
}
document.onmousedown = function (event) {
event = (event || window.event);
if (event.keyCode == 123) {
return false;
}
}
document.onkeydown = function (event) {
event = (event || window.event);
if (event.keyCode == 123) {
return false;
}
}	

</script>';
}


}
