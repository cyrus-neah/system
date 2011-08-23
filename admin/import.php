<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<?php include('header.php'); ?>

<div class="container">
	<?php if ( isset( $theme->conflicting_plugins ) ) { ?>
		<h2><?php _e( 'Conflicting Plugins' ); ?></h2>
		<p class="error"><?php echo $theme->conflicting_plugins; ?></p>
	<?php } ?>
	
	<h2><?php echo _t('Import'); ?></h2>
	<form method="post" action="" enctype="<?php echo $enctype; ?>">
	
		<?php 
			
			// importer should be the name of the currently-running importer
			if ( $importer == '' ) {
				
				// if there is no importer, show the list for the user to pick from
				if ( count( $importers ) == 0 ) {
					?>
						<p><?php echo _t( 'You do not currently have any import plugins installed.' ); ?></p>
						<p><?php echo _t( 'Please <a href="%1$s">activate an import plugin</a> to enable importing.', array( URL::get( 'admin', 'page=plugins' ) ) ); ?></p>
					<?php
				}
				else {
					?>
						<p><?php echo _t( 'Please choose the type of import to perform:' ); ?></p>
						<select name="importer" class="pct50">
							<?php 
							
								foreach ( $importers as $name ) {
									echo '<option>' . $name . '</option>';
								}
							
							?>
						</select>
						<p class="submit"><input type="submit" class="button" name="import" value="<?php echo _t( 'Select' ); ?>"></p>
					<?php
				}
				
			}
			else {
				
				// the importer is running and should have output generated by a plugin
				echo $output;
				
				// include the hidden input field that makes sure we know what importer is running on the next step
				echo '<input type="hidden" name="importer" value="' . $importer . '">';
				
			}
		
		?>
	
	</form>
	
</div>
	
<?php include('footer.php'); ?>
