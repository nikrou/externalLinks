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

$this->registerModule(
    "externalLinks", // Name
    "Opens external links in a new window",	// Description
    "Bruno Hondelatte, Nicolas Roudaire", // Author
    '5.0.0', // Version
    [
        'permissions' => dcCore::app()->auth->makePermissions([dcAuth::PERMISSION_ADMIN]),
        'type' => 'plugin',
        'dc_min' => '2.24',
        'requires' => [['core', '2.24']],
    ]
);
