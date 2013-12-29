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

/*
VZOR PREKLADU TABULKY DATABAZY

//tabulka nazov_tabulky
$current_table = "prekladana_tabulka";
$phrase_keys_col = "id_stlpec_fraz";
$transcol = "prekladany_stlpec"; 
$prekladove_pary = array 	
(
array("en" => "Anglicky_original", "sk" => "Slovensky_preklad"),
array("en" => "", "sk" => ""),
array("en" => "", "sk" => "")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	

*/

//tabulka category_lang
$current_table = "category_lang";
$phrase_keys_col = "id_category";
$transcol = "name"; 
$prekladove_pary = array
(
array("en" => "Home", "sk" => "Úvodná stránka")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	

//tabulka cms_block_lang
$current_table = "cms_block_lang";
$phrase_keys_col = "id_cms_block";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Information", "sk" => "Informácie")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka contact_lang
$current_table = "contact_lang";
$phrase_keys_col = "id_contact";
$transcol = "name"; 
$prekladove_pary = array
(
array("en" => "Webmaster", "sk" => "Správca stránky"),
array("en" => "Customer service", "sk" => "Služba pre zákazníkov")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	


//tabulka contact_lang
$current_table = "contact_lang";
$phrase_keys_col = "id_contact";
$transcol = "description"; 
$prekladove_pary = array 
(
array("en" => "If a technical problem occurs on this website", "sk" => "Hlásenie technických problémov"),
array("en" => "For any question about a product, an order", "sk" => "Pre akékoľvek otázky o produktoch či objednávkach")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


// doplnene pre strukturu ver. 1.5.3., po riadok c. 214
//tabulka cms_category_lang
$current_table = "cms_category_lang";
$phrase_keys_col = "id_cms_category";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Home", "sk" => "Úvodná stránka")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	

//tabulka cms_lang
$current_table = "cms_lang";
$phrase_keys_col = "id_cms";
$transcol = "meta_title"; 
$prekladove_pary = array 	
(
array("en" => "Delivery", "sk" => "Podmienky doručovania"),
array("en" => "Legal Notice", "sk" => "Autorské prehlásenie"),
array("en" => "Terms and conditions of use", "sk" => "Obchodné podmienky"),
array("en" => "About us", "sk" => "O nás"),
array("en" => "Secure payment", "sk" => "Bezpečná platba")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	

//tabulka cms_lang
$current_table = "cms_lang";
$phrase_keys_col = "id_cms";
$transcol = "meta_description"; 
$prekladove_pary = array 	
(
array("en" => "Our terms and conditions of delivery", "sk" => "Doručovacie podmienky"),
array("en" => "Legal notice", "sk" => "Prehlásenie o autorských právach"),
array("en" => "Our terms and conditions of use", "sk" => "Obchodné podmienky"),
array("en" => "Learn more about us", "sk" => "Chcete sa dozvedieť o nás viac"),
array("en" => "Our secure payment mean", "sk" => "Bezpečné platby")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	

//tabulka configuration_lang
$current_table = "cms_lang";
$phrase_keys_col = "id_cms";
$transcol = "meta_keywords"; 
$prekladove_pary = array 	
(
array("en" => "conditions, delivery, delay, shipment, pack", "sk" => "podmienky, doručenie, oneskorenie, poštovné, balenie"),
array("en" => "notice, legal, credits", "sk" => "autor, prehlásenie, upozornenie, autorské práva, zásluhy"),
array("en" => "conditions, terms, use, sell", "sk" => "obchodné podmienky, pravidlá, používanie, predaj, ochrana osobných údajov"),
array("en" => "about us, informations", "sk" => "o nás, informácie"),
array("en" => "secure payment, ssl, visa, mastercard, paypal", "sk" => "bezpečná platba, bankový prevod, ssl, visa, mastercard, paypal")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka configuration_lang
$current_table = "cms_lang";
$phrase_keys_col = "id_cms";
$transcol = "link_rewrite"; 
$prekladove_pary = array 	
(
array("en" => "delivery", "sk" => "podmienky-dorucenie"),
array("en" => "legal-notice", "sk" => "autorske-prehlasenie"),
array("en" => "terms-and-conditions-of-use", "sk" => "obchodne-podmienky"),
array("en" => "about-us", "sk" => "o-nas"),
array("en" => "secure-payment", "sk" => "bezpecna-platba")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka configuration_lang
$current_table = "configuration_lang";
$phrase_keys_col = "id_configuration";
$transcol = "value"; 
$prekladove_pary = array 	
(
array("en" => "Dear Customer,\r\n\r\nRegards,\r\nCustomer service", "sk" => "Vážený zákazník,\r\n\r\nS pozdravom,\r\nzákaznická podpora obchodu"),
array("en" => "a|the|of|on|in|and|to", "sk" => "a|i|do|od|na|s|so|v|vo|z|zo"),
array("en" => "IN", "sk" => "FA"),
array("en" => "DE", "sk" => "DL")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka gender_lang
$current_table = "gender_lang";
$phrase_keys_col = "id_gender";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Mr.", "sk" => "Pán"),
array("en" => "Ms.", "sk" => "Pani"),
array("en" => "Miss", "sk" => "Slečna")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka group_lang
$current_table = "group_lang";
$phrase_keys_col = "id_group";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Visitor", "sk" => "Návštevník"),
array("en" => "Guest", "sk" => "Rýchly zákazník"),
array("en" => "Customer", "sk" => "Zákazník")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka profile_lang
$current_table = "profile_lang";
$phrase_keys_col = "id_profile";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Administrator", "sk" => "Administrátor"),
array("en" => "Logistician", "sk" => "Logistik"),
array("en" => "Translator", "sk" => "Prekladateľ"),
array("en" => "Salesman", "sk" => "Predajca")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka nazov_tabulky
$current_table = "country_lang";
$phrase_keys_col = "id_country";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Germany", "sk" => "Nemecko"),
array("en" => "Austria", "sk" => "Rakúsko"),
array("en" => "Belgium", "sk" => "Belgicko"),
array("en" => "Canada", "sk" => "Kanada"),
array("en" => "China", "sk" => "Čína"),
array("en" => "Spain", "sk" => "Španielsko"),
array("en" => "Finland", "sk" => "Fínsko"),
array("en" => "France", "sk" => "Francúzsko"),
array("en" => "Greece", "sk" => "Grécko"),
array("en" => "Italy", "sk" => "Taliansko"),
array("en" => "Japan", "sk" => "Japonsko"),
array("en" => "Luxemburg", "sk" => "Luxemburgsko"),
array("en" => "Netherlands", "sk" => "Holandsko"),
array("en" => "Poland", "sk" => "Poľsko"),
array("en" => "Portugal", "sk" => "Portugalsko"),
array("en" => "Czech Republic", "sk" => "Česká republika"),
array("en" => "United Kingdom", "sk" => "Spojené kráľovstvo"),
array("en" => "Sweden", "sk" => "Švédsko"),
array("en" => "Switzerland", "sk" => "Švajčiarsko"),
array("en" => "Denmark", "sk" => "Dánsko"),
array("en" => "United States", "sk" => "Spojené štáty"),
array("en" => "HongKong", "sk" => "Hong-Kong"),
array("en" => "Norway", "sk" => "Nórsko"),
array("en" => "Australia", "sk" => "Austrália"),
array("en" => "Singapore", "sk" => "Singapúr"),
array("en" => "Ireland", "sk" => "Írsko"),
array("en" => "New Zealand", "sk" => "Nový Zéland"),
array("en" => "South Korea", "sk" => "Južná Kórea"),
array("en" => "Israel", "sk" => "Izrael"),
array("en" => "South Africa", "sk" => "Južná Afrika"),
array("en" => "Nigeria", "sk" => "Nigéria"),
array("en" => "Ivory Coast", "sk" => "Pobrežie Slonoviny"),
array("en" => "Togo", "sk" => "Togo"),
array("en" => "Bolivia", "sk" => "Bolívia"),
array("en" => "Mauritius", "sk" => "Maurícius"),
array("en" => "Romania", "sk" => "Rumunsko"),
array("en" => "Slovakia", "sk" => "Slovenská republika"),
array("en" => "Algeria", "sk" => "Alžírsko"),
array("en" => "American Samoa", "sk" => "Americká Samoa"),
array("en" => "Andorra", "sk" => "Andora"),
array("en" => "Angola", "sk" => "Angola"),
array("en" => "Anguilla", "sk" => "Anguila"),
array("en" => "Antigua and Barbuda", "sk" => "Antigua a Barbuda"),
array("en" => "Argentina", "sk" => "Argentína"),
array("en" => "Armenia", "sk" => "Arménsko"),
array("en" => "Aruba", "sk" => "Aruba"),
array("en" => "Azerbaijan", "sk" => "Azerbajdžan"),
array("en" => "Bahamas", "sk" => "Bahamy"),
array("en" => "Bahrain", "sk" => "Bahrajn"),
array("en" => "Bangladesh", "sk" => "Bangladéš"),
array("en" => "Barbados", "sk" => "Barbados"),
array("en" => "Belarus", "sk" => "Bielorusko"),
array("en" => "Belize", "sk" => "Belize"),
array("en" => "Benin", "sk" => "Benin"),
array("en" => "Bermuda", "sk" => "Bermudy"),
array("en" => "Bhutan", "sk" => "Bután"),
array("en" => "Botswana", "sk" => "Botsvana"),
array("en" => "Brazil", "sk" => "Brazília"),
array("en" => "Brunei", "sk" => "Brunej"),
array("en" => "Burkina Faso", "sk" => "Burkina Faso"),
array("en" => "Burma (Myanmar)", "sk" => "Barma"),
array("en" => "Burundi", "sk" => "Burundi"),
array("en" => "Cambodia", "sk" => "Kambodža"),
array("en" => "Cameroon", "sk" => "Kamerun"),
array("en" => "Cape Verde", "sk" => "Kapverdské ostrovy"),
array("en" => "Central African Republic", "sk" => "Stredoafrická republika"),
array("en" => "Chad", "sk" => "Čad"),
array("en" => "Chile", "sk" => "Čile"),
array("en" => "Colombia", "sk" => "Kolumbia"),
array("en" => "Comoros", "sk" => "Komorské ostrovy"),
array("en" => "Congo, Dem. Republic", "sk" => "Kongo, Dem. republika"),
array("en" => "Congo, Republic", "sk" => "Kongo, Republika"),
array("en" => "Costa Rica", "sk" => "Kostarika"),
array("en" => "Croatia", "sk" => "Chorvátsko"),
array("en" => "Cuba", "sk" => "Kuba"),
array("en" => "Cyprus", "sk" => "Cyprus"),
array("en" => "Djibouti", "sk" => "Džibutsko"),
array("en" => "Dominica", "sk" => "Dominika"),
array("en" => "Dominican Republic", "sk" => "Dominikánska republika"),
array("en" => "East Timor", "sk" => "Východný Timor"),
array("en" => "Ecuador", "sk" => "Ekvádor"),
array("en" => "Egypt", "sk" => "Egypt"),
array("en" => "El Salvador", "sk" => "El Salvádor"),
array("en" => "Equatorial Guinea", "sk" => "Rovníková Guinea"),
array("en" => "Eritrea", "sk" => "Eritrea"),
array("en" => "Estonia", "sk" => "Estónsko"),
array("en" => "Ethiopia", "sk" => "Etiópia"),
array("en" => "Falkland Islands", "sk" => "Falklandské ostrovy"),
array("en" => "Faroe Islands", "sk" => "Faerské ostrovy"),
array("en" => "Fiji", "sk" => "Fidži"),
array("en" => "Gabon", "sk" => "Gabun"),
array("en" => "Gambia", "sk" => "Gambia"),
array("en" => "Georgia", "sk" => "Gruzínsko"),
array("en" => "Ghana", "sk" => "Ghana"),
array("en" => "Grenada", "sk" => "Grenada"),
array("en" => "Greenland", "sk" => "Grónsko"),
array("en" => "Gibraltar", "sk" => "Džibraltár"),
array("en" => "Guadeloupe", "sk" => "Guadalupe"),
array("en" => "Guam", "sk" => "Guam"),
array("en" => "Guatemala", "sk" => "Guatemala"),
array("en" => "Guernsey", "sk" => "Guernsey"),
array("en" => "Guinea", "sk" => "Guinea"),
array("en" => "Guinea-Bissau", "sk" => "Guinea-Bissau"),
array("en" => "Guyana", "sk" => "Guyana"),
array("en" => "Haiti", "sk" => "Haiti"),
array("en" => "Heard Island and McDonald Islands", "sk" => "Heraldov ostrov a McDonaldove ostrovy"),
array("en" => "Vatican City State", "sk" => "Vatikán"),
array("en" => "Honduras", "sk" => "Honduras"),
array("en" => "Iceland", "sk" => "Island"),
array("en" => "India", "sk" => "India"),
array("en" => "Indonesia", "sk" => "Indonézia"),
array("en" => "Iran", "sk" => "Irán"),
array("en" => "Iraq", "sk" => "Irak"),
array("en" => "Man Island", "sk" => "Ostrov Man"),
array("en" => "Jamaica", "sk" => "Jamajka"),
array("en" => "Jersey", "sk" => "Jersey"),
array("en" => "Jordan", "sk" => "Jordánsko"),
array("en" => "Kazakhstan", "sk" => "Kazachstan"),
array("en" => "Kenya", "sk" => "Keňa"),
array("en" => "Kiribati", "sk" => " Kiribatská republika"),
array("en" => "Korea, Dem. Republic of", "sk" => "Kórea, dem. republika"),
array("en" => "Kuwait", "sk" => "Kuvajt"),
array("en" => "Kyrgyzstan", "sk" => "Kirgizsko"),
array("en" => "Laos", "sk" => "Laos"),
array("en" => "Latvia", "sk" => "Lotyšsko"),
array("en" => "Lebanon", "sk" => "Libanon"),
array("en" => "Lesotho", "sk" => "Lesoto"),
array("en" => "Liberia", "sk" => "Libéria"),
array("en" => "Libya", "sk" => "Líbya"),
array("en" => "Liechtenstein", "sk" => "Lichtenštajnsko"),
array("en" => "Lithuania", "sk" => "Litva"),
array("en" => "Macau", "sk" => "Makao"),
array("en" => "Macedonia", "sk" => "Macedónsko"),
array("en" => "Madagascar", "sk" => "Madagaskar"),
array("en" => "Malawi", "sk" => "Malawi"),
array("en" => "Malaysia", "sk" => "Malajzia"),
array("en" => "Maldives", "sk" => "Maledivy"),
array("en" => "Mali", "sk" => "Mali"),
array("en" => "Malta", "sk" => "Malta"),
array("en" => "Marshall Islands", "sk" => "Marshallove ostrovy"),
array("en" => "Martinique", "sk" => "Martinik"),
array("en" => "Mauritania", "sk" => "Mauretánia"),
array("en" => "Hungary", "sk" => "Maďarsko"),
array("en" => "Mayotte", "sk" => "Mayotte"),
array("en" => "Mexico", "sk" => "Mexiko"),
array("en" => "Micronesia", "sk" => "Mikronézia"),
array("en" => "Moldova", "sk" => "Modavsko"),
array("en" => "Monaco", "sk" => "Monako"),
array("en" => "Mongolia", "sk" => "Mongolsko"),
array("en" => "Montenegro", "sk" => "Čierna Hora"),
array("en" => "Montserrat", "sk" => "Montserrat"),
array("en" => "Morocco", "sk" => "Maroko"),
array("en" => "Mozambique", "sk" => "Mozambik"),
array("en" => "Namibia", "sk" => "Namíbia"),
array("en" => "Nauru", "sk" => "Nauru"),
array("en" => "Nepal", "sk" => "Nepál"),
array("en" => "Netherlands Antilles", "sk" => "Holandské Antily"),
array("en" => "New Caledonia", "sk" => "Nová Kaledónia"),
array("en" => "Nicaragua", "sk" => "Nikaragua"),
array("en" => "Niger", "sk" => "Niger"),
array("en" => "Niue", "sk" => "Niue"),
array("en" => "Norfolk Island", "sk" => "Ostrov Norfolk"),
array("en" => "Northern Mariana Islands", "sk" => "Severné Mariánske ostrovy"),
array("en" => "Oman", "sk" => "Omán"),
array("en" => "Pakistan", "sk" => "Pakistan"),
array("en" => "Palau", "sk" => "Palau"),
array("en" => "Palestinian Territories", "sk" => "Palestínske teritóriá"),
array("en" => "Panama", "sk" => "Panama"),
array("en" => "Papua New Guinea", "sk" => "Papua-Nová Guinea"),
array("en" => "Paraguay", "sk" => "Paraguaj"),
array("en" => "Peru", "sk" => "Peru"),
array("en" => "Philippines", "sk" => "Filipíny"),
array("en" => "Pitcairn", "sk" => "Pitcairnove ostrovy"),
array("en" => "Puerto Rico", "sk" => "Portoriko"),
array("en" => "Qatar", "sk" => "Katar"),
array("en" => "Reunion Island", "sk" => "Ostrov Renuion"),
array("en" => "Russian Federation", "sk" => "Ruská Federácia"),
array("en" => "Rwanda", "sk" => "Rwanda"),
array("en" => "Saint Barthelemy", "sk" => "Svätý Bartolomej"),
array("en" => "Saint Kitts and Nevis", "sk" => "Svätý Krištof a Nevis"),
array("en" => "Saint Lucia", "sk" => "Svätá Lucia"),
array("en" => "Saint Martin", "sk" => "Svätý Martin"),
array("en" => "Saint Pierre and Miquelon", "sk" => "Saint Pierre a Miquelon"),
array("en" => "Saint Vincent and the Grenadines", "sk" => "Svätý Vincent a Grenadíny"),
array("en" => "Samoa", "sk" => "Samoa"),
array("en" => "San Marino", "sk" => "San Maríno"),
array("en" => "São Tomé and Príncipe", "sk" => "Svätý Tomáš a Princov ostrov"),
array("en" => "Saudi Arabia", "sk" => "Saudská Arábia"),
array("en" => "Senegal", "sk" => "Senegal"),
array("en" => "Serbia", "sk" => "Srbsko"),
array("en" => "Seychelles", "sk" => "Seychelská republika"),
array("en" => "Sierra Leone", "sk" => "Sierra Leone"),
array("en" => "Slovenia", "sk" => "Slovínsko"),
array("en" => "Solomon Islands", "sk" => "Šalamúnove ostrovy"),
array("en" => "Somalia", "sk" => "Somálsko"),
array("en" => "South Georgia and the South Sandwich Islands", "sk" => "Južná Georgia a Južné Sandwichove ostrovy"),
array("en" => "Sri Lanka", "sk" => "Srí Lanka"),
array("en" => "Sudan", "sk" => "Sudán"),
array("en" => "Suriname", "sk" => "Surinam"),
array("en" => "Svalbard and Jan Mayen", "sk" => "Svalbard a Jan Mayen"),
array("en" => "Swaziland", "sk" => "Svazijsko"),
array("en" => "Syria", "sk" => "Sýria"),
array("en" => "Taiwan", "sk" => "Taiwan"),
array("en" => "Tajikistan", "sk" => "Tadžikistan"),
array("en" => "Tanzania", "sk" => "Tanzánia"),
array("en" => "Thailand", "sk" => "Thajsko"),
array("en" => "Tokelau", "sk" => "Tokelau"),
array("en" => "Tonga", "sk" => "Tongské kráľovstvo"),
array("en" => "Trinidad and Tobago", "sk" => "Trinidad a Tobago"),
array("en" => "Tunisia", "sk" => "Tunis"),
array("en" => "Turkey", "sk" => "Turecko"),
array("en" => "Turkmenistan", "sk" => "Turkmenistan"),
array("en" => "Turks and Caicos Islands", "sk" => "Turks a Caicos"),
array("en" => "Tuvalu", "sk" => "Tuvalu"),
array("en" => "Uganda", "sk" => "Uganda"),
array("en" => "Ukraine", "sk" => "Ukrajina"),
array("en" => "United Arab Emirates", "sk" => "Spojené arabské Emiráty"),
array("en" => "Uruguay", "sk" => "Uruguaj"),
array("en" => "Uzbekistan", "sk" => "Uzbekistan"),
array("en" => "Vanuatu", "sk" => "Vanuatská republika"),
array("en" => "Venezuela", "sk" => "Venezuela"),
array("en" => "Vietnam", "sk" => "Vietnam"),
array("en" => "Virgin Islands \(British\)", "sk" => "Panenské ostrovy \(Britské\)"),
array("en" => "Virgin Islands \(U.S.\)", "sk" => "Panenské ostrovy \(USA\)"),
array("en" => "Wallis and Futuna", "sk" => "Wallis a Futuna"),
array("en" => "Western Sahara", "sk" => "Západná Sahara"),
array("en" => "Yemen", "sk" => "Jemen"),
array("en" => "Zambia", "sk" => "Zambia"),
array("en" => "Zimbabwe", "sk" => "Zimbabwe"),
array("en" => "Albania", "sk" => "Albánsko"),
array("en" => "Afghanistan", "sk" => "Afganistan"),
array("en" => "Antarctica", "sk" => "Antarktída"),
array("en" => "Bosnia and Herzegovina", "sk" => "Bosna a Herzegovina"),
array("en" => "Bouvet Island", "sk" => "Bouvetov ostrov"),
array("en" => "British Indian Ocean Territory", "sk" => "Britské indickooceánske územie"),
array("en" => "Bulgaria", "sk" => "Bulharsko"),
array("en" => "Cayman Islands", "sk" => "Kajmanské ostrovy"),
array("en" => "Christmas Island", "sk" => "Vianočné ostrovy"),
array("en" => "Cocos (Keeling) Islands", "sk" => "Kokosové ostrovy"),
array("en" => "Cook Islands", "sk" => "Cookve ostrovy"),
array("en" => "French Guiana", "sk" => "Francúzska Guyana"),
array("en" => "French Polynesia", "sk" => "Francúzska Polynézia"),
array("en" => "French Southern Territories", "sk" => "Francúzske Južné Teritóriá"),
array("en" => "Åland Islands", "sk" => "Ålandy")  
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka discount_type_lang
$current_table = "discount_type_lang";
$phrase_keys_col = "id_discount_type";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Discount on order \(%\)", "sk" => "Zľava na objednávku \(%\)"),
array("en" => "Discount on order \(amount\)", "sk" => "Zľava na objednávku \(suma\)"),
array("en" => "Free shipping", "sk" => "Poštovné zdarma")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka feature_lang
$current_table = "feature_lang";
$phrase_keys_col = "id_feature";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Height", "sk" => "Výška"),
array("en" => "Width", "sk" => "Šírka"),
array("en" => "Depth", "sk" => "Hĺbka"),
array("en" => "Weight", "sk" => "Hmotnosť")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka nazov_tabulky
$current_table = "group_lang";
$phrase_keys_col = "id_group";
$transcol = "name"; 
$prekladove_pary = array 	
(
array("en" => "Default", "sk" => "Predvolená")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	


//tabulka meta_lang
$current_table = "meta_lang";
$phrase_keys_col = "id_meta";
$transcol = "title"; 
$prekladove_pary = array 	
(
array("en" => "404 error", "sk" => "Chyba 404"),
array("en" => "Best sales", "sk" => "Najlepšie predávané"),
array("en" => "Contact us", "sk" => "Kontakt"),
array("en" => "Manufacturers", "sk" => "Výrobcovia"),
array("en" => "New products", "sk" => "Nové produkty"),
array("en" => "Forgot your password", "sk" => "Zabudnuté heslo"),
array("en" => "Prices drop", "sk" => "Zľavy"),
array("en" => "Sitemap", "sk" => "Mapa stránky"),
array("en" => "Suppliers", "sk" => "
Dodávateľia"),
array("en" => "Address", "sk" => "Adresa"),
array("en" => "Addresses", "sk" => "Adresy zákaníkov"),
array("en" => "Authentication", "sk" => "Autentifikácia"),
array("en" => "Cart", "sk" => "Košík"),
array("en" => "Discount", "sk" => "Zľava"),
array("en" => "Order history", "sk" => "História objednávok"),
array("en" => "Identity", "sk" => "Identita"),
array("en" => "My account", "sk" => "Účet"),
array("en" => "Order follow", "sk" => "Sledovanie objednávky"),
array("en" => "Order slip", "sk" => "Dodací list"),
array("en" => "Order", "sk" => "Objednávka"),
array("en" => "Search", "sk" => "Vyhľadávanie"),
array("en" => "Stores", "sk" => "Kamenné obchody"),
array("en" => "Order", "sk" => "Objednávka"),
array("en" => "Guest tracking", "sk" => "Sledovanie pre návštevníkov")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	


//tabulka nazov_tabulky
$current_table = "meta_lang";
$phrase_keys_col = "id_meta";
$transcol = "description"; 
$prekladove_pary = array 	
(
array("en" => "This page cannot be found", "sk" => "Stránka nenájdená"),
array("en" => "Our best sales", "sk" => "Najpredávanejšie produkty"),
array("en" => "Use our form to contact us", "sk" => "Kontaktujte nás cez náš formulár"),
array("en" => "Shop powered by PrestaShop", "sk" => "Vytvorené v systéme PrestaShop"),
array("en" => "Manufacturers list", "sk" => "Zoznam výrobcov"),
array("en" => "Our new products", "sk" => "Nové produkty"),
array("en" => "Enter your e-mail address used to register in goal to get e-mail with your new password", "sk" => "Zadajte Váš e-mail, ktorý ste použili pri registrácii, aby Vám bolo pridelené nové heslo"),
array("en" => "Our special products", "sk" => "Zľavnené produkty"),
array("en" => "Lost ? Find what your are looking for", "sk" => "Stratený? Nájdite, čo hľadáte"),
array("en" => "Suppliers list", "sk" => "Zoznam dodávateľov")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	


//tabulka nazov_tabulky
$current_table = "meta_lang";
$phrase_keys_col = "id_meta";
$transcol = "keywords"; 
$prekladove_pary = array 	
(
array("en" => "error, 404, not found", "sk" => "chyba, 404, nenájdené"),
array("en" => "best sales", "sk" => "najpredávanejšie produkty"),
array("en" => "contact, form, e-mail", "sk" => "kontakt, formulár, e-mail"),
array("en" => "shop, prestashop", "sk" => "obchod, prestashop"),
array("en" => "manufacturer", "sk" => "výrobca"),
array("en" => "new, products", "sk" => "nové, produkty"),
array("en" => "forgot, password, e-mail, new, reset", "sk" => "stratené, zabudnuté, heslo, e-mail, nové, reset"),
array("en" => "special, prices drop", "sk" => "zľava, špeciálna ponuka"),
array("en" => "sitemap", "sk" => "mapa stránky"),
array("en" => "supplier", "sk" => "dodávateľ")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);	


//tabulka nazov_tabulky
$current_table = "meta_lang";
$phrase_keys_col = "id_meta";
$transcol = "url_rewrite"; 
$prekladove_pary = array 	
(
array("en" => "page-not-found", "sk" => "stranka-nenajdena-404"),
array("en" => "best-sales", "sk" => "najpredavanejsie-produkty"),
array("en" => "contact-us", "sk" => "kontakt"),
array("en" => "manufacturers", "sk" => "vyrobcovia"),
array("en" => "new-products", "sk" => "nove-produkty"),
array("en" => "password-recovery", "sk" => "obnovenie-hesla"),
array("en" => "prices-drop", "sk" => "zlavnene-produkty"),
array("en" => "sitemap", "sk" => "mapa-stranky"),
array("en" => "supplier", "sk" => "dodavatelia"),
array("en" => "address", "sk" => "adresa"),
array("en" => "addresses", "sk" => "adresy"),
array("en" => "authentication", "sk" => "autentifikacia"),
array("en" => "cart", "sk" => "kosik"),
array("en" => "discount", "sk" => "zlavy"),
array("en" => "order-history", "sk" => "historia-objednavok"),
array("en" => "identity", "sk" => "identita"),
array("en" => "my-account", "sk" => "ucet"),
array("en" => "order-follow", "sk" => "sledovanie-objednavky"),
array("en" => "order-slip", "sk" => "dodaci-list"),
array("en" => "order", "sk" => "objednavka"),
array("en" => "search", "sk" => "vyhladavanie"),
array("en" => "stores", "sk" => "kamenne-obchody"),
array("en" => "quick-order", "sk" => "rychla-objednavka"),
array("en" => "guest-tracking", "sk" => "sledovanie-pre-navstenikov")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka order_message_lang
$current_table = "order_message_lang";
$phrase_keys_col = "id_order_message";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Delay", "sk" => "Oneskorenie")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka order_message_lang
$current_table = "order_message_lang";
$phrase_keys_col = "id_order_message";
$transcol = "message"; 
$prekladove_pary = array 
(
array("en" => "Hi,\n\nUnfortunately, an item on your order is currently out of stock. This may cause a slight delay in delivery.\nPlease accept our apologies and rest assured that we are working hard to rectify this.\n\nBest regards,", "sk" => "Dobrý deň,\n\nBohužiaľ položka z Vašej objednávky nie je momentálne na sklade. Toto môže spôsobiť malé oneskorenie doručenia.\nProsím prijmite naše ospravedlnenie. Uisťujeme Vás, že sa maximálne usilujeme o vyriešene tejto záležitosti.\n\nS pozdravom,")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka order_return_state_lang
$current_table = "order_return_state_lang";
$phrase_keys_col = "id_order_return_state";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Waiting for confirmation", "sk" => "Čaká na potvrdenie"),
array("en" => "Waiting for package", "sk" => "Čaká na doručenie"),
array("en" => "Package received", "sk" => "Zásielka prijatá"),
array("en" => "Return denied", "sk" => "Odmietnuté vrátenie"),
array("en" => "Return completed", "sk" => "Dokončené vrátenie")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka order_return_state_lang
$current_table = "order_state_lang";
$phrase_keys_col = "id_order_state";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Awaiting cheque payment", "sk" => "Čaká na platbu šekom"),
array("en" => "Payment accepted", "sk" => "Prijatá platba"),
array("en" => "Preparation in progress", "sk" => "Prebieha príprava"),
array("en" => "Shipped", "sk" => "Odoslaná"),
array("en" => "Delivered", "sk" => "Dodané"),
array("en" => "Canceled", "sk" => "Zrušená"),
array("en" => "Refund", "sk" => "Vrátené peniaze"),
array("en" => "Payment error", "sk" => "Chyba platby"),
array("en" => "On backorder", "sk" => "Objednávka k dodávateľovi"),
array("en" => "Awaiting bank wire payment", "sk" => "Čaká na bankový prevod"),
array("en" => "Awaiting PayPal payment", "sk" => "Čaká na PayPal platbu"),
array("en" => "Payment remotely accepted", "sk" => "Prijatá platba")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka quick_access_lang
$current_table = "quick_access_lang";
$phrase_keys_col = "id_quick_access";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Home", "sk" => "Úvodná stránka"),
array("en" => "My Shop", "sk" => "Obchod"),
array("en" => "New category", "sk" => "Nová kategória"),
array("en" => "New product", "sk" => "Nový produkt"),
array("en" => "New voucher", "sk" => "Nový kupón")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);
	
//tabulka stock_mvt_reason_lang
$current_table = "stock_mvt_reason_lang";
$phrase_keys_col = "id_stock_mvt_reason";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Increase", "sk" => "Nárast"),
array("en" => "Decrease", "sk" => "Pokles"),
array("en" => "Order", "sk" => "Objednávka"),
array("en" => "Regulation following an inventory of stock", "sk" => "Úprava po pohybe zásob"),
array("en" => "Transfer to another warehouse", "sk" => "Prevod na iný sklad"),
array("en" => "Transfer from another warehouse", "sk" => "Prevod z iného skladu"),
array("en" => "Supply Order", "sk" => "Dodanie objednávky"),
array("en" => "Missing Stock Movement", "sk" => "Žiadny pohyb na sklade"),
array("en" => "Restocking", "sk" => "Naskladnenie")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka supply_order_state_lang
$current_table = "supply_order_state_lang";
$phrase_keys_col = "id_supply_order_state";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "1 - Creation in progress", "sk" => "V príprave"),
array("en" => "2 - Order validated", "sk" => "Objednávka potvrdená"),
array("en" => "3 - Pending receipt", "sk" => "Prebieha"),
array("en" => "4 - Order received in part", "sk" => "Objednávka prijatá čiastočne"),
array("en" => "5 - Order received completely", "sk" => "Objednávka prijatá kompletne"),
array("en" => "6 - Order canceled", "sk" => "Objednávka zrušená")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);


//tabulka tab_lang
$current_table = "tab_lang";
$phrase_keys_col = "id_tab";
$transcol = "name"; 
$prekladove_pary = array 
(
array("en" => "Home", "sk" => "Úvodná stránka"),
array("en" => "Catalog", "sk" => "Katalóg"),
array("en" => "CMS Pages", "sk" => "Stránky CMS"),
array("en" => "CMS Categories", "sk" => "Kategórie CMS"),
array("en" => "Combinations Generator", "sk" => "Generátor kombinácií"),
array("en" => "Login", "sk" => "Prihlásenie"),
array("en" => "Shops", "sk" => "Obchody"),
array("en" => "Shop URLs", "sk" => "URL Obchodov"),
array("en" => "Customers", "sk" => "Zákazníci"),
array("en" => "Orders", "sk" => "Objednávky"),
array("en" => "Payment", "sk" => "Platby"),
array("en" => "Price Rules", "sk" => "Cenové pravidlá"),
array("en" => "Shipping", "sk" => "Doprava"),
array("en" => "Stats", "sk" => "Štatistiky"),
array("en" => "Stock", "sk" => "Sklad"),
array("en" => "Modules", "sk" => "Moduly"),
array("en" => "Preferences", "sk" => "Nastavenia"),
array("en" => "Advanced Parameters", "sk" => "Pokročilé nastavenia"),
array("en" => "Administration", "sk" => "Administrácia"),
array("en" => "Tools", "sk" => "Nástroje"),
array("en" => "Manufacturers", "sk" => "Výrobcovia"),
array("en" => "Attributes and Values", "sk" => "Atribúty a Hodnoty"),
array("en" => "Addresses", "sk" => "Adresy zákazníkov"),
array("en" => "Statuses", "sk" => "Stavy objednávok"),
array("en" => "Vouchers", "sk" => "Kupóny"),
array("en" => "Currencies", "sk" => "Meny"),
array("en" => "Taxes", "sk" => "Dane"),
array("en" => "Carriers", "sk" => "Prepravcovia"),
array("en" => "Countries", "sk" => "Krajiny"),
array("en" => "Zones", "sk" => "Zóny"),
array("en" => "Price Ranges", "sk" => "Cenové rozsahy"),
array("en" => "Weight Ranges", "sk" => "Hmotnostné rozsahy"),
array("en" => "Positions", "sk" => "Pozície modulov"),
array("en" => "Database", "sk" => "Databázy"),
array("en" => "E-mail", "sk" => "E-mail"),
array("en" => "Multistore", "sk" => "Multiobchod"),
array("en" => "Images", "sk" => "Obrázky"),
array("en" => "Store Contacts", "sk" => "Obchod kontakty"),
array("en" => "Maintenance", "sk" => "Údržba obchodu"),
array("en" => "Products", "sk" => "Produkty"),
array("en" => "Categories", "sk" => "Kategórie"),
array("en" => "Contacts", "sk" => "Kontakty na zamestnanca"),
array("en" => "Titles", "sk" => "Oslovenie"),
array("en" => "Outstanding", "sk" => "Nedokončené"),
array("en" => "Cart Rules", "sk" => "Pravidlá nákupného košíka"),
array("en" => "Catalog Price Rules", "sk" => "Pravidlá cien katalógu"),
array("en" => "Employees", "sk" => "Zamestnanci"),
array("en" => "Profiles", "sk" => "Profily zamestnancov"),
array("en" => "Permissions", "sk" => "Oprávnenia profilov"),
array("en" => "Menus", "sk" => "Záložky menu"),
array("en" => "Languages", "sk" => "Jazyky"),
array("en" => "Translations", "sk" => "Prekladanie"),
array("en" => "Suppliers", "sk" => "Dodávatelia"),
array("en" => "Tabs", "sk" => "Záložky - editácia"),
array("en" => "Features", "sk" => "Vlastnosti produktov"),
array("en" => "Quick Access", "sk" => "Rýchly prístup"),
array("en" => "Appearance", "sk" => "Vzhľad"),
array("en" => "Contact Information", "sk" => "Kontaktné info."),
array("en" => "Keyword Typos", "sk" => "Preklepy"),
array("en" => "CSV Import", "sk" => "Import CSV"),
array("en" => "Invoices", "sk" => "Faktúry"),
array("en" => "Search", "sk" => "Vyhľadávanie"),
array("en" => "Localization", "sk" => "Lokalizácia"),
array("en" => "States", "sk" => "Štáty \(provincie\)"),
array("en" => "Merchandise Returns", "sk" => "Vrátené produkty"),
array("en" => "PDF", "sk" => "PDF"),
array("en" => "Credit Slips", "sk" => "Dobropisy"),
array("en" => "Settings", "sk" => "Nastavenia"),
array("en" => "Subdomains", "sk" => "Subdomény"),
array("en" => "DB Backup", "sk" => "Záloha DB"),
array("en" => "SQL Manager", "sk" => "Správa SQL"),
array("en" => "Order Messages", "sk" => "Správy k objednávkam"),
array("en" => "Delivery Slips", "sk" => "Dodacie listy"),
array("en" => "SEO & URLs", "sk" => "SEO & URL"),
array("en" => "CMS", "sk" => "CMS"),
array("en" => "Image Mapping", "sk" => "Obrázkové mapy"),
array("en" => "Customer Messages", "sk" => "Správy od zákazníkov"),
array("en" => "Monitoring", "sk" => "Stav katalógu"),
array("en" => "Search Engines", "sk" => "Vyhľadávače"),
array("en" => "Referrers", "sk" => "Zdroje návštevnosti"),
array("en" => "Groups", "sk" => "Skupiny zákazníkov"),
array("en" => "General", "sk" => "Základné nastavenia"),
array("en" => "Shopping Carts", "sk" => "Vytvorené nákupné košíky"),
array("en" => "Tags", "sk" => "Tagy"),
array("en" => "Search", "sk" => "Vyhľadávanie"),
array("en" => "Attachments", "sk" => "Prílohy k produktom"),
array("en" => "Configuration Information", "sk" => "Konfiguračné info."),
array("en" => "Performance", "sk" => "Výkon"),
array("en" => "Customer Service", "sk" => "Zákaznická podpora"),
array("en" => "Webservice", "sk" => "Webservice"),
array("en" => "Warehouses", "sk" => "Sklady"),
array("en" => "Stock Management", "sk" => "Správa zásob"),
array("en" => "Stock Movement", "sk" => "Pohyb zásob"),
array("en" => "Instant Stock Status", "sk" => "Aktuálny stav zásob"),
array("en" => "Stock Coverage", "sk" => "Skladovosť"),
array("en" => "Supply orders", "sk" => "Zásobovacie objednávky"),
array("en" => "Modules & Themes Catalog", "sk" => "Presta Addons: Moduly a šablóny"),
array("en" => "My Account", "sk" => "Presta Addons: Účet"),
array("en" => "Stores", "sk" => "Obchody"),
array("en" => "Themes", "sk" => "Šablóny & Logá"),
array("en" => "Geolocation", "sk" => "Geolokalizácia"),
array("en" => "Tax Rules", "sk" => "Daňové pravidlá"),
array("en" => "Logs", "sk" => "Log"),
array("en" => "Counties", "sk" => "Kraje \(okresy\)"),
array("en" => "Configuration", "sk" => "Nastavenia")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_svk, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

//tabulka reinsurance_lang
$current_table = "reinsurance_lang";
$phrase_keys_col = "id_reinsurance";
$transcol = "text"; 
$prekladove_pary = array 	
(
array("en" => "Money back", "sk" => "Záruka vrátenia peňazí"),
array("en" => "Exchange in-store", "sk" => "Spokojnosť alebo vrátenie tovaru"),
array("en" => "Payment upon shipment", "sk" => "Platba pri dodaní"),
array("en" => "Free Shipping", "sk" => "Doprava zadarmo"),
array("en" => "100% secured payment", "sk" => "Bezpečná platba")
);
//zavola funckiu a zbehne preklad tabulky
preklad($id_eng, $id_cs, $current_table, $phrase_keys_col, $transcol, $prekladove_pary);

	
?>