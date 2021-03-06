<?php
/**
 * Check for missing items in style.css.
 */
class Style_Needed implements themecheck {
	protected $error = array();

	function check( $php_files, $css_files, $other_files ) {
		$ret = true;
		$css = implode( ' ', $css_files );

		$checks = array(
			'[ \t\/*#]*Theme Name:' => __( '<strong>Theme name:</strong> is missing from your style.css header.', 'theme-check' ),
			'[ \t\/*#]*Description:' => __( '<strong>Description:</strong> is missing from your style.css header.', 'theme-check' ),
			'[ \t\/*#]*Author:' => __( '<strong>Author:</strong> is missing from your style.css header.', 'theme-check' ),
			'[ \t\/*#]*Version' => __( '<strong>Version:</strong> is missing from your style.css header.', 'theme-check' ),
			'[ \t\/*#]*License:' => __( '<strong>License:</strong> is missing from your style.css header.', 'theme-check' ),
			'[ \t\/*#]*License URI:' => __( '<strong>License URI:</strong> is missing from your style.css header.', 'theme-check' ),
			'\.sticky' => __( '<strong>.sticky</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.bypostauthor' => __( '<strong>.bypostauthor</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.alignleft' => __( '<strong>.alignleft</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.alignright' => __( '<strong>.alignright</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.aligncenter' => __( '<strong>.aligncenter</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.wp-caption' => __( '<strong>.wp-caption</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.wp-caption-text' => __( '<strong>.wp-caption-text</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.gallery-caption' => __( '<strong>.gallery-caption</strong> css class is needed in your theme css.', 'theme-check' ),
			'\.screen-reader-text' => sprintf( __( '<strong>.screen-reader-text</strong> css class is needed in your theme css. See <a href="%s">the Codex</a> for an example implementation.', 'theme-check' ), 'https://codex.wordpress.org/CSS#WordPress_Generated_Classes' )
		);

		foreach ($checks as $key => $check) {
			checkcount();
			if ( !preg_match( '/' . $key . '/i', $css, $matches ) ) {
				$this->error[] = "<span class='tc-lead tc-required'>" . __('REQUIRED', 'theme-check' ) . "</span>:" . $check;
				$ret = false;
			}
		}

		return $ret;
	}
	function getError() { return $this->error; }
}
$themechecks[] = new Style_Needed;