<?php

class assets_bundler {

    public $bundle_config = [];
    public $bundle_defs = [];
    public $source_symbols = [];

    public function __construct($bundle_config, $bundle_defs)
    {
        $this->bundle_config = $bundle_config;
        $this->bundle_defs = $bundle_defs;

        $this->prepare_source_resolving();
    }

    public function ec($arg, $exit = false)
    {
        if (is_array($arg)) {
            $arg = json_encode($arg);
        }
        echo $arg . PHP_EOL;
        if ($exit) {
            exit();
        }
    }

    public function prepare_source_resolving()
    {
        foreach (
            $this->bundle_config['sources'] as $source_name => $source_defs
        ) {
            $this->source_symbols[$source_defs['symbol']] = $source_name;
        }
    }

    public function prepare_path_def($str)
    {
        $def_parts = explode('|', $str);

        if (count($def_parts) != 2) {
            $this->ec('Invalid source file definition: "' . $str . '".');
            $this->ec('    Source definitions must contain one pipe.', 1);
        }

        $source_symbol = $def_parts[0];
        $file_path = $def_parts[1];

        return $this->bundle_config['sources'][$this->source_symbols[$source_symbol]]['path']
            . $file_path;
    }

    protected function create_bundles($defs, $destination)
    {
        foreach ($defs as $bundle_file_name => $def) {
            $bundle_file_path = $destination . '/' . $bundle_file_name;
            $bundle_file_content = [];

            foreach ($def['src'] as $bundle_member) {
                $input_file = $this->prepare_path_def($bundle_member);

                if (!file_exists($input_file)) {
                    $this->ec(
                        '[WARNING]: False bundle definition entry: "'
                        . $input_file
                        . '"'
                    );
                    continue;
                }

                $bundle_file_content[] = file_get_contents($input_file);
            }

            if (file_put_contents($bundle_file_path, $bundle_file_content)) {
                $this->ec('Have created bundle: "' . $bundle_file_path . '".');
            };
        }
    }

    public function bundler($discipline)
    {
        $discipline_dirs = [
            'styles' => 'styles',
            'scripts' => 'scripts',
        ];

        $discipline_file_extensions = [
            'styles' => 'css',
            'scripts' => 'js',
        ];

        $subdir_path = $this->bundle_config['output']['path']
            . $discipline_dirs[$discipline];

        if (!file_exists($subdir_path) || !is_dir($subdir_path)) {
            $this->ec(
                'Directory for '
                . $discipline
                . ' did not exist; creating it.'
            );
            mkdir($subdir_path, 0755, false);
        }

        $this->create_bundles($this->bundle_defs[$discipline], $subdir_path);
    }
}

