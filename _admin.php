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

if (!defined('DC_CONTEXT_ADMIN')) { return; }

$_menu['Plugins']->addItem(__('External links'),
                           'plugin.php?p=externalLinks',
                           'index.php?pf=externalLinks/img/icon.png',
                           preg_match('/plugin.php\?p=externalLinks(&.*)?$/', $_SERVER['REQUEST_URI']),
                           $core->auth->check('usage,contentadmin', $core->blog->id)
);

$core->blog->settings->addNamespace('externallinks');
if ($core->blog->settings->externallinks->active && $core->blog->settings->externallinks->all_links===false) {
    $core->addBehavior('adminPostHeaders', array('externalLinksBehaviors', 'jsLoad'));
    $core->addBehavior('adminPageHeaders', array('externalLinksBehaviors', 'jsLoad'));
    $core->addBehavior('adminRelatedHeaders', array('externalLinksBehaviors', 'jsLoad'));
    $core->addBehavior('adminDashboardHeaders',array('externalLinksBehaviors','jsLoad'));
}

class externalLinksBehaviors
{
    public static function jsLoad() {
        global $core;

        $res = sprintf('<script type="text/javascript" src="%s"></script>',
                       html::stripHostURL($core->blog->getQmarkURL().'pf=externalLinks/js/post.js')
        );
        return $res;
    }
}
