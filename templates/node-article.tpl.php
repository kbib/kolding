<?php
// $Id$

/**
 * @file
 * Template to render article nodes.
 */

if ($page == 0){ ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">



  <div class="picture"><?php print $field_list_image[0]['view']; ?></div>

  <div class="content">

    <div class="subject">
      <?php print return_terms_from_vocabulary($node, "1"); ?>
    </div>

    <?php if($node->title) { ?>
      <h3><?php print l($node->title, 'node/'.$node->nid); ?></h3>
    <?php } ?>

    <div class="meta">
      <span class="time">
        <?php print format_date($node->created, 'custom', "j F Y") ?>
      </span>
      <span class="author">
        <?php print t('by') . ' ' . theme('username', $node); ?>
      </span>

      <?php print $node->field_library_ref[0]['view'];  ?>
    </div>

    <p>
      <?php
        if ($node->field_teaser[0]['value']) {
          print $node->field_teaser[0]['value'];
        }
        else {
          print strip_tags($node->content['body']['#value']);
        }
      ?>
    </p>

    <?php if (count($taxonomy)) { ?>
      <div class="taxonomy">
        <?php print $terms; ?>
      </div>
    <?php } ?>

  </div>

</div>
<?php } else { ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">

<?php if($node->field_top_image[0]): ?>
  <div class="topimage">
    <?php print  theme('imagecache','kolding_top_image',$node->field_top_image[0]['filepath']);?>
    <div class="caption"><?php print $node->field_top_image[0]['data']['title']?></div>
  </div>
<?php endif;?>

  <div class="subject">
    <?php print return_terms_from_vocabulary($node, "1"); ?>
  </div>

	<?php if($node->title){	?>
	  <h2><?php print $title;?></h2>
	<?php } ?>

	<div class="meta">

		<?php print format_date($node->created, 'custom', "j F Y") ?>
    <i><?php print t('by'); ?></i>
		<span class="author"><?php print theme('username', $node); ?></span>
	</div>

	<div class="content">
		<?php  print $content ?>
	</div>

	<?php if (count($taxonomy)){ ?>

	  <div class="taxonomy">
   	  <?php print $terms ?>
	  </div>
	<?php } ?>


  <?php if ($similarterms) {
    // Fake  panel pane markup ?>
    <div class="ding-box-pane">
      <div class="panel-pane ding-box-wide similar">
        <div class="pane-title">
          <h3><?php print t('Similar'); ?></h3>
        </div>
        <div class="pane-content">
          <?php print $similarterms; ?>
        </div>
      </div>
   </div>
  <?php } ?>


	<?php if ($links){ ?>
    <?php  print $links; ?>
	<?php } ?>

  <div id="fb-root"></div><script src="https://connect.facebook.net/en_US/all.js#appId=193885020659295&amp;xfbml=1"></script><fb:like href="<?php echo url(request_uri(),array('absolute' => true))  ; ?>" send="false" width="450" show_faces="true" font="verdana"></fb:like>

</div>
<?php } ?>
