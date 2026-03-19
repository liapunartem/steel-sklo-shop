	</div>
	<!-- END CONTENT -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<!-- START FOOTER -->
	<footer class="footer">
		<div class="footer__main">
			<div class="footer__logo-mobile-wrapper">
				<div class="container">
					<?php do_action( 'steel_footer_logo_mobile' ); ?>
				</div>
			</div>
			<div class="container footer__grid">
            	<div class="footer__page-nav">
					<?php do_action( 'steel_footer_page_nav' ); ?>
				</div>
				<div class="footer__catalog">
					<div class="footer__list-title footer__catalog-title">
						Каталог <span class="material-symbols">stat_minus_1</span>
					</div>
					<?php do_action( 'steel_footer_catalog' ); ?>
				</div>
				<div class="footer__contact">
					<div class="footer__list-title">Контакти</div>
					<div class="footer__contact-grid">
						<?php do_action( 'steel_footer_contact' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__copyright">
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