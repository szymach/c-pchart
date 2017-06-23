<?php
namespace Helper;

use Codeception\Module;
use Codeception\Module\Filesystem;

class Unit extends Module
{
    public function _beforeSuite($settings = [])
    {
        $chartDir = $this->getChartDirectoryPath();
        if (!is_dir($chartDir)) {
            mkdir($chartDir);
        }

        $this->clearChartDirectory();
    }

    public function _afterSuite($settings = [])
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
