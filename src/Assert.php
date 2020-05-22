<?php
namespace Sil\GoogleSheets;

use InvalidArgumentException;

class Assert
{
    public static function fileExists(string $filePath)
    {
        if (! file_exists($filePath)) {
            throw new InvalidArgumentException(sprintf(
                'File path of %s provided, but no such file exists.',
                json_encode($filePath)
            ));
        }
    }
    
    public static function isNotEmpty($value, $description = 'Value')
    {
        if (empty($value)) {
            throw new InvalidArgumentException(sprintf(
                '%s required, but none was provided.',
                $description
            ));
        }
    }
}
