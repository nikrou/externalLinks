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

dcCore::app()->blog->settings->addNamespace('externallinks');

dcCore::app()->menu[dcAdmin::MENU_PLUGINS]->addItem(
    __('External links'),
    'plugin.php?p=externalLinks',
    'index.php?pf=externalLinks/img/icon.png',
    preg_match('/plugin.php\?p=externalLinks(&.*)?$/', $_SERVER['REQUEST_URI']),
    dcCore::app()->auth->check(dcCore::app()->auth->makePermissions([dcAuth::PERMISSION_USAGE, dcAuth::PERMISSION_CONTENT_ADMIN]), dcCore::app()->blog->id)
);
