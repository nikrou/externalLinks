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

$href = !empty($_GET['href']) ? $_GET['href'] : '';
$hreflang = !empty($_GET['hreflang']) ? $_GET['hreflang'] : '';

if (empty($href) && empty($hreflang)) {
    if ($core->blog->settings->externallinks->checkbox_new_links) {
        $external = 1;
    } else {
        $external = 0;
    }
} else {
    if (!empty($_GET['external'])) {
        $external = $_GET['external'];
    } else {
        $external = 0;
    }
}

// Languages combo
$rs = $core->blog->getLangs(['order' => 'asc']);
$all_langs = l10n::getISOcodes(0, 1);
$lang_combo = ['' => '', __('Most used') => [], __('Available') => l10n::getISOcodes(1, 1)];
while ($rs->fetch()) {
    if (isset($all_langs[$rs->post_lang])) {
        $lang_combo[__('Most used')][$all_langs[$rs->post_lang]] = $rs->post_lang;
        unset($lang_combo[__('Available')][$all_langs[$rs->post_lang]]);
    } else {
        $lang_combo[__('Most used')][$rs->post_lang] = $rs->post_lang;
    }
}
unset($all_langs, $rs);


include(dirname(__FILE__) . '/tpl/popup.tpl');
