=== Plugin Name ===
Contributors: darkogerguric
Donate link: https://www.paypal.me/DarkoG
Tags: custom post,accordion
Requires at least: 4.9.8
Tested up to: 5.3.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin creates Bootstrap accordion form custom posts.

== Description ==

This plugin creates a basic accordion from custom posts.
Fully compatible with WPML, just translate your posts and use shortcodes as explained below.
The plugin currently does not support Woocommerce.

== Installation ==


1. Extract the downloaded .zip file and upload the extracted folder to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress - click on "Activate" link below the plugin name


== How to use==

1.  To use this plugin you need custom post registered.
You may check [Post Types](https://codex.wordpress.org/Post_Types "Post Types") to see how to do it.

Example from WP  Codex - for testing, copy and paste code below to theme functions.php

      add_action( 'init', 'create_post_type' );
      function create_post_type() {
        register_post_type( 'Accordion',
          array(
            'labels' => array(
              'name' => __( 'Accordions' ),
              'singular_name' => __( 'Accordion' )
            ),
            'public' => true,
            'has_archive' => true,
          )
        );
      }

1. Add shortcode to page or post where you want to use accordion

If you used code above to create custom posts type you would use following  shortcode:

    [gw_accordion post_type="Accordion"]

Optionally, you may add CSS class

    [gw_accordion post_type="Accordion" class="my_css_class"]

You can also add code to your theme

    <?php echo do_shortcode('[gw_accordion post_type="Accordion"');?>

or with the CSS class

    <?php echo do_shortcode('[gw_accordion post_type="Accordion" class="my_css_class"]');?>


You also may set ordering, default is by ID and Ascending (ASC)

[gw_accordion post_type="Accordion" class="my_css_class" order_by="title" order="asc"]


== Demo ==

1. [Check Demo](https://plugins.darkog.pro/custom-post-accordion-demo/)



== Known Issues ==

If your theme uses smooth scroll script like this one

            jQuery(function() {
          jQuery('a[href*="#"]:not([href="#"]').click(function() {
              if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = jQuery(this.hash);
              target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                jQuery('html,body').animate({
                  scrollTop: target.offset().top
                }, 2000);
                return false;
              }
            }

          });

        });


You may need to change this line

     jQuery('a[href*="#"]:not([href="#"]')


To look like this

     jQuery('a[href*="#"]:not([href="#"], a:not([data-toggle])')


to avoid conflict


== Frequently Asked Questions ==

Q: Does plugin support Woocommerce?
A: No, not right now.

Q: Can I put images in content to show in accordion?
A: Yes.

Q: Can I use the plugin in a multilanguage setup?
A: Yes. The plugin is tested and confirmed to work with WPML, all you ned to do is to translate your content.

Q: Does plugin support featured images?
A: No, not right now.

== Screenshots ==
Not available.

== Upgrade Notice ==
Not available.

== Changelog ==

= 1.0 =
* Initial release
= 1.0.1 =
* Updated to latest WP and fixed loop reset
= 2.0 =
* Bootstrap is no longer required
* Various fixes
