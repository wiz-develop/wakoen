<?php
if ( function_exists('marlin_lite_require_file') )
{
    // Load Classes
    marlin_lite_require_file( MARLIN_CORE_CLASSES . 'wp-bootstrap-navwalker.php' );
    
    // Load Functions
    marlin_lite_require_file( MARLIN_CORE_FUNCTIONS . 'customizer/marlin-custom-control.php' );
    marlin_lite_require_file( MARLIN_CORE_FUNCTIONS . 'customizer/marlin-customizer-settings.php' );
    marlin_lite_require_file( MARLIN_CORE_FUNCTIONS . 'customizer/marlin-customizer-style.php' );
    marlin_lite_require_file( MARLIN_CORE_FUNCTIONS . 'marlin-resize-image.php' );
    marlin_lite_require_file( MARLIN_CORE_FUNCTIONS . 'template-tags.php' );
    marlin_lite_require_file( MARLIN_CORE_FUNCTIONS . 'custom-header.php' );
    
    // Load Widgets
    marlin_lite_require_file( MARLIN_CORE_WIDGETS . 'marlin-about-widget.php' );
    marlin_lite_require_file( MARLIN_CORE_WIDGETS . 'marlin-latest-posts-widget.php' );
}