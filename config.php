<?php
/*
 * This file is part of Phyxo package
 *
 * Copyright(c) Nicolas Roudaire  https://www.nikrou.net/
 * Licensed under the GPL version 2.0 license.
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code.
 */

if (!defined('DC_CONTEXT_ADMIN')) {
    exit;
}

$active = $core->blog->settings->externallinks->active;
$all_links = $core->blog->settings->externallinks->all_links;
$checkbox_new_links = $core->blog->settings->externallinks->checkbox_new_links;
$one_link = $core->blog->settings->externallinks->one_link;
$with_icon = $core->blog->settings->externallinks->with_icon;
$new_icon = $core->blog->settings->externallinks->new_icon;
$new_icon_file = null;

$restore_url = $p_url . '&amp;restore_defaut_icon=1';
$default_tab = 'externallinks_settings';

if (!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if (!empty($_GET['restore_defaut_icon']) && $new_icon) {
    $core->blog->settings->externallinks->put('new_icon', '', 'string');
    $_SESSION['message'] = __('Default icon has been successfully restored');
    http::redirect($p_url);
} elseif (!empty($_POST['saveconfig'])) {
    if (!empty($_FILES['new_icon']['tmp_name'])) {
        try {
            files::uploadStatus($_FILES['new_icon']);
            $new_icon = strtolower(files::tidyFileName($_FILES['new_icon']['name']));
            $core->media = new dcMedia($core);
            $media_id = $core->media->uploadFile(
                $_FILES['new_icon']['tmp_name'],
                $new_icon
            );
            $core->blog->settings->externallinks->put('new_icon', $media_id, 'string');
            $_SESSION['message'] = __('Icon successfully changed');
            http::redirect($p_url);
        } catch (Exception $e) {
            $core->error->add($e->getMessage());
        }
    }

    try {
        $active = (empty($_POST['active']))?false:true;
        $all_links = (empty($_POST['all_links']))?false:true;
        $checkbox_new_links = (empty($_POST['checkbox_new_links']))?false:true;
        $one_link = (empty($_POST['one_link']))?false:true;
        $with_icon = (empty($_POST['with_icon']))?false:true;

        $core->blog->settings->externallinks->put('active', $active, 'boolean');
        $core->blog->settings->externallinks->put('all_links', $all_links, 'boolean');
        $core->blog->settings->externallinks->put('checkbox_new_links', $checkbox_new_links, 'boolean');
        $core->blog->settings->externallinks->put('one_link', $one_link, 'boolean');
        $core->blog->settings->externallinks->put('with_icon', $with_icon, 'boolean');
        $core->blog->triggerBlog();

        $message = __('Configuration updated.');
    } catch (Exception $e) {
        $core->error->add($e->getMessage());
    }
} else {
    if ($new_icon) {
        $core->media = new dcMedia($core);
        $new_icon_file = $core->media->getFile($new_icon)->file_url;
    }
}

include(dirname(__FILE__) . '/tpl/index.tpl');
