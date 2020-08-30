<?php

return [
    'styles' => [
        'libs.css' => [
            'src' => [
                'l|foo/foo.css',
            ],
        ],
        'default.css' => [
            'src' => [
                'c|globals/variables.css',
                'c|globals/base.css',
                'c|globals/color-zones.css',

                'c|text-patterns/text-patterns.css',
                'c|text-patterns/headings.css',
                'c|text-patterns/hero/hero.css',

                'c|page/page-definition-default.css',
                'c|page/page-header/page-header.css',
                'c|page/page-footer/page-footer.css',

                'c|layouts/layouts-shared.css',
                'c|layouts/grid/grid.css',
                'c|layouts/stackable/stackable.css',
                'c|layouts/squeeze/squeeze.css',
                'c|layouts/page-level/page-level.css',

                'c|tiles/cta-tile/cta-tile.css',

                'c|textbox/textbox.css',

                'c|images-display/images-display.css',

                'c|globals/utility-classes.css',
                'c|globals/quickfixes.css',
                'c|meta/meta.css',
            ],
        ],
    ],
    'scripts' => [
        'libs.js' => [
            'src' => [
                'l|foo/foo.js',
            ],
        ],
        'default.js' => [
            'src' => [
                'c|example-1/example-1.js',
                'c|example-2/example-2.js',
            ],
        ],
    ],
];

