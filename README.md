# Plain theme

A frontend for websites with php / twig backend.

## Organizing features

UI patterns, including their .css and .js frontend assets, are organized in the
`components` directory.

## Building deliverable frontend assets

Does not rely on a node.js build script.

Bundling (concatenating, actually) .css and .js assets happens via a php script.

Defining all aspects of bundles and bundling behavior is done in the .php files
in the `build-setup` directory.

## Bundling:

    cd plain-theme
    php bundler.php

It is possible to bundle specific disciplines only:

    php bundler.php styles
    php bundler.php scripts

