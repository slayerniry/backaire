INSERT INTO `parametre` (`param_key`, `param_value`, `param_desc`, `param_comment`, `param_visible`) VALUES ('LIST_LANGUE_RES', 'fr:français|en:english', NULL, NULL, 1);
UPDATE `menu` SET `men_icon` = 'comment', `men_parent` = 'TRAIT', `men_nom` = 'Fichier Ressource', `men_html` = NULL, `men_getText` = NULL, `men_url` = 'pages/creation/ressources.php', `men_parent2` = NULL, `men_parent3` = NULL, `rang` = 2, `men_restaure` = NULL, `deleted` = NULL WHERE `men_id` = 9;
INSERT INTO `parametre` (`param_key`, `param_value`, `param_desc`, `param_comment`, `param_visible`) VALUES ('CODE_TYPE_BARNER', '6', NULL, NULL, 1);


