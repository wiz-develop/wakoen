<?php
/*
Template Name:document
*/
?>
<?php get_header(); ?>
<?php if(is_page('document')):?>
<p class="document_title">必要な資料をクリックして、<br>
	各種資料をダウンロードできます。</p>
<?php endif;?>
<div class="document_main" style="margin-top: 5rem;">
	<div class="document_write">
		<?php
			$fields = $cfs->get('document_list');
			foreach ($fields as $field) :
		?>
		<a href="<?php echo $field['document']; ?>" class="document_hover" target="_blank">
		<img src="/wp-content/themes/marlin-lite/images/ankart.png" class="doc_drag">
		<p class="document_ikensho"><?php echo $field['document_name']; ?></p></a>
		<?php endforeach; ?>
	</div>
</div><!-- .site-main -->
<?php get_footer(); ?>