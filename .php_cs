<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->notPath('bootstrap/cache')
    ->notPath('storage')
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

// 기본룰은 PSR2를 기본으로 하되 그외 추가적인 옵션들만 배열에 추가
// 옵션참고 URL
// https://github.com/FriendsOfPHP/PHP-CS-Fixer
// https://mlocati.github.io/php-cs-fixer-configurator

$config = Config::create()
    ->setRules([
        '@Symfony'                => true,
        '@PSR2'                   => true,
        'array_syntax'            => ['syntax' => 'short'],
        'align_multiline_comment' => ['comment_type'=> 'phpdocs_only'],
        'array_indentation'       => true,
        'no_unused_imports'       => true,
        'binary_operator_spaces'  => [
            'align_double_arrow' => true,
            'align_equals'       => true,
        ],
        'blank_line_after_opening_tag' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(false);

return $config;
