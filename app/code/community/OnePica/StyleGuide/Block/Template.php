<?php

class OnePica_StyleGuide_Block_Template extends Mage_Core_Block_Template 
{

	/**
	 * $data
	 * 		title
	 * 		level
	 * 		file
	 */

	public function _construct() 
    {
		$this->patternsDir = 'styleguide' . DS . 'patterns';
	}

    public function _prepareLayout() 
    {
    	$this->setTemplate('styleguide/template.phtml');  
    }

    public function getDisplay() 
    {
        try {
            
        	return $this->getLayout()->createBlock('core/template')
                ->setTemplate($this->getFilePathFromTemplateDir())
                ->toHtml();

        } catch (Exception $e){
            return "unable to find " . $this->getFilePathFromTemplateDir();
        }
    }

    public function getFilePathFromTemplateDir() 
    {
    	return $this->patternsDir . DS . $this->file;
    }
  
}

