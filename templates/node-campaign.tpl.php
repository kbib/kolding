<?php
// $Id$

/**
 * @file
 * Template to render campaign nodes.
 */
 
if ($node->campaign_type == "image-only"): ?>
	<div class="campaign-image campaign-type-<?php print $node->campaign_type;  ?> clearfix">
		<?php print l($node->field_campaign_image['0']['view'], $node->field_campaign_link['0']['url'], $options= array('html'=>TRUE)); ?>
	</div>
<?php elseif($node->campaign_type == "wysiwyg-title"): ?>
	<div class="campaign-box">	
	<div class="campaign-text clearfix">
		<div class="pane-title"><h3><?php print $title;?></h3></div>
		<div class="campaign-inner">
			<div class="campaign-type-<?php print $node->campaign_type;?>">
				
					<?php print $node->content['body']['#value']; ?>
				
			</div>
		</div>
	</div>
	</div>
<?php else: ?>
	<div class="campaign-text clearfix">
		<div class="campaign-inner">
			<div class="campaign-type-<?php print $node->campaign_type;?>">
				<div class="campaign-theme campaign-theme-<?php print $node->campaign_theme; ?>">
					<?php print l(filter_xss($node->content['body']['#value']),  $node->field_campaign_link['0']['url'], $options= array('html'=>TRUE)); ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>


