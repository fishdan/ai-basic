<?php
/**
 * Title: Hero
 * Slug: ai-basic/hero
 * Categories: banner
 * Description: Full-width hero with headline, supporting text, and a primary call-to-action button. Used at the top of the front page.
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"secondary","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:heading {"level":1,"textAlign":"center","fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size">A theme built for humans and AI agents</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"large","textColor":"muted"} -->
	<p class="has-text-align-center has-muted-color has-text-color has-large-font-size">Every color, font, and section lives in a small, predictable file. Change anything by editing one file — no page builders, no database archaeology.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#get-started">Get started</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
