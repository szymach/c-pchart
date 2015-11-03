<?php

namespace CpChart\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use DirectoryIterator;

/**
 * @author Piotr Szymaszek
 */
class PurgeContext implements Context, SnippetAcceptingContext
{
    private $outputFolderName = 'features/fixtures/output';

    private $outputFolderPath;

    public function __construct($basePath)
    {
        $this->outputFolderPath = sprintf(
            '%s/%s',
            $basePath,
            $this->outputFolderName
        );
    }

    /** @BeforeScenario */
    public function before(BeforeScenarioScope $scope)
    {
        $this->deleteOutputFolder();
        mkdir($this->outputFolderPath);
    }

    /** @AfterScenario */
    public function after(AfterScenarioScope $scope)
    {
        $this->deleteOutputFolder();
    }

    private function deleteOutputFolder()
    {
        if (file_exists($this->outputFolderPath)) {
            $iterator = new DirectoryIterator($this->outputFolderPath);
            foreach ($iterator as $file) {
                if ($file->isDot()) {
                    continue;
                }
                unlink($file->getPathname());
            }
        }
        rmdir($this->outputFolderPath);
    }
}
