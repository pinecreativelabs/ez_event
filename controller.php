<?php namespace Concrete\Package\EzEvent;
use Package;
use BlockType;
use Database;

defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends Package {

	protected $pkgHandle = 'ez_event';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '0.9.4';
	
	public function getPackageDescription()
	{
		return t("Easily add event info to any page.");
	}

	public function getPackageName()
	{
		return t("EZ Event");
	}
	
	public function install()
	{
		$pkg = parent::install();
        BlockType::installBlockType('ez_event', $pkg); 
	}
	public function uninstall(){
		parent::uninstall();
		$db = Database::connection();
		$db->executeQuery('DROP TABLE IF EXISTS btEzEvent');
	}
}
?>
