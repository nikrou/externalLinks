<html>
  <head>
    <title><?php echo __('External links'); ?></title>
    <?php echo dcPage::jsLoad('index.php?pf=externalLinks/js/admin.js');?>
    <?php echo dcPage::jsPageTabs($default_tab); ?>
  </head>
  <body>
    <h2><?php echo html::escapeHTML($core->blog->name); ?> &gt; <?php echo __('External links'); ?></h2>
    <?php if (!empty($message)):?>
    <p class="message"><?php echo $message;?></p>
    <?php endif;?>

    <div class="multi-part" id="externallinks_settings" title="<?php echo __('Settings'); ?>">
      <form action="<?php echo $p_url;?>" method="post" enctype="multipart/form-data">
	<div class="fieldset">
	  <h3><?php echo __('Plugin activation'); ?></h3>
	  <p>
	    <label class="classic">
	      <?php echo __('Enable External links plugin');?>&nbsp;
	      <?php echo form::checkbox('active', 1, $active); ?>

	    </label>
	  </p>
	</div>
	<?php if ($active):?>
	<div class="fieldset">
	  <h3><?php echo __('Advanced configuration'); ?></h3>
	  <p>
	    <label class="classic">
	      <?php echo __('Open all external links in a new window');?>
	      <?php echo form::checkbox('all_links', 1, $all_links);?>
	    </label>
	  </p>
	  <p id="new-link-option">
	    <label class="classic">
	      <?php echo __('Open new links in a new window (default popup option)');?>
	      <?php echo form::checkbox('checkbox_new_links', 1, $checkbox_new_links);?>
	    </label>
	  </p>
	  <p>
	    <label class="classic">
	      <?php echo __('Merge links (classic one and new window one)');?>
	      <?php echo form::checkbox('one_link', 1, $one_link);?>
	    </label>
	  </p>
	  <p>
	    <label class="classic">
	      <?php echo __('Add icon for external links?');?>
	      <?php echo form::checkbox('with_icon', 1, $with_icon);?>
	    </label>
	    (
	    <?php if ($new_icon_file):?>
	    <?php echo __('new icon');?> :
	    <?php echo '<img src="'.$new_icon_file.'" alt="" style="margin: 0 3px; vertical-align: middle;"/>';?>
	    <a href="<?php echo $restore_url;?>" title="<?php echo __('Restore default icon');?>"><img src="images/trash.png" alt="remove"/></a>
	    <?php else:?>
	    <?php echo __('default icon');?> :
	    <?php echo '<img src="index.php?pf=externalLinks/img/external.png" alt="" style="margin: 0 3px; vertical-align: middle;"/>';?>
	    <?php endif;?>
	    )
	  </p>
	  <p>
	    <?php echo form::hidden(['MAX_FILE_SIZE'], DC_MAX_UPLOAD_SIZE);?>
	    <label class="classic" title="<?php echo __('New icon');?>"><?php echo __('Change icon :');?>
	      <input type="file" name="new_icon"/>
	    </label>
	  </p>
	</div>
	<?php endif;?>
	<p>
	  <?php echo form::hidden('p', 'externalLinks');?>
	  <?php echo $core->formNonce();?>
	  <input type="submit" name="saveconfig" value="<?php echo __('Save configuration'); ?>" />
	</p>
      </form>
    </div>
    <div class="multi-part" id="externallinks_about" title="<?php echo __('About'); ?>">
      <p>
	<?php echo __('If you want more informations on that plugin or have new ideas to develope it, or want to submit a bug or need help (to install or configure it) or for anything else ...');?></p>
      <ul>
	<li>
	  <?php printf(__('Go to %sthe dedicated page%s in'),
		'<a hreflang="fr" href="http://forum.dotclear.net/viewtopic.php?id=43711">',
		'</a>');?>
	  <a hreflang="fr" href="http://forum.dotclear.net/">forum de dotclear</a>
	</li>
	<li>
	  <?php printf(__('Go to %sthe dedicated page%s in'),
		'<a hreflang="fr" href="https://www.nikrou.net/pages/externalLinks">',
		'</a>');?>
	  <a hreflang="fr" href="https://www.nikrou.net/">journal de nikrou</a>
	</li>
      </ul>
      <p>
	<?php echo __('Made by:');?>
	<a href="http://www.morefnu.org/contact">Bruno Hondelatte</a> (Dsls)
      </p>
      <p>
	<?php echo __('Contributor:');?>
	<a href="https://www.nikrou.net/contact">Nicolas Roudaire</a> (nikrou)
      </p>
    </div>
    <?php dcPage::helpBlock('externalLinks');?>
  </body>
</html>
