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

class ExternalLinksTemplate
{
    public static function publicFooterContent()
    {
        if (!dcCore::app()->blog->settings->externallinks->active) {
            return;
        }

        $url = html::stripHostURL(dcCore::app()->blog->getQmarkURL() . 'pf=externalLinks');

        if (dcCore::app()->blog->settings->externallinks->new_icon) {
            dcCore::app()->media = new dcMedia();
            $icon_url = dcCore::app()->media->getFile(dcCore::app()->blog->settings->externallinks->new_icon)->file_url;
        } else {
            $icon_url = $url . '/img/external.png';
        }

        echo
      '<script type="text/javascript">' . "\n" .
      "//<![CDATA[\n" .
      'var external_links_image = "' . $icon_url . '";' .
      'var external_links_title = "' . __('Open this link in a new window') . '";';
        if (dcCore::app()->blog->settings->externallinks->one_link) {
            echo 'var external_one_link = true;';
        } else {
            echo 'var external_one_link = false;';
        }
        if (dcCore::app()->blog->settings->externallinks->with_icon) {
            echo 'var external_with_icon = true;';
        } else {
            echo 'var external_with_icon = false;';
        }
        echo
      "</script>\n";

        if (dcCore::app()->blog->settings->externallinks->all_links) {
            echo '<script src="' . $url . '/js/all_links.js"></script>';
        } else {
            echo '<script src="' . $url . '/js/external.js"></script>';
        }
    }
}
