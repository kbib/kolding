<?php
/**
 * Modified from original source to make fake panel styling match the rest of the site.
 */
?>
<?php if ($objects && (sizeof($objects) > 0)) :?>
<div class="ding-box-pane">
  <div class="panel-pane ding-box-wide">
    <div class="pane-title">
      <h3><?php print t("Other did borrow:"); ?></h3>
    </div>
    <div class="pane-content">
      <ul class="ting-recommendation">
    	  <?php foreach ($objects as $i => $object) : ?>
    	    <li class="<?php echo (($i % 2) == 0) ? 'odd' : 'even' ?> <?php echo ((is_int(($i-1) / 4)) || (is_int($i / 4))) ? 'either' : 'or' ; ?>">
    	      <?php echo theme('ting_recommendation_panes_recommendation_list_entry', $object); ?>
    	    </li>
    	  <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>