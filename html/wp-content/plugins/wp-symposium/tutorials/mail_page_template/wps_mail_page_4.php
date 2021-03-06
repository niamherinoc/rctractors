<?php

/**
 * Template Name: Demo mail page 4
 * Description: A Mail Page Template to demonstrate using classes
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 

// include the PHP class files, the path should match your server!
require_once(ABSPATH.'wp-content/plugins/wp-symposium/class.wps.php');
require_once(ABSPATH.'wp-content/plugins/wp-symposium/class.wps_user.php');
require_once(ABSPATH.'wp-content/plugins/wp-symposium/class.wps_mail.php');

$wps = new wps();
$wps_mail = new wps_mail(); // defaults to current logged in user

/*
First we over-ride settings for mail page to ensure links to this page across go to
the correct page. Note that you will need to visit/reload this page
the first time the script is run, as various constants are set prior to this page template
loading. If you visit Admin->Installation the default values will be reset, 
which includes after upgrading, so re-visit this page at least once after visiting 
the Installation page, to put things back to the new page. Alternatively, create a 
page that updates this (and maybe other) URLs that you can visit as admin once after upgrading WPS.

This is hardcoded to a particular page for now. If distributing to other user's this will
need to be dynamically set! Change it to make the URL of your new mail page, mine is as
per the tutorial (ie. a page called "AA Mail").
*/

$wps->set_mail_url('/aa-mail');

?>

<!--
Links to styles used in this page template - shouldn't be included in the page template really,
but is included here to keep things simple for the tutorial at www.wpsymposium.com/blog.
Should be included in the theme header.php in the <HEAD> ... </HEAD> tags.
This also assumes the .css file is also in the current theme folder along with this page file. 
-->

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/wps_mail_page.css" />

<div id="primary">

	<div id="content" role="main">

	<?php

	if ( isset($_GET['action']) ) {

		// Check to see if action is to delete a mail

		if ($_GET['action'] == 'delete') {

			if ( !$wps_mail->set_as_deleted($_GET['id']) ) {

				echo '<p>Problem deleting mail, sorry.</p>';

			}

		}

	}

	
	if ( !isset($_GET['mail_id']) ) {

		// Inbox	

		echo '<div id="my-inbox">';

			echo '<div id="my-inbox-header">';

				echo '<div class="my-inbox-from">From</div>';

				echo '<div class="my-inbox-message">Subject</div>';

				echo '<div class="my-inbox-sent">Received</div>';

			echo '</div>';

			$start = isset($_GET['start']) ? $_GET['start'] : 0;

			$page_length = 5;

			$inbox = $wps_mail->get_inbox($page_length, $start); // defaults to 10 messages from first available

			if ($inbox) {

				foreach($inbox as $mail) {

					$mail_unread = $mail['mail_read'] == 'on' ? '' : 'my-inbox-unread';

					echo '<div class="my-inbox-row '.$mail_unread.'">';

						echo '<div class="my-inbox-from">';

							echo '<div class="my-inbox-avatar">';

								echo $mail['avatar'];

							echo '</div>';

							echo $mail['display_name_link'];

						echo '</div>';

						echo '<div class="my-inbox-message">';

							echo '<div class="my-inbox-subject">';

								echo '<a href="'.$wps->get_mail_url().'?mail_id='.$mail['mail_id'].'">'.$mail['mail_subject'].'</a>';

							echo '</div>';

							echo $mail['mail_message'];

						echo '</div>';

						$dt=explode(' ',$mail['mail_sent']);

						$d=explode('-',$dt[0]);

						$t=explode(':',$dt[1]);

						echo '<div class="my-inbox-sent">';

							echo $d[2].' '.substr(__wps__get_monthname($d[1]),0,3).' '.$d[0].', '.$t[0].':'.$t[1].'<br />';

							echo '<a href="'.$wps->get_mail_url().'?start='.$start.'&action=delete&id='.$mail['mail_id'].'"><img src="'.get_option(WPS_OPTIONS_PREFIX.'_images').'/delete.png" /></a>';

						echo '</div>';

					echo '</div>';

				}

			} else {

				echo '<div class="my-inbox-row">';

					echo "No mail to show....";

				echo '</div>';

			}

		echo '</div>';

		// Show "pages" of messages (if more than 1)

		$inbox_count = $wps_mail->get_inbox_count();

		$pages = ($inbox_count % $page_length) == 0 ? $inbox_count / $page_length : floor($inbox_count / $page_length) + 1;

		if ($pages > 1) {

			$current_page = floor($start/$page_length)+1;

			if ($current_page > 1) echo '<a href="'.$wps->get_mail_url().'?start=0">First</a> ';

			if ($current_page > 1) echo '<a href="'.$wps->get_mail_url().'?start='.((($current_page-1)*$page_length)-$page_length).'">Previous</a> ';

			for ($p=1; $p<=$pages; $p++) {

				if ($p==$current_page) {

					echo ' <strong>'.$p.'</strong>';

				} else {

					echo ' <a href="'.$wps->get_mail_url().'?start='.(($p*$page_length)-$page_length).'">'.$p.'</a>';

				}

			}

			if ($current_page < $pages) echo ' <a href="'.$wps->get_mail_url().'?start='.((($current_page+1)*$page_length)-$page_length).'">Next</a>';

			if ($current_page < $pages) echo ' <a href="'.$wps->get_mail_url().'?start='.(($pages*$page_length)-$page_length).'">Last</a>';

		}		

	} else {

		// View message	

		$message = $wps_mail->get_message($_GET['mail_id']); // Ge message details

		if ($message) {

			$sender = new wps_user($message->mail_from);

			$dt=explode(' ',$message->mail_sent);

			$d=explode('-',$dt[0]);

			$t=explode(':',$dt[1]);

			echo '<a href="'.$wps->get_mail_url().'">Back to inbox...</a>';

			echo '<div id="my-mail">';

				echo '<div id="my-mail-avatar">'.$sender->get_avatar(120).'</div>';

				echo '<div id="my-mail-from"><div class="my-mail-label"></span>From:</div> '.$sender->get_profile_url().'</div>';

				echo '<div id="my-mail-subject"><div class="my-mail-label">Subject:</div> '.stripslashes($message->mail_subject).'</div>';

				echo '<div id="my-mail-sent"><div class="my-mail-label">Received:</div> '.$d[2].' '.substr(__wps__get_monthname($d[1]),0,3).' '.$d[0].', '.$t[0].':'.$t[1].'</div>';

				echo '<div id="my-mail-message">'.stripslashes($message->mail_message).'</div>';

			echo '</div>';

		} else {

			echo "Invalid Mail ID parameter, sorry.";

		}

		// Update mail read flag

		$wps_mail->set_as_read($message->mail_mid);

	}

	?>

	</div><!-- #content -->

</div><!-- #primary -->

<?php get_footer(); ?>

