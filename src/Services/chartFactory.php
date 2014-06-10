<?php
namespace CpChart\Services;

/**
 * A simple service class utilizing the Factory design pattern. It has two 
 * specific methods for creating pImage and pData, as well as a generic loader 
 * for the chart classes.
 *
 * @author szymach
 */
class chartFactory
{
    private $namespace = 'CpChart\Classes\\';
    
    /**
     * Load a new chart class (bar, pie etc.)
     * @param string $chartName - name of the class to be loaded
     * @return \CpChart\Classes\className
     */
    public function newChart($chartName) 
    {
        $className = $this->namespace.$chartName;
        return new $className();
    }
    
    /**
     * Creates a new pData class with an option to pass the data to form a serie.
     * @param array $points - points to be added to serie
     * @param string $serieName - name of the serie
     * @return \CpChart\Classes\pData
     */
    public function newData(array $points = array(), $serieName = "Serie1")
    {
        $className = $this->namespace.'pData';
        $data = new $className(); 
        if (count($points) > 0) {
            $data->addPoint($points, $serieName);
        }
        return $data;
    }
    
    /**
     * Create a new pImage class. It requires the size of axis to be properly
     * constructed.
     * 
     * @param integer $XSize - length of the X axis
     * @param integer $YSize - length of the Y axis
     * @param \CpChart\Classes\pData $DataSet
     * @param boolean $TransparentBackground
     * @return \CpChart\Services\pImage
     */
    public function newImage(
        $XSize,
        $YSize,
        \CpChart\Classes\pData $DataSet = null,
        $TransparentBackground = false
    ) {
        $className = $this->namespace.'pImage';
        return new $className(
            $XSize,
            $YSize,
            $DataSet = null,
            $TransparentBackground = false
        );
    }
}
