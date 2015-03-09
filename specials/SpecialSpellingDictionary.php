<?php
/**
 * SpellingDictionary SpecialPage for SpellingDictionary extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialSpellingDictionary extends SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'SpellingDictionary' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:SpellingDictionary/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'title-special' ) );

		// Parses message from .i18n.php as wikitext and adds it to the
		// page output.
		$out->addWikiMsg( 'intro-paragraph' );
		$formDescriptor = array(
			'word' => array(
				'type' => 'text',
				'label-message' => 'spell-dict-word',
				'required' => true,
			),
			'language' => array(
				'type' => 'select',
				'label-message' => 'spell-dict-language',
				'required' => true,
				'options' => array(
					'Qafár af' => 'aa',	# Afar
					'Аҧсшәа' => 'ab',	# Abkhaz
					'Acèh' => 'ace',	# Aceh
					'تونسي' => 'aeb',	# Tunisian Arabic
					'Afrikaans' => 'af',	# Afrikaans
					'Akan' => 'ak',		# Akan
					'Gegë' => 'aln',	# Gheg Albanian
					'Alemannisch' => 'als',	# Alemannic -- not a valid code, for compatibility. See gsw.
					'አማርኛ' => 'am',	# Amharic
					'aragonés' => 'an',	# Aragonese
					'Ænglisc' => 'ang',	# Old English, bug 23283
					'अङ्गिका' => 'anp',	# Angika
					'العربية' => 'ar',	# Arabic
					'ܐܪܡܝܐ' => 'arc',	# Aramaic
					'mapudungun' => 'arn',	# Mapuche, Mapudungu, Araucanian (Araucano)
					'جازايرية' => 'arq', # Algerian Spoken Arabic
					'Maġribi' => 'ary',	# Moroccan Spoken Arabic
					'مصرى' => 'arz',	# Egyptian Spoken Arabic
					'অসমীয়া' => 'as',	# Assamese
					'asturianu' => 'ast',	# Asturian
					'авар' => 'av',	# Avar
					'Kotava' => 'avk', # Kotava
					'Aymar aru' => 'ay',	# Aymara
					'azərbaycanca' => 'az',	# Azerbaijani
					'تورکجه' => 'azb',	# South Azerbaijani
					'башҡортса' => 'ba',	# Bashkir
					'Boarisch' => 'bar',	# Bavarian (Austro-Bavarian and South Tyrolean)
					'žemaitėška' => 'bat-smg', # Samogitian (deprecated code, 'sgs' in ISO 693-3 since 2010-06-30 )
					'Batak Toba' => 'bbc', # Batak Toba (falls back to bbc-latn)
					'Batak Toba' => 'bbc-latn', # Batak Toba
					'بلوچی مکرانی' => 'bcc', # Southern Balochi
					'Bikol Central' => 'bcl', # Bikol: Central Bicolano language
					'беларуская' => 'be',	#  Belarusian normative
					"беларуская (тарашкевіца)\xE2\x80\x8E" => 'be-tarask',	# Belarusian in Taraskievica orthography
					"беларуская (тарашкевіца)\xE2\x80\x8E" => 'be-x-old',	# (be-tarask compat)
					'български' => 'bg',	# Bulgarian
					'بلوچی رخشانی' => 'bgn', # Western Balochi
					'भोजपुरी' => 'bh',	# Bihari macro language. Falls back to Bhojpuri (bho)
					'भोजपुरी' => 'bho',	# Bhojpuri
					'Bislama' => 'bi',		# Bislama
					'Bahasa Banjar' => 'bjn',	# Banjarese
					'bamanankan' => 'bm',	# Bambara
					'বাংলা' => 'bn',	# Bengali
					'བོད་ཡིག' => 'bo',	# Tibetan
					'বিষ্ণুপ্রিয়া মণিপুরী' => 'bpy',	# Bishnupriya Manipuri
					'بختياري' => 'bqi',	# Bakthiari
					'brezhoneg' => 'br',	# Breton
					'Bráhuí' => 'brh',	# Brahui
					'bosanski' => 'bs',		# Bosnian
					'Iriga Bicolano' => 'bto',	# Rinconada Bikol
					'ᨅᨔ ᨕᨘᨁᨗ' => 'bug',	# Buginese
					'буряад' => 'bxr',	# Buryat (Russia)
					'català' => 'ca',	# Catalan
					'Chavacano de Zamboanga' => 'cbk-zam',	# Zamboanga Chavacano
					'Mìng-dĕ̤ng-ngṳ̄' => 'cdo',	# Min Dong
					'нохчийн' => 'ce',	# Chechen
					'Cebuano' => 'ceb',     # Cebuano
					'Chamoru' => 'ch',		# Chamorro
					'Choctaw' => 'cho',		# Choctaw
					'ᏣᎳᎩ' => 'chr', # Cherokee
					'Tsetsêhestâhese' => 'chy',	# Cheyenne
					'کوردی' => 'ckb',	# Sorani. The name actually says "Kurdi" (Kurdish).
					'corsu' => 'co',		# Corsican
					'Capiceño' => 'cps', # Capiznon
					'Nēhiyawēwin / ᓀᐦᐃᔭᐍᐏᐣ' => 'cr',		# Cree
					'qırımtatarca' => 'crh',   # Crimean Tatar (multiple scripts - defaults to Latin)
					"qırımtatarca (Latin)\xE2\x80\x8E" => 'crh-latn',       # Crimean Tatar (Latin)
					"къырымтатарджа (Кирилл)\xE2\x80\x8E" => 'crh-cyrl',       # Crimean Tatar (Cyrillic)
					'čeština' => 'cs',	# Czech
					'kaszëbsczi' => 'csb',	# Cassubian
					'словѣньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ' => 'cu',	# Old Church Slavonic (ancient language)
					'Чӑвашла' => 'cv',	# Chuvash
					'Cymraeg' => 'cy',		# Welsh
					'dansk' => 'da',		# Danish
					'Deutsch' => 'de',		# German ("Du")
					'Österreichisches Deutsch' => 'de-at',		# Austrian German
					'Schweizer Hochdeutsch' => 'de-ch',		# Swiss Standard German
					"Deutsch (Sie-Form)\xE2\x80\x8E" => 'de-formal',		# German - formal address ("Sie")
					'Zazaki' => 'diq',		# Zazaki
					'dolnoserbski' => 'dsb', # Lower Sorbian
					'Dusun Bundu-liwan' => 'dtp', # Central Dusun
					'ދިވެހިބަސް' => 'dv',		# Dhivehi
					'ཇོང་ཁ' => 'dz',		# Dzongkha (Bhutan)
					'eʋegbe' => 'ee',	# Éwé
					'Emiliàn' => 'egl',	# Emilian
					'Ελληνικά' => 'el',	# Greek
					'emiliàn e rumagnòl' => 'eml',	# Emiliano-Romagnolo / Sammarinese
					'English' => 'en',		# English
					'Canadian English' => 'en-ca',	# Canadian English
					'British English' => 'en-gb',	# British English
					'Esperanto' => 'eo',	# Esperanto
					'español' => 'es',	# Spanish
					'eesti' => 'et',		# Estonian
					'euskara' => 'eu',		# Basque
					'estremeñu' => 'ext', # Extremaduran
					'فارسی' => 'fa',	# Persian
					'Fulfulde' => 'ff',		# Fulfulde, Maasina
					'suomi' => 'fi',		# Finnish
					'meänkieli' => 'fit', # Tornedalen Finnish
					'Võro' => 'fiu-vro',    # Võro (deprecated code, 'vro' in ISO 639-3 since 2009-01-16)
					'Na Vosa Vakaviti' => 'fj',	# Fijian
					'føroyskt' => 'fo',	# Faroese
					'français' => 'fr',	# French
					'français cadien' => 'frc', # Cajun French
					'arpetan' => 'frp',	# Franco-Provençal/Arpitan
					'Nordfriisk' => 'frr',	# North Frisian
					'furlan' => 'fur',		# Friulian
					'Frysk' => 'fy',		# Frisian
					'Gaeilge' => 'ga',		# Irish
					'Gagauz' => 'gag',		# Gagauz
					'贛語' => 'gan',		# Gan (multiple scripts - defaults to Traditional)
					"赣语（简体）\xE2\x80\x8E" => 'gan-hans',	# Gan (Simplified Han)
					"贛語（繁體）\xE2\x80\x8E" => 'gan-hant',	# Gan (Traditional Han)
					'Gàidhlig' => 'gd',	# Scots Gaelic
					'galego' => 'gl',		# Galician
					'گیلکی' => 'glk',	# Gilaki
					'Avañe\'ẽ' => 'gn',	# Guaraní, Paraguayan
					'Konknni' => 'gom-latn',	# Goan Konkani (Latin script)
					'𐌲𐌿𐍄𐌹𐍃𐌺' => 'got',	# Gothic
					'Ἀρχαία ἑλληνικὴ' => 'grc', # Ancient Greek
					'Alemannisch' => 'gsw',	# Alemannic
					'ગુજરાતી' => 'gu',	# Gujarati
					'Gaelg' => 'gv',		# Manx
					'Hausa' => 'ha',	# Hausa
					'客家語/Hak-kâ-ngî' => 'hak',	# Hakka
					'Hawai`i' => 'haw',		# Hawaiian
					'עברית' => 'he',	# Hebrew
					'हिन्दी' => 'hi',	# Hindi
					'Fiji Hindi' => 'hif',	# Fijian Hindi (multiple scripts - defaults to Latin)
					'Fiji Hindi' => 'hif-latn',	# Fiji Hindi (latin)
					'Ilonggo' => 'hil',	# Hiligaynon
					'Hiri Motu' => 'ho',	# Hiri Motu
					'hrvatski' => 'hr',		# Croatian
					'Hunsrik' => 'hrx', # Riograndenser Hunsrückisch
					'hornjoserbsce' => 'hsb',	# Upper Sorbian
					'Kreyòl ayisyen' => 'ht',		# Haitian Creole French
					'magyar' => 'hu',		# Hungarian
					'Հայերեն' => 'hy',	# Armenian
					'Otsiherero' => 'hz',	# Herero
					'interlingua' => 'ia',	# Interlingua (IALA)
					'Bahasa Indonesia' => 'id',	# Indonesian
					'Interlingue' => 'ie',	# Interlingue (Occidental)
					'Igbo' => 'ig',			# Igbo
					'ꆇꉙ' => 'ii',	# Sichuan Yi
					'Iñupiak' => 'ik',	# Inupiak (Inupiatun, Northwest Alaska / Inupiatun, North Alaskan)
					'ᐃᓄᒃᑎᑐᑦ' => 'ike-cans',	# Inuktitut, Eastern Canadian (Unified Canadian Aboriginal Syllabics)
					'inuktitut' => 'ike-latn',	# Inuktitut, Eastern Canadian (Latin script)
					'Ilokano' => 'ilo',	# Ilokano
					'ГӀалгӀай' => 'inh',    # Ingush
					'Ido' => 'io',			# Ido
					'íslenska' => 'is',	# Icelandic
					'italiano' => 'it',		# Italian
					'ᐃᓄᒃᑎᑐᑦ/inuktitut' => 'iu',	# Inuktitut (macro language, see ike/ikt, falls back to ike-cans)
					'日本語' => 'ja',	# Japanese
					'Patois' => 'jam',	# Jamaican Creole English
					'Lojban' => 'jbo',		# Lojban
					'jysk' => 'jut',	# Jutish / Jutlandic
					'Basa Jawa' => 'jv',	# Javanese
					'ქართული' => 'ka',	# Georgian
					'Qaraqalpaqsha' => 'kaa',	# Karakalpak
					'Taqbaylit' => 'kab',	# Kabyle
					'Адыгэбзэ' => 'kbd',	# Kabardian
					'Адыгэбзэ' => 'kbd-cyrl',	# Kabardian (Cyrillic)
					'Kongo' => 'kg',	# Kongo, (FIXME!) should probaly be KiKongo or KiKoongo
					'کھوار' => 'khw',	# Khowar
					'Gĩkũyũ' => 'ki',	# Gikuyu
					'Kırmancki' => 'kiu',	# Kirmanjki
					'Kwanyama' => 'kj',	# Kwanyama
					'қазақша' => 'kk',	# Kazakh (multiple scripts - defaults to Cyrillic)
					"قازاقشا (تٴوتە)\xE2\x80\x8F" => 'kk-arab',	# Kazakh Arabic
					"қазақша (кирил)\xE2\x80\x8E" => 'kk-cyrl',	# Kazakh Cyrillic
					"qazaqşa (latın)\xE2\x80\x8E" => 'kk-latn',	# Kazakh Latin
					"قازاقشا (جۇنگو)\xE2\x80\x8F" => 'kk-cn',	# Kazakh (China)
					"қазақша (Қазақстан)\xE2\x80\x8E" => 'kk-kz',	# Kazakh (Kazakhstan)
					"qazaqşa (Türkïya)\xE2\x80\x8E" => 'kk-tr',	# Kazakh (Turkey)
					'kalaallisut' => 'kl',	# Inuktitut, Greenlandic/Greenlandic/Kalaallisut (kal)
					'ភាសាខ្មែរ' => 'km',	# Khmer, Central
					'ಕನ್ನಡ' => 'kn',	# Kannada
					'한국어' => 'ko',	# Korean
					'한국어 (조선)' => 'ko-kp',	# Korean (DPRK)
					'Перем Коми' => 'koi', # Komi-Permyak
					'Kanuri' => 'kr',		# Kanuri, Central
					'къарачай-малкъар' => 'krc', # Karachay-Balkar
					'Krio' => 'kri', # Krio
					'Kinaray-a' => 'krj', # Kinaray-a
					'कॉशुर / کٲشُر' => 'ks',	# Kashmiri (multiple scripts - defaults to Perso-Arabic)
					'کٲشُر' => 'ks-arab',	# Kashmiri (Perso-Arabic script)
					'कॉशुर' => 'ks-deva',	# Kashmiri (Devanagari script)
					'Ripoarisch' => 'ksh',	# Ripuarian
					'Kurdî' => 'ku',	# Kurdish (multiple scripts - defaults to Latin)
					"Kurdî (latînî)\xE2\x80\x8E" => 'ku-latn',	# Northern Kurdish (Latin script)
					"كوردي (عەرەبی)\xE2\x80\x8F" => 'ku-arab',	# Northern Kurdish (Arabic script) (falls back to ckb)
					'коми' => 'kv',	# Komi-Zyrian (Cyrillic is common script but also written in Latin script)
					'kernowek' => 'kw',		# Cornish
					'Кыргызча' => 'ky',	# Kirghiz
					'Latina' => 'la',		# Latin
					'Ladino' => 'lad',	# Ladino
					'Lëtzebuergesch' => 'lb',	# Luxemburguish
					'лакку' => 'lbe',	# Lak
					'лезги' => 'lez',	# Lezgi
					'Lingua Franca Nova' => 'lfn',	# Lingua Franca Nova
					'Luganda' => 'lg',		# Ganda
					'Limburgs' => 'li',	# Limburgian
					'Ligure' => 'lij',	# Ligurian
					'Līvõ kēļ' => 'liv',	# Livonian
					'lumbaart' => 'lmo',	# Lombard
					'lingála' => 'ln',		# Lingala
					'ລາວ' => 'lo',	# Laotian
					'لوری' => 'lrc',	# Northern Luri
					'Silozi' => 'loz', # Lozi
					'lietuvių' => 'lt',	# Lithuanian
					'latgaļu' => 'ltg', 	# Latgalian
					'Mizo ţawng' => 'lus', # Mizo/Lushai
					'latviešu' => 'lv',	# Latvian
					'文言' => 'lzh',	# Literary Chinese, bug 8217
					'Lazuri' => 'lzz',	# Laz
					'मैथिली' => 'mai', # Maithili
					'Basa Banyumasan' => 'map-bms', # Banyumasan
					'мокшень' => 'mdf',		# Moksha
					'Malagasy' => 'mg',		# Malagasy
					'Ebon' => 'mh',			# Marshallese
					'олык марий' => 'mhr',	# Eastern Mari
					'Māori' => 'mi',	# Maori
					'Baso Minangkabau' => 'min',	# Minangkabau
					'македонски' => 'mk',	# Macedonian
					'മലയാളം' => 'ml',	# Malayalam
					'монгол' => 'mn',	# Halh Mongolian (Cyrillic) (ISO 639-3: khk)
					'молдовеняскэ' => 'mo',	# Moldovan, deprecated
					'मराठी' => 'mr',	# Marathi
					'кырык мары' => 'mrj',	# Hill Mari
					'Bahasa Melayu' => 'ms',	# Malay
					'Malti' => 'mt',	# Maltese
					'Mvskoke' => 'mus',	# Muskogee/Creek
					'Mirandés' => 'mwl',	# Mirandese
					'မြန်မာဘာသာ' => 'my',		# Burmese
					'эрзянь' => 'myv',	# Erzya
					'مازِرونی' => 'mzn',		# Mazanderani
					'Dorerin Naoero' => 'na',		# Nauruan
					'Nāhuatl' => 'nah',		# Nahuatl (not in ISO 639-3)
					'Bân-lâm-gú' => 'nan', # Min-nan, bug 8217
					'Napulitano' => 'nap',	# Neapolitan, bug 43793
					"norsk bokmål" => 'nb',		# Norwegian (Bokmal)
					'Plattdüütsch' => 'nds',	# Low German ''or'' Low Saxon
					'Nedersaksies' => 'nds-nl',	# aka Nedersaksisch: Dutch Low Saxon
					'नेपाली' => 'ne',	# Nepali
					'नेपाल भाषा' => 'new',		# Newar / Nepal Bhasha
					'Oshiwambo' => 'ng',		# Ndonga
					'Niuē' => 'niu',	# Niuean
					'Nederlands' => 'nl',	# Dutch
					"Nederlands (informeel)\xE2\x80\x8E" => 'nl-informal',	# Dutch (informal address ("je"))
					"norsk nynorsk" => 'nn',	# Norwegian (Nynorsk)
					"norsk bokmål" => 'no',		# Norwegian (falls back to nb).
					'Novial' => 'nov',		# Novial
					'Nouormand' => 'nrm',	# Norman
					'Sesotho sa Leboa' => 'nso',	# Northern Sotho
					'Diné bizaad' => 'nv',	# Navajo
					'Chi-Chewa' => 'ny',	# Chichewa
					'occitan' => 'oc',		# Occitan
					'Oromoo' => 'om',		# Oromo
					'ଓଡ଼ିଆ' => 'or',		# Oriya
					'Ирон' => 'os', # Ossetic, bug 29091
					'ਪੰਜਾਬੀ' => 'pa', # Eastern Punjabi (Gurmukhi script) (pan)
					'Pangasinan' => 'pag',	# Pangasinan
					'Kapampangan' => 'pam',   # Pampanga
					'Papiamentu' => 'pap',	# Papiamentu
					'Picard' => 'pcd',	# Picard
					'Deitsch' => 'pdc',	# Pennsylvania German
					'Plautdietsch' => 'pdt',	# Plautdietsch/Mennonite Low German
					'Pälzisch' => 'pfl',	# Palatinate German
					'पालि' => 'pi',	# Pali
					'Norfuk / Pitkern' => 'pih', # Norfuk/Pitcairn/Norfolk
					'polski' => 'pl',		# Polish
					'Piemontèis' => 'pms',	# Piedmontese
					'پنجابی' => 'pnb',	# Western Punjabi
					'Ποντιακά' => 'pnt',	# Pontic/Pontic Greek
					'Prūsiskan' => 'prg',	# Prussian
					'پښتو' => 'ps',	# Pashto, Northern/Paktu/Pakhtu/Pakhtoo/Afghan/Pakhto/Pashtu/Pushto/Yusufzai Pashto
					'português' => 'pt',	# Portuguese
					'português do Brasil' => 'pt-br',	# Brazilian Portuguese
					'Runa Simi' => 'qu',	# Southern Quechua
					'Runa shimi' => 'qug',	# Kichwa/Northern Quechua (temporarily used until Kichwa has its own)
					'Rumagnôl' => 'rgn',	# Romagnol
					'Tarifit' => 'rif',	# Tarifit
					'rumantsch' => 'rm',	# Raeto-Romance
					'Romani' => 'rmy',	# Vlax Romany
					'Kirundi' => 'rn',		# Rundi/Kirundi/Urundi
					'română' => 'ro',	# Romanian
					'armãneashti' => 'roa-rup', # Aromanian (deprecated code, 'rup' exists in ISO 693-3)
					'tarandíne' => 'roa-tara',	# Tarantino
					'русский' => 'ru',	# Russian
					'русиньскый' => 'rue',	# Rusyn
					'armãneashti' => 'rup', # Aromanian
					'Vlăheşte' => 'ruq',	# Megleno-Romanian (multiple scripts - defaults to Latin)
					'Влахесте' => 'ruq-cyrl',	# Megleno-Romanian (Cyrillic script)
					'Βλαεστε' => 'ruq-grek',	# Megleno-Romanian (Greek script)
					'Vlăheşte' => 'ruq-latn',	# Megleno-Romanian (Latin script)
					'Kinyarwanda' => 'rw',	# Kinyarwanda, should possibly be Kinyarwandi
					'संस्कृतम्' => 'sa',	# Sanskrit
					'саха тыла' => 'sah', # Sakha
					'Santali' => 'sat',	# Santali
					'sardu' => 'sc',		# Sardinian
					'sicilianu' => 'scn',	# Sicilian
					'Scots' => 'sco',       # Scots
					'سنڌي' => 'sd',	# Sindhi
					'Sassaresu' => 'sdc',	# Sassarese
					'sámegiella' => 'se',	# Northern Sami
					'Cmique Itom' => 'sei',	# Seri
					'Koyraboro Senni' => 'ses',	# Koyraboro Senni
					'Sängö' => 'sg',		# Sango/Sangho
					'žemaitėška' => 'sgs', # Samogitian
					'srpskohrvatski / српскохрватски' => 'sh', # Serbocroatian
					'Tašlḥiyt/ⵜⴰⵛⵍⵃⵉⵜ' => 'shi',    # Tachelhit (multiple scripts - defaults to Latin)
					'ⵜⴰⵛⵍⵃⵉⵜ' => 'shi-tfng',    # Tachelhit (Tifinagh script)
					'Tašlḥiyt' => 'shi-latn',    # Tachelhit (Latin script)
					'සිංහල' => 'si',	# Sinhalese
					'Simple English' => 'simple',	# Simple English
					'slovenčina' => 'sk',	# Slovak
					'slovenščina' => 'sl',	# Slovenian
					'Schläsch' => 'sli',	# Lower Selisian
					'Gagana Samoa' => 'sm',	# Samoan
					'Åarjelsaemien' => 'sma',	# Southern Sami
					'chiShona' => 'sn',		# Shona
					'Soomaaliga' => 'so',	# Somali
					'shqip' => 'sq',		# Albanian
					'српски / srpski' => 'sr',	# Serbian (multiple scripts - defaults to Cyrillic)
					"српски (ћирилица)\xE2\x80\x8E" => 'sr-ec',	# Serbian Cyrillic ekavian
					"srpski (latinica)\xE2\x80\x8E" => 'sr-el',	# Serbian Latin ekavian
					'Sranantongo' => 'srn',		# Sranan Tongo
					'SiSwati' => 'ss',		# Swati
					'Sesotho' => 'st',		# Southern Sotho
					'Seeltersk' => 'stq',		# Saterland Frisian
					'Basa Sunda' => 'su',	# Sundanese
					'svenska' => 'sv',		# Swedish
					'Kiswahili' => 'sw',	# Swahili
					'ślůnski' => 'szl',	# Silesian
					'தமிழ்' => 'ta',	# Tamil
					'ತುಳು' => 'tcy', # Tulu
					'తెలుగు' => 'te',	# Telugu
					'tetun' => 'tet',	# Tetun
					'тоҷикӣ' => 'tg',	# Tajiki (falls back to tg-cyrl)
					'тоҷикӣ' => 'tg-cyrl',	# Tajiki (Cyrllic script) (default)
					'tojikī' => 'tg-latn',	# Tajiki (Latin script)
					'ไทย' => 'th',	# Thai
					'ትግርኛ' => 'ti',		# Tigrinya
					'Türkmençe' => 'tk',	# Turkmen
					'Tagalog' => 'tl',		# Tagalog
					'толышә зывон' => 'tly',	# Talysh
					'Setswana' => 'tn',		# Setswana
					'lea faka-Tonga' => 'to',		# Tonga (Tonga Islands)
					'Toki Pona' => 'tokipona',      # Toki Pona
					'Tok Pisin' => 'tpi',	# Tok Pisin
					'Türkçe' => 'tr',	# Turkish
					'Ṫuroyo' => 'tru', # Turoyo
					'Xitsonga' => 'ts',		# Tsonga
					'татарча/tatarça' => 'tt',	# Tatar (multiple scripts - defaults to Cyrillic)
					'татарча' => 'tt-cyrl',	# Tatar (Cyrillic script) (default)
					'tatarça' => 'tt-latn',	# Tatar (Latin script)
					'chiTumbuka' => 'tum',  # Tumbuka
					'Twi' => 'tw',			# Twi, (FIXME!)
					'reo tahiti' => 'ty',	# Tahitian
					'тыва дыл' => 'tyv',	# Tyvan
					'ⵜⴰⵎⴰⵣⵉⵖⵜ' => 'tzm',	# Tamazight
					'удмурт' => 'udm',	# Udmurt
					'ئۇيغۇرچە / Uyghurche' => 'ug',	# Uyghur (multiple scripts - defaults to Arabic)
					'ئۇيغۇرچە' => 'ug-arab', # Uyghur (Arabic script) (default)
					'Uyghurche' => 'ug-latn', # Uyghur (Latin script)
					'українська' => 'uk',	# Ukrainian
					'اردو' => 'ur',	# Urdu
					'oʻzbekcha' => 'uz',	# Uzbek
					'Tshivenda' => 've',		# Venda
					'vèneto' => 'vec',	# Venetian
					'vepsän kel’' => 'vep',	# Veps
					'Tiếng Việt' => 'vi',	# Vietnamese
					'West-Vlams' => 'vls', # West Flemish
					'Mainfränkisch' => 'vmf', # Upper Franconian, Main-Franconian
					'Volapük' => 'vo',	# Volapük
					'Vaďďa' => 'vot',	# Vod/Votian
					'Võro' => 'vro',    # Võro
					'walon' => 'wa',		# Walloon
					'Winaray' => 'war', # Waray-Waray
					'Wolof' => 'wo',		# Wolof
					'吴语' => 'wuu',		# Wu Chinese
					'хальмг' => 'xal',		# Kalmyk-Oirat
					'isiXhosa' => 'xh',		# Xhosan
					'მარგალური' => 'xmf',	# Mingrelian
					'ייִדיש' => 'yi',	# Yiddish
					'Yorùbá' => 'yo',	# Yoruba
					'粵語' => 'yue',	# Cantonese
					'Vahcuengh' => 'za',	# Zhuang
					'Zeêuws' => 'zea',	# Zeeuws/Zeaws
					'中文' => 'zh',						# (Zhōng Wén) - Chinese
					'文言' => 'zh-classical',			# Classical Chinese/Literary Chinese -- (see bug 8217)
					"中文（中国大陆）\xE2\x80\x8E" => 'zh-cn',	# Chinese (PRC)
					"中文（简体）\xE2\x80\x8E" => 'zh-hans',	# Mandarin Chinese (Simplified Chinese script) (cmn-hans)
					"中文（繁體）\xE2\x80\x8E" => 'zh-hant',	# Mandarin Chinese (Traditional Chinese script) (cmn-hant)
					"中文（香港）\xE2\x80\x8E" => 'zh-hk',	# Chinese (Hong Kong)
					'Bân-lâm-gú' => 'zh-min-nan',				# Min-nan -- (see bug 8217)
					"中文（澳門）\xE2\x80\x8E" => 'zh-mo',	# Chinese (Macau)
					"中文（马来西亚）\xE2\x80\x8E" => 'zh-my',	# Chinese (Malaysia)
					"中文（新加坡）\xE2\x80\x8E" => 'zh-sg',	# Chinese (Singapore)
					"中文（台灣）\xE2\x80\x8E" => 'zh-tw',	# Chinese (Taiwan)
					'粵語' => 'zh-yue',					# Cantonese -- (see bug 8217)
					'isiZulu' => 'zu'		# Zulu
				),
				// 'class' => 'uls-trigger',
				),
		);

		$form = HTMLForm::factory( 'vform', $formDescriptor, $this->getContext() );
		$form->setSubmitText( wfMessage( 'add-word-form-submit' )->text() );
		//Callback function
		$form->setSubmitCallback( array( 'SpecialSpellingDictionary', 'store' ) );

		$form->show();

	}

	static function store( $formData ) {
		Words::addWord( $formData );
	}

}
