<?php

/*
* 2011 Otakar Weis 
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* 
* Disclaimer: author does not deny any copyrights of original Licensor
* 
*  @author Otakar Weis <otakarw@gmail.com>
*  @copyright  2011 Otakar Weis
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* 
*/

if (!defined('_CAN_LOAD_FILES_'))
      exit;
	  
class svk_translation extends Module
{
	public function __construct()
	{
		$this->name = 'svk_translation';
		$this->tab = 'others';
		$this->version = '1.1';
		$this->author = 'Otakar Weis';
				
		parent::__construct();
					
		$this->displayName = $this->l('Slovak DB translation');
		$this->description = $this->l('This module translates database items to Slovak language');
		}
	
	
	public function install()
	{	if	(!parent::install())
		return false;
		
		function preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary) // deklaracia funkcie preklad $id_eng je hodnota id_lang pre en jazyk, $id_svk je hodnota id_lang pre sk jazyk, $current_table je nazov prave prekladanej tabulky, $phrase_keys_col je stlpec tabulky obsahjuci referencne kluce jednoznacne identifikujuce frazu s danym vyznamom bez ohladu na jazykovu mutaciu frazy, $transcol je prave prekladany stlpec tabulky, $prekladove_pary je pole, ktore obsahuje dalsie polia obsahujuce len 2 bunky t.j. prekladovy par pricom ten je vo formate array ("en"=>"hodnota","sk"=>"hodnota")
		{	foreach ($prekladove_pary as $prekladovy_par) // z pola prekladove pary nacitava cyklom v kaydej iteracii postupne jednotlive prekladove pary
			{	$phrase_keys_array = Db::getInstance()->ExecuteS("SELECT ".$phrase_keys_col." FROM "._DB_PREFIX_.$current_table." WHERE id_lang = ".$id_eng." AND ".$transcol." = '".$prekladovy_par['en']."' "); // nacita do pola $phrase_keys_array vsetky referencne kluce v databaze, kde sa vyskytuje dana fraza pre en jazyk						
					if (!empty($phrase_keys_array)) // test ci je dana fraza medzi en frazami prekladanej tabulky a stlpca
					{	foreach ($phrase_keys_array as $phrase_key) // z pola referencnych klucov postupne nacita kazdy kluc, ktory je rovnaky pre vsetky jazyky
						{
						Db::getInstance()->Execute("UPDATE "._DB_PREFIX_.$current_table." SET ".$transcol." = '".$prekladovy_par['sk']."' WHERE id_lang = ".$id_svk." AND ".$phrase_keys_col." = ".$phrase_key[$phrase_keys_col]."; ");	// zapise do aktualne prekladaneho stlpca tabulky slovensku cast prekladoveho paru pre aktualny prekladovy kluc, to sa postupne vykona pre vsetky prekladove kluce obsahujuce anglicku cast prekladoveho paru 
						} //koniec cyklu pre zapis do databazy pre kazdy prekladovy kluc
					} // koniec bloku, ktory je vykonany, ak sa fraza nachadza medzi en frazami prekladaneho stlpca a tabulky
				unset($phrase_keys_array); // pre istotu vycisti premennu na konci iteracie cyklu pre aktualny prekladovy par
			} // koniec cyklu pre prechadzanie vsetkymi prekladovymi parmi
		} // koniec funkcie
		
		$id_engA = (Db::getInstance()->getRow("SELECT id_lang FROM "._DB_PREFIX_."lang WHERE iso_code = 'en'"));
		$id_eng = $id_engA['id_lang']; // ziska sa id_lang premenna en fraz
		$id_svkA = (Db::getInstance()->getRow("SELECT id_lang FROM "._DB_PREFIX_."lang WHERE iso_code = 'sk'"));
		$id_svk = $id_svkA['id_lang']; // ziska sa id_lang premenna sk fraz
		
		include("preklady.php"); // nacita preklady zo suboru preklady.php
				
		return true; // potvrdi instalatoru uspesne dokoncenie prekladu a v administracii sa objavi fajka miesto krizika	
	}

	public function uninstall() // odstrani z databazy referenciu, ze modul je nainstalovany 
	{
    	if (!parent::uninstall())
        	return false;
		return true;
	}
} 
?>