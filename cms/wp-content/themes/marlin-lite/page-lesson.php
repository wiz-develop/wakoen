
<?php
/**
 * The template for displaying all single posts
 * Template Name: 課外教室紹介
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();

?>
<div id="app_func" class="app_func app_func_page func_key_page pt-4 pb-5">
	<main>
		<div id="app_func_screen" class="app_func_screen app_func_screen_page screen_key_page py-5">
			<h1 class="text-center" style="margin: 3% 0;"><?php the_title();?></h1>

			<section id="regular_course">
				<div class="widget_type_page_title screen_widget_key_page_title position-relative">
					<div class="widget_content page-tit_content position-relative">
						<h2 class="page_title mb-0">正課</h2>
					</div>
				</div>
				<div class="widget_type_lesson screen_widget_key_lesson">
					<div class="widget_content container">
						<div class="widget_body">
							<div class="lesson_list row">
								<div class="lesson_list__content col-xs-6 col-md-4">
									<h3 class="lesson_subject">英語</h3>
									<div class="lesson_item__img">
										<img src="/wp-content/themes/marlin-lite/images/kodomo_english.jpg" alt="英語">
									</div>
									<div class="lesson_item__about">
										<div class="lesson_item__about__detail d-lg-flex d-sm-block">
											<div class="item_name">
												<p class="mb-0">対象</p>
											</div>
											<div class="item_detail">
												<p class="mb-0">4・5歳児</p>
											</div>
										</div>
									</div>
								</div>
								<div class="lesson_list__content col-xs-6 col-md-4">
									<h3 class="lesson_subject">絵画</h3>
									<div class="lesson_item__img">
										<img src="/wp-content/themes/marlin-lite/images/kodomo_drawing.jpg" alt="絵画">
									</div>
									<div class="lesson_item__about">
										<div class="lesson_item__about__detail d-lg-flex d-sm-block">
											<div class="item_name">
												<p class="mb-0">対象</p>
											</div>
											<div class="item_detail">
												<p class="mb-0">4・5歳児</p>
											</div>
										</div>
									</div>
								</div>
								<div class="lesson_list__content col-xs-6 col-md-4">
									<h3 class="lesson_subject">わらべうた</h3>
									<div class="lesson_item__img">
										<img src="/wp-content/themes/marlin-lite/images/kodomo_singing.jpg" alt="わらべうた">
									</div>
									<div class="lesson_item__about">
										<div class="lesson_item__about__detail d-lg-flex d-sm-block">
											<div class="item_name">
												<p class="mb-0">対象</p>
											</div>
											<div class="item_detail">
												<p class="mb-0">全児</p>
											</div>
										</div>
									</div>
								</div>
								<div class="lesson_list__content col-xs-6 col-md-4">
									<h3 class="lesson_subject">リトミック</h3>
									<div class="lesson_item__img">
										<img src="/wp-content/themes/marlin-lite/images/kodomo_rythmique.jpg" alt="リトミック">
									</div>
									<div class="lesson_item__about">
										<div class="lesson_item__about__detail d-lg-flex d-sm-block">
											<div class="item_name">
												<p class="mb-0">対象</p>
											</div>
											<div class="item_detail">
												<p class="mb-0">２歳児〜</p>
											</div>
										</div>
									</div>
								</div>
								<div class="lesson_list__content col-xs-6 col-md-4">
									<h3 class="lesson_subject">学研かがく「小学校に向けて・かがくあそび」</h3>
									<div class="lesson_item__img">
										<img src="/wp-content/themes/marlin-lite/images/kodomo_science.jpg" alt="学研かがく「小学校に向けて・かがくあそび」">
									</div>
									<div class="lesson_item__about">
										<div class="lesson_item__about__detail d-lg-flex d-sm-block">
											<div class="item_name">
												<p class="mb-0">対象</p>
											</div>
											<div class="item_detail">
												<p class="mb-0">4・5歳児</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<section id="extracurricular">
				<div class="widget_type_page_title screen_widget_key_page_title position-relative">
					<div class="widget_content page-tit_content position-relative">
						<h2 class="page_title mb-0">課外教室</h2>
					</div>
				</div>
				<div class="widget_type_lesson screen_widget_key_lesson">
					<div class="widget_content container">
						<div class="widget_body">
							<div class="lesson_list">
								<p style="margin-bottom: 3rem;">
									上記の正課指導は、保育・教育カリキュラムの中に含まれています。<br>
									ご希望の方は、お預かり中に園内でおけいこに通える課外教室（別料金）もご利用いただけます。
								</p>
								<?php
									$fields = CFS()->get('lesson_list');
									foreach ($fields as $field) :
								?>
								<div class="lesson_list__content">
									<h3 class="lesson_subject"><?php echo $field['lesson_name']; ?></h3>
									<div class="lesson_item row">
										<div class="lesson_item__img col-sm-12 col-md-4">
											<img src="<?php echo $field['lesson_img']; ?>" alt="<?php echo $field['lesson_name']; ?>">
										</div>
										<div class="lesson_item__about col-sm-12 col-md-8">
											<?php
												$subfields = $field['lesson_about'];
												if($subfields):
													foreach ($subfields as $subfield):
											?>
											<div class="lesson_item__about__detail d-lg-flex d-sm-block">
												<div class="item_name">
													<?php echo $subfield['lesson_item_name']; ?>
												</div>
												<div class="item_detail">
													<?php echo $subfield['lesson_item_detail']; ?>
												</div>
											</div>
											<?php endforeach; endif; ?>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();