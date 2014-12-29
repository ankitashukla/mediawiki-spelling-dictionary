mediawiki-spelling-dictionary
=============================
Spelling dictionary project aims at developing a collaborative dictionary for checking spellings of the words to help make Wikipedia articles in these languages more readable and professional and provide an opportunity for participation in improving spelling. 

##Installation

- Download and extract the file(s) in a directory called SpellingDictionary in your mediawiki/extensions folder. If you're a developer, then instead you should clone the repository.

- Add the following code at the bottom of your LocalSettings.php

```php
require_once "$IP/extensions/SpellingDictionary/SpellingDictionary.php";
```

- Done! Navigate to "Special:Version" on your wiki to verify that the extension is successfully installed.


####To add the table to the database
- For non-vagrant installations:

 -  Change to the maintenance directory
 - Run the update script:
 ```php update.php```

- For vagrant installations:

  - Run ```mwscript update.php``` in vagrant terminal

- You can also configure wgSpellingDictionaryDatabase global value as the name of database

```$GLOBALS['wgSpellingDictionaryDatabase'] = 'spellingdictionary';```
