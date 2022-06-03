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

$version = $core->plugins->moduleInfo('externalLinks', 'version');
if (version_compare($core->getVersion('externalLinks'), $version, '>=')) {
    return;
}

$settings = $core->blog->settings;
$settings->addNamespace('externallinks');

$settings->externallinks->put('active', false, 'boolean', 'external Links plugin activation', false);
$settings->externallinks->put('all_links', false, 'boolean', 'Open all links in a new window', false);
$settings->externallinks->put('checkbox_new_links', false, 'boolean', 'Default status for popup (external or not)', false);
$settings->externallinks->put('one_link', false, 'boolean', 'Merge classic and external link?', false);
$settings->externallinks->put('with_icon', true, 'boolean', 'Add icon for external link?', false);

$core->setVersion('externalLinks', $version);
return true;
