<?php

use EzSystems\EzPlatformCodeStyle\PhpCsFixer\Config;

return Config::create()
          ->setFinder(PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/Tests')
            ->files()->name('*.php')
    );