SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Database: `spelling_dictionary`
-- --------------------------------------------------------
-- Table structure for table `word_list`

CREATE TABLE IF NOT EXISTS `spell_dict_word_list` (
  `words` varchar(50) NOT NULL,
  `language` varchar(20) NOT NULL COMMENT 'Language to which the word belongs',
  `timestamp` double NOT NULL,
  `user` varchar(40) NOT NULL COMMENT 'Name of the user who submitted the word'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
