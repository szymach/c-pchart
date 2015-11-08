<?php
namespace CpChart\Factory;

use CpChart\Classes\Data;
use CpChart\Classes\Image;
use CpChart\Exception\FactoryException;

/**
 * A simple service class utilizing the Factory design pattern. It has three
 * class specific methods, as well as a generic loader for the chart classes.
 *
 * @author szymach @ http://github.com/szymach
 */
class Factory
{
    private $namespace;

    public function __construct($namespace = 'CpChart\Classes')
    {
        $this->namespace = $namespace;
    }
    
    /**
     * Loads a new chart class (scatter, pie etc.). Some classes require instances of
     * pImage and Data classes passed into their constructor. These classes are:
     * CpBubble, CpPie, CpScatter, CpStock, CpSurface and CpIndicator. Otherwise the
     * pChartObject and DataObject parameters are redundant.
     *
     * ATTENTION! SOME OF THE CHARTS NEED TO BE DRAWN VIA A METHOD FROM THE
     * 'pImage' CLASS (ex. 'drawBarChart'), NOT THROUGH THIS METHOD! READ THE
     * DOCUMENTATION FOR MORE DETAILS.
     *
     * @param string $chartType - type of the chart to be loaded (for example 'pie', not 'pPie')
     * @param Image $chartObject
     * @param Data $dataObject
     * @return \CpChart\Classes\$chartName
     */
    public function newChart(
        $chartType,
        Image $chartObject = null,
        Data $dataObject = null
    ) {
        $this->checkChartType($chartType);
        $className = $this->prependNamespace(ucfirst($chartType));
        
        if (!class_exists($className)) {
            throw new FactoryException(
                'The requested chart class does not exist!'
            );
        }
        return new $className($chartObject, $dataObject);
    }

    /**
     * Checks if the requested chart type is created via one of the methods in
     * the CpDraw class, instead through a seperate class. If a method in CpDraw
     * exists, an exception with proper information is thrown.
     *
     * @param string $chartType
     * @throws Exception
     */
    private function checkChartType($chartType)
    {
        $chart = ucfirst($chartType);
        $methods = array(sprintf('draw%sChart', $chart), sprintf('draw%s', $chart));
        $imageObject = $this->prependNamespace('Image');
        
        foreach ($methods as $method) {
            if (method_exists($imageObject, $method)) {
                throw new FactoryException(
                    'The requested chart is not a seperate class, to draw it you'
                    . ' need to call the "'.$method.'" method on the pImage object'
                    . ' after populating it with data!'
                    . ' Check the documentation on library\'s website for details.'
                );
            }
        }
    }

    /**
     * Creates a new Data class with an option to pass the data to form a serie.
     *
     * @param array $points - points to be added to serie
     * @param string $serieName - name of the serie
     * @return Data
     */
    public function newData(array $points = array(), $serieName = "Serie1")
    {
        $className = $this->prependNamespace('Data');
        $data = new $className();
        if (!empty($points)) {
            $data->addPoints($points, $serieName);
        }
        return $data;
    }

    /**
     * Create a new pImage class. It requires the size of axes to be properly
     * constructed.
     *
     * @param integer $XSize - length of the X axis
     * @param integer $YSize - length of the Y axis
     * @param Data $DataSet - Data class populated with points
     * @param boolean $TransparentBackground
     * @return pImage
     */
    public function newImage(
        $XSize,
        $YSize,
        Data $DataSet = null,
        $TransparentBackground = false
    ) {
        $className = $this->prependNamespace('Image');
        return new $className(
            $XSize,
            $YSize,
            $DataSet,
            $TransparentBackground
        );
    }

    /**
     * Create one of the pBarcode classes. Only the number is required (39 or 128),
     * the class name is contructed on the fly. Passing the constructor's parameters
     * is also available, but not mandatory.
     *
     * @param int $number - number identifing the pBarcode class ("39" or "128")
     * @param string $BasePath - optional path for the file containing the class data
     * @param boolean $EnableMOD43
     * @return pBarcode(39|128)
     * @throws Exception
     */
    public function getBarcode($number, $BasePath = "", $EnableMOD43 = false)
    {
        if ($number != 39 && $number != 128) {
            throw new FactoryException(
                'The barcode class for the provided number does not exist!'
            );
        }
        $className = sprintf("%s%s", $this->prependNamespace('CpBarcode'), $number);

        return new $className($BasePath, $EnableMOD43);
    }
    
    private function prependNamespace($class)
    {
        return sprintf('%s\%s', $this->namespace, $class);
    }
}
