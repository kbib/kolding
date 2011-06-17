<?php
// $Id$

/**
 * @file page.tpl.php
 * Main page template file for the dynamo theme.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if IE 6]>
  <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/ie6.css" type="text/css" />
  <![endif]-->
</head>
<body class="<?php print $body_classes; ?>">
<?php 
/*adds support for for the admin module*/
  if (!empty($admin)) print $admin; 
?>

<?php if ($help OR $messages) { ?>
	<div id="drupal-messages">
			<div id="messages-hide">
				<a href="#">hide</a>	
			</div>
			
 	  <?php print $help ?>
 	  <?php print $messages ?>

		</div>
<?php } ?>


<div id="container">

    <div id="page" class="minheight">
      <div id="page-inner" class="clearfix">


        

        <div id="pageheader">
          
          <div id="pageheader-inner">
          
          <<?php print $site_name_element; ?> id="site-name">
          <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home">
            <?php print $site_name; ?>
          </a>
        </<?php print $site_name_element; ?>>

              <div class="menuwrapper clear-block">
                <?php if ($secondary_links){ ?>
                  <?php print theme('links', $secondary_links,array('class' => 'servicemenu')); ?> <?php print $rsslink ?>
                <?php } ?>
              </div>
            
            <div id="top" class="clearfix">



              <div id="search" class="left">
                <?php print $search ?>
              </div>

              <div id="account" class="left">
                <?php print $account; ?>	
              </div>  

            </div>

        		<div id="navigation">
        			<div id="navigation-inner">
                <?php if ($primary_links){ ?>
                  <?php print theme('links', $primary_links); ?>
                <?php } ?>
              </div>
            </div>

            <?php print $breadcrumb; ?>
          </div>
        </div>
        
        <div id="pagebody" class="clearfix">
          <div id="pagebody-inner" class="clearfix">

            <?php if ($left) { ?>
              <div id="content-left">
                <?php print $left; ?>
              </div>
            <?php } ?>

          	<div id="content">
              <div id="content-inner">

								<?php
									/*if were in the user pages add the tabs in the top*/
									if (arg(0) == 'user' && is_numeric(arg(1)) && $tabs){
										print '<div class="tabs-user">' . $tabs . '</div>';
									}
								?>

								<div id="content-main">
									<?php print $content; ?>	
								</div>
                
								<?php
									if (arg(0) != 'user'  && $tabs){
										print '<div class="tabs">' . $tabs . '</div>';
									}
								?>


              </div>
          	</div>

            <?php if ($right) { ?>
              <div id="content-right">
                <?php print $right; ?>
              </div>
            <?php } ?>

          </div>
        </div>

<div id="flapContainer">
          <div id="flap">
          <?php print $flap; ?>
          </div>
        </div>
       
        </div>
        
         <div id="bubbles">
         <div id="bubbles2"> </div>
         <div id="pagefooter"> 
          <div id="pagefooter-inner" class="clearfix">

            <div class="left first">
              <?php print $footer_one; ?>
            </div>

            <div class="left">
              <?php print $footer_two; ?>
            </div>

            <div class="left">
              <?php print $footer_three; ?>             
            </div>

            <div class="left">
              <?php print $footer_four; ?>              
              <?php print $footer; ?>
            </div>
      
      <div class="icons">
      <a href="https://www.facebook.com/koldingbib" class="fb">Facebook</a>
      <a href="http://www.flickr.com/search/?w=all&q=kolding+bibliotek&m=text" class="fl">Flickr</a>
      <a href="http://ting.dk/" class="ting">Ting</a>
      </div>
      
          </div>
        </div>

      </div>
    </div>

</div>

<?php print $closure; ?>
</body>
</html>
