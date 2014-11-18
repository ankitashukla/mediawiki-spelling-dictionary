
**Suggested Table Structures**
=========================

Here's a suggested database layout that would be implemented. 


**suggestions**

| User | Word | meaning | verified (no by default) | related terms |
|------|------|---------|--------------------------|---------------|

where related terms refer to phrases, synonyms, antonyms etc

**admin_panel form**

| Word | meaning |
|------|---------|

| Accept | Reject               |
|--------|----------------------|
|        | Reason for rejecting |

- If a word is accepted, verified is set to true, and the word is removed from ‘suggestions’ and added to ‘words’ 

**words**

| Word | meaning | related terms (phrases,synonyms,antonyms) |
|------|---------|-------------------------------------------|


- If rejected, the word is removed from suggestions and added to review_language
- For rejected words: add the word to review_language table, where other contributors could have a look and suggest meanings and spelling

**review_language**

| Word | suggested meaning | Reason for rejecting |
|------|-------------------|----------------------|

- Any word from table review_language can be re-edited, and re-suggested, and again added to the suggestions table 

**Words page** (visible to admin only):

This page will facilitate editing of already added words. Here, admins can see all the words that are in the dictionary and edit them(change/remove/put into review). 
If a word is put into review, then it will go to suggestions table and will be treated as a new entry for the dictionary.
