<?php
/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        StanleyWP
 * @author         Brad Williams & Carlos Alvarez
 * @copyright      2011 - 2014 Gents Themes
 * @license        license.txt
 * @version        Release: 3.0.3
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="content">

  <?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div id="white">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">

           <section class="post-meta">
                  <header>
                    <h4 class="post-title">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                        <?php the_title(); ?>
                      </a>
                      <?php if ($category = array_values(get_the_terms( false, 'category' ))[0]) { ?>
                      <a href="<?php echo get_category_link( $category->term_id ) ?>" class="category-tag">
                        <?php echo $category->name ?>
                      </a>
<?php } ?>
                    </h4>
                    <div class="post-meta">
                      <?php echo get_the_date(); ?></time> by <?php the_author_meta('display_name'); ?>
                    </div>
                  </header>
          </section><!-- end of .post-meta -->

        <section class="post-entry">
          <?php the_content(); ?>

          <?php if ( get_the_author_meta( 'description' ) != '' ) : ?>

          <div id="author-meta">
            <?php if ( function_exists( 'get_avatar' ) ) { echo get_avatar( get_the_author_meta( 'email' ), '80' ); }?>
            <div class="about-author"><?php _e( 'About', 'gents' ); ?> <?php the_author_posts_link(); ?></div>
            <p><?php the_author_meta( 'description' ) ?></p>
          </div><!-- end of #author-meta -->

        <?php endif; // no description, no author's meta ?>


        <?php custom_link_pages( array(
    'before' => '<nav class="pagination"><ul>' . __( '' ),
    'after' => '</ul></nav>',
    'next_or_number' => 'next_and_number', // activate parameter overloading
    'nextpagelink' => __( '&rarr;' ),
    'previouspagelink' => __( '&larr;' ),
    'pagelink' => '%',
    'echo' => 1 )
); ?>


                          </section><!-- end of .post-entry -->

                          <footer class="article-footer">
                            <?php if ( bi_get_data( 'enable_disable_tags', '1' ) == '1' ) {?>
                            <div class="post-data">
                              <?php the_tags( __( 'TAGS:', 'gents' ) . ' ', ' - ', '<br />' ); ?>
                            </div><!-- end of .post-data -->
                            <?php } ?>

                            <div class="post-edit"><?php edit_post_link( __( 'Edit', 'gents' ) ); ?></div>
                          </footer>

<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<div id="mc_embed_signup">
<form action="//blissfulsystems.us4.list-manage.com/subscribe/post?u=6d99e1bc4bf9e096fae044198&amp;id=cd9c8b33a6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
  <h2>Get the latest jobs straight to your inbox</h2>
<p>Our weekly newsletter contains the latest jobs before they are available anywhere else.</p>
<div class="mc-field-group">
  <label for="mce-FNAME">Your name </label>
  <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
</div>
<div class="mc-field-group">
  <label for="mce-EMAIL">Your email </label>
  <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
  <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_6d99e1bc4bf9e096fae044198_cd9c8b33a6" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>
(function($) {
  window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';
}(jQuery));
var $mcj = jQuery.noConflict(true);
</script>
<!--End mc_embed_signup-->


                        </div>
                      </div>
                    </div>
                  </div>
                </article><!-- end of #post-<?php the_ID(); ?> -->

                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">

                      <?php comments_template( '', true ); ?>

                    </div>
                  </div>
                </div>

              <?php endwhile; ?>

              <?php if (  $wp_query->max_num_pages > 1 ) : ?>

              <div class="container">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">

                    <nav class="navigation">
                     <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'gents' ) ); ?></div>
                     <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'gents' ) ); ?></div>
                   </nav><!-- end of .navigation -->

                 </div>
               </div>
             </div>
           <?php endif; ?>

         <?php else : ?>

         <article id="post-not-found" class="hentry clearfix">

           <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <header>
                 <h1 class="title-404"><?php _e( '404 &#8212; Fancy meeting you here!', 'gents' ); ?></h1>
               </header>
               <section>
                 <p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'gents' ); ?></p>
               </section>
               <footer>
                 <h6><?php _e( 'You can return', 'gents' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'gents' ); ?>"><?php _e( '&#9166; Home', 'gents' ); ?></a> <?php _e( 'or search for the page you were looking for', 'gents' ); ?></h6>
                 <?php get_search_form(); ?>
               </footer>

             </div>
           </div>
         </div>

       </article>


     <?php endif; ?>

   </div><!-- end of #content -->



   <?php get_footer(); ?>
