<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  
$urlx=get_site_url();
$urlx=str_replace("https://", "",$urlx );
$urlx=str_replace("http://", "", $urlx);
$urlx=str_replace("www.", "", $urlx);
?>
<style>
.cp_coupon{
    border: 3px dashed;
    padding: 10px;
    display: inline-block;
    margin: 0 0 20px 0;
    border-radius: 10px;
    font-size: 24px;
    font-weight: 700;
}
.cp_trial{display: inline-block;margin-right:5px;float:left;background:url('<?php echo esc_html(plugins_url( 'locking.svg', __FILE__ )); ?>') no-repeat !important;background-size:20px  !important; width:20px;height:20px;}
.cp_ok{display: inline-block;margin-right:5px;float:left;background:url('<?php echo esc_html(plugins_url( 'ok.svg', __FILE__ )); ?>') no-repeat !important;background-size:20px  !important; width:20px;height:20px;}
#f2,#f3,#f4,#f9,#f10,#f11,#f12,#f13,#f14,#f15{display: inline-block;margin-right:5px;float:left;background:url('<?php echo esc_html(plugins_url( 'ex.svg', __FILE__ )); ?>') no-repeat;background-size:20px  !important; width:20px;height:20px;}
.cp_info{
    border: 2px solid;
    color: #000000;
    border-radius: 10px;
    padding: 0px 6px;
    font-weight: 700;
    font-size: 13px;
}
.cp_big{font-size:16px;font-weight:700}
.cp_spac{margin-top:30px}
.cp_spacb{margin-bottom:10px;    margin-top: 25px}
.cp_tmb{width: 60px;
    float: left;
    margin-right: 5px;}
.cp_l {
    cursor: pointer;
}	
.cp_limit li{float: left;
    margin-right: 20px;}
	
.cp_limit{	display: inline-block;
    margin: 0;}
	.cp_lf{border-left: 2px solid #666;
    padding-left: 8px;}
	
	.cp_txtbg {padding: 5px !important;
    min-width: 260px;}
	.cp_features{float:left;margin-right: 20px;margin-bottom: 0;
    margin-top: 0;}
</style>

<div class="wrap">

<p style="background-color:#FFF;margin: 0;padding: 10px;box-sizing: border-box;border-radius: 5px;">
<a href="https://www.wpcopydefender.com/offer/?s=wp&u=<?php echo esc_html($urlx); ?>" target="blank">
<img src="<?php echo esc_html(plugins_url( 'logo.png', __FILE__ )); ?>" alt="logo" style="max-width: 100%;" />
</a></p>

<h1 style="font-weight: 700;padding: 10px 0;margin: 20px 0 0 0;">Content Protection and Disable Right Click</h1>
<p>This plugin lets you protect your content by disabling the selection, inspect source commands and the right click of the mouse.</p>

	
 
<form method="post" action="options.php"> 
<?php @settings_fields($PLUGINMATRIX_NAME); ?>

<?php 
$val1=get_option($PLUGINMATRIX_NAME."InputField4");
$val2=get_option($PLUGINMATRIX_NAME."InputField2");
$val3=get_option($PLUGINMATRIX_NAME."InputField3");


?>

<div id="risultato"></div>
<p style="margin-top:4px">You have enabled <span class="cp_big"><span id="contato"></span> out of 9</span> content protection measures!</p>

<h2 style="margin-top:40px;font-size:20px;font-weight:700;margin-bottom:20px;border-bottom:1px solid #666;padding-bottom:10px">Free Features <a href="https://www.wpcopydefender.com/offer/?s=wp&u=<?php echo esc_html($urlx); ?>">(Upgrade here)</a></h2>

<h3><?php 
if(!empty($val1)){
	echo '<span id="f9" class="cp_ok"></span>';
}
else{
	echo '<span id="f9"></span>';
}
?> Do you want to disable right click?</h3>

<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField4" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField4">
<option value="1" <?php if (isset($val1) && $val1==1){echo 'selected';} ?>>Yes</option>
<option value="0" <?php if ($val1==0){echo 'selected';} ?>>No</option>
</select>


	
<h3 class="cp_spac"><?php 
if(!empty($val2)){
	echo '<span id="f9" class="cp_ok"></span>';
}
else{
	echo '<span id="f9"></span>';
}
?> Do you want to protect content from selection?</h3>
<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField2" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField2">
<option value="1" <?php if (isset($val2) && $val2==1){echo 'selected';} ?>>Yes</option>
<option value="0" <?php if ($val2==0){echo 'selected';} ?>>No</option>
</select>
		
<h3 class="cp_spac"><?php 
if(!empty($val3)){
	echo '<span id="f9" class="cp_ok"></span>';
}
else{
	echo '<span id="f9"></span>';
}
?> Do you want to disable F12?</h3>
<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField3" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField3">
<option value="1" <?php if (isset($val3) && $val3==1){echo 'selected';} ?>>Yes</option>
<option value="0" <?php if ($val3==0){echo 'selected';} ?>>No</option>
</select>
	
<?php @submit_button(); ?>
</form>


<div id="premium">
<h2 style="font-size:20px;font-weight:700;margin-bottom:20px;border-bottom:1px solid #666;padding-bottom:10px">Preview of Premium Features <a href="https://www.wpcopydefender.com/offer/?s=wp&u=<?php echo esc_html($urlx); ?>">(Upgrade here)</a></h2>
<h3><span id="f9" class="cp_trial"></span>Where can I activate limitations?</h3>
<p class="cp_lf"> Tailor the experience to fit your needs and ensure your content is safeguarded exactly where it matters most.</p>
<ul class="cp_limit"><?php
$checkbox_options = array(
    'everywhere' => 'Everywhere',
    'home' => 'Homepage',
    'page' => 'Pages',
    'tag' => 'Tags',
	'single' => 'Posts',
	'cat' => 'Categories',
		'product' => 'Woocommerce Products',
	'product_category' => 'Woocommerce Categories',
	'product_tag' => 'Woocommerce Tags',
);

foreach ($checkbox_options as $key => $label) {
   
    echo '<li><input type="checkbox" id="' . esc_html($key) . '" value="' . esc_html($key) . '" >';
    echo '<label for="' . esc_html($key) . '" class="cp_l">' . esc_html($label) . '</label></li>';
}

?></ul>


<h3 class="cp_spac"><span id="f9"  class="cp_trial"></span>Who should be limited?</h3>
<p class="cp_lf"> Determine exactly who experiences limitations on your site: whether it's for logged-in users, visitors without an account, or everyone except the admin. </p>

<ul class="cp_limit"><?php
$checkbox_options = array(
    'logged_in' => 'Logged in users',
    'not_logged_in' => 'Not logged in users',
    'everyone-admin' => 'Everyone except admin',
);

foreach ($checkbox_options as $key => $label) {
    
    echo '<li><input type="checkbox"  id="' . esc_html($key) . '" value="' . esc_html($key) . '" >';
    echo '<label for="' . esc_html($key) . '" class="cp_l">' . esc_html($label) . '</label></li>';
}

?></ul>

<h3 class="cp_spac"><span id="f9"   class="cp_trial"></span>Customize protection message:</h3>
<p class="cp_lf"> Activate an alert message for your visitors when a limitation is triggered.</p>

<input type="text" class="cp_txtbg" placeholder="Example: Do not copy!"  id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField7" value="<?php echo isset($val7) ? esc_attr($val7) : ''; ?>">

<h3 class="cp_spac"><span id="f9"   class="cp_trial"></span>Append message to copied text</h3>
<p class="cp_lf"> Append a custom message to copied text for an added layer of protection and engagement.<br />Example: Visit #link for details! (<b>#link</b> dynamically displays the current page URL)</p>
<input type="text"  class="cp_txtbg"  placeholder="Example: Visit #link"  id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField8" value="<?php echo isset($val8) ? esc_attr($val8) : ''; ?>">

<h2 class="cp_spac">Would you like to prevent the following actions?</h2>
<p class="cp_lf">Choose from a variety of limitations to safeguard your content from commonly used hotkeys and shortcuts.</p>

<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable right-click:</h3>
<p class="cp_lf"> Activate it in order to thwart unauthorized content copying by disabling the mouse right-click functionality on your website.</p>


<select id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField4">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>


<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable copy: </h3>
<p class="cp_lf"> Activate this feature to fortify your content's integrity by blocking key combinations like Ctrl+C, effectively preventing unauthorized copying of your valuable information.</p>


<select name="Copy_DefenderInputField9" id="Copy_DefenderInputField9">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>

<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable image drag:</h3>
<p class="cp_lf"> Say goodbye to image dragging and ensure the protection of your images from unauthorized use or copying.</p>


<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField12" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField12">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>

<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable paste:</h3>
<p class="cp_lf"> Prevent unauthorized pasting into forms by blocking Ctrl+V and similar combinations.</p>


<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField13" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField13">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>

<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable save:</h3>
<p class="cp_lf"> Activate this defense mechanism to bolster content protection â€“ thwart attempts to save your page with a simple keystroke, keeping your valuable information secure from unauthorized downloads.</p>


<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField14" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField14">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>

<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable print page:</h3>
<p class="cp_lf"> Disable the ability to print with a simple Ctrl+P and other combinations, ensuring your valuable information remains protected from unauthorized reproduction.</p>


<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField15" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField15">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>

	
<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Protect content from text selection:</h3>
<p class="cp_lf"> Activate this protective shield to safeguard your content from unauthorized copying â€“ prevent text selection and Ctrl+A, ensuring your valuable information stays secure and exclusive.</p>


<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField2" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField2">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>
		
<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Disable developer tools (F12, CTRL Shift I, Ctrl U): </h3>
<p class="cp_lf"> Thwart unauthorized access to your website's code with a block on developer tools (F12, Ctrl+Shift+I, Ctrl+U), ensuring your intellectual property remains safeguarded.</p>

<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField3" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField3">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>


<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span> Hide content if Javascript is disabled:</h3>
<p class="cp_lf"> Enable the option to hide your content when a user has JavaScript disabled. This might cause SEO issues.</p>

<select name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField10" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField10">
<option value="1" >Yes</option>
<option value="0" selected >No</option>
</select>

<h3 class="cp_spacb"><span id="f9"   class="cp_trial"></span>Redirect when Javascript is disabled:</h3>
<p class="cp_lf"> Automatically redirect users to a specified URL when JavaScript is disabled. This might cause SEO issues. Leave blank to disable.</p>

<input type="text"  class="cp_txtbg"  placeholder="https://" name="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField11" id="<?php echo esc_html($PLUGINMATRIX_NAME);?>InputField11" value="<?php echo isset($val11) ? esc_attr($val11) : ''; ?>">

</div>



<div id="jumped" style="display:inline-block;margin-top:40px;border:1px solid #CCC;border-radius:5px;padding:15px;background-color: #fbffd4;line-height: 2;box-sizing: border-box;">
<strong style="    font-size: 24px;
    font-weight: 700;
    border-bottom: 1px solid;
    width: 100%;
    display: block;"><?php echo esc_html(ucfirst($urlx));?>: Unlock Premium functionalities</strong> <br /><b>Protect your content</b> from copycats! Prevent unauthorized copying, ensuring your valuable content remains secure and protected. 

<div style="width:100%;display:inline-block;margin-top:20px">
<ul class="cp_features">
<li>&#10148; User level protection</li>
<li>&#10148; Site level protection</li>
<li>&#10148; Protection from any hotkeys and clicks</li>
<li>&#10148; View source protection</li>
<li>&#10148; Disabling the Mouse Right Click</li>
<li>&#10148; Native Javascript, without JQuery</li>
<li>&#10148; Image protection</li>
<li>&#10148; SEO Friendly</li>
</ul>
<ul class="cp_features">
<li>&#10148; Mobile Friendly</li>
<li>&#10148; Compatible with Caching plugins</li>
<li>&#10148; Compatible with all WordPress themes and plugins</li>
<li>&#10148; Works with all browsers</li>
<li>&#10148; Works on Desktop, tablet and mobile</li>
<li>&#10148; Display Alert Message</li>
<li>&#10148; Append custom Text to the copied content</li>
<li>&#10148; Compatible with Ads and advertising</li>
</ul>
</div>

<h3>Use this coupon to get <i><b>30% OFF</b></i> (unlimited websites license):</h3>
<span class="cp_coupon">2025BC</span>

<a href="https://www.wpcopydefender.com/offer/?s=wp&u=<?php echo esc_html($urlx); ?>" style="text-decoration: none;font-weight: 700;background-color: #008c06;border-radius: 10px;box-sizing: border-box;color: #FFF;padding: 13px 10px;display: block;font-size:18px;text-align: center;margin: 10px 0 0 0;"  target="blank">VIEW OFFER &gt;</a>
<p align="center"><b>P.S.</b> Upgrade now to use our premium plugin on <?php echo esc_html($urlx); ?> and all your other websites.</p>

</div>


	
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
 // Get all select elements
  var selects = document.querySelectorAll('select');

  // Initialize count
  var noCount = 0;

  // Loop through each select element
  selects.forEach(function(select) {
    // Check if the selected option has a value of 0 (No)
    if (select.value === '1') {
      noCount++;
    }
  });

  // Display the count
  
  var contatoSpan = document.getElementById('contato');
  if (contatoSpan) {
    contatoSpan.textContent = noCount;
  }
  


  // Get the 'risultato' div
  var risultatoDiv = document.getElementById('risultato');

  if (risultatoDiv) {
    // Check the value of 'contato' and update the content inside 'risultato'
    if (noCount > 3) {
      risultatoDiv.innerHTML = '<p style="color:green;font-size:20px;font-weight:700;margin-bottom:0"> <img src="<?php echo esc_html(plugins_url( 'thumb.svg', __FILE__ )); ?>" alt="thumb" class="cp_tmb" /> Your content is ok!</p>';
    } else {
      risultatoDiv.innerHTML = '<p style="color:#de0000;font-size:20px;font-weight:700;margin-bottom:0"> <img src="<?php echo esc_html(plugins_url( 'thumbno.svg', __FILE__ )); ?>" alt="thumb" class="cp_tmb" /> Your content is at risk!</p>';
    }
  }
  
  
  
var premiumDiv = document.getElementById('premium');
    var jumpedDiv = document.getElementById('jumped');

    if (premiumDiv && jumpedDiv) {
        premiumDiv.addEventListener('click', function() {
            jumpedDiv.scrollIntoView({ behavior: 'smooth' });
        });
    }  
  
  
  });
  </script>