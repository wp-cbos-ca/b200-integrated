<?php
/*
Plugin Name: WP Bundle Write Workflow
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-write-workflow/
Description: Encourages a more professional workflow by writing a draft first. Then that draft is reviewed (if only by you, the author). Then it is published to the community (restricted access). Then it is reviewed again and published without restriction as to access. (Currently sets post to private as default.)
Version: 2018.06.01
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

/*
Original Plugin Name: PrivatePostDefault
Original Plugin URI: http://wordpress.org/extend/plugins/privatepostdefault/
Original Description: Make all post private default.
Original Author: Ronaldo Richieri
Original Version: 1.0
Original Author URI: http://richieri.com/
*/

class WP_Bundle_Write_Workflow{

   static function init(){
        global $post;
        
        if ( 'publish' == $post->post_status ) {
            $visibility = 'public';
            $visibility_trans = __('Public');
        } elseif ( !empty( $post->post_password ) ) {
            $visibility = 'password';
            $visibility_trans = __('Password protected');
        } elseif ( $post_type == 'post' && is_sticky( $post->ID ) ) {
            $visibility = 'public';
            $visibility_trans = __('Public, Sticky');
        } else {
            $post->post_password = '';
            $visibility = 'private';
            $visibility_trans = __('Private');
        } ?>
    
    <script type="text/javascript">
        (function($){
            try {
                $('#post-visibility-display').text('<?php echo $visibility_trans; ?>');
                $('#hidden-post-visibility').val('<?php echo $visibility; ?>');
                $('#visibility-radio-<?php echo $visibility; ?>').attr('checked', true);
            } catch(err){}
        }) (jQuery);
    </script>
    <?php
    }
} // end class

add_action( 'post_submitbox_misc_actions' , array ( 'WP_Bundle_Write_Workflow', 'init' ), 0 );
