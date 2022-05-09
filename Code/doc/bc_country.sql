/*
SQLyog Ultimate v10.42 
MySQL - 5.6.24-72.2 : Database - bcApplication
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bcApplication` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bcApplication`;

/*Table structure for table `bc_country_information` */

DROP TABLE IF EXISTS `bc_country_information`;

CREATE TABLE `bc_country_information` (
  `ISO` varchar(2) NOT NULL,
  `ISO3` varchar(3) DEFAULT NULL,
  `ISO-Numeric` int(3) DEFAULT NULL,
  `FIPS` varchar(2) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Capital` varchar(255) DEFAULT NULL,
  `Area_in_sq_km` int(20) DEFAULT NULL,
  `Population` int(20) DEFAULT NULL,
  `Continent` varchar(2) DEFAULT NULL,
  `TLD` varchar(10) DEFAULT NULL,
  `Currency_code` varchar(10) DEFAULT NULL,
  `CurrencyName` varchar(100) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Postal_Code_Format` varchar(50) DEFAULT NULL,
  `Postal_Code_Regex` varchar(100) DEFAULT NULL,
  `Languages` varchar(100) DEFAULT NULL,
  `Geonameid` varchar(100) DEFAULT NULL,
  `Neighbours` varchar(100) DEFAULT NULL,
  `Equivalent_Fips_Code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ISO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bc_country_information` */

insert  into `bc_country_information`(`ISO`,`ISO3`,`ISO-Numeric`,`FIPS`,`Country`,`Capital`,`Area_in_sq_km`,`Population`,`Continent`,`TLD`,`Currency_code`,`CurrencyName`,`Phone`,`Postal_Code_Format`,`Postal_Code_Regex`,`Languages`,`Geonameid`,`Neighbours`,`Equivalent_Fips_Code`) values ('AE','ARE',784,'AE','United Arab Emirates','Abu Dhabi',82880,4621000,'AS','.ae','AED','Dirham','971','','','ar-AE,fa,en,hi,ur','290557','SA,OM',''),('AF','AFG',4,'AF','Afghanistan','Kabul',647500,32738000,'AS','.af','AFN','Afghani','93','','','fa-AF,ps,uz-AF,tk','1149361','TM,CN,IR,TJ,PK,UZ',''),('AG','ATG',28,'AC','Antigua and Barbuda','St. John\'s',443,69000,'NA','.ag','XCD','Dollar','+1-268','','','en-AG','3576396','',''),('AI','AIA',660,'AV','Anguilla','The Valley',102,13254,'NA','.ai','XCD','Dollar','+1-264','','','en-AI','3573511','',''),('AL','ALB',8,'AL','Albania','Tirana',28748,3619000,'EU','.al','ALL','Lek','355','','','sq,el','783754','MK,GR,CS,ME,RS',''),('AM','ARM',51,'AM','Armenia','Yerevan',29800,2968000,'AS','.am','AMD','Dram','374','######','^(d{6})$','hy','174982','GE,IR,AZ,TR',''),('AN','ANT',530,'NT','Netherlands Antilles','Willemstad',960,136197,'NA','.an','ANG','Guilder','599','','','nl-AN,en,es','3513447','GP',''),('AO','AGO',24,'AO','Angola','Luanda',1246700,12531000,'AF','.ao','AOA','Kwanza','244','','','pt-AO','3351879','CD,NA,ZM,CG',''),('AQ','ATA',10,'AY','Antarctica','',14000000,0,'AN','.aq','','','','','','','6697173','',''),('AR','ARG',32,'AR','Argentina','Buenos Aires',2766890,40677000,'SA','.ar','ARS','Peso','54','@####@@@','^([A-Z]d{4}[A-Z]{3})$','es-AR,en,it,de,fr','3865483','CL,BO,UY,PY,BR',''),('AS','ASM',16,'AQ','American Samoa','Pago Pago',199,57881,'OC','.as','USD','Dollar','+1-684','','','en-AS,sm,to','5880801','',''),('AT','AUT',40,'AU','Austria','Vienna',83858,8205000,'EU','.at','EUR','Euro','43','####','^(d{4})$','de-AT,hr,hu,sl','2782113','CH,DE,HU,SK,CZ,IT,SI,LI',''),('AU','AUS',36,'AS','Australia','Canberra',7686850,20600000,'OC','.au','AUD','Dollar','61','####','^(d{4})$','en-AU','2077456','',''),('AW','ABW',533,'AA','Aruba','Oranjestad',193,71566,'NA','.aw','AWG','Guilder','297','','','nl-AW,es,en','3577279','',''),('AX','ALA',248,'','Aland Islands','Mariehamn',0,26711,'EU','.ax','EUR','Euro','+358-18','','','sv-AX','661882','','FI'),('AZ','AZE',31,'AJ','Azerbaijan','Baku',86600,8177000,'AS','.az','AZN','Manat','994','AZ ####','^(?:AZ)*(d{4})$','az,ru,hy','587116','GE,IR,AM,TR,RU',''),('BA','BIH',70,'BK','Bosnia and Herzegovina','Sarajevo',51129,4590000,'EU','.ba','BAM','Marka','387','#####','^(d{5})$','bs,hr-BA,sr-BA','3277605','CS,HR,ME,RS',''),('BB','BRB',52,'BB','Barbados','Bridgetown',431,281000,'NA','.bb','BBD','Dollar','+1-246','BB#####','^(?:BB)*(d{5})$','en-BB','3374084','',''),('BD','BGD',50,'BG','Bangladesh','Dhaka',144000,153546000,'AS','.bd','BDT','Taka','880','####','^(d{4})$','bn-BD,en','1210997','MM,IN',''),('BE','BEL',56,'BE','Belgium','Brussels',30510,10403000,'EU','.be','EUR','Euro','32','####','^(d{4})$','nl-BE,fr-BE,de-BE','2802361','DE,NL,LU,FR',''),('BF','BFA',854,'UV','Burkina Faso','Ouagadougou',274200,14761000,'AF','.bf','XOF','Franc','226','','','fr-BF','2361809','NE,BJ,GH,CI,TG,ML',''),('BG','BGR',100,'BU','Bulgaria','Sofia',110910,7262000,'EU','.bg','BGN','Lev','359','####','^(d{4})$','bg,tr-BG','732800','MK,GR,RO,CS,TR,RS',''),('BH','BHR',48,'BA','Bahrain','Manama',665,718000,'AS','.bh','BHD','Dinar','973','####|###','^(d{3}d?)$','ar-BH,en,fa,ur','290291','',''),('BI','BDI',108,'BY','Burundi','Bujumbura',27830,8691000,'AF','.bi','BIF','Franc','257','','','fr-BI,rn','433561','TZ,CD,RW',''),('BJ','BEN',204,'BN','Benin','Porto-Novo',112620,8294000,'AF','.bj','XOF','Franc','229','','','fr-BJ','2395170','NE,TG,BF,NG',''),('BL','BLM',652,'TB','Saint Barth','Gustavia',21,8450,'NA','.gp','EUR','Euro','590','### ###','','fr','3578476','',''),('BM','BMU',60,'BD','Bermuda','Hamilton',53,65365,'NA','.bm','BMD','Dollar','+1-441','@@ ##','^([A-Z]{2}d{2})$','en-BM,pt','3573345','',''),('BN','BRN',96,'BX','Brunei','Bandar Seri Begawan',5770,381000,'AS','.bn','BND','Dollar','673','@@####','^([A-Z]{2}d{4})$','ms-BN,en-BN','1820814','MY',''),('BO','BOL',68,'BL','Bolivia','La Paz',1098580,9247000,'SA','.bo','BOB','Boliviano','591','','','es-BO,qu,ay','3923057','PE,CL,PY,BR,AR',''),('BR','BRA',76,'BR','Brazil','Bras',8511965,191908000,'SA','.br','BRL','Real','55','#####-###','^(d{8})$','pt-BR,es,en,fr','3469034','SR,PE,BO,UY,GY,PY,GF,VE,CO,AR',''),('BS','BHS',44,'BF','Bahamas','Nassau',13940,301790,'NA','.bs','BSD','Dollar','+1-242','','','en-BS','3572887','',''),('BT','BTN',64,'BT','Bhutan','Thimphu',47000,2376000,'AS','.bt','BTN','Ngultrum','975','','','dz','1252634','CN,IN',''),('BV','BVT',74,'BV','Bouvet Island','',0,0,'AN','.bv','NOK','Krone','','','','','3371123','',''),('BW','BWA',72,'BC','Botswana','Gaborone',600370,1842000,'AF','.bw','BWP','Pula','267','','','en-BW,tn-BW','933860','ZW,ZA,NA',''),('BY','BLR',112,'BO','Belarus','Minsk',207600,9685000,'EU','.by','BYR','Ruble','375','######','^(d{6})$','be,ru','630336','PL,LT,UA,RU,LV',''),('BZ','BLZ',84,'BH','Belize','Belmopan',22966,301000,'NA','.bz','BZD','Dollar','501','','','en-BZ,es','3582678','GT,MX',''),('CA','CAN',124,'CA','Canada','Ottawa',9984670,33679000,'NA','.ca','CAD','Dollar','1','@#@ #@#','^([a-zA-Z]d[a-zA-Z]d[a-zA-Z]d)$','en-CA,fr-CA','6251999','US',''),('CC','CCK',166,'CK','Cocos Islands','West Island',14,628,'AS','.cc','AUD','Dollar','61','','','ms-CC,en','1547376','',''),('CD','COD',180,'CG','Democratic Republic of the Congo','Kinshasa',2345410,60085004,'AF','.cd','CDF','Franc','243','','','fr-CD,ln,kg','203312','TZ,CF,SD,RW,ZM,BI,UG,CG,AO',''),('CF','CAF',140,'CT','Central African Republic','Bangui',622984,4434000,'AF','.cf','XAF','Franc','236','','','fr-CF,ln,kg','239880','TD,SD,CD,CM,CG',''),('CG','COG',178,'CF','Republic of the Congo','Brazzaville',342000,3039126,'AF','.cg','XAF','Franc','242','','','fr-CG,kg,ln-CG','2260494','CF,GA,CD,CM,AO',''),('CH','CHE',756,'SZ','Switzerland','Berne',41290,7581000,'EU','.ch','CHF','Franc','41','####','^(d{4})$','de-CH,fr-CH,it-CH,rm','2658434','DE,IT,LI,FR,AT',''),('CI','CIV',384,'IV','Ivory Coast','Yamoussoukro',322460,18373000,'AF','.ci','XOF','Franc','225','','','fr-CI','2287781','LR,GH,GN,BF,ML',''),('CK','COK',184,'CW','Cook Islands','Avarua',240,21388,'OC','.ck','NZD','Dollar','682','','','en-CK,mi','1899402','',''),('CL','CHL',152,'CI','Chile','Santiago',756950,16432000,'SA','.cl','CLP','Peso','56','#######','^(d{7})$','es-CL','3895114','PE,BO,AR',''),('CM','CMR',120,'CM','Cameroon','Yaound',475440,18467000,'AF','.cm','XAF','Franc','237','','','en-CM,fr-CM','2233387','TD,CF,GA,GQ,CG,NG',''),('CN','CHN',156,'CH','China','Beijing',9596960,1330044000,'AS','.cn','CNY','Yuan Renminbi','86','######','^(d{6})$','zh-CN,yue,wuu','1814991','LA,BT,TJ,KZ,MN,AF,NP,MM,KG,PK,KP,RU,VN,IN',''),('CO','COL',170,'CO','Colombia','Bogot',1138910,45013000,'SA','.co','COP','Peso','57','','','es-CO','3686110','EC,PE,PA,BR,VE',''),('CR','CRI',188,'CS','Costa Rica','San Jos',51100,4191000,'NA','.cr','CRC','Colon','506','####','^(d{4})$','es-CR,en','3624060','PA,NI',''),('CU','CUB',192,'CU','Cuba','Havana',110860,11423000,'NA','.cu','CUP','Peso','53','CP #####','^(?:CP)*(d{5})$','es-CU','3562981','US',''),('CV','CPV',132,'CV','Cape Verde','Praia',4033,426000,'AF','.cv','CVE','Escudo','238','####','^(d{4})$','pt-CV','3374766','',''),('CX','CXR',162,'KT','Christmas Island','Flying Fish Cove',135,361,'AS','.cx','AUD','Dollar','61','####','^(d{4})$','en,zh,ms-CC','2078138','',''),('CY','CYP',196,'CY','Cyprus','Nicosia',9250,792000,'EU','.cy','EUR','Euro','357','####','^(d{4})$','el-CY,tr-CY,en','146669','',''),('CZ','CZE',203,'EZ','Czech Republic','Prague',78866,10220000,'EU','.cz','CZK','Koruna','420','### ##','^(d{5})$','cs,sk','3077311','PL,DE,SK,AT',''),('DE','DEU',276,'GM','Germany','Berlin',357021,82369000,'EU','.de','EUR','Euro','49','#####','^(d{5})$','de','2921044','CH,PL,NL,DK,BE,CZ,LU,FR,AT',''),('DJ','DJI',262,'DJ','Djibouti','Djibouti',23000,506000,'AF','.dj','DJF','Franc','253','','','fr-DJ,ar,so-DJ,aa','223816','ER,ET,SO',''),('DK','DNK',208,'DA','Denmark','Copenhagen',43094,5484000,'EU','.dk','DKK','Krone','45','####','^(d{4})$','da-DK,en,fo,de-DK','2623032','DE',''),('DM','DMA',212,'DO','Dominica','Roseau',754,72000,'NA','.dm','XCD','Dollar','+1-767','','','en-DM','3575830','',''),('DO','DOM',214,'DR','Dominican Republic','Santo Domingo',48730,9507000,'NA','.do','DOP','Peso','+1-809','#####','^(d{5})$','es-DO','3508796','HT',''),('DZ','DZA',12,'AG','Algeria','Algiers',2381740,33739000,'AF','.dz','DZD','Dinar','213','#####','^(d{5})$','ar-DZ','2589581','NE,EH,LY,MR,TN,MA,ML',''),('EC','ECU',218,'EC','Ecuador','Quito',283560,13927000,'SA','.ec','USD','Dollar','593','@####@','^([a-zA-Z]d{4}[a-zA-Z])$','es-EC','3658394','PE,CO',''),('EE','EST',233,'EN','Estonia','Tallinn',45226,1307000,'EU','.ee','EEK','Kroon','372','#####','^(d{5})$','et,ru','453733','RU,LV',''),('EG','EGY',818,'EG','Egypt','Cairo',1001450,81713000,'AF','.eg','EGP','Pound','20','#####','^(d{5})$','ar-EG,en,fr','357994','LY,SD,IL',''),('EH','ESH',732,'WI','Western Sahara','El-Aaiun',266000,273008,'AF','.eh','MAD','Dirham','212','','','ar,mey','2461445','DZ,MR,MA',''),('ER','ERI',232,'ER','Eritrea','Asmara',121320,5028000,'AF','.er','ERN','Nakfa','291','','','aa-ER,ar,tig,kun,ti-ER','338010','ET,SD,DJ',''),('ES','ESP',724,'SP','Spain','Madrid',504782,40491000,'EU','.es','EUR','Euro','34','#####','^(d{5})$','es-ES,ca,gl,eu','2510769','AD,PT,GI,FR,MA',''),('ET','ETH',231,'ET','Ethiopia','Addis Ababa',1127127,78254000,'AF','.et','ETB','Birr','251','####','^(d{4})$','am,en-ET,om-ET,ti-ET,so-ET,sid','337996','ER,KE,SD,SO,DJ',''),('FI','FIN',246,'FI','Finland','Helsinki',337030,5244000,'EU','.fi','EUR','Euro','358','#####','^(?:FI)*(d{5})$','fi-FI,sv-FI,smn','660013','NO,RU,SE',''),('FJ','FJI',242,'FJ','Fiji','Suva',18270,931000,'OC','.fj','FJD','Dollar','679','','','en-FJ,fj','2205218','',''),('FK','FLK',238,'FK','Falkland Islands','Stanley',12173,2638,'SA','.fk','FKP','Pound','500','','','en-FK','3474414','',''),('FM','FSM',583,'FM','Micronesia','Palikir',702,108105,'OC','.fm','USD','Dollar','691','#####','^(d{5})$','en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg','2081918','',''),('FO','FRO',234,'FO','Faroe Islands','T',1399,48228,'EU','.fo','DKK','Krone','298','FO-###','^(?:FO)*(d{3})$','fo,da-FO','2622320','',''),('FR','FRA',250,'FR','France','Paris',547030,64094000,'EU','.fr','EUR','Euro','33','#####','^(d{5})$','fr-FR,frp,br,co,ca,eu','3017382','CH,DE,BE,LU,IT,AD,MC,ES',''),('GA','GAB',266,'GB','Gabon','Libreville',267667,1484000,'AF','.ga','XAF','Franc','241','','','fr-GA','2400553','CM,GQ,CG',''),('GB','GBR',826,'UK','United Kingdom','London',244820,60943000,'EU','.uk','GBP','Pound','44','@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|G','^(([A-Z]d{2}[A-Z]{2})|([A-Z]d{3}[A-Z]{2})|([A-Z]{2}d{2}[A-Z]{2})|([A-Z]{2}d{3}[A-Z]{2})|([A-Z]d[A-Z]','en-GB,cy-GB,gd','2635167','IE',''),('GD','GRD',308,'GJ','Grenada','St. George\'s',344,90000,'NA','.gd','XCD','Dollar','+1-473','','','en-GD','3580239','',''),('GE','GEO',268,'GG','Georgia','Tbilisi',69700,4630000,'AS','.ge','GEL','Lari','995','####','^(d{4})$','ka,ru,hy,az','614540','AM,AZ,TR,RU',''),('GF','GUF',254,'FG','French Guiana','Cayenne',91000,195506,'SA','.gf','EUR','Euro','594','#####','^((97)|(98)3d{2})$','fr-GF','3381670','SR,BR',''),('GG','GGY',831,'GK','Guernsey','St Peter Port',78,65228,'EU','.gg','GBP','Pound','+44-1481','@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|G','^(([A-Z]d{2}[A-Z]{2})|([A-Z]d{3}[A-Z]{2})|([A-Z]{2}d{2}[A-Z]{2})|([A-Z]{2}d{3}[A-Z]{2})|([A-Z]d[A-Z]','en,fr','3042362','',''),('GH','GHA',288,'GH','Ghana','Accra',239460,23382000,'AF','.gh','GHS','Cedi','233','','','en-GH,ak,ee,tw','2300660','CI,TG,BF',''),('GI','GIB',292,'GI','Gibraltar','Gibraltar',7,27884,'EU','.gi','GIP','Pound','350','','','en-GI,es,it,pt','2411586','ES',''),('GL','GRL',304,'GL','Greenland','Nuuk',2166086,56375,'NA','.gl','DKK','Krone','299','####','^(d{4})$','kl,da-GL,en','3425505','',''),('GM','GMB',270,'GA','Gambia','Banjul',11300,1593256,'AF','.gm','GMD','Dalasi','220','','','en-GM,mnk,wof,wo,ff','2413451','SN',''),('GN','GIN',324,'GV','Guinea','Conakry',245857,10211000,'AF','.gn','GNF','Franc','224','','','fr-GN','2420477','LR,SN,SL,CI,GW,ML',''),('GP','GLP',312,'GP','Guadeloupe','Basse-Terre',1780,443000,'NA','.gp','EUR','Euro','590','#####','^((97)|(98)d{3})$','fr-GP','3579143','AN',''),('GQ','GNQ',226,'EK','Equatorial Guinea','Malabo',28051,562000,'AF','.gq','XAF','Franc','240','','','es-GQ,fr','2309096','GA,CM',''),('GR','GRC',300,'GR','Greece','Athens',131940,10722000,'EU','.gr','EUR','Euro','30','### ##','^(d{5})$','el-GR,en,fr','390903','AL,MK,TR,BG',''),('GS','SGS',239,'SX','South Georgia and the South Sandwich Islands','Grytviken',3903,100,'AN','.gs','GBP','Pound','','','','en','3474415','',''),('GT','GTM',320,'GT','Guatemala','Guatemala City',108890,13002000,'NA','.gt','GTQ','Quetzal','502','#####','^(d{5})$','es-GT','3595528','MX,HN,BZ,SV',''),('GU','GUM',316,'GQ','Guam','Hag',549,168564,'OC','.gu','USD','Dollar','+1-671','969##','^(969d{2})$','en-GU,ch-GU','4043988','',''),('GW','GNB',624,'PU','Guinea-Bissau','Bissau',36120,1503000,'AF','.gw','XOF','Franc','245','####','^(d{4})$','pt-GW,pov','2372248','SN,GN',''),('GY','GUY',328,'GY','Guyana','Georgetown',214970,770000,'SA','.gy','GYD','Dollar','592','','','en-GY','3378535','SR,BR,VE',''),('HK','HKG',344,'HK','Hong Kong','Hong Kong',1092,6898686,'AS','.hk','HKD','Dollar','852','','','zh-HK,yue,zh,en','1819730','',''),('HM','HMD',334,'HM','Heard Island and McDonald Islands','',412,0,'AN','.hm','AUD','Dollar',' ','','','','1547314','',''),('HN','HND',340,'HO','Honduras','Tegucigalpa',112090,7639000,'NA','.hn','HNL','Lempira','504','@@####','^([A-Z]{2}d{4})$','es-HN','3608932','GT,NI,SV',''),('HR','HRV',191,'HR','Croatia','Zagreb',56542,4491000,'EU','.hr','HRK','Kuna','385','HR-#####','^(?:HR)*(d{5})$','hr-HR,sr','3202326','HU,SI,CS,BA,ME,RS',''),('HT','HTI',332,'HA','Haiti','Port-au-Prince',27750,8924000,'NA','.ht','HTG','Gourde','509','HT####','^(?:HT)*(d{4})$','ht,fr-HT','3723988','DO',''),('HU','HUN',348,'HU','Hungary','Budapest',93030,9930000,'EU','.hu','HUF','Forint','36','####','^(d{4})$','hu-HU','719819','SK,SI,RO,UA,CS,HR,AT,RS',''),('ID','IDN',360,'ID','Indonesia','Jakarta',1919440,237512000,'AS','.id','IDR','Rupiah','62','#####','^(d{5})$','id,en,nl,jv','1643084','PG,TL,MY',''),('IE','IRL',372,'EI','Ireland','Dublin',70280,4156000,'EU','.ie','EUR','Euro','353','','','en-IE,ga-IE','2963597','GB',''),('IL','ISR',376,'IS','Israel','Jerusalem',20770,6500000,'AS','.il','ILS','Shekel','972','#####','^(d{5})$','he,ar-IL,en-IL,','294640','SY,JO,LB,EG,PS',''),('IM','IMN',833,'IM','Isle of Man','Douglas, Isle of Man',572,75049,'EU','.im','GBP','Pound','+44-1624','@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|G','^(([A-Z]d{2}[A-Z]{2})|([A-Z]d{3}[A-Z]{2})|([A-Z]{2}d{2}[A-Z]{2})|([A-Z]{2}d{3}[A-Z]{2})|([A-Z]d[A-Z]','en,gv','3042225','',''),('IN','IND',356,'IN','India','New Delhi',3287590,1147995000,'AS','.in','INR','Rupee','91','######','^(d{6})$','en-IN,hi,bn,te,mr,ta,ur,gu,ml,kn,or,pa,as,ks,sd,sa,ur-IN','1269750','CN,NP,MM,BT,PK,BD',''),('IO','IOT',86,'IO','British Indian Ocean Territory','Diego Garcia',60,0,'AS','.io','USD','Dollar','246','','','en-IO','1282588','',''),('IQ','IRQ',368,'IZ','Iraq','Baghdad',437072,28221000,'AS','.iq','IQD','Dinar','964','#####','^(d{5})$','ar-IQ,ku,hy','99237','SY,SA,IR,JO,TR,KW',''),('IR','IRN',364,'IR','Iran','Tehran',1648000,65875000,'AS','.ir','IRR','Rial','98','##########','^(d{10})$','fa-IR,ku','130758','TM,AF,IQ,AM,PK,AZ,TR',''),('IS','ISL',352,'IC','Iceland','Reykjav',103000,304000,'EU','.is','ISK','Krona','354','###','^(d{3})$','is,en,de,da,sv,no','2629691','',''),('IT','ITA',380,'IT','Italy','Rome',301230,58145000,'EU','.it','EUR','Euro','39','####','^(d{5})$','it-IT,de-IT,fr-IT,sl','3175395','CH,VA,SI,SM,FR,AT',''),('JE','JEY',832,'JE','Jersey','Saint Helier',116,90812,'EU','.je','GBP','Pound','+44-1534','@# #@@|@## #@@|@@# #@@|@@## #@@|@#@ #@@|@@#@ #@@|G','^(([A-Z]d{2}[A-Z]{2})|([A-Z]d{3}[A-Z]{2})|([A-Z]{2}d{2}[A-Z]{2})|([A-Z]{2}d{3}[A-Z]{2})|([A-Z]d[A-Z]','en,pt','3042142','',''),('JM','JAM',388,'JM','Jamaica','Kingston',10991,2801000,'NA','.jm','JMD','Dollar','+1-876','','','en-JM','3489940','',''),('JO','JOR',400,'JO','Jordan','Amman',92300,6198000,'AS','.jo','JOD','Dinar','962','#####','^(d{5})$','ar-JO,en','248816','SY,SA,IQ,IL,PS',''),('JP','JPN',392,'JA','Japan','Tokyo',377835,127288000,'AS','.jp','JPY','Yen','81','###-####','^(d{7})$','ja','1861060','',''),('KE','KEN',404,'KE','Kenya','Nairobi',582650,37953000,'AF','.ke','KES','Shilling','254','#####','^(d{5})$','en-KE,sw-KE','192950','ET,TZ,SD,SO,UG',''),('KG','KGZ',417,'KG','Kyrgyzstan','Bishkek',198500,5356000,'AS','.kg','KGS','Som','996','######','^(d{6})$','ky,uz,ru','1527747','CN,TJ,UZ,KZ',''),('KH','KHM',116,'CB','Cambodia','Phnom Penh',181040,14241000,'AS','.kh','KHR','Riels','855','#####','^(d{5})$','km,fr,en','1831722','LA,TH,VN',''),('KI','KIR',296,'KR','Kiribati','South Tarawa',811,110000,'OC','.ki','AUD','Dollar','686','','','en-KI,gil','4030945','',''),('KM','COM',174,'CN','Comoros','Moroni',2170,731000,'AF','.km','KMF','Franc','269','','','ar,fr-KM','921929','',''),('KN','KNA',659,'SC','Saint Kitts and Nevis','Basseterre',261,39000,'NA','.kn','XCD','Dollar','+1-869','','','en-KN','3575174','',''),('KP','PRK',408,'KN','North Korea','Pyongyang',120540,22912177,'AS','.kp','KPW','Won','850','###-###','^(d{6})$','ko-KP','1873107','CN,KR,RU',''),('KR','KOR',410,'KS','South Korea','Seoul',98480,48422644,'AS','.kr','KRW','Won','82','SEOUL ###-###','^(?:SEOUL)*(d{6})$','ko-KR,en','1835841','KP',''),('XK','XKX',0,'KV','Kosovo','Pri',0,1800000,'EU','','EUR','Euro','','','','sq,sr','831053','RS,AL,MK,ME',''),('KW','KWT',414,'KU','Kuwait','Kuwait City',17820,2596000,'AS','.kw','KWD','Dinar','965','#####','^(d{5})$','ar-KW,en','285570','SA,IQ',''),('KY','CYM',136,'CJ','Cayman Islands','George Town',262,44270,'NA','.ky','KYD','Dollar','+1-345','','','en-KY','3580718','',''),('KZ','KAZ',398,'KZ','Kazakhstan','Astana',2717300,15340000,'AS','.kz','KZT','Tenge','7','######','^(d{6})$','kk,ru','1522867','TM,CN,KG,UZ,RU',''),('LA','LAO',418,'LA','Laos','Vientiane',236800,6677000,'AS','.la','LAK','Kip','856','#####','^(d{5})$','lo,fr,en','1655842','CN,MM,KH,TH,VN',''),('LB','LBN',422,'LE','Lebanon','Beirut',10400,3971000,'AS','.lb','LBP','Pound','961','#### ####|####','^(d{4}(d{4})?)$','ar-LB,fr-LB,en,hy','272103','SY,IL',''),('LC','LCA',662,'ST','Saint Lucia','Castries',616,172000,'NA','.lc','XCD','Dollar','+1-758','','','en-LC','3576468','',''),('LI','LIE',438,'LS','Liechtenstein','Vaduz',160,34000,'EU','.li','CHF','Franc','423','####','^(d{4})$','de-LI','3042058','CH,AT',''),('LK','LKA',144,'CE','Sri Lanka','Colombo',65610,21128000,'AS','.lk','LKR','Rupee','94','#####','^(d{5})$','si,ta,en','1227603','',''),('LR','LBR',430,'LI','Liberia','Monrovia',111370,3334000,'AF','.lr','LRD','Dollar','231','####','^(d{4})$','en-LR','2275384','SL,CI,GN',''),('LS','LSO',426,'LT','Lesotho','Maseru',30355,2128000,'AF','.ls','LSL','Loti','266','###','^(d{3})$','en-LS,st,zu,xh','932692','ZA',''),('LT','LTU',440,'LH','Lithuania','Vilnius',65200,3565000,'EU','.lt','LTL','Litas','370','LT-#####','^(?:LT)*(d{5})$','lt,ru,pl','597427','PL,BY,RU,LV',''),('LU','LUX',442,'LU','Luxembourg','Luxembourg',2586,486000,'EU','.lu','EUR','Euro','352','####','^(d{4})$','lb,de-LU,fr-LU','2960313','DE,BE,FR',''),('LV','LVA',428,'LG','Latvia','Riga',64589,2245000,'EU','.lv','LVL','Lat','371','LV-####','^(?:LV)*(d{4})$','lv,ru,lt','458258','LT,EE,BY,RU',''),('LY','LBY',434,'LY','Libya','Tripolis',1759540,6173000,'AF','.ly','LYD','Dinar','218','','','ar-LY,it,en','2215636','TD,NE,DZ,SD,TN,EG',''),('MA','MAR',504,'MO','Morocco','Rabat',446550,34272000,'AF','.ma','MAD','Dirham','212','#####','^(d{5})$','ar-MA,fr','2542007','DZ,EH,ES',''),('MC','MCO',492,'MN','Monaco','Monaco',2,32000,'EU','.mc','EUR','Euro','377','#####','^(d{5})$','fr-MC,en,it','2993457','FR',''),('MD','MDA',498,'MD','Moldova','Chisinau',33843,4324000,'EU','.md','MDL','Leu','373','MD-####','^(?:MD)*(d{4})$','ro,ru,gag,tr','617790','RO,UA',''),('ME','MNE',499,'MJ','Montenegro','Podgorica',14026,678000,'EU','.cs','EUR','Euro','381','#####','^(d{5})$','sr,hu,bs,sq,hr,rom','3194884','AL,HR,BA,RS',''),('MF','MAF',663,'RN','Saint Martin','Marigot',53,33100,'NA','.gp','EUR','Euro','590','### ###','','fr','3578421','',''),('MG','MDG',450,'MA','Madagascar','Antananarivo',587040,20042000,'AF','.mg','MGA','Ariary','261','###','^(d{3})$','fr-MG,mg','1062947','',''),('MH','MHL',584,'RM','Marshall Islands','Uliga',181,11628,'OC','.mh','USD','Dollar','692','','','mh,en-MH','2080185','',''),('MK','MKD',807,'MK','Macedonia','Skopje',25333,2061000,'EU','.mk','MKD','Denar','389','####','^(d{4})$','mk,sq,tr,rmm,sr','718075','AL,GR,CS,BG,RS',''),('ML','MLI',466,'ML','Mali','Bamako',1240000,12324000,'AF','.ml','XOF','Franc','223','','','fr-ML,bm','2453866','SN,NE,DZ,CI,GN,MR,BF',''),('MM','MMR',104,'BM','Myanmar','Yangon',678500,47758000,'AS','.mm','MMK','Kyat','95','#####','^(d{5})$','my','1327865','CN,LA,TH,BD,IN',''),('MN','MNG',496,'MG','Mongolia','Ulan Bator',1565000,2996000,'AS','.mn','MNT','Tugrik','976','######','^(d{6})$','mn,ru','2029969','CN,RU',''),('MO','MAC',446,'MC','Macao','Macao',254,449198,'AS','.mo','MOP','Pataca','853','','','zh,zh-MO','1821275','',''),('MP','MNP',580,'CQ','Northern Mariana Islands','Saipan',477,80362,'OC','.mp','USD','Dollar','+1-670','','','fil,tl,zh,ch-MP,en-MP','4041467','',''),('MQ','MTQ',474,'MB','Martinique','Fort-de-France',1100,432900,'NA','.mq','EUR','Euro','596','#####','^(d{5})$','fr-MQ','3570311','',''),('MR','MRT',478,'MR','Mauritania','Nouakchott',1030700,3364000,'AF','.mr','MRO','Ouguiya','222','','','ar-MR,fuc,snk,fr,mey,wo','2378080','SN,DZ,EH,ML',''),('MS','MSR',500,'MH','Montserrat','Plymouth',102,9341,'NA','.ms','XCD','Dollar','+1-664','','','en-MS','3578097','',''),('MT','MLT',470,'MT','Malta','Valletta',316,403000,'EU','.mt','EUR','Euro','356','@@@ ###|@@@ ##','^([A-Z]{3}d{2}d?)$','mt,en-MT','2562770','',''),('MU','MUS',480,'MP','Mauritius','Port Louis',2040,1260000,'AF','.mu','MUR','Rupee','230','','','en-MU,bho,fr','934292','',''),('MV','MDV',462,'MV','Maldives','Mal',300,379000,'AS','.mv','MVR','Rufiyaa','960','#####','^(d{5})$','dv,en','1282028','',''),('MW','MWI',454,'MI','Malawi','Lilongwe',118480,13931000,'AF','.mw','MWK','Kwacha','265','','','ny,yao,tum,swk','927384','TZ,MZ,ZM',''),('MX','MEX',484,'MX','Mexico','Mexico City',1972550,109955000,'NA','.mx','MXN','Peso','52','#####','^(d{5})$','es-MX','3996063','GT,US,BZ',''),('MY','MYS',458,'MY','Malaysia','Kuala Lumpur',329750,25259000,'AS','.my','MYR','Ringgit','60','#####','^(d{5})$','ms-MY,en,zh,ta,te,ml,pa,th','1733045','BN,TH,ID',''),('MZ','MOZ',508,'MZ','Mozambique','Maputo',801590,21284000,'AF','.mz','MZN','Meticail','258','####','^(d{4})$','pt-MZ,vmw','1036973','ZW,TZ,SZ,ZA,ZM,MW',''),('NA','NAM',516,'WA','Namibia','Windhoek',825418,2063000,'AF','.na','NAD','Dollar','264','','','en-NA,af,de,hz,naq','3355338','ZA,BW,ZM,AO',''),('NC','NCL',540,'NC','New Caledonia','Noum',19060,216494,'OC','.nc','XPF','Franc','687','#####','^(d{5})$','fr-NC','2139685','',''),('NE','NER',562,'NG','Niger','Niamey',1267000,13272000,'AF','.ne','XOF','Franc','227','####','^(d{4})$','fr-NE,ha,kr,dje','2440476','TD,BJ,DZ,LY,BF,NG,ML',''),('NF','NFK',574,'NF','Norfolk Island','Kingston',35,1828,'OC','.nf','AUD','Dollar','672','','','en-NF','2155115','',''),('NG','NGA',566,'NI','Nigeria','Abuja',923768,138283000,'AF','.ng','NGN','Naira','234','######','^(d{6})$','en-NG,ha,yo,ig,ff','2328926','TD,NE,BJ,CM',''),('NI','NIC',558,'NU','Nicaragua','Managua',129494,5780000,'NA','.ni','NIO','Cordoba','505','###-###-#','^(d{7})$','es-NI,en','3617476','CR,HN',''),('NL','NLD',528,'NL','Netherlands','Amsterdam',41526,16645000,'EU','.nl','EUR','Euro','31','#### @@','^(d{4}[A-Z]{2})$','nl-NL,fy-NL','2750405','DE,BE',''),('NO','NOR',578,'NO','Norway','Oslo',324220,4644000,'EU','.no','NOK','Krone','47','####','^(d{4})$','no,nb,nn','3144096','FI,RU,SE',''),('NP','NPL',524,'NP','Nepal','Kathmandu',140800,29519000,'AS','.np','NPR','Rupee','977','#####','^(d{5})$','ne,en','1282988','CN,IN',''),('NR','NRU',520,'NR','Nauru','Yaren',21,13000,'OC','.nr','AUD','Dollar','674','','','na,en-NR','2110425','',''),('NU','NIU',570,'NE','Niue','Alofi',260,2166,'OC','.nu','NZD','Dollar','683','','','niu,en-NU','4036232','',''),('NZ','NZL',554,'NZ','New Zealand','Wellington',268680,4154000,'OC','.nz','NZD','Dollar','64','####','^(d{4})$','en-NZ,mi','2186224','',''),('OM','OMN',512,'MU','Oman','Muscat',212460,3309000,'AS','.om','OMR','Rial','968','###','^(d{3})$','ar-OM,en,bal,ur','286963','SA,YE,AE',''),('PA','PAN',591,'PM','Panama','Panama City',78200,3292000,'NA','.pa','PAB','Balboa','507','','','es-PA,en','3703430','CR,CO',''),('PE','PER',604,'PE','Peru','Lima',1285220,29041000,'SA','.pe','PEN','Sol','51','','','es-PE,qu,ay','3932488','EC,CL,BO,BR,CO',''),('PF','PYF',258,'FP','French Polynesia','Papeete',4167,270485,'OC','.pf','XPF','Franc','689','#####','^((97)|(98)7d{2})$','fr-PF,ty','4020092','',''),('PG','PNG',598,'PP','Papua New Guinea','Port Moresby',462840,5921000,'OC','.pg','PGK','Kina','675','###','^(d{3})$','en-PG,ho,meu,tpi','2088628','ID',''),('PH','PHL',608,'RP','Philippines','Manila',300000,92681000,'AS','.ph','PHP','Peso','63','####','^(d{4})$','tl,en-PH,fil','1694008','',''),('PK','PAK',586,'PK','Pakistan','Islamabad',803940,167762000,'AS','.pk','PKR','Rupee','92','#####','^(d{5})$','ur-PK,en-PK,pa,sd,ps,brh','1168579','CN,AF,IR,IN',''),('PL','POL',616,'PL','Poland','Warsaw',312685,38500000,'EU','.pl','PLN','Zloty','48','##-###','^(d{5})$','pl','798544','DE,LT,SK,CZ,BY,UA,RU',''),('PM','SPM',666,'SB','Saint Pierre and Miquelon','Saint-Pierre',242,7012,'NA','.pm','EUR','Euro','508','#####','^(97500)$','fr-PM','3424932','',''),('PN','PCN',612,'PC','Pitcairn','Adamstown',47,46,'OC','.pn','NZD','Dollar','','','','en-PN','4030699','',''),('PR','PRI',630,'RQ','Puerto Rico','San Juan',9104,3916632,'NA','.pr','USD','Dollar','+1-787','#####-####','^(d{9})$','en-PR,es-PR','4566966','',''),('PS','PSE',275,'WE','Palestinian Territory','East Jerusalem',5970,3800000,'AS','.ps','ILS','Shekel','970','','','ar-PS','6254930','JO,IL',''),('PT','PRT',620,'PO','Portugal','Lisbon',92391,10676000,'EU','.pt','EUR','Euro','351','####-###','^(d{7})$','pt-PT,mwl','2264397','ES',''),('PW','PLW',585,'PS','Palau','Koror',458,20303,'OC','.pw','USD','Dollar','680','96940','^(96940)$','pau,sov,en-PW,tox,ja,fil,zh','1559582','',''),('PY','PRY',600,'PA','Paraguay','Asunci',406750,6831000,'SA','.py','PYG','Guarani','595','####','^(d{4})$','es-PY,gn','3437598','BO,BR,AR',''),('QA','QAT',634,'QA','Qatar','Doha',11437,928000,'AS','.qa','QAR','Rial','974','','','ar-QA,es','289688','SA',''),('RE','REU',638,'RE','Reunion','Saint-Denis',2517,776948,'AF','.re','EUR','Euro','262','#####','^((97)|(98)(4|7|8)d{2})$','fr-RE','935317','',''),('RO','ROU',642,'RO','Romania','Bucharest',237500,22246000,'EU','.ro','RON','Leu','40','######','^(d{6})$','ro,hu,rom','798549','MD,HU,UA,CS,BG,RS',''),('RS','SRB',688,'RB','Serbia','Belgrade',88361,10159000,'EU','.rs','RSD','Dinar','381','######','^(d{6})$','sr,hu,bs,rom','6290252','AL,HU,MK,RO,HR,BA,BG,ME',''),('RU','RUS',643,'RS','Russia','Moscow',17100000,140702000,'EU','.ru','RUB','Ruble','7','######','^(d{6})$','ru-RU','2017370','GE,CN,BY,UA,KZ,LV,PL,EE,LT,FI,MN,NO,AZ,KP',''),('RW','RWA',646,'RW','Rwanda','Kigali',26338,10186000,'AF','.rw','RWF','Franc','250','','','rw,en-RW,fr-RW,sw','49518','TZ,CD,BI,UG',''),('SA','SAU',682,'SA','Saudi Arabia','Riyadh',1960582,28161000,'AS','.sa','SAR','Rial','966','#####','^(d{5})$','ar-SA','102358','QA,OM,IQ,YE,JO,AE,KW',''),('SB','SLB',90,'BP','Solomon Islands','Honiara',28450,581000,'OC','.sb','SBD','Dollar','677','','','en-SB,tpi','2103350','',''),('SC','SYC',690,'SE','Seychelles','Victoria',455,82000,'AF','.sc','SCR','Rupee','248','','','en-SC,fr-SC','241170','',''),('SD','SDN',736,'SU','Sudan','Khartoum',2505810,40218000,'AF','.sd','SDG','Dinar','249','#####','^(d{5})$','ar-SD,en,fia','366755','TD,ER,ET,LY,KE,CF,CD,UG,EG',''),('SE','SWE',752,'SW','Sweden','Stockholm',449964,9045000,'EU','.se','SEK','Krona','46','SE-### ##','^(?:SE)*(d{5})$','sv-SE,se,sma,fi-SE','2661886','NO,FI',''),('SG','SGP',702,'SN','Singapore','Singapur',693,4608000,'AS','.sg','SGD','Dollar','65','######','^(d{6})$','cmn,en-SG,ms-SG,ta-SG,zh-SG','1880251','',''),('SH','SHN',654,'SH','Saint Helena','Jamestown',410,7460,'AF','.sh','SHP','Pound','290','STHL 1ZZ','^(STHL1ZZ)$','en-SH','3370751','',''),('SI','SVN',705,'SI','Slovenia','Ljubljana',20273,2007000,'EU','.si','EUR','Euro','386','SI- ####','^(?:SI)*(d{4})$','sl,sh','3190538','HU,IT,HR,AT',''),('SJ','SJM',744,'SV','Svalbard and Jan Mayen','Longyearbyen',62049,2265,'EU','.sj','NOK','Krone','47','','','no,ru','607072','',''),('SK','SVK',703,'LO','Slovakia','Bratislava',48845,5455000,'EU','.sk','EUR','Euro','421','###  ##','^(d{5})$','sk,hu','3057568','PL,HU,CZ,UA,AT',''),('SL','SLE',694,'SL','Sierra Leone','Freetown',71740,6286000,'AF','.sl','SLL','Leone','232','','','en-SL,men,tem','2403846','LR,GN',''),('SM','SMR',674,'SM','San Marino','San Marino',61,29000,'EU','.sm','EUR','Euro','378','4789#','^(4789d)$','it-SM','3168068','IT',''),('SN','SEN',686,'SG','Senegal','Dakar',196190,12853000,'AF','.sn','XOF','Franc','221','#####','^(d{5})$','fr-SN,wo,fuc,mnk','2245662','GN,MR,GW,GM,ML',''),('SO','SOM',706,'SO','Somalia','Mogadishu',637657,9379000,'AF','.so','SOS','Shilling','252','@@  #####','^([A-Z]{2}d{5})$','so-SO,ar-SO,it,en-SO','51537','ET,KE,DJ',''),('SR','SUR',740,'NS','Suriname','Paramaribo',163270,475000,'SA','.sr','SRD','Dollar','597','','','nl-SR,en,srn,hns,jv','3382998','GY,BR,GF',''),('ST','STP',678,'TP','Sao Tome and Principe','S',1001,205000,'AF','.st','STD','Dobra','239','','','pt-ST','2410758','',''),('SV','SLV',222,'ES','El Salvador','San Salvador',21040,7066000,'NA','.sv','USD','Dollar','503','CP ####','^(?:CP)*(d{4})$','es-SV','3585968','GT,HN',''),('SY','SYR',760,'SY','Syria','Damascus',185180,19747000,'AS','.sy','SYP','Pound','963','','','ar-SY,ku,hy,arc,fr,en','163843','IQ,JO,IL,TR,LB',''),('SZ','SWZ',748,'WZ','Swaziland','Mbabane',17363,1128000,'AF','.sz','SZL','Lilangeni','268','@###','^([A-Z]d{3})$','en-SZ,ss-SZ','934841','ZA,MZ',''),('TC','TCA',796,'TK','Turks and Caicos Islands','Cockburn Town',430,20556,'NA','.tc','USD','Dollar','+1-649','TKCA 1ZZ','^(TKCA 1ZZ)$','en-TC','3576916','',''),('TD','TCD',148,'CD','Chad','N\'Djamena',1284000,10111000,'AF','.td','XAF','Franc','235','','','fr-TD,ar-TD,sre','2434508','NE,LY,CF,SD,CM,NG',''),('TF','ATF',260,'FS','French Southern Territories','Martin-de-Vivi',7829,0,'AN','.tf','EUR','Euro  ','','','','fr','1546748','',''),('TG','TGO',768,'TO','Togo','Lom',56785,5858000,'AF','.tg','XOF','Franc','228','','','fr-TG,ee,hna,kbp,dag,ha','2363686','BJ,GH,BF',''),('TH','THA',764,'TH','Thailand','Bangkok',514000,65493000,'AS','.th','THB','Baht','66','#####','^(d{5})$','th,en','1605651','LA,MM,KH,MY',''),('TJ','TJK',762,'TI','Tajikistan','Dushanbe',143100,7211000,'AS','.tj','TJS','Somoni','992','######','^(d{6})$','tg,ru','1220409','CN,AF,KG,UZ',''),('TK','TKL',772,'TL','Tokelau','',10,1405,'OC','.tk','NZD','Dollar','690','','','tkl,en-TK','4031074','',''),('TL','TLS',626,'TT','East Timor','Dili',15007,1107000,'OC','.tp','USD','Dollar','670','','','tet,pt-TL,id,en','1966436','ID',''),('TM','TKM',795,'TX','Turkmenistan','Ashgabat',488100,5179000,'AS','.tm','TMT','Manat','993','######','^(d{6})$','tk,ru,uz','1218197','AF,IR,UZ,KZ',''),('TN','TUN',788,'TS','Tunisia','Tunis',163610,10378000,'AF','.tn','TND','Dinar','216','####','^(d{4})$','ar-TN,fr','2464461','DZ,LY',''),('TO','TON',776,'TN','Tonga','Nuku\'alofa',748,118000,'OC','.to','TOP','Pa\'anga','676','','','to,en-TO','4032283','',''),('TR','TUR',792,'TU','Turkey','Ankara',780580,71892000,'AS','.tr','TRY','Lira','90','#####','^(d{5})$','tr-TR,ku,diq,az,av','298795','SY,GE,IQ,IR,GR,AM,AZ,BG',''),('TT','TTO',780,'TD','Trinidad and Tobago','Port of Spain',5128,1047000,'NA','.tt','TTD','Dollar','+1-868','','','en-TT,hns,fr,es,zh','3573591','',''),('TV','TUV',798,'TV','Tuvalu','Vaiaku',26,12000,'OC','.tv','AUD','Dollar','688','','','tvl,en,sm,gil','2110297','',''),('TW','TWN',158,'TW','Taiwan','Taipei',35980,22894384,'AS','.tw','TWD','Dollar','886','#####','^(d{5})$','zh-TW,zh,nan,hak','1668284','',''),('TZ','TZA',834,'TZ','Tanzania','Dodoma',945087,40213000,'AF','.tz','TZS','Shilling','255','','','sw-TZ,en,ar','149590','MZ,KE,CD,RW,ZM,BI,UG,MW',''),('UA','UKR',804,'UP','Ukraine','Kiev',603700,45994000,'EU','.ua','UAH','Hryvnia','380','#####','^(d{5})$','uk,ru-UA,rom,pl,hu','690791','PL,MD,HU,SK,BY,RO,RU',''),('UG','UGA',800,'UG','Uganda','Kampala',236040,31367000,'AF','.ug','UGX','Shilling','256','','','en-UG,lg,sw,ar','226074','TZ,KE,SD,CD,RW',''),('UM','UMI',581,'','United States Minor Outlying Islands','',0,0,'OC','.um','USD','Dollar ','','','','en-UM','5854968','',''),('US','USA',840,'US','United States','Washington',9629091,303824000,'NA','.us','USD','Dollar','1','#####-####','^(d{9})$','en-US,es-US,haw','6252001','CA,MX,CU',''),('UY','URY',858,'UY','Uruguay','Montevideo',176220,3477000,'SA','.uy','UYU','Peso','598','#####','^(d{5})$','es-UY','3439705','BR,AR',''),('UZ','UZB',860,'UZ','Uzbekistan','Tashkent',447400,28268000,'AS','.uz','UZS','Som','998','######','^(d{6})$','uz,ru,tg','1512440','TM,AF,KG,TJ,KZ',''),('VA','VAT',336,'VT','Vatican','Vatican City',0,921,'EU','.va','EUR','Euro','379','','','la,it,fr','3164670','IT',''),('VC','VCT',670,'VC','Saint Vincent and the Grenadines','Kingstown',389,117534,'NA','.vc','XCD','Dollar','+1-784','','','en-VC,fr','3577815','',''),('VE','VEN',862,'VE','Venezuela','Caracas',912050,26414000,'SA','.ve','VEF','Bolivar','58','####','^(d{4})$','es-VE','3625428','GY,BR,CO',''),('VG','VGB',92,'VI','British Virgin Islands','Road Town',153,21730,'NA','.vg','USD','Dollar','+1-284','','','en-VG','3577718','',''),('VI','VIR',850,'VQ','U.S. Virgin Islands','Charlotte Amalie',352,108708,'NA','.vi','USD','Dollar','+1-340','','','en-VI','4796775','',''),('VN','VNM',704,'VM','Vietnam','Hanoi',329560,86116000,'AS','.vn','VND','Dong','84','######','^(d{6})$','vi,en,fr,zh,km','1562822','CN,LA,KH',''),('VU','VUT',548,'NH','Vanuatu','Port Vila',12200,215000,'OC','.vu','VUV','Vatu','678','','','bi,en-VU,fr-VU','2134431','',''),('WF','WLF',876,'WF','Wallis and Futuna','Mat',274,16025,'OC','.wf','XPF','Franc','681','#####','^(986d{2})$','wls,fud,fr-WF','4034749','',''),('WS','WSM',882,'WS','Samoa','Apia',2944,217000,'OC','.ws','WST','Tala','685','','','sm,en-WS','4034894','',''),('YE','YEM',887,'YM','Yemen','San',527970,23013000,'AS','.ye','YER','Rial','967','','','ar-YE','69543','SA,OM',''),('YT','MYT',175,'MF','Mayotte','Mamoudzou',374,159042,'AF','.yt','EUR','Euro','269','#####','^(d{5})$','fr-YT','1024031','',''),('ZA','ZAF',710,'SF','South Africa','Pretoria',1219912,43786000,'AF','.za','ZAR','Rand','27','####','^(d{4})$','zu,xh,af,nso,en-ZA,tn,st,ts','953987','ZW,SZ,MZ,BW,NA,LS',''),('ZM','ZMB',894,'ZA','Zambia','Lusaka',752614,11669000,'AF','.zm','ZMK','Kwacha','260','#####','^(d{5})$','en-ZM,bem,loz,lun,lue,ny,toi','895949','ZW,TZ,MZ,CD,NA,MW,AO',''),('ZW','ZWE',716,'ZI','Zimbabwe','Harare',390580,12382000,'AF','.zw','ZWL','Dollar','263','','','en-ZW,sn,nr,nd','878675','ZA,MZ,BW,ZM',''),('CS','SCG',891,'YI','Serbia and Montenegro','Belgrade',102350,10829175,'EU','.cs','RSD','Dinar','+381','#####','^(d{5})$','cu,hu,sq,sr','863038','AL,HU,MK,RO,HR,BA,BG',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
