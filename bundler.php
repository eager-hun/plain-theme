<?php

require('build-setup/assets-bundler.php');

$bundler = new assets_bundler(
    require('build-setup/bundle-config.php'),
    require('build-setup/bundle-defs.php')
);

if (!empty($argv[1])) {
    if (!in_array($argv[1], ['styles', 'scripts'])) {
        echo 'Invalid argument for bundler().' . PHP_EOL;
        exit();
    }
    $bundler->bundler($argv[1]);
}
else {
    $bundler->bundler('styles');
    $bundler->bundler('scripts');
}

exit();

