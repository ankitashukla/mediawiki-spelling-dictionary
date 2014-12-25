
**Suggested Table Structures**
=========================

Here's a suggested database layout that would be implemented. 


**word_list**

| User | Word | language | timestamp |
|------|------|----------|-----------|

where related terms refer to phrases, synonyms, antonyms etc


**Two pages**
- Special:SpellingDictionary
- Special:SpellingDictionaryAdmin



**Special:SpellingDictionaryAdmin Page**

- List of words
- Editing rights
- Verifying the words

| Accept | Reject               |
|--------|----------------------|
|        | Reason for rejecting |


Other Options
- Import a script (to add words)



**Words page** (visible to admin only):

This page will facilitate editing of already added words. Here, admins can see all the words that are in the dictionary and edit them(change/remove/put into review). 
If a word is put into review, then it will go to suggestions table and will be treated as a new entry for the dictionary.
