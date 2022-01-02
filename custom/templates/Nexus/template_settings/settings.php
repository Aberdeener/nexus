<?php
/*
 *	Made by Samerton
 *  https://github.com/NamelessMC/Nameless/
 *  NamelessMC version 2.0.0-pr9
 *
 *  License: MIT
 *
 *  Nexus template settings
 */

require_once('classes/NexusUtill.php');
NexusUtill::isInstalled();

if(Input::exists()){
	if(Token::check()){
		$cache->setCache('template_settings');

		if(isset($_POST['darkMode'])){
			$cache->store('darkMode', $_POST['darkMode']);
		}

		if(isset($_POST['navbarColour'])){
			$cache->store('navbarColour', $_POST['navbarColour']);
		}

		if(isset($_POST['about'])){
			$cache->store('about', $_POST['about']);
		}

		Session::flash('admin_templates', $language->get('admin', 'successfully_updated'));

	} else
		$errors = array($language->get('general', 'invalid_token'));
}

$template_file = 'tpl/nexus.tpl';


// Get values
$cache->setCache('template_settings');
if($cache->isCached('darkMode')){
    $darkMode = $cache->retrieve('darkMode');
} else {
    $darkMode = '0';
	$cache->store('darkMode', $darkMode);
}

if($cache->isCached('about')){
    $about = $cache->retrieve('about');
} else {
    $about = '0';
	$cache->store('about', $about);
}

if($cache->isCached('navbarColour')){
	$navbarColour = $cache->retrieve('navbarColour');
} else {
    $navbarColour = 'white';
	$cache->store('navbarColour', $navbarColour);
}

$nav_colours = array(
	0 => array(
		'value' => 'white',
		'name' => 'Default',
		'selected' => ($navbarColour == 'white')
	),
	1 => array(
		'value' => 'red',
		'name' => 'Red',
		'selected' => ($navbarColour == 'red')
	),
	2 => array(
		'value' => 'orange',
		'name' => 'Orange',
		'selected' => ($navbarColour == 'orange')
	),
	3 => array(
		'value' => 'yellow',
		'name' => 'Yellow',
		'selected' => ($navbarColour == 'yellow')
	),
	4 => array(
		'value' => 'olive',
		'name' => 'Olive',
		'selected' => ($navbarColour == 'olive')
	),
	5 => array(
		'value' => 'green',
		'name' => 'Green',
		'selected' => ($navbarColour == 'green')
	),
	6 => array(
		'value' => 'teal',
		'name' => 'Teal',
		'selected' => ($navbarColour == 'teal')
	),
	7 => array(
		'value' => 'blue',
		'name' => 'Blue',
		'selected' => ($navbarColour == 'blue')
	),
	8 => array(
		'value' => 'violet',
		'name' => 'Violet',
		'selected' => ($navbarColour == 'violet')
	),
	9 => array(
		'value' => 'purple',
		'name' => 'Purple',
		'selected' => ($navbarColour == 'purple')
	),
	10 => array(
		'value' => 'pink',
		'name' => 'Pink',
		'selected' => ($navbarColour == 'pink')
	),
	11 => array(
		'value' => 'brown',
		'name' => 'Brown',
		'selected' => ($navbarColour == 'brown')
	),
	12 => array(
		'value' => 'grey',
		'name' => 'Grey',
		'selected' => ($navbarColour == 'grey')
	),
);

$smarty->assign(array(
	  // NamelessMC 
	  'SUBMIT' => $language->get('general', 'submit'),
	  'YES' => $language->get('general', 'yes'),
	  'NO' => $language->get('general', 'no'),
	  'BACK' => $language->get('general', 'back'),
	  'ARE_YOU_SURE' => $language->get('general', 'are_you_sure'),
	  'CONFIRM_DELETE' => $language->get('general', 'confirm_delete'),
	  'NAME' => $language->get('admin', 'name'),
	  'DESCRIPTION' => $language->get('admin', 'description'),
	  'ENABLED' => $language->get('admin', 'enabled'),
	  'DISABLED' => $language->get('admin', 'disabled'),
  
	// Nexus About
	  'TITLE' => NexusUtill::getLanguage('general', 'title'),
  
	// Navigation
	  'NAVIGATION' => NexusUtill::getLanguage('navigation', 'navigation'),
	  'OPTIONS_PAGE' => NexusUtill::getLanguage('navigation', 'options_page'),
	  'COLORS_PAGE' => NexusUtill::getLanguage('navigation', 'colors_page'),
	  'NAVBAR_PAGE' => NexusUtill::getLanguage('navigation', 'navbar_page'),
	  'CONNECTIONS_PAGE' => NexusUtill::getLanguage('navigation', 'connections_page'),
	  'ADVANCED_PAGE' => NexusUtill::getLanguage('navigation', 'advanced_page'),
	  'ARC_PAGE' => NexusUtill::getLanguage('navigation', 'arc_page'),
	  'WIDGETS_PAGE' => NexusUtill::getLanguage('navigation', 'widgets_page'),
	  'EMBED_PAGE' => NexusUtill::getLanguage('navigation', 'embed_page'),
	  'UPDATES_PAGE' => NexusUtill::getLanguage('navigation', 'updates_page'),
	  'SUPPORT_PAGE' => NexusUtill::getLanguage('navigation', 'support_page'),
  
	// Options
	  'FAVICON_LABEL' => NexusUtill::getLanguage('options', 'favicon_label'),
	  'ABOUT_LABEL' => NexusUtill::getLanguage('options', 'about_label'),
	  'ABOUT_PLACEHOLDER_LABEL' => NexusUtill::getLanguage('options', 'about_placeholder_label'),
  
	// Colors
	  'DARKMODE_LABEL' => NexusUtill::getLanguage('colors', 'darkmode_label'),
	  'TEMPLATE_COLOR_LABEL' => NexusUtill::getLanguage('colors', 'template_color_label'),
	  'NAVBAR_COLOR_LABEL' => NexusUtill::getLanguage('colors', 'navbar_color_label'),
	  'FOOTER_COLOR_LABEL' => NexusUtill::getLanguage('colors', 'footer_color_label'),
	  'BORDER_COLOR_LABEL' => NexusUtill::getLanguage('colors', 'border_color_label'),
	  'COLORS_INFO_LABEL' => NexusUtill::getLanguage('colors', 'colors_info_label'),
	  'NAVBAR_TEXT_LABEL' => NexusUtill::getLanguage('colors', 'navbar_text_label'),
  
	// Navbar
	  'LOGO_LABEL' => NexusUtill::getLanguage('navbar', 'logo_label'),
	  'NAVIGATION_MENU_LABEL' => NexusUtill::getLanguage('navbar', 'navigation_menu_label'),
	  'NAVIGATION_STYLE_LABEL' => NexusUtill::getLanguage('navbar', 'navigation_style_label'),
	  'NAV_TRUE_LABEL' => NexusUtill::getLanguage('navbar', 'nav_true_label'),
	  'NAV_FALSE_LABEL' => NexusUtill::getLanguage('navbar', 'nav_false_label'),
	  'DYNAMIC_LABEL' => NexusUtill::getLanguage('navbar', 'dynamic_label'),
	  'ELEGANT_LABEL' => NexusUtill::getLanguage('navbar', 'elegant_label'),
  
	// Connections
	  'SERVER_DOMAIN_LABEL' => NexusUtill::getLanguage('connections', 'server_domain_label'),
	  'IP_ADDRESS_LABEL' => NexusUtill::getLanguage('connections', 'ip_address_label'),
	  'SERVER_PORT_LABEL' => NexusUtill::getLanguage('connections', 'server_port_label'),
	  'STYLE_LABEL' => NexusUtill::getLanguage('connections', 'style_label'),
	  'SIMPLE_LABEL' => NexusUtill::getLanguage('connections', 'simple_label'),
	  'ADVANCED_LABEL' => NexusUtill::getLanguage('connections', 'advanced_label'),
	  'DISCORD_LABEL' => NexusUtill::getLanguage('connections', 'discord_label'),
	  'DISCORD_ID_LABEL' => NexusUtill::getLanguage('connections', 'discord_id_label'),
	  'ENABLE_DISCORD_LABEL' => NexusUtill::getLanguage('connections', 'enable_discord_label'),
	  'ENABLE_MINECRAFT_LABEL' => NexusUtill::getLanguage('connections', 'enable_minecraft_label'),
  
	// Advanced
	  'ADV_WARNING' => NexusUtill::getLanguage('advanced', 'adv_warning'),
	  'ADV_NAV_LABEL' => NexusUtill::getLanguage('advanced', 'adv_nav_label'),
	  'ADV_CONTAINER_LABEL' => NexusUtill::getLanguage('advanced', 'adv_container_label'),
	  'ADV_MARGIN_TOP_LABEL' => NexusUtill::getLanguage('advanced', 'adv_margin_top_label'),
	  'ADV_MARGIN_BOTTOM_LABEL' => NexusUtill::getLanguage('advanced', 'adv_margin_bottom_label'),
	  'ADV_NAV_SIZE_LABEL' => NexusUtill::getLanguage('advanced', 'adv_nav_size_label'),
	  'MINI_LABEL' => NexusUtill::getLanguage('advanced', 'mini_label'),
	  'TINY_LABEL' => NexusUtill::getLanguage('advanced', 'tiny_label'),
	  'SMALL_LABEL' => NexusUtill::getLanguage('advanced', 'small_label'),
	  'LARGE_LABEL' => NexusUtill::getLanguage('advanced', 'large_label'),
	  'HUGE_LABEL' => NexusUtill::getLanguage('advanced', 'huge_label'),
	  'MASSIVE_LABEL' => NexusUtill::getLanguage('advanced', 'massive_label'),
  
	// Arc
	  'ARC_LABEL' => NexusUtill::getLanguage('arc', 'arc_label'),
	  'ARC_URL_LABEL' => NexusUtill::getLanguage('arc', 'arc_url_label'),
	  'ARC_INFO_1' => NexusUtill::getLanguage('arc', 'arc_info_1'),
	  'ARC_INFO_2' => NexusUtill::getLanguage('arc', 'arc_info_2'),
	  'ARC_INFO_3' => NexusUtill::getLanguage('arc', 'arc_info_3'),
	  'ARC_INFO_4' => NexusUtill::getLanguage('arc', 'arc_info_4'),
	  'ARC_INFO_5' => NexusUtill::getLanguage('arc', 'arc_info_5'),
  
	// Widgets
	  // Donation Widget
		'DONATE_WIDGET_LABEL' => NexusUtill::getLanguage('widgets', 'donate_widget_label'),
		'DONATE_EMAIL_LABEL' => NexusUtill::getLanguage('widgets', 'donate_email_label'),
		'FIRST_AMOUNT_LABEL' => NexusUtill::getLanguage('widgets', 'first_amount_label'),
		'SECOND_AMOUNT_LABEL' => NexusUtill::getLanguage('widgets', 'second_amount_label'),
		'THIRD_AMOUNT_LABEL' => NexusUtill::getLanguage('widgets', 'third_amount_label'),
  
	  // Message Widget
		'MESSAGE_WIDGET_LABEL' => NexusUtill::getLanguage('widgets', 'message_widget_label'),
		'MESSAGE_TITLE_LABEL' => NexusUtill::getLanguage('widgets', 'message_title_label'),
		'MESSAGE_TEXT_LABEL' => NexusUtill::getLanguage('widgets', 'message_text_label'),
		'MESSAGE_ICON_LABEL' => NexusUtill::getLanguage('widgets', 'message_icon_label'),
  
	// Embed
	  'EMBED_HEAD_LABEL' => NexusUtill::getLanguage('embed', 'embed_head_label'),
	  'EMBED_DESC_LABEL' => NexusUtill::getLanguage('embed', 'embed_desc_label'),
	  'EMBED_COLOR_LABEL' => NexusUtill::getLanguage('embed', 'embed_color_label'),
	  'EMBED_IMAGE_LABEL' => NexusUtill::getLanguage('embed', 'embed_image_label'),
	  'EMBED_KEYWORDS_LABEL' => NexusUtill::getLanguage('embed', 'embed_keywords_label'),
	  'EMBED_IMAGE_INFO_LABEL' => NexusUtill::getLanguage('embed', 'embed_image_info_label'),
	  'EMBED_KEYWORDS_INFO_LABEL' => NexusUtill::getLanguage('embed', 'embed_keywords_info_label'),
	  'EMBED_PREVIEW_LABEL' => NexusUtill::getLanguage('embed', 'embed_preview_label'),
  
	// Other
	  'TRUE_LABEL' => NexusUtill::getLanguage('general', 'true_label'),
	  'FALSE_LABEL' => NexusUtill::getLanguage('general', 'false_label'),
	  'INFO_BOX_LABEL' => NexusUtill::getLanguage('general', 'info_box_label'),

	'DARK_MODE_VALUE' => $darkMode,
	'ABOUT_VALUE' => $about,
	'NAVBAR_COLOURS' => $nav_colours,
	'TPL_PATH' => ROOT_PATH . '/custom/templates/Nexus/template_settings/tpl/',
	'SETTINGS_TEMPLATE' => ROOT_PATH . '/custom/templates/Nexus/template_settings/' . $template_file,
));
