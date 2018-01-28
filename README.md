# Cockpit-EmailOnSave

Extend Cockpit core functionality by sending a customized email when a collection is saved. Such functionality can be useful when collections are saved outside of the CMS.

## Installation

1. Confirm that you have cockpit configured to send emails
2. Download zip and extract to 'your-cockpit-docroot/addons' (e.g. cockpitcms/addons/EmailOnSave)
3. Access module settings (http://<your-cockpit-site>/emailonsave) and confirm that configuration page is loaded

## Configuration

On the configuration page there are 2 main sections, the first, on the left, will provide email specific configurations:

* Email To email value (one email or multiple emails separated by comma)
* Email Subject text
* Email Body template, a token string ([:data]) can be used to include the collection data

On the right, there is a list with all available collections, enabling a specific collection will trigger the email every time the collection is saved.

![Configuration](https://monosnap.com/file/Yc3iO0h1E6pfhqfdVODvn2fPuxtIym.png)

Using the default template, an email will render as below:

![Email](https://monosnap.com/file/r2xSeWnAta5GnTyT70mRUyfjMHzGeA.png)

## Copyright and license

Copyright 2018 pauloamgomes under the MIT license.
