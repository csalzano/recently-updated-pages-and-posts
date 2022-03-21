<?php
defined( 'ABSPATH' ) or exit;

/**
 * Plugin Name: Recently Updated Pages and Posts
 * Plugin URI: https://github.com/csalzano/recently-updated-pages-and-posts
 * Description: Creates a sidebar widget that displays a list of links to recently updated pages and posts.
 * Author: Corey Salzano
 * Author URI: https://breakfastco.xyz/
 * Version: 1.0.0
 * Text-domain: recently-updated-pp
 * License: GPLv2
*/

class recently_updated_widget extends WP_Widget {

	function __construct() {
		parent::__construct( 
			'recently_updated_widget', //Base ID
			__( 'Recent Updates', 'recently-updated-pp' ), //Name
			array( 
				'description' => __( 'Recently updated pages and posts', 'recently-updated-pp' ),
			)
		);
	}

	function form($instance) {
		// outputs the options form on admin

		// format options as valid html
		$title = htmlspecialchars($instance['title'], ENT_QUOTES);
		$post_count = htmlspecialchars($instance['post_count'], ENT_QUOTES);
		$word_count = htmlspecialchars($instance['word_count'], ENT_QUOTES);
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>" style="line-height:35px;display:block;"><?php _e( 'Title:', 'recently-updated-pp' ); ?> <input type="text" size="20" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" /></label>
		<label for="<?php echo $this->get_field_id('post_count'); ?>" style="line-height:35px;display:block;"><?php _e( 'Show', 'recently-updated-pp' ); ?> <input type="text" size="2" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $post_count; ?>" /> items</label>
		<label for="<?php echo $this->get_field_id('word_count'); ?>" style="line-height:35px;display:block;"><?php _e( 'Excerpt length:', 'recently-updated-pp' ); ?> <input type="text" size="2" id="<?php echo $this->get_field_id('word_count'); ?>" name="<?php echo $this->get_field_name('word_count'); ?>" value="<?php echo $word_count; ?>" /> words</label>
		</p>
	<?php
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes( $new_instance['title'] ));
		$instance['post_count'] = $new_instance['post_count'];
		$instance['word_count'] = $new_instance['word_count'];
		return $instance;
	}

	function widget($args, $instance) {
		// outputs the content of the widget
		extract($args, EXTR_SKIP);

		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$post_count = $instance['post_count'];
		$word_count = $instance['word_count'];

		$recent_post_args = array(
			array(
				'post_status'    => 'publish',
				'post_type'      => apply_filters( 'recently_updated_pp_post_types', array( 'post', 'page' ) ),
				'posts_per_page' => $post_count,
				'order'          => 'DESC',
				'orderby'        => 'post_modified',
			),
		);

		if ( $recentposts = get_posts( $recent_post_args ) )
		{
			echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
	?>
			<ul id="recently-updated-widget-list">
		<?php
				$i = 0;
				foreach ($recentposts as $post) {
					if ($post->post_title == '') $post->post_title = sprintf(__('Post #%s'), $post->ID);
					$the_excerpt = wp_trim_words( strip_tags( apply_filters( 'the_content', $post->post_content )), $word_count, "..." );
					echo "<li class=\"recently-updated-widget-item\" id=\"ruwi-" . $i . "\"><a href='".get_permalink($post->ID)."'>" . $post->post_title . "</a>";
					if( $word_count > 0 ){
						echo "<p id=\"rup-excerpt\">" . $the_excerpt . "</p>";
					}
					echo "</li>";
					$i++;
				} ?>
			</ul>

<?php 		echo $after_widget;
		}
	}
}
if( !function_exists('register_recently_updated_widget')){
	add_action('widgets_init', 'register_recently_updated_widget');
	function register_recently_updated_widget() {
	    register_widget('recently_updated_widget');
	}
}

?>