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

Clearbricks::lib()->autoload([
    'ExternalLinksTemplate' => __DIR__ . '/inc/ExternalLinksTemplate.php',
    'ExternalLinksBehaviors' => __DIR__ . '/inc/ExternalLinksBehaviors.php'
]);
