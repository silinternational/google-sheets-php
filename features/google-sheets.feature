Feature: Interacting with Google Sheets
  
  Scenario: Appending data to a Google Sheet
    When I append data to a Google Sheet
    Then an exception should NOT have been thrown
