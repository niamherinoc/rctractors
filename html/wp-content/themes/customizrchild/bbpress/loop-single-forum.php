<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php 

$topics	 		= bbp_get_forum_topic_count('' , true );

$reply_id		= bbp_get_forum_last_reply_id( );
$topic_id		= bbp_is_reply( $reply_id ) ? bbp_get_reply_topic_id( $reply_id ) : $reply_id;
$topic_title	= bbp_get_topic_title( $topic_id );
$link 			= bbp_get_reply_url( $reply_id );
?>

<table class="forum" id="bbp-forum-<?php bbp_forum_id(); ?>">
	<tr class="header">
		<th colspan="4"><h3><?php bbp_forum_title(); ?></h3></th>
	</tr>

	<?php	
	// Check for subforums
	$subs = bbp_forum_get_subforums( );
	if ( !empty( $subs ) ) {

		?>

		<tr>
			<th>Board</th>
			<th>Topics</th>
			<th>Posts</th>
			<th>Last Post</th>
		</tr>

		<?php 
		// Buffer output
		ob_start();
		
			// Loop over forums
		foreach ( $subs as $count => $sub ) :

				// Get forum details
			$sub_id			= $sub->ID;
			$title			= $sub->post_title;
			$desc			= $sub->post_content;
			$permalink		= bbp_get_forum_permalink( $sub_id );

					// Get topic counts
			$topics	 		= bbp_get_forum_topic_count( $sub_id , true );

					// Get the most recent reply and its topic
			$reply_id		= bbp_get_forum_last_reply_id( $sub_id );
			$topic_id		= bbp_is_reply( $reply_id ) ? bbp_get_reply_topic_id( $reply_id ) : $reply_id;
			$topic_title	= bbp_get_topic_title( $topic_id );
			$link 			= bbp_get_reply_url( $reply_id );

					// Get the author 
			$user_id 		= bbp_get_reply_author_id( $reply_id );

					// Toggle html class?>

			<tr>
				<td><a class="bbp-forum-title" href="<?php echo $permalink; ?>"><?php echo $title; ?></a></td>
				<td><?php echo $topics; ?></td>
				<td><?php bbp_forum_post_count( $sub_id, true ); ?></td>
				<td><p class="bbp-topic-meta">

					<?php do_action( 'bbp_theme_before_topic_author' ); ?>
					<a class="freshest-title" href="<?php echo $link; ?>" title="<?php echo $topic_title; ?>"><?php echo $topic_title; ?></a>


					<span class="bbp-topic-freshness-author">By <?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 14 ) ); ?></span>

					<?php do_action( 'bbp_theme_after_topic_author' ); ?>

				</p>

				<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

				<span class="freshest-time"><?php bbp_topic_last_active_time( $topic_id ); ?></span>

				<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?></td>
			</tr>


		<?php endforeach; ?>

		<?php // Retrieve from buffer
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
	} else { ?>
		<tr>
			<th colspan="4">No Boards</th>
		</tr>
	<?php }
?>

</table>


