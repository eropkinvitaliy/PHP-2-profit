<?php

namespace App\Core\Runtime;

use Exception;

class Logging
{
    const DEFAULT_FILENAME = __DIR__ . '/../../templates/runtime/logexception.txt';

    /**
     * Метод записывает в файл информацию о возникших во время работы Исключениях
     *
     * @param Exception $e
     * @param string $filename по умолчанию DEFAULT_FILENAME
     */
    public static function toFile(Exception $e, $filename = '')
    {
        $filename = !empty($filename) ? $filename : self::DEFAULT_FILENAME;
        $data = date('d-m-Y H:m:s') . '  ' . $e->getFile() . '  в строке: ' .
            $e->getLine() . ' код ошибки:  ' . $e->getCode() . '  ' . $e->getMessage();
        file_put_contents($filename, $data . PHP_EOL, FILE_APPEND);
    }
}