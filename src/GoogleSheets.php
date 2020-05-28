<?php
namespace Sil\GoogleSheets;

use Google_Client;
use Google_Exception;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class GoogleSheets
{
    /**
     * @var Google_Service_Sheets
     */
    private $sheets;
    
    /**
     * @param string $applicationName The Application Name to use with Google_Client.
     * @param string $jsonAuthFilePath The path to the JSON file with authentication credentials from Google.
     * @param string[] $scopes OAuth Scopes needed for reading/writing sheets.
     * @throws Google_Exception
     */
    public function __construct(
        string $applicationName,
        string $jsonAuthFilePath,
        array $scopes = [Google_Service_Sheets::SPREADSHEETS]
    ) {
        Assert::isNotEmpty($applicationName, 'applicationName');
        Assert::fileExists($jsonAuthFilePath);
        
        $googleClient = new Google_Client();
        $assertionCredentials = $googleClient->loadServiceAccountJson(
            $jsonAuthFilePath,
            $scopes
        );
        $googleClient->setAssertionCredentials($assertionCredentials);
        $this->sheets = new Google_Service_Sheets($googleClient);
    }
    
    /**
     * Append the provided data to the specified Google Sheet.
     *
     * @param array $data
     * @param string $spreadsheetId The Spreadsheet ID
     * @param string $tabName The name of the tab within the Google Sheet
     */
    public function append(
        array $data,
        string $spreadsheetId,
        string $tabName = 'Sheet1'
    ) {
        Assert::isNotEmpty($spreadsheetId, 'Spreadsheet ID');
        
        $range = sprintf('%s!A1:A1000', $tabName);
        $postBody = new Google_Service_Sheets_ValueRange([
            'range' => $range,
            'majorDimension' => 'COLUMNS',
            'values' => [$data],
        ]);
        $this->sheets->spreadsheets_values->append(
            $spreadsheetId,
            $range,
            $postBody,
            ['valueInputOption' => 'USER_ENTERED']
        );
    }
}
