<?php
wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false );

$save_file = $this->GetAsset( 'forms', 'save' );
//if( $_GET['test'] == 1 ) echo "<pre>".print_r( $this, true )."</pre>";

// Select which pagehook to use to select which metaboxes to show
$pagehook = $this->m_pages['paypal']['pagehook'];
?>

<div class="wrap">
	
	<h2>Email Import Capture Method</h2>

	<?php $this->GetClass('postman')->DisplayMessages(); ?>

	<form action="<?php echo $save_file['container_link'].'/'.$save_file['file_name']; ?>" method="post" id="">
		<?php //wp_nonce_field($this -> sections -> settings); ?>

		<div id="poststuff" class="metabox-holder has-right-sidebar">			
			<div id="side-info-column" class="inner-sidebar">
				 <?php $this->do_meta_boxes( 'side' ); ?>
			</div>
			<div id="post-body" class="has-sidebar">
				<div id="post-body-content" class="has-sidebar-content">
                	<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<?php $this->do_meta_boxes( 'normal' ); ?>
                        <?php $this->do_meta_boxes( 'advanced' ); ?>
                    </div>
				</div>
			</div>
		</div>
	</form>
</div>
	
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready( function($) {
	// close postboxes that should be closed
	$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
	// postboxes setup
	postboxes.add_postbox_toggles('<?php echo $pagehook; ?>');
});
//]]>
</script>