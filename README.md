mediawiki-spelling-dictionary
=============================
Spelling dictionary project aims at developing a collaborative dictionary for checking spellings of the words to help make Wikipedia articles in these languages more readable and professional and provide an opportunity for participation in improving spelling. 

##Installation

Clone the git repo in mediawiki/extensions
Add the following line to your LocalSettings.php

```php
require_once "$IP/extensions/SpellingDictionary/SpellingDictionary.php";
```

####To add the table to the database
- For non-vagrant installations:

 -  Change to the maintenance directory
 - Run the update script:
 - ```php update.php```

- For vagrant installations:

Run ```mwscript update.php``` in vagrant terminal
