<?php
/*
 *	Made by Samerton
 *  https://github.com/NamelessMC/Nameless/tree/v2/
 *  NamelessMC version 2.0.0-pr12
 *
 *  License: MIT
 *
 *  Nexus By Mubeen & xGIGABAITx
 */

$page_title = NexusUtil::getLanguage('general', 'title');

if ($user->isLoggedIn()) {
  if ($user->canViewStaffCP) {

    Redirect::to(URL::build('/'));
    die();
  }
  if (!$user->isAdmLoggedIn()) {

    Redirect::to(URL::build('/panel/auth'));
    die();
  } else {
    if (!$user->hasPermission('admincp.nexus')) {
      require_once(ROOT_PATH . '/403.php');
      die();
    }
  }
} else {
  // Not logged in
  Redirect::to(URL::build('/login'));
  die();
}

define('PAGE', 'panel');
define('PARENT_PAGE', 'nexus_items');

require_once(ROOT_PATH . '/core/templates/backend_init.php');


$smarty->assign(array(
  // NamelessMC
    'SUBMIT' => $language->get('general', 'submit'),
    'YES' => $language->get('general', 'yes'),
    'NO' => $language->get('general', 'no'),
    'BACK' => $language->get('general', 'back'),
    'BACK_LINK' => URL::build('/panel/nexus'),
    'ARE_YOU_SURE' => $language->get('general', 'are_you_sure'),
    'CONFIRM_DELETE' => $language->get('general', 'confirm_delete'),
    'NAME' => $language->get('admin', 'name'),
    'DESCRIPTION' => $language->get('admin', 'description'),
    'INFO' => $language->get('general', 'info'),

  // Nexus About
    'TITLE' => NexusUtil::getLanguage('general', 'title'),

  // Navigation
    'NAVIGATION' => NexusUtil::getLanguage('navigation', 'navigation'),
    'OPTIONS_PAGE' => NexusUtil::getLanguage('navigation', 'options_page'),
    'COLORS_PAGE' => NexusUtil::getLanguage('navigation', 'colors_page'),
    'NAVBAR_PAGE' => NexusUtil::getLanguage('navigation', 'navbar_page'),
    'CONNECTIONS_PAGE' => NexusUtil::getLanguage('navigation', 'connections_page'),
    'ADVANCED_PAGE' => NexusUtil::getLanguage('navigation', 'advanced_page'),
    'ARC_PAGE' => NexusUtil::getLanguage('navigation', 'arc_page'),
    'WIDGETS_PAGE' => NexusUtil::getLanguage('navigation', 'widgets_page'),
    'EMBED_PAGE' => NexusUtil::getLanguage('navigation', 'embed_page'),
    'UPDATES_PAGE' => NexusUtil::getLanguage('navigation', 'updates_page'),
    'SUPPORT_PAGE' => NexusUtil::getLanguage('navigation', 'support_page'),

  // Options
    'NOTE' => NexusUtil::getLanguage('options', 'note'),
    'NOTE_REVIEW' => NexusUtil::getLanguage('options', 'note_review'),
    'FAVICON_LABEL' => NexusUtil::getLanguage('options', 'favicon_label'),
    'ABOUT_LABEL' => NexusUtil::getLanguage('options', 'about_label'),
    'ABOUT_PLACEHOLDER_LABEL' => NexusUtil::getLanguage('options', 'about_placeholder_label'),

  // Colors
    'DARKMODE_LABEL' => NexusUtil::getLanguage('colors', 'darkmode_label'),
    'TEMPLATE_COLOR_LABEL' => NexusUtil::getLanguage('colors', 'template_color_label'),
    'NAVBAR_COLOR_LABEL' => NexusUtil::getLanguage('colors', 'navbar_color_label'),
    'FOOTER_COLOR_LABEL' => NexusUtil::getLanguage('colors', 'footer_color_label'),
    'BORDER_COLOR_LABEL' => NexusUtil::getLanguage('colors', 'border_color_label'),
    'COLORS_INFO_LABEL' => NexusUtil::getLanguage('colors', 'colors_info_label'),
    'NAVBAR_TEXT_LABEL' => NexusUtil::getLanguage('colors', 'navbar_text_label'),
    'BLACK_LABEL' => NexusUtil::getLanguage('colors', 'black_label'),
    'WHITE_LABEL' => NexusUtil::getLanguage('colors', 'white_label'),

  // Navbar
    'LOGO_LABEL' => NexusUtil::getLanguage('navbar', 'logo_label'),
    'NAVIGATION_MENU_LABEL' => NexusUtil::getLanguage('navbar', 'navigation_menu_label'),
    'NAVIGATION_MENU_INFO_LABEL' => NexusUtil::getLanguage('navbar', 'navigation_menu_info_label'),
    'NAVIGATION_STYLE_LABEL' => NexusUtil::getLanguage('navbar', 'navigation_style_label'),
    'NAV_TRUE_LABEL' => NexusUtil::getLanguage('navbar', 'nav_true_label'),
    'NAV_FALSE_LABEL' => NexusUtil::getLanguage('navbar', 'nav_false_label'),
    'DYNAMIC_LABEL' => NexusUtil::getLanguage('navbar', 'dynamic_label'),
    'ELEGANT_LABEL' => NexusUtil::getLanguage('navbar', 'elegant_label'),

  // Connections
    'SERVER_DOMAIN_LABEL' => NexusUtil::getLanguage('connections', 'server_domain_label'),
    'IP_ADDRESS_LABEL' => NexusUtil::getLanguage('connections', 'ip_address_label'),
    'SERVER_PORT_LABEL' => NexusUtil::getLanguage('connections', 'server_port_label'),
    'STYLE_LABEL' => NexusUtil::getLanguage('connections', 'style_label'),
    'SIMPLE_LABEL' => NexusUtil::getLanguage('connections', 'simple_label'),
    'ADVANCED_LABEL' => NexusUtil::getLanguage('connections', 'advanced_label'),
    'DISCORD_LABEL' => NexusUtil::getLanguage('connections', 'discord_label'),
    'DISCORD_ID_LABEL' => NexusUtil::getLanguage('connections', 'discord_id_label'),
    'ENABLE_DISCORD_LABEL' => NexusUtil::getLanguage('connections', 'enable_discord_label'),
    'ENABLE_MINECRAFT_LABEL' => NexusUtil::getLanguage('connections', 'enable_minecraft_label'),

  // Advanced
    'ADV_WARNING' => NexusUtil::getLanguage('advanced', 'adv_warning'),
    'ADV_NAV_LABEL' => NexusUtil::getLanguage('advanced', 'adv_nav_label'),
    'ADV_CONTAINER_LABEL' => NexusUtil::getLanguage('advanced', 'adv_container_label'),
    'ADV_MARGIN_TOP_LABEL' => NexusUtil::getLanguage('advanced', 'adv_margin_top_label'),
    'ADV_MARGIN_BOTTOM_LABEL' => NexusUtil::getLanguage('advanced', 'adv_margin_bottom_label'),
    'ADV_NAV_SIZE_LABEL' => NexusUtil::getLanguage('advanced', 'adv_nav_size_label'),
    'MINI_LABEL' => NexusUtil::getLanguage('advanced', 'mini_label'),
    'TINY_LABEL' => NexusUtil::getLanguage('advanced', 'tiny_label'),
    'SMALL_LABEL' => NexusUtil::getLanguage('advanced', 'small_label'),
    'LARGE_LABEL' => NexusUtil::getLanguage('advanced', 'large_label'),
    'HUGE_LABEL' => NexusUtil::getLanguage('advanced', 'huge_label'),
    'MASSIVE_LABEL' => NexusUtil::getLanguage('advanced', 'massive_label'),

  // Arc
    'ARC_LABEL' => NexusUtil::getLanguage('arc', 'arc_label'),
    'ARC_URL_LABEL' => NexusUtil::getLanguage('arc', 'arc_url_label'),
    'ARC_INFO_1' => NexusUtil::getLanguage('arc', 'arc_info_1'),
    'ARC_INFO_2' => NexusUtil::getLanguage('arc', 'arc_info_2'),
    'ARC_INFO_3' => NexusUtil::getLanguage('arc', 'arc_info_3'),
    'ARC_INFO_4' => NexusUtil::getLanguage('arc', 'arc_info_4'),
    'ARC_INFO_5' => NexusUtil::getLanguage('arc', 'arc_info_5'),

  // Widgets
    // Donation Widget
      'DONATE_WIDGET_LABEL' => NexusUtil::getLanguage('widgets', 'donate_widget_label'),
      'DONATE_EMAIL_LABEL' => NexusUtil::getLanguage('widgets', 'donate_email_label'),
      'FIRST_AMOUNT_LABEL' => NexusUtil::getLanguage('widgets', 'first_amount_label'),
      'SECOND_AMOUNT_LABEL' => NexusUtil::getLanguage('widgets', 'second_amount_label'),
      'THIRD_AMOUNT_LABEL' => NexusUtil::getLanguage('widgets', 'third_amount_label'),

    // Message Widget
      'MESSAGE_WIDGET_LABEL' => NexusUtil::getLanguage('widgets', 'message_widget_label'),
      'MESSAGE_TITLE_LABEL' => NexusUtil::getLanguage('widgets', 'message_title_label'),
      'MESSAGE_TEXT_LABEL' => NexusUtil::getLanguage('widgets', 'message_text_label'),
      'MESSAGE_ICON_LABEL' => NexusUtil::getLanguage('widgets', 'message_icon_label'),

  // Embed
    'EMBED_HEAD_LABEL' => NexusUtil::getLanguage('embed', 'embed_head_label'),
    'EMBED_DESC_LABEL' => NexusUtil::getLanguage('embed', 'embed_desc_label'),
    'EMBED_COLOR_LABEL' => NexusUtil::getLanguage('embed', 'embed_color_label'),
    'EMBED_IMAGE_LABEL' => NexusUtil::getLanguage('embed', 'embed_image_label'),
    'EMBED_KEYWORDS_LABEL' => NexusUtil::getLanguage('embed', 'embed_keywords_label'),
    'EMBED_IMAGE_INFO_LABEL' => NexusUtil::getLanguage('embed', 'embed_image_info_label'),
    'EMBED_KEYWORDS_INFO_LABEL' => NexusUtil::getLanguage('embed', 'embed_keywords_info_label'),
    'EMBED_PREVIEW_LABEL' => NexusUtil::getLanguage('embed', 'embed_preview_label'),

  // Other
    'TRUE_LABEL' => NexusUtil::getLanguage('general', 'true_label'),
    'FALSE_LABEL' => NexusUtil::getLanguage('general', 'false_label'),
));


$smarty->assign(NexusUtil::getSettingsToSmarty());

if (!isset($_POST['sel_btn'])) {
  if (Input::exists()) {
    $errors = array();


    if (Token::check(Input::get('token'))) {

      Session::flash('select_btn', $_POST['sel_btn']);

      if (count($_FILES)) {

        require(ROOT_PATH . '/core/includes/bulletproof/bulletproof.php');

        $module_img_dir = join(DIRECTORY_SEPARATOR, array(ROOT_PATH, 'uploads', 'Nexus'));

        if (!file_exists($module_img_dir)) {
          mkdir($module_img_dir);
        }

        foreach ($_FILES as $key => $value) {

          $image = new Bulletproof\Image($_FILES);

          $image_extensions = array('jpg', 'png', 'gif', 'jpeg');
          $image->setSize(1000, 10 * 1048576);
          $image->setDimension(2000, 2000);
          $image->setMime($image_extensions);
          $image->setName($key);

          $image->setLocation(join(DIRECTORY_SEPARATOR, array(ROOT_PATH, 'uploads', 'Nexus')));

          if ($image[$key]) {
            $upload = $image->upload();
            if ($upload) {

              $img_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/uploads/Nexus/' . $upload->getName() . '.' . $upload->getMime();

              try {
                $queries->update('nexus_settings', $settings_data_array[$key]['id'], array(
                  'value' => $img_url
                ));
              } catch (Exception $e) {
                $queries->create('nexus_settings',  array(
                  'name' => $key,
                  'value' => $img_url
                ));
              }

              Session::flash('staff', NexusUtil::getLanguage('general', 'save_successfully'));
              Redirect::to(URL::build('/panel/nexus/'));
              die();
            }
          } else {
            $errors = NexusUtil::getLanguage('options', 'img_empty_and_size') . ini_get('upload_max_filesize');
          }
        }
      } else {

        foreach ($_POST as $key => $value) {

          if ($key == 'token') {
            continue;
          }

          $validate = new Validate();
          $validation = $validate->check($_POST, array(
            'token' => array(
              'required' => true
            )
          ));

          if ($validation->passed()) {
            try {
              try {
                $queries->update('nexus_settings', $settings_data_array[$key]['id'], array(
                  'value' => Input::get($key)
                ));
              } catch (Exception $e) {
                $queries->create('nexus_settings',  array(
                  'name' => $key,
                  'value' => Input::get($key)
                ));
              }
            } catch (Exception $e) {
              $errors[] = $e->getMessage();
            }
          } else {
            $errors[] = NexusUtil::getLanguage('general', 'save_errors');
          }
        }
        Session::flash('select_btn', $_POST['sel_btn_session']);
        if (!count($errors)) {
          Session::flash('staff', NexusUtil::getLanguage('general', 'save_successfully'));
          Redirect::to(URL::build('/panel/nexus/'));
          die();
        }
      }
    } else {
      $errors[] = $language->get('general', 'invalid_token');
    }
  }
}

$template_file = 'nexus/nexus.tpl';

// Load modules + template
Module::loadPage($user, $pages, $cache, $smarty, array($navigation, $cc_nav, $mod_nav), $widgets, $template);
$page_load = microtime(true) - $start;
define('PAGE_LOAD_TIME', str_replace('{x}', round($page_load, 3), $language->get('general', 'page_loaded_in')));
$template->onPageLoad();

if (Session::exists('select_btn')) {
  $smarty->assign(array(
    'TPL_NAME_SESSION' =>  Session::flash('select_btn')
  ));
}

if (Session::exists('staff'))
  $success = Session::flash('staff');

if (isset($success))
  $smarty->assign(array(
    'SUCCESS' => $success,
    'SUCCESS_TITLE' => $language->get('general', 'success')
  ));

if (isset($errors) && count($errors))
  $smarty->assign(array(
    'ERRORS' => $errors,
    'ERRORS_TITLE' => $language->get('general', 'error')
  ));

$smarty->assign(array(
  'TOKEN' => Token::get(),
  'PAGE' => PANEL_PAGE,
  'PARENT_PAGE' => PARENT_PAGE
));

require(ROOT_PATH . '/core/templates/panel_navbar.php');

$template->displayTemplate($template_file, $smarty);
