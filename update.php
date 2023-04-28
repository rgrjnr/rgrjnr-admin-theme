<?php

defined('ABSPATH') || exit;

require 'plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/rgrjnr/rgrjnr-admin-theme',
    __FILE__,
    'rgrjnr-admin-theme'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
