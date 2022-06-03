<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
# Copyright (c) 2008 Olivier Meunier and contributors. All rights
# reserved.
# Copyright(C) 2010-2016 Nicolas Roudaire - http://www.nikrou.net
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
#
# ***** END LICENSE BLOCK *****

class tplExternalLinks
{
  public static function publicFooterContent($core) {
    if (!$core->blog->settings->externallinks->active) {
      return;
    }

    $url = html::stripHostURL($core->blog->getQmarkURL().'pf=externalLinks');

    echo
      '<script type="text/javascript">'."\n".
      "//<![CDATA[\n".
      'var external_links_image = "'.$url.'/img/external.png";'.
      'var external_links_title = "'.__('Open this link in a new window').'";';
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
      "\n//]]>\n".
      "</script>\n";

    if ($core->blog->settings->externallinks->all_links) {
      echo
	'<script type="text/javascript" src="'.$url.'/js/all_links.js"></script>';
    } else {
      echo
	'<script type="text/javascript" src="'.$url.'/js/external.js"></script>';
    }
  }
}
