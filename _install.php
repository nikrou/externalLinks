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

$version = dcCore::app()->plugins->moduleInfo('externalLinks', 'version');
if (version_compare(dcCore::app()->getVersion('externalLinks'), $version, '>=')) {
    return;
}

$settings = dcCore::app()->blog->settings;
$settings->addNamespace('externallinks');

$settings->externallinks->put('active', false, 'boolean', 'external Links plugin activation', false);
$settings->externallinks->put('all_links', false, 'boolean', 'Open all links in a new window', false);
$settings->externallinks->put('one_link', false, 'boolean', 'Merge classic and external link?', false);
$settings->externallinks->put('with_icon', true, 'boolean', 'Add icon for external link?', false);
$settings->externallinks->put('new_icon', '', 'string', 'External links user icon', false);

dcCore::app()->setVersion('externalLinks', $version);
return true;
