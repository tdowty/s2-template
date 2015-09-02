<?php
/**
 * codologic Template
 *
 * @link     http://dokuwiki.org/template
 * 
 * Author: Avinash D'Silva <avinash.roshan.dsilva@gmail.com|codologic.com>
 * 
 * Previous Authors:
 * @author   Anika Henke <anika@selfthinker.org>
 * @author   Clarence Lee <clarencedglee@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

// require functions
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'bootstrap.php');

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
header('X-UA-Compatible: IE=edge,come=1');

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');

?>
<!DOCTYPE html>

<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
  <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">


  <meta charset="utf-8">

  <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
  <script>
    (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
  </script>
  <?php tpl_metaheaders() ?>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <meta name="msapplication-TileImage" content="<?php print DOKU_TPL; ?>images/msapplication-TileImage-144x144.png" />
  <meta name="msapplication-TileColor" content="#ebeced" />
  <link rel="apple-touch-icon" type="image/png" href="<?php print DOKU_TPL; ?>images/apple-touch-icon-76x76.png" sizes="76x76" />
  <link rel="apple-touch-icon" type="image/png" href="<?php print DOKU_TPL; ?>images/apple-touch-icon-152x152.png" sizes="152x152" />
  
  <?php echo tpl_favicon(array('favicon')) ?>
  <?php tpl_includeFile('meta.html') ?>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
  <link href="<?php print DOKU_TPL; ?>css/ui.layout.css" rel="stylesheet">
  <?php echo tpl_js('layout.js'); ?>
  
   
  <script type="text/javascript">
// Groove widget stuff
  (function() {
      var s=document.createElement('script');
      s.type='text/javascript';s.async=true;
      s.src=('https:'==document.location.protocol?'https':'http') + '://s2.groovehq.com/widgets/5c0e95e7-04a7-4f9c-82a0-3b97a4b38848/ticket.js';
      var q = document.getElementsByTagName('script')[0];
      q.parentNode.insertBefore(s, q);
      }
  )();
  </script>

  <script type="text/javascript">
  
  jQuery(function ()
  {

    jQuery('#container').layout({
        maskContents: true,
        center: {
            applyDefaultStyles: true
        },
        west: {
            applyDefaultStyles: true,
            minSize: 300
        }
    });

    jQuery('.ui-layout-pane').each(function () {
        var el = jQuery(this);
    });

    jQuery(".codo_side_content [href]").each(function () {
        if (this.href == window.location.href) {
            jQuery(this).addClass("codo_active");
        }
    });
    
    function apply_space(elem, times) {

        jQuery(elem).find(">li>div>a").each(function()
        {
            jQuery(this).html(times + jQuery(this).html())

        });

        jQuery(elem).find(">li>ul").each(function()
        {
            apply_space(jQuery(this), times + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        });
    }
  });

  window.addEventListener("load", function( event ) {
    // change anchor text and href on groove popup footer
    var $f = jQuery('#gw-footer a')
    $f.text("S2 Technologies");
    $f.attr("href", "http://www.s2technologies.com");
    
    // change groove button actions
    jQuery('a#gw-back-button').hide();
    jQuery('a#gw-header').attr('onclick', 'GrooveWidget.toggle();showGrooveButton(false)');
  });

  /* Modifications to be done after page loads */
  document.addEventListener('DOMContentLoaded',
    function() {
        showGrooveButton(false);
        // put "Search" in the search box
        jQuery('#qsearch__in').attr("placeholder", "Search");
    },
    false);
  function isElementInTarget(el, fn) {
    while (el) {
        if (fn(el)) return el;
        el = el.parentNode;
    }
  }
  
  
  // Hide widget button when user clicks outside of the widget
  window.addEventListener('click', function(e) {
  	var isTargetInWidgetContainer = isElementInTarget(e.target, function(el){ return el === GrooveWidget.container });
  	if (!isTargetInWidgetContainer) showGrooveButton(false);
  	}
  );
  // Hide widget button when user presses ESC
  window.addEventListener('keydown', function(e) {
  	if (e.keyCode === 27) showGrooveButton(false);
  	}
  );
  function showGrooveButton(show) {
    var $b = jQuery('#groove-button');
    var state = "none";
    if (show) {
        state = "block";
    }
    $b.css("display", state);
  }
  function showGrooveWidget() {
    GrooveWidget.selectPanel('#ticket');
    showGrooveButton(true);
  }
  </script>
</head>

<body>
  <div id="container" class="dokuwiki">
    <div class="ui-layout-center">
      <!--[if lte IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->

      <div id="dokuwiki__site">
        <div id="dokuwiki__top" class=
        "site &lt;?php echo tpl_classes(); ?&gt; &lt;?php /*echo ($showSidebar) ? 'showSidebar' : '';*/ ?&gt; &lt;?php /* echo ($hasSidebar) ? 'hasSidebar' : '';*/ ?&gt;">
        <?php include('tpl_header.php') ?>
        
        <hr class="topSep"/>

          <div class="wrapper group">
            <!-- ********** CONTENT ********** -->

            <div id="dokuwiki__content">
              <div class="pad group">
              
           <!-- BREADCRUMBS -->
    <?php if(($conf['breadcrumbs'] || $conf['youarehere']) && $INFO['id'] != 'testspace-help'): ?>
        <div class="breadcrumbs">
            <?php if($conf['youarehere']): ?>
                <div class="youarehere"><?php tpl_youarehere() ?></div>
            <?php endif ?>
            <?php if($conf['breadcrumbs']): ?>
                <div class="trace"><?php tpl_breadcrumbs() ?></div>
            <?php endif ?>
        </div>
    <?php endif ?>

              
              
              
                <!--div class="pageId"><span><?php echo hsc($ID) ?></span></div-->

                <div class="page group">
                  <?php //include('tpl_header.php') ?>
                  <!--hr class="topSep"-->
                  <?php tpl_flush() ?>
                  <?php tpl_includeFile('pageheader.html') ?>
                  <!-- wikipage start -->
                  <?php tpl_content() ?>
                  <!-- wikipage stop -->
                  <?php tpl_includeFile('pagefooter.html') ?>
                </div>

                <div class="docInfo">
                  <?php //tpl_pageinfo() ?>
                </div><?php tpl_flush() ?>
              </div>
            </div><!-- /content -->
            <hr class="a11y">
            <!-- PAGE ACTIONS -->

            <div id="dokuwiki__pagetools">
              <h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>

              <div class="tools">
                <ul>
                  <?php
                      $data = array(
                                      'view'  => 'main',
                                      'items' => array(
                                                      'edit'      => tpl_action('edit',      1, 'li', 1, '<span>', '</span>'),
                                                      'revert'    => tpl_action('revert',    1, 'li', 1, '<span>', '</span>'),
                                                      'revisions' => tpl_action('revisions', 1, 'li', 1, '<span>', '</span>'),
                                                      'backlink'  => tpl_action('backlink',  1, 'li', 1, '<span>', '</span>'),
                                                      'subscribe' => tpl_action('subscribe', 1, 'li', 1, '<span>', '</span>'),
                                                      'top'       => tpl_action('top',       1, 'li', 1, '<span>', '</span>')
                                        )
                        );

                      // show tools only if logged in
                      if (isset($_SERVER['REMOTE_USER'])) {
                                      // the page tools can be amended through a custom plugin hook
                                      $evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
                                      if($evt->advise_before()){
                                                      foreach($evt->data['items'] as $k => $html) echo $html;
                                      }
                                      $evt->advise_after();
                      }
                      unset($data);
                      unset($evt);
                    ?>
                </ul>
              </div>
            </div>
          </div><!-- /wrapper -->
        </div><!-- /site -->

        <div class="no">
          <?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?>
        </div>

        <div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
        <!--[if ( lte IE 7 | IE 8 ) ]></div><![endif]-->
      </div>
      <?php  include('tpl_footer.php') ?>
    </div><!--below div is end WEST pane-->
  </div><!--below div is end content-->
</body>
</html>
