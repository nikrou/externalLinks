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

if (!empty($_GET['popup'])) {
    include(dirname(__FILE__) . '/popup_link.php');
} else {
    include(dirname(__FILE__) . '/config.php');
}
