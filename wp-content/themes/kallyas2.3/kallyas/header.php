<!DOCTYPE html>



<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="isie ie7 oldie no-js"> <![endif]-->

<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="isie ie8 oldie no-js"> <![endif]-->

<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="isie ie9 no-js"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->



<head>

 	<title>

    <?php

	    if (!defined('WPSEO_VERSION')) {

	   		echo bloginfo( 'name') . wp_title( '|',true, '');

	    }

	    else {

	        //IF WordPress SEO by Yoast is activated

	        wp_title();

	    }

	?>

    </title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />




	<?php 

		global $data;

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 

		wp_head(); 

	?>

            <script type="text/javascript" src="bm/jquery-1.js"></script>

            <script type="text/javascript" src="bm/bm-settings.js"></script>



<script>

jQuery(document).ready(function($){

$('.deskcol img').wrap('<div class="footer-logo"></div>');

});

</script>



<style>

#slideshow{

max-height:400px;

}

.iosSlider{

max-height:400px;

}

.iosSlider .slider .item{

max-height: 445px;

height: 445px;

}

.iosSlider .slider .item img {

position: absolute;

bottom: 0px;

max-height:none;

margin-bottom: 20px;

}

body.res1170 .iosSlider .item .caption {

    margin-bottom: 30px;

}

.iosSlider .item .caption.style1 .more img {

    padding: 0px 10px;

}

.home .span4{

margin-top:-30px !important;

}

.home .btn{

margin-top: 23px;

}

.home #footer{

padding-top:40px !important;

}

</style>

         

</head>

<body  <?php body_class(); ?>>



	<!-- AFTER BODY ACTION -->

	<?php do_action( 'zn_after_body' ); ?>



<?php



	if($post) {

	    $meta_fields = get_post_meta($post -> ID, 'zn_meta_elements', true);

	    $meta_fields = maybe_unserialize($meta_fields);

	}

	

	if ( is_home() || ( is_archive() && get_post_type() == 'post' ) ) {

		$blog_page_id = get_option( 'page_for_posts' );

		global $wp_query;

		$meta_fields = get_post_meta($blog_page_id, 'zn_meta_elements', true);

		$meta_fields = maybe_unserialize($meta_fields);

	}



	if ( is_archive() && get_post_type() == 'product' )  {

		$shop_page_id = get_option('woocommerce_shop_page_id'); 

		$meta_fields = get_post_meta($shop_page_id, 'zn_meta_elements', true);

		$meta_fields = maybe_unserialize($meta_fields);

	}





	$header_css = '';

	if ( !empty($meta_fields['zn_disable_subheader']) && $meta_fields['zn_disable_subheader'] == 'yes' ) {

		$header_css = 'no_subheader';

	}

	elseif ( !empty($meta_fields['zn_disable_subheader']) && $meta_fields['zn_disable_subheader'] == 'no' ) {

		$header_css = '';	

	}

	elseif( ( !empty( $data['zn_disable_subheader'] ) && $data['zn_disable_subheader'] == 'yes' ) ) {

		$header_css = 'no_subheader';

	}

?>



    	


        <header id="header" class="<?php echo $data['zn_header_layout'] .' '. $header_css; ?> navbar navbar-inverse">
            <div class="container">

                <!-- logo -->
                <div class="row">
                	<div class="col-md-4 col-xs-12">
                		<?php echo zn_logo(); ?>
                	</div>
                	<div class="col-md-8 col-xs-12 hidden-xs">
                		<?php do_action( 'zn_head_right_area' ); ?>

               

				<!-- search -->

				<?php if ( empty( $data['head_show_search'] ) || ( !empty($data['head_show_search']) && $data['head_show_search'] == 'yes') ) { ?>

					<div id="search"> 
						<form id="searchform" action="<?php echo home_url(); ?>" method="get">

                       <input name="s" maxlength="20" class="inputbox" type="text" size="20" value="<?php echo __( 'SEARCH ...', THEMENAME );?>" onblur="if (this.value=='') this.value='<?php echo __( 'SEARCH ...', THEMENAME );?>';" onfocus="if (this.value=='<?php echo __( 'SEARCH ...', THEMENAME );?>') this.value='';" />

                       <input type="submit" id="searchsubmit" value="go" class="icon-search"/>


                       </form>   

                        <?php /*                 

                                            

                                                    <?php $IE6 = (ereg('MSIE 6',$_SERVER['HTTP_USER_AGENT'])) ? true : false;

                                                           $IE7 = (ereg('MSIE 7',$_SERVER['HTTP_USER_AGENT'])) ? true : false;

                                                           $IE8 = (ereg('MSIE 8',$_SERVER['HTTP_USER_AGENT'])) ? true : false;



                                                       if (($IE6 == 1) || ($IE7 == 1) || ($IE8 == 1)) {

                                                        // Do fallback stuff that old browsers can do here

                                                         ?>

                                                            <form id="searchform" action="<?php echo home_url(); ?>" method="get">

                                                           <input name="s" maxlength="20" class="inputbox" type="text" size="20" value="<?php echo __( 'SEARCH ...', THEMENAME );?>" onblur="if (this.value=='') this.value='<?php echo __( 'SEARCH ...', THEMENAME );?>';" onfocus="if (this.value=='<?php echo __( 'SEARCH ...', THEMENAME );?>') this.value='';" />

                                                           <input type="submit" id="searchsubmit" value="go" class="icon-search"/>

                                                           </form>                                     



                                                   <?php



                                                       } else { ?>

                                                       <?php   echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>

                                                   <?php } ?>                                           

					*/ ?>

					</div>

					<!-- end search -->

				<?php } ?>



				<!-- main menu -->

				<nav id="main_menu" class="<?php if ( !empty ( $data['res_menu_style'] ) &&  $data['res_menu_style'] == 'smooth' ) { echo 'smooth_menu'; } ?> hidden-xs">

					<?php if ( !empty ( $data['res_menu_style'] ) &&  $data['res_menu_style'] == 'smooth' ) { echo '<div class="zn_menu_trigger"><a href="">'.__('Menu',THEMENAME).'</a></div>'; } ?>

					<?php zn_show_nav('main_navigation'); ?>

				</nav>

                	</div>
                </div>

                

				<!-- end main_menu -->

			</div>

		</header> 
		 
		

<?php



/*--------------------------------------------------------------------------------------------------



	HEADER AREA



--------------------------------------------------------------------------------------------------*/

	

	if ( !empty($meta_fields['zn_disable_subheader']) && $meta_fields['zn_disable_subheader'] == 'yes' ) {

		return;

	}

	elseif ( !empty($meta_fields['zn_disable_subheader']) && $meta_fields['zn_disable_subheader'] == 'no' && isset ( $meta_fields['header_area']) && is_array($meta_fields['header_area'] ) ) {

	    zn_get_template_from_area('header_area', $post -> ID, $meta_fields);

		return;

	}

	elseif ( !empty($meta_fields['zn_disable_subheader']) && $meta_fields['zn_disable_subheader'] == 'no' ) {



	}

	elseif( ( !empty( $data['zn_disable_subheader'] ) && $data['zn_disable_subheader'] == 'yes' ) ) {

		return;

	}

	elseif( isset ( $meta_fields['header_area']) && is_array($meta_fields['header_area'] ) ) {

	    zn_get_template_from_area('header_area', $post -> ID, $meta_fields);

		return;

	}

	elseif(is_404()) {

		$style = 'uh_'.$data['404_header_style'];



	   ?>

		<div id="page_header" class="<?php echo $style; ?> bottom-shadow">

			<div class="bgback">

				

			</div>

			

			<div data-images="<?php echo IMAGES_URL; ?>/" id="sparkles"></div>



			

			<div class="zn_header_bottom_style"></div>

	   <?php

	   return;

	}

	elseif ( is_post_type_archive( 'documentation' ) || is_tax( 'documentation_category' ) || 'documentation' == get_post_type() ){



		$style = '';

		if ( !empty($data['zn_doc_header_style']) ) {

			$style = 'uh_'.$data['zn_doc_header_style'];

		}





		?>

			<div id="page_header" class="<?php echo $style; ?> zn_documentation_page" >

				<div class="bgback"></div>

				

				<div data-images="<?php echo IMAGES_URL; ?>/" id="sparkles"></div>

				<div class="container">

					<div class="row">

						<div class="span12">

							<div class="zn_doc_search">

								<form method="get" id="" action="<?php echo home_url(); ?>">

									<label class="screen-reader-text" for="s"><?php _e("Search for:",THEMENAME); ?></label>

									<input type="text" value="" name="s" id="s" placeholder="<?php _e("Search the Documentation",THEMENAME); ?>">

									<input type="submit" id="searchsubmit" class="btn" value="Search">

									<input type="hidden" name="post_type" value="documentation">

								</form>

							</div>

						</div>

					</div><!-- end row -->

				</div>

				

				<div class="zn_header_bottom_style"></div>

			</div><!-- end page_header -->

		<?php	

		return;

	}

	elseif ( is_post_type_archive( 'showcase' ) ){



		$style = '';

		if ( !empty($data['zn_doc_header_style']) ) {

			$style = 'uh_'.$data['zn_doc_header_style'];

		}





		?>

	<div id="page_header" class="<?php echo $style; ?>">

				<div class="bgback"></div>

					<!-- DEFAULT HEADER STYLE -->

					<div class="container">

						<div class="row">

							<div class="span6">

								<?php zn_breadcrumbs();	?>

							</div>

							<div class="span6">

								<div class="header-titles">

									<h2>Showcase</h2>

									<h4>How our clients used Kallyas to build websites</h4>

								</div>

							</div>

						</div><!-- end row -->

					</div>

				<div class="zn_header_bottom_style"></div>

			</div><!-- end page_header -->

		<?php	

		return;

	}

	    global $wp_query; ?>



			<div id="page_header" class="zn_def_header_style">

				<div class="bgback"></div>



				<?php

					if ( isset ( $data['def_header_animate'] ) && !empty ( $data['def_header_animate'] ) ) {

						echo '<div data-images="'.IMAGES_URL.'/" id="sparkles"></div>';

					}

				?>



					<!-- DEFAULT HEADER STYLE -->

				

					<div class="container">

				

						<div class="row">

							<div class="span6">

							 

								<?php 

							

									// Breadcrumbs check

									if ( isset ( $data['def_header_bread'] ) && !empty ( $data['def_header_bread'] ) ) {

										zn_breadcrumbs();

									}

									

									// Date check

									if ( isset ( $data['def_header_date'] ) && !empty ( $data['def_header_date'] ) ) {

										echo '<span id="current-date">'.date_i18n(get_option('date_format') ,strtotime(date("l M d, Y"))).'</span>';

									}

									

								?>

							</div>

							<div class="span6">

								<div class="header-titles">

									<?php

									// Title check



									if ( isset ( $data['def_header_title'] ) && !empty ( $data['def_header_title'] ) ) {



										if ( isset ( $meta_fields['page_title'] ) && !empty ( $meta_fields['page_title'] ) ) {

											echo '<h2>'.do_shortcode( stripslashes( $meta_fields['page_title'] ) ).'</h2>';

										}



										elseif ( is_post_type_archive( 'post' ) || is_home() ) { 

											if ( isset ( $data['archive_page_title'] ) && !empty ( $data['archive_page_title'] ) ) {

												if ( function_exists ('icl_t') )

												{

													$title = icl_t(THEMENAME, 'Archive Page Title', do_shortcode(stripslashes($data['archive_page_title'])));

												}

												else

												{

													$title = do_shortcode(stripslashes($data['archive_page_title']));

												}

												echo '<h2>'.$title.'</h2>';

											}

										}

										elseif ( is_category() ) {

											echo '<h2>'.single_cat_title('', false).'</h2>';

										}

										elseif ( is_tax('product_cat') ) {

											$queried_object = $wp_query->get_queried_object();

											echo '<h2>'. $queried_object->name . '</h2>';

										}

										elseif ( is_search() ) {

											echo '<h2>'. __("Search results for ",THEMENAME).'"' . get_search_query() . '"</h2>';

										}

										elseif ( is_day() ) {

											echo '<h2>'.get_the_time('d').'</h2>';					 

										} elseif ( is_month() ) {

											echo '<h2>'.get_the_time('F').'</h2>';

										} elseif ( is_year() ) {

											echo '<h2>'.get_the_time('Y').'</h2>';

										}

										elseif ( is_tag() ) {

											echo '<h2>'. __("Posts tagged ",THEMENAME).'"'.single_tag_title('', false).'"</h2>';

										}

										elseif ( is_author() ) {

											global $author;

											$userdata = get_userdata($author);

											echo '<h2>'. __("Articles posted by ",THEMENAME) . $userdata->display_name .'</h2>';

										}

										else {

											echo '<h2>'.wp_title('',false).'</h2>';

										}

									}



									// Subtitle check

									if ( isset ( $data['def_header_subtitle'] ) && !empty ( $data['def_header_subtitle'] ) ) {



										if ( isset ( $meta_fields['page_subtitle'] ) && !empty ( $meta_fields['page_subtitle'] ) ) {

											echo '<h4>'.do_shortcode( stripslashes( $meta_fields['page_subtitle'] ) ).'</h4>';

										}

										elseif ( is_post_type_archive( 'post' ) || is_home() ) { 

											if ( isset ( $data['archive_page_subtitle'] ) && !empty ( $data['archive_page_subtitle'] ) ) {

												if ( function_exists ('icl_t') )

												{



													$subtitle = icl_t(THEMENAME, 'Archive Page Subtitle', do_shortcode(stripslashes($data['archive_page_subtitle'])));

												}

												else

												{

													$subtitle = do_shortcode(stripslashes($data['archive_page_subtitle']));

												}

												echo '<h4>'.$subtitle.'</h4>';

											}

										}

									}

									?>

								</div>

							</div>

						</div><!-- end row -->

					</div>

				<div class="zn_header_bottom_style"></div>

			</div>

			<div id="imgouterwrapper">

				<div id="imgcont">

					<div class="headtxt"><div class="txtwrap"><?php the_field('header_text'); ?></div></div>

					<div class="imgwrap"><?php if( get_field('image_top') ): ?>



	<img src="<?php the_field('image_top'); ?>" />

	

<?php endif; ?></div>



</div>

<div class="zn_header_bottom_style"></div>

<div style="clear:both"></div>

</div>

<!-- end page_header -->