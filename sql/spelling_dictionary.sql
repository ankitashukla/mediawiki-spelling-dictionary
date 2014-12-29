-- Table structure for table `spell_dict_word_list`

CREATE TABLE /*_*/spell_dict_word_list (
	sd_word varchar(50) NOT NULL,
	sd_language varchar(20) NOT NULL COMMENT 'Language to which the word belongs',
	sd_timestamp varbinary(14) NOT NULL,
	sd_user varchar(40) NOT NULL COMMENT 'Name of the user who submitted the word'
)/*$wgDBTableOptions*/;