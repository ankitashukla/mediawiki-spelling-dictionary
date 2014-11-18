spelling-dictionary-opw
=======================
Spelling dictionaries for the major languages of the world (English, Italian, French) help make Wikipedia articles in these languages more readable and professional and provide an opportunity for participation in improving spelling. 
Many languages, however, don’t have spelling dictionaries. 

This project aims at developing a collaborative dictionary which shall also have an additional feature of checking spellings of the words. 
This is to be achieved with the collaborative efforts of the mediawiki community using crowd-sourcing, as a MediaWiki extension integrated with VisualEditor, and possibly using Wikidata as a backend. We need to create something that's useful as VE module. 

The essence of the project shall aim to develop an admin panel where the administrator/moderator will be able to manage the submissions: verify the suggested spellings of the words, accept them, reject them, filter and build new versions of the spelling dictionary upon them. A simple start to the project could be by starting with a simple list of words.



**Suggested Table Structures**
---
**suggestions**

|User|Word|meaning|verified (no by default)|related terms (phrases, synonyms,antonyms)|

First Header  | Second Header
----------------- | -------------
Content Cell  | Content Cell
Content Cell  | Content Cell

where related terms refer to phrases, synonyms, antonyms etc

**admin_panel form**
|Word|meaning|

|Accept  |Reject|
|Reason for rejecting
|

- If a word is accepted, verified is set to true, and the word is removed from ‘suggestions’ and added to ‘words’ 

**words**
|Word|meaning|related terms(phrases,synonyms,antonyms)|

- If rejected, the word is removed from suggestions and added to review_language
- For rejected words: add the word to review_language table, where other contributors could have a look and suggest meanings and spelling

**review_language**
|Word|suggested meaning|Reason for rejecting|

- Any word from table review_language can be re-edited, and re-suggested, and again added to the suggestions table 

**Words page** (visible to admin only):

This page will facilitate editing of already added words. Here, admins can see all the words that are in the dictionary and edit them(change/remove/put into review). 
If a word is put into review, then it will go to suggestions table and will be treated as a new entry for the dictionary.


The detailed time line can be read [here](http://www.mediawiki.org/wiki/User:Ankitashukla/Proposal)
