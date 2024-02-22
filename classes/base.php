<?php



class clsSecureDatabase
{
	const CST_SLASH	= "/";

	var $m_link;
	var $m_isFound;

	var $m_id;
	var $m_name;
	var $m_user;
	var $m_pwd;
	var $m_code_1;
	var $m_code_2;
	var $m_code_3;
	var $m_code_4;

	var $m_salt;

	var $m_sqlFile;
	var $m_rarFile;
	var $m_resFile;
	var $m_bakFile;

	var $m_cmd;

	var	$m_type_base;

	var $m_type_backup;

	var $m_filearch;

	var $m_fileName;

	var $m_dossier_sauvegardre;

	function set_m_fileName($valeur)
	{
		$this->m_fileName = $valeur;
	}

	function set_m_dossier_sauvegardre($valeur)
	{
		$this->m_dossier_sauvegardre = $valeur;
	}


	function __construct($type_base)
	{

		$this->m_link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
		if (!$this->m_link) {
			die('Impossible de s&eacute;lectionner la base de donn&eacute;es');
		}

		$this->m_type_base 		= $type_base;
	}

	function close()
	{
		mysqli_close($this->m_link);
	}

	function getData()
	{

		if (true) {

			$this->m_name 		= DB_NAME;
			$this->m_user 		= DB_USER;
			$this->m_pwd 		= DB_PWD;

			$this->m_sqlFile	= $_SERVER['DOCUMENT_ROOT'] . BACKUP_DIR . $this->m_name . ".sql";
			$this->m_rarFile	= $_SERVER['DOCUMENT_ROOT'] . BACKUP_DIR . $this->m_name . ".rar";
		}
	}

	function backup()
	{
		$cmd_backup = MYSQL_BIN . "mysqldump.exe -u " . $this->m_user . " -p" . $this->m_pwd;
		$cmd_backup .= "  " . $this->m_name . " > " . $this->m_sqlFile;

		exec($cmd_backup);
	}

	function drop()
	{
		$cmd_drop = MYSQL_BIN . "mysqladmin.exe --user=" . $this->m_user . " --password=" . $this->m_pwd;
		$cmd_drop .= " -f drop " . $this->m_name;
		ob_start();
		exec($cmd_drop);
		ob_end_clean();
	}

	function del_file_folder_archive()
	{

		$dossier_traite = $this->m_dossier_sauvegardre;

		$repertoire = opendir($dossier_traite); // On définit le répertoire dans lequel on souhaite travailler.

		while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
		{
			$chemin = $dossier_traite . "/" . $fichier; // On définit le chemin du fichier à effacer.

			// Si le fichier n'est pas un répertoire…
			if ($fichier != ".." and $fichier != "." and !is_dir($fichier)) {
				unlink($chemin); // On efface.
			}
		}
		closedir($repertoire);
	}


	function backupDatabase($msg)
	{
		$this->getData();

		if (true) {

			//mamafa repetoire
			//$this->del_file_folder_archive();

			$this->backup();


			if (file_exists($this->m_sqlFile)) {

				copy($this->m_sqlFile,  $this->m_dossier_sauvegardre . "/" . $this->m_name . "_" . $this->m_fileName .  ".sql");

				return true;
			} else {
				$this->close();

				$msg = "le fichier de sauvegarde n'existe pas !";

				return false;
			}
		} else {
			$this->close();

			$msg = "il n'y a pas de base de donn&eacute;es &agrave; sauvegarder !'";

			return false;
		}
	}

	function decompress()
	{
		$backupdir	= $_SERVER['DOCUMENT_ROOT'] . BACKUP_DIR;
		$cmd_rar 	= $_SERVER['DOCUMENT_ROOT'] . INSTALL_DIR . "UnRar.exe -p" . $this->m_salt . " e " . $this->m_rarFile . " " . $backupdir;
		ob_start();
		exec($cmd_rar);

		while (true) {
			if (file_exists($this->m_sqlFile)) {
				unlink($this->m_rarFile);
				break;
			}
		}

		ob_end_clean();
	}

	function restore()
	{

		/*$cmd_bdd = MYSQL_BIN . "mysql --user=" . $this->m_user . " --password=" . $this->m_pwd . ' -e "drop database IF EXISTS ' . $this->m_name . '"';

		echo $cmd_bdd . "<br>";

		exec($cmd_bdd);

		$cmd_bdd = MYSQL_BIN . "mysql --user=" . $this->m_user . " --password=" . $this->m_pwd . ' -e "create database ' . $this->m_name . '"';

		echo $cmd_bdd . "<br>";

		exec($cmd_bdd);*/

		$cmd_restore = MYSQL_BIN . "mysql --user=" . $this->m_user . " --password=" . $this->m_pwd . " --default-character-set=utf8 ";
		$cmd_restore .= $this->m_name . " < " . $this->m_sqlFile;

		echo $cmd_restore . "<br>";



		exec($cmd_restore);

		//die("eto");
	}

	function restoreDatabase($file_to_restore, $msg)
	{
		if (file_exists($file_to_restore)) {
			$this->m_type_backup = 1;

			$this->m_bakFile = $file_to_restore;

			$this->m_resFile = basename($file_to_restore);


			if (true) {

				if (true) {

					$this->getData();

					$this->restore();

					//$this->updateFlag(0);

					unlink($this->m_sqlFile);

					unlink($file_to_restore);

					$this->close();

					return true;
				} else {
					$this->close();

					$msg = "le fichier n'est pas d&eacute;vou&eacute; pour ce logiciel de correction de copies !";

					return false;
				}
			} else {
				$this->close();
				$msg = "nom de fichier inexistant dans la base d'archivage !";
				return false;
			}
		}

		$this->close();

		$msg = 'fichier inexistant !';

		return false;
	}
}
