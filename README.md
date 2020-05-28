# Google Sheets PHP

A simple library for pushing data to a Google Sheet using the Google PHP API
Client **version 1**.

## Authorization

To use this library to push data to a Google Sheet...

1. Go to the Google Developers Console.
2. If you do not yet have a project that you plan to use this with, create one.
3. Enable the "Google Sheets API" for that project.
4. Create credentials for the project:
  - To use the Google Sheets API
  - From a web server
  - To access application data
  - Not using Google App Engine or Computer Engine
  - Give it a service account name
  - Don't give it a role
  - Select the JSON key option
5. Save that JSON file to some private folder where your code can access it.
6. Get the Spreadsheet ID of the Google Sheet that you want to push data to. It
   is shown in its URL after the "https://docs.google.com/spreadsheets/d/"
   prefix, up until the next "/". 
7. Share that Google Sheet (cf. the spreadsheet ID) with the `client_email`
   value found in your Google credentials JSON file, giving it permission to
   edit the spreadsheet.

Viola! You should now be able to push data to that Google Sheet.

## Testing

To test this library (and that your permissions are set up correctly)...

1. Clone this repo to your local machine.
2. Put your JSON credentials file in the "credentials" folder (Git is set to
   ignore that folder's contents... DO NOT COMMIT YOUR JSON FILE TO GIT).
3. Copy the `local.env.dist` file to `local.env`, giving it the requested
   values.
4. Open a terminal to the root of the repo and run `make`.
5. Look at your Google Sheet and verify that data has been appended.

## Resources

How to use the Google PHP API Client (v1) that this uses:
- https://github.com/googleapis/google-api-php-client/blob/v1.1.8/examples/service-account.php

Documentation on the `append` Google Sheets API:
- https://developers.google.com/sheets/api/reference/rest/v4/spreadsheets.values/append
