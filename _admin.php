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
    return;
}

$_menu['Plugins']->addItem(
    __('External links'),
    'plugin.php?p=externalLinks',
    'index.php?pf=externalLinks/img/icon.png',
    preg_match('/plugin.php\?p=externalLinks(&.*)?$/', $_SERVER['REQUEST_URI']),
    $core->auth->check('usage,contentadmin', $core->blog->id)
);

$core->blog->settings->addNamespace('externallinks');
if ($core->blog->settings->externallinks->active && $core->blog->settings->externallinks->all_links === false) {
    $core->addBehavior('adminPostHeaders', ['externalLinksBehaviors', 'jsLoad']);
    $core->addBehavior('adminPageHeaders', ['externalLinksBehaviors', 'jsLoad']);
    $core->addBehavior('adminRelatedHeaders', ['externalLinksBehaviors', 'jsLoad']);
    $core->addBehavior('adminDashboardHeaders', ['externalLinksBehaviors', 'jsLoad']);
}

class externalLinksBehaviors
{
    public static function jsLoad()
    {
        global $core;

        $res = sprintf(
            '<script type="text/javascript" src="%s"></script>',
            html::stripHostURL($core->blog->getQmarkURL() . 'pf=externalLinks/js/post.js')
        );
        return $res;
    }
}
