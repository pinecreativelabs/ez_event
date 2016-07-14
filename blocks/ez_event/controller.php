<?php namespace Concrete\Package\EzEvent\Block\EzEvent;
use \Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{
    protected $btTable = 'btEzEvent';
    protected $btInterfaceWidth = "600";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "465";

    public function getBlockTypeDescription() {
        return t("Easily add event info to any page.");
    }

    public function getBlockTypeName() {
        return t("EZ Event");
    }
	public function registerViewAssets() {  
        $this->addHeaderItem('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">');    
    }
	public function add() {
        $this->requireAsset('core/file-manager');
        $this->requireAsset('core/sitemap');
        $this->requireAsset('redactor');
    }
	public function edit() {
		$this->requireAsset('redactor');
		$this->requireAsset('core/sitemap');
		$this->requireAsset('core/file-manager');
	}
	public function save($args) {
		$args['eventdate'] = Core::make('helper/form/date_time')->translate('eventdate');
		$args['evHeight'] 	= is_numeric($args['evHeight']) ? intval($args['evHeight']) : '200';
		$args['handicap'] = intval($args['handicap']);
		$args['signing'] = intval($args['signing']);
		$args['closedcap'] = intval($args['closedcap']);
		$args['lodging'] = intval($args['lodging']);
		$args['transport'] = intval($args['transport']);
		$args['emobf'] = intval($args['emobf']);
		$args['maplink'] = intval($args['maplink']);
		parent::save($args);
	}

}
