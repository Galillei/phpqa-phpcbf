<?php
/**
 * Phpcbf
 *
 * @copyright Copyright © 2020 Belvg. All rights reserved.
 * @author    artsem.belvg@gmai.com
 */

namespace Edge\QA\Tools\Analyzer;


use Edge\QA\OutputMode;

class Phpcbf extends \Edge\QA\Tools\Tool
{
    public static $SETTINGS = array(
        'optionSeparator' => '=',
        'composer' => 'squizlabs/php_codesniffer',
        'internalClass' => 'PHP_CodeSniffer',
        'outputMode' => OutputMode::RAW_CONSOLE_OUTPUT,
        'errorsXPath' => [
            false=>'',
            true=>''
        ],
    );

    public function __invoke()
    {
        $this->tool->errorsType = $this->config->value('phpcbf.ignoreWarnings') === true;
        $standards = $this->config->pathsOrValues('phpcbf.standard');
        $args = array(
            '-p',
            'standard' => \Edge\QA\escapePath(implode(',', $standards)),
            $this->options->ignore->phpcs(),
            $this->options->getAnalyzedDirs(' '),
            'extensions' => $this->config->csv('phpqa.extensions')
        );
        return $args;
    }
}