<?php
/* Password Protected Pages Excerpt

When you display list posts in WordPress and want to display a snippet of the post content, there are two ways you can do this.

You can either use the the_excerpt() function which will return the first 55 words of the post, excluding all shortcodes and images. 

The other option is to use the the_content() function with the more comment to tell WordPress to break at this point.

The more comment

<!-- more-->

This is something that you will put in your post content as a break point in this post, when you display this on pages that are not single pages then WordPress will only display the content above this comment and place a read more link at the bottom of the content.

On password protected pages this works a bit differently, your post excerpt will be empty as the post is protected and if you are listing all your posts using the_excerpt() function then you will not see what you would expect to see. On protected posts the excerpt is replaced with the text There is no excerpt because this is a protected post.

This obviously isn't very user friendly so there is a filter you can use to change the message that will appear on password protected pages.

This will use a combination of the_excerpt filter and the function post_password_required(). On the_excerpt filter it will pass in the default excerpt text, this means you can now override the text to anything you want. So first do a check to see if the post requires a password, if it does then display a new message to contact the site admin.

*/
?>
<?php
function site_admin_excerpt( $excerpt ) {
    if ( post_password_required() )
    {
        $excerpt = 'This is a private page to request the password please contact the site administrator.';
    }

    return $excerpt;
}
add_filter( 'the_excerpt', 'site_admin_excerpt' );
?>
