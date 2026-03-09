	</div>
	<!-- END CONTENT -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<!-- START FOOTER -->
	<footer role="contentinfo">
		<div class="footer-main">
			<div class="container">
            	<div>
					<?php do_action( 'steel_footer_left' ); ?>
				</div>
				<div>
					<div class="footer-list-title">Каталог</div>
					<?php do_action( 'steel_footer_center' ); ?>
				</div>
				<div>
					<div class="footer-list-title">Контакти</div>
					<div class="contact-grid">
						<?php do_action( 'steel_footer_contact_elem' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© Усі права захищено. 2025р
			</div>
		</div>
	</footer>
	<!-- END FOOTER -->

	<!-- START OFFCANVAS -->
	<?php do_action( 'steel_offcanvas' ); ?>
	<!-- END OFFCANVAS -->

	<!-- START WP_FOOTER -->
	<?php wp_footer(); ?>
	<!-- END WP_FOOTER -->

</body>
</html>