<?php
/**
 * The main template file.
 *
 * @package marlin-lite
 */

get_header();

$days  = 7 ; // 園からのお知らせ：NEWを表示させる期間の日数を入力
$today = date_i18n('U');
$args = array(
	'category_name' => 'notice', // 園からのお知らせ：カテゴリー
	'posts_per_page' => 8, // 園からのお知らせ：表示させる記事数
	'date_query' => array(
        array(
            'after' => '1 month ago',
            'inclusive' => true,
        ),
    ),
);
$args = get_posts( $args );
$news_link = $cfs->get('news_link');
?>

<div id="home-main">
	
	<p class="news_upbar">
		<img src="/cms/wp-content/themes/marlin-lite/images/news_upbar1.png">
	</p>
	<p class="news_title">
		園からのおしらせ
	</p>

	<div class="main_news">
		<?php query_posts( $args ); ?>
		<table>
		<tbody>
			<?php while ( have_posts() ) : the_post(); ?>
				<tr>
					<td>
						<?php	$total = date( 'U',( $today - get_the_time('U') ) ) / 86400;
								if( $days > $total ){?>
							<img src="/cms/wp-content/themes/marlin-lite/images/new_mark.png" class="new_mark" alt="new" title="NEW">
						<?php	} ?>
					</td>
					<td><?php the_time('Y年n月j日(D)'); ?></td>
					<?php if ( $news_link ) : ?>
					<td><a href="<?php echo $news_link; ?>" target="_blank"><?php the_title(); ?></a></td>
					<?php else : ?>
					<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
					<?php endif; ?>
				</tr>
			<?php endwhile;?>
			</tbody>
		</table>
	</div>
	<p class="disaster_write" style="margin-bottom: 1.5%;">
		<a href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/pdf/complaint-esolution-20260907.pdf" target="_blank"><font color="#36af38"><u><b>令和５年度〜７年度の苦情解決について</b></u></font></a>
	</p>
	<p class="disaster_write" style="margin-bottom: 1.5%;">
		<a href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/pdf/info-manual.pdf" target="_blank"><font color="#36af38"><u><b>令和８年度 重要事項説明書</b></u></font></a><br>
		<a href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/pdf/info-manual_kusunoki.pdf" target="_blank"><font color="#36af38"><u><b>令和８年度 和光園くすのき 重要事項説明書</b></u></font></a>
	</p>
	<p class="disaster_write" style="margin-bottom: 3%;">
		<a href="/annual2023/" target="_blank"><font color="#E91E63"><u><b>令和７年度決算関係</b></u></font></a>
	</p>
</div>

	<p class="news_downbar">
		<img src="/cms/wp-content/themes/marlin-lite/images/news_downbar1.png">
	</p>

	<div class="topics_area">
		<p class="disaster_news">
			<img src="/cms/wp-content/themes/marlin-lite/images/flag1.png" alt="和光園" class="guide-titleber">
			入園受付中
			<img src="/cms/wp-content/themes/marlin-lite/images/flag1.png" alt="和光園" class="guide-titleber">
		</p>
		<p class="disaster_write" style="margin-bottom: 2%;">
			<b>〇１号認定</b><br>
			入園のご希望は随時願書を受け付けています。<br>令和９年度の入園希望の方の願書受付は、令和８年９月１５日（火）１６：００までとさせていただきます。
			<br>※<span style="color: red;">令和８年度の１号認定の5歳（年長）のお子さんの枠が1枠</span>あります。
			<br>入園を希望される方は、園までお気軽にお問合せください。
		</p>
		<p class="disaster_write" style="margin-bottom: 2%;">
			<b>〇２・３号認定</b><br>
			２・３号認定の見学について<br>随時見学を行っていますので、見学をご希望の方は<br class="br-sp">園までご連絡ください。</font>
		</p>
		<p class="disaster_write topics_tel" style="margin: 1% 0 4%; text-align:center;">お問い合わせ
			<span class="tel-pc">TEL　06-6451-7193</span>
			<span class="tel-mobile"><a href="tel:06-6451-7193"><nobr>TEL　06-6451-7193</nobr></a></span>
		</p>
		<p class="disaster_write" style="margin-bottom: 3%; font-size: 1.8rem;">
			<a href="https://www.city.osaka.lg.jp/fukushima/page/0000543068.html" target="_blank"><font color="#00b7e7"><u><b>令和９年度　保育所等一斉入所申込受付のご案内</b></u></font></a>
		</p>
		<!-- <p class="disaster_write" style="margin-bottom: 3%;">
		随時見学を行っています。<br>
		見学をご希望の方は、園までご連絡ください。
		</p> -->
	</div>

	<!-- <div class="evaluation_area">
		<p class="disaster_news">令和５年度　施設関係者評価</p>
		<p class="disaster_write" style="margin-bottom: 2%;">令和５年度の施設関係者評価が実施されました。<br>当園の評価内容につきましては下記資料をご覧ください。</p>
		<p class="disaster_write" style="text-align:center;">
			2024年1月23日(火)　<br class="br-sp">
			<a href="/cms/wp-content/uploads/2024/01/evaluation-r5.pdf" target="_blank">
				<img src="/cms/wp-content/themes/marlin-lite/images/pdf_icon.png" class="pdf_icon">
				令和５年度　施設関係者評価を見る
			</a>
		</p>
	</div> -->

	<!-- <div class="disaster_area">
		<p class="disaster_news">災害情報</p>
		<p class="disaster_write">　2018年6月19日(火)　<br class="br-sp">大阪北部地震での今後の対応について</p>
	</div> -->
	
<div id="nursing">
<p class="nursing_title">保育を通して育てたい5つの力</p>


<div class="writing_area">
	<p class="nursing_writings">
		子どもの主体性を大切にすること。<br>
		それは幼児期から自分で考え、仲間と協力しながら自分で道を切り拓いていく力をつけることが、
		やがて大人になったときに最近よく言われる、
		<nobr>「非認知能力」（社会情動的スキル）</nobr>を育てることにもつながります。<br>
		また何かから知識を得て試行して解釈や推理などを立てられる「認知的能力」に対し、
		「非認知的能力」は他者と上手く協力し合い、自らの感情を管理し、
		長期的目標を達成する能力などで、社会の中で行きていくためにはとても重要です。<br>
		<br>
		子どもたちが仲間と一緒に自由に楽しく遊び、その中で何かを発見し、
		仲間と協力して調べたり、探したり、作り上げていくことの中に「学び」があります。<br>
		子どもたちは毎日の遊びの中で様々なことを体験し、自分の体で試し、
		新しいことを次々と知って行きます。<br>
		<br>
		子どもにとって必要な「学び」はすべて、
		毎日の「遊び」の中にあるのです。
	</p>
</div>

<div class="fiveslill">
	<p class="red">1.聞く力(学習能力とコミュニケーション能力)</p>
	<p class="yellow">2.良い人間関係を作る力</p>
	<p class="org">3.生活のルールを通して社会のルールを理解し、守る力</p>
	<p class="blue">4.集中して取り組む力</p>
	<p class="green">5.豊かな感性や五感を育てる力</p>
</div>

<img src="/cms/wp-content/themes/marlin-lite/images/baloon_red.png" alt="和光園 5つの力" class="bal_red2">
		<img src="/cms/wp-content/themes/marlin-lite/images/baloon_yellow.png" alt="和光園 5つの力" class="bal_yellow">
		<img src="/cms/wp-content/themes/marlin-lite/images/baloon_orange.png" alt="和光園 5つの力" class="bal_orange">
		<img src="/cms/wp-content/themes/marlin-lite/images/baloon_blue.png" alt="和光園 5つの力" class="bal_blue">
		<img src="/cms/wp-content/themes/marlin-lite/images/baloon_green.png" alt="和光園 5つの力" class="bal_green">
	</div>
</div>

<div class="recruit_area">
	<p class="disaster_write disaster_write_title" style="font-size: 1.3em; margin-bottom: 2%;">採用情報</p>
	<p class="disaster_write" style="margin-bottom: 1%;">和光園でいっしょに働く方を募集しています。</p>
	<p class="recruit_write">
	【対象職種】<br>
	保育士・幼稚園教諭・小学校教諭・<br class="br-sp">看護師・保育補助　等<br>
	</p>
	<p class="disaster_write">ご興味をお持ちの方は、<br class="br-sp">お気軽にご連絡ください。</p>
</div>

</div><!-- site-main -->
          
<?php get_footer(); ?>