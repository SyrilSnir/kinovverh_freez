<?php

namespace app\kv\exceptions;

/**
 * Исключение, генерируемое при несоответствии типов передаваемых в функцию значчений
 *
 * @author kotov
 */
class TypeMissmatchException extends \Exception
{
    public function __construct($message = "Не соответсвие типов передаваемых данных", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
