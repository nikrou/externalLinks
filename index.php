<?php
/*
 *  -- BEGIN LICENSE BLOCK ----------------------------------
 *
 *  This file is part of externalLinks, a plugin for DotClear2.
 *
 *  Licensed under the GPL version 2.0 license.
 *  See COPYING file or
 *  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 *  -- END LICENSE BLOCK ------------------------------------
 */

$active = dcCore::app()->blog->settings->externallinks->active;
$all_links = dcCore::app()->blog->settings->externallinks->all_links;
$one_link = dcCore::app()->blog->settings->externallinks->one_link;
$with_icon = dcCore::app()->blog->settings->externallinks->with_icon;
$new_icon = dcCore::app()->blog->settings->externallinks->new_icon;
$new_icon_file = null;

$restore_url = dcCore::app()->admin->getPageURL() . '&amp;restore_defaut_icon=1';
$default_tab = 'externallinks_settings';

if (!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if (!empty($_GET['restore_defaut_icon']) && $new_icon) {
    dcCore::app()->blog->settings->externallinks->put('new_icon', '', 'string');
    $_SESSION['message'] = __('Default icon has been successfully restored');
    http::redirect(dcCore::app()->admin->getPageURL());
} elseif (!empty($_POST['saveconfig'])) {
    if (!empty($_FILES['new_icon']['tmp_name'])) {
        try {
            files::uploadStatus($_FILES['new_icon']);
            $new_icon = strtolower(files::tidyFileName($_FILES['new_icon']['name']));
            dcCore::app()->media = new dcMedia();
            $media_id = dcCore::app()->media->uploadFile(
                $_FILES['new_icon']['tmp_name'],
                $new_icon
            );
            dcCore::app()->blog->settings->externallinks->put('new_icon', $media_id, 'string');
            $_SESSION['message'] = __('Icon successfully changed');
            http::redirect(dcCore::app()->admin->getPageURL());
        } catch (Exception $e) {
            dcCore::app()->error->add($e->getMessage());
        }
    }

    try {
        $active = (empty($_POST['active']))?false:true;
        $all_links = (empty($_POST['all_links']))?false:true;
        $one_link = (empty($_POST['one_link']))?false:true;
        $with_icon = (empty($_POST['with_icon']))?false:true;

        dcCore::app()->blog->settings->externallinks->put('active', $active, 'boolean');
        dcCore::app()->blog->settings->externallinks->put('all_links', $all_links, 'boolean');
        dcCore::app()->blog->settings->externallinks->put('one_link', $one_link, 'boolean');
        dcCore::app()->blog->settings->externallinks->put('with_icon', $with_icon, 'boolean');
        dcCore::app()->blog->triggerBlog();

        $message = __('Configuration updated.');
    } catch (Exception $e) {
        dcCore::app()->error->add($e->getMessage());
    }
} else {
    if ($new_icon) {
        dcCore::app()->media = new dcMedia();
        $new_icon_file = dcCore::app()->media->getFile($new_icon)->file_url;
    }
}

include(__DIR__ . '/tpl/index.tpl');
