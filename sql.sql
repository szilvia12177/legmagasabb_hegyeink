CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `uto_nev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
)

CREATE TABLE `kapcsolat` ( 
  `id` int(10) unsigned NOT NULL auto_increment, 
  `felhasznalo` varchar(45) NOT NULL default '', 
  `uzenet` varchar(1000) NOT NULL default '', 
  `kuldes_ideje` datetime DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) 
);

CHARACTER SET utf8 COLLATE utf8_general_ci;