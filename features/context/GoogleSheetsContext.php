<?php
namespace Sil\GoogleSheets\features\context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Sil\GoogleSheets\GoogleSheets;
use Sil\PhpEnv\Env;

class GoogleSheetsContext implements Context
{
    private $exceptionThrown;
    private $googleSheets;
    
    public function __construct()
    {
        $jsonAuthFilePath = Env::requireEnv('TEST_JSON_AUTH_FILE_PATH');
        $this->googleSheets = new GoogleSheets(
            'Sil\GoogleSheets library',
            __DIR__ . '/../../' . $jsonAuthFilePath
        );
    }
    
    /**
     * @When I append data to a Google Sheet
     */
    public function iAppendDataToAGoogleSheet()
    {
        $spreadsheetId = Env::requireEnv('TEST_SPREADSHEET_ID');
        $this->googleSheets->append(
            [
                ['The', 'first', 'row'],
                ['The', 'second', 'row'],
            ],
            $spreadsheetId
        );
    }
}
