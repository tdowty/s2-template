<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<div id="dokuwiki__header">
    <div class="pad group">

    <?php tpl_includeFile('header.html') ?>   
<!-- start -->
        <div class="headings group">
            <!--ul class="a11y skip">
                <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content']; ?></a></li>
            </ul-->

<table id="dokuwiki__sitetools">
    <tbody>
        <tr>
	    <td id="logo">
            <h1><?php
                // get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                // display logo and wiki title in a link to the home page
                tpl_link(
                    wl(),
                    '<img src="'.$logo.'" '.$logoSize[3].' alt="" />', // title is now in logo, so removing here.
                                                                       // <span>'.$conf['title'].'</span>'
                    'accesskey="h"'
                );
            ?></h1>
            </td>
            <td id="search">
                <?php tpl_searchform(); ?>
            </td>
            <td id='support-link'>
                <a href='#ticket' 
                   onclick="var e=arguments[0]||window.event;e.stopPropagation();showGrooveWidget()">Contact Support</a>
            </td>
        </tr>
    </tbody>
</table>

<!--
            <h1><?php
                // get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                // display logo and wiki title in a link to the home page
                tpl_link(
                    wl(),
                    '<img src="'.$logo.'" '.$logoSize[3].' alt="" />', // title is now in logo, so removing here.
                                                                       // <span>'.$conf['title'].'</span>'
                    'accesskey="h"'
                );
            ?></h1>
            <?php if ($conf['tagline']): ?>
                <p class="claim"><?php echo $conf['tagline']; ?></p>
            <?php endif ?>
            <div id="dokuwiki__sitetools">
                <?php tpl_searchform(); ?>
            </div>
            <div class='support-link'>
                <a href='#ticket' 
                   onclick="var e=arguments[0]||window.event;e.stopPropagation();showGrooveWidget()">Contact Support</a>
            </div>
-->
        </div>
    </div>

<!--end -->

    <div class="tools group">
        <!-- USER TOOLS -->
        <?php if ($conf['useacl']): ?>
            <div id="dokuwiki__usertools">
                <h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
                <ul>
                    <?php
                        if (!empty($_SERVER['REMOTE_USER'])) {
                            echo '<li class="user">';
                            tpl_userinfo(); /* 'Logged in as ...' */
                            tpl_action('index', 1, 'li');
                           echo '</li>';
                        }
                        tpl_action('admin', 1, 'li');
                        tpl_action('profile', 1, 'li');
                        tpl_action('register', 1, 'li');
                        // to get login link, add seaside request to url
                        // http://help.testspace.com/start?seaside=1
                        if ($_REQUEST['seaside']) {
                            tpl_action('login', 1, 'li');
                        }
                    ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- SITE TOOLS -->

<!--        <div id="dokuwiki__sitetools">
            <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>
            <?php tpl_searchform(); ?>
            <div class="mobileTools">
                <?php tpl_actiondropdown($lang['tools']); ?>
            </div>
            <ul>
                <?php
                    tpl_action('recent', 1, 'li');
                    tpl_action('media', 1, 'li');
                    tpl_action('index', 1, 'li');
                ?>
            </ul>
        </div>
-->
    </div>

    <!-- BREADCRUMBS -->
<!--
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
-->
    <?php html_msgarea() ?>

    <hr class="a11y" />
</div><!--/div--><!-- /header -->
