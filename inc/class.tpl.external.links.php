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

class tplExternalLinks
{
    public static function publicFooterContent($core)
    {
        if (!$core->blog->settings->externallinks->active) {
            return;
        }

        $url = html::stripHostURL($core->blog->getQmarkURL() . 'pf=externalLinks');

        if ($core->blog->settings->externallinks->new_icon) {
            $core->media = new dcMedia($core);
            $icon_url = $core->media->getFile($core->blog->settings->externallinks->new_icon)->file_url;
        } else {
            $icon_url = $url . '/img/external.png';
        }

        echo
      '<script type="text/javascript">' . "\n" .
      "//<![CDATA[\n" .
      'var external_links_image = "' . $icon_url . '";' .
      'var external_links_title = "' . __('Open this link in a new window') . '";';
        if ($core->blog->settings->externallinks->one_link) {
            echo 'var external_one_link = true;';
        } else {
            echo 'var external_one_link = false;';
        }
        if ($core->blog->settings->externallinks->with_icon) {
            echo 'var external_with_icon = true;';
        } else {
            echo 'var external_with_icon = false;';
        }
        echo
      "</script>\n";

        if ($core->blog->settings->externallinks->all_links) {
            echo
	'<script type="text/javascript" src="' . $url . '/js/all_links.js"></script>';
        } else {
            echo
	'<script type="text/javascript" src="' . $url . '/js/external.js"></script>';
        }
    }
}
