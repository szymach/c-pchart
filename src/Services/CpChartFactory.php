<?php
namespace CpChart\Services;

use CpChart\Classes\CpData;
use CpChart\Classes\CpImage;
use CpChart\Exception\CpChartFactoryException;

/**
 * A simple service class utilizing the Factory design pattern. It has three
 * class specific methods, as well as a generic loader for the chart classes.
 *
 * @author szymach @ http://github.com/szymach
 */
class CpChartFactory
{
    private $namespace = 'CpChart\Classes\\';

    /**
     * Loads a new chart class (scatter, pie etc.). Some classes require instances of
     * pImage and CpData classes passed into their constructor. These classes are:
     * CpBubble, CpPie, CpScatter, CpStock, CpSurface and CpIndicator. Otherwise the
     * pChartObject and CpDataObject parameters are redundant.
     *
     * ATTENTION! SOME OF THE CHARTS NEED TO BE DRAWN VIA A METHOD FROM THE
     * 'pImage' CLASS (ex. 'drawBarChart'), NOT THROUGH THIS METHOD! READ THE
     * DOCUMENTATION FOR MORE DETAILS.
     *
     * @param string $chartType - type of the chart to be loaded (for example 'pie', not 'pPie')
     * @param CpImage $chartObject
     * @param CpData $dataObject
     * @return \CpChart\Classes\$chartName
     */
    public function newChart(
        $chartType,
        CpImage $chartObject = null,
        CpData $dataObject = null
    ) {
        $this->checkChartType($chartType);
        $className = sprintf('%sCp%s', $this->namespace, ucfirst($chartType));
        if (!class_exists($className)) {
            throw new CpChartFactoryException(
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
        $methods = array(
            'draw'.ucfirst($chartType).'Chart',
            'draw'.ucfirst($chartType)
        );
        foreach ($methods as $method) {
            if (method_exists($this->namespace.'pImage', $method)) {
                throw new CpChartFactoryException(
                    'The requested chart is not a seperate class, to draw it you'
                    . ' need to call the "'.$method.'" method on the pImage object'
                    . ' after populating it with data!'
                    . ' Check the documentation on library\'s website for details.'
                );
            }
        }
    }

    /**
     * Creates a new CpData class with an option to pass the data to form a serie.
     *
     * @param array $points - points to be added to serie
     * @param string $serieName - name of the serie
     * @return CpData
     */
    public function newData(array $points = array(), $serieName = "Serie1")
    {
        $className = $this->namespace.'CpData';
        $data = new $className();
        if (count($points) > 0) {
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
     * @param CpData $DataSet - CpData class populated with points
     * @param boolean $TransparentBackground
     * @return pImage
     */
    public function newImage(
        $XSize,
        $YSize,
        CpData $DataSet = null,
        $TransparentBackground = false
    ) {
        $className = sprintf('%sCpImage', $this->namespace);
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
     * @param string $number - number identifing the pBarcode class ("39" or "128")
     * @param string $BasePath - optional path for the file containing the class data
     * @param boolean $EnableMOD43
     * @return pBarcode(39|128)
     * @throws Exception
     */
    public function getBarcode($number, $BasePath = "", $EnableMOD43 = false)
    {
        if ($number != "39" && $number != "128") {
            throw new CpChartFactoryException(
                'The barcode class for the provided number does not exist!'
            );
        }
        $className = sprintf("%sCpBarcode%s", $this->namespace, $number);
        return new $className($BasePath, $EnableMOD43);
    }
}
