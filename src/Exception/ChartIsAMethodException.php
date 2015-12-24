<?php

namespace CpChart\Exception;

use Exception;

/**
 * @author Piotr Szymaszek
 */
class ChartIsAMethodException extends FactoryException
{
    protected $message = 'The requested chart is not a seperate class, to draw'
        . ' it you need to call the "%s" method on the Image object'
        . ' after populating it with data!'
        . ' Check the documentation on library\'s website for details.'
    ;

    /**
     * @param string $method - the method which is supposed to be used
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($method, $code = null, Exception $previous = null)
    {
        parent::__construct(sprintf($this->message, $method), $code, $previous);
    }
}
