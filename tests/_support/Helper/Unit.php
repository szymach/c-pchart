<?php
namespace Helper;

use Codeception\Module;
use Codeception\Module\Filesystem;
use Codeception\TestInterface;

class Unit extends Module
{
    public function _before(TestInterface $test)
    {
        $chartDir = $this->getChartDirectoryPath();
        if (!is_dir($chartDir)) {
            mkdir($chartDir);
        }

        $this->clearChartDirectory();
    }

    public function _after(TestInterface $test)
    {
        $this->clearChartDirectory();
    }

    private function clearChartDirectory()
    {
        $this->getFileSystem()->cleanDir($this->getChartDirectoryPath());
    }

    private function getChartDirectoryPath()
    {
        return sprintf(__DIR__."/../../_output/charts");
    }

    /**
     * @return Filesystem
     */
    private function getFileSystem()
    {
        return $this->getModule('Filesystem');
    }
}
