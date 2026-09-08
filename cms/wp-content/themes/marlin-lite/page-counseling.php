<?php
/*
Template Name:相談室
*/
?>
<?php get_header(); ?>

<div class="counseling_main">
	<div class="inquiry_faq">
		<h1 class="inquiry_faqtitle"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png" class="edu_line2"><?php the_title(); ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png" class="edu_line2"></h1>
    </div>
    <?php 
    			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); 
    the_content();
    endwhile;
endif; ?>
    <!-- <section>
        <ul class="counseling-list">
            <li class="counseling-room">
                <h2 class="counseling-room__title">こそだて相談室「かきのきルーム」</h2>
                <div>
                    <p>当園では電話やメール、来園による子育てに関わる情報提供・保護者の方全般に関わる相談・療育相談を行っています。<br>お困りごとがありましたら、一人で我慢せず、まずはご連絡ください。</p>
                    <p>月曜から金曜の10時〜16時までの対応となります。<br>連絡先は下記の通りです。</p>
                    <p>

                        <span class="counseling-room__tel-pc">TEL　06-6451-7193</span>
                        <span class="counseling-room__tel-mobile"><a href="tel:06-6451-7193" class="">TEL　06-6451-7193</a></span><br>
                        【担当】高岡
                    </p>
                    <p>
                        ※<a href="/contact/" class="contact-link">お問い合わせフォーム</a>からご入力いただくことも可能です。<br>
                        今後の流れについて、3営業日以内にご連絡をさせていただきます。
                    </p>
                </div>
            </li>
            <li class="counseling-room">
                <h2 class="counseling-room__title">看護師相談支援</h2>
                <div>
                    <p>当園では電話やメール、来園による相談支援を行っています。<br>子育て中の方、妊産婦の方へ健康や発育をはじめとする様々な相談支援を行っています。</p>
                    <p>月曜から金曜の10時〜16時までの対応となります。<br>連絡先は下記の通りです。</p>
                    <p>
                        <span class="counseling-room__tel-pc">TEL　06-6451-7193</span>
                        <span class="counseling-room__tel-mobile"><a href="tel:06-6451-7193">TEL　06-6451-7193</a></span><br>
                        【担当】永井
                    </p>
                </div>
            </li>
        </ul>
    </section> -->
</div>
	
<?php get_footer(); ?>