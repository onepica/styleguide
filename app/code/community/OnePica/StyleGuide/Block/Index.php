<?php

class OnePica_StyleGuide_Block_Index extends Mage_Core_Block_Template 
{

	public function _prepareLayout() 
    {
        $this->setTemplate('styleguide/index.phtml');  
    }

    public function getHtml() 
    {
        $jsonFile = Mage::getDesign()->getTemplateFilename("styleguide/styleguide.json");
        $jsonString = file_get_contents($jsonFile);
        $array = json_decode($jsonString, true);

        if ($array == null){
            return  "parse error in $jsonFile";
        }

    	return $this->recurseFiles($array);
    }


    public function recurseFiles($fileArray, $level = 1) 
    {
    	$html = "";

        foreach ($fileArray as $title => $file){ 

             if (is_string($file)) {
                $html .= $this->fillTemplate($title, $file, $level);
             }
             else if (is_array($file)) {
             	$sectionContent = $this->recurseFiles($file, $level + 1);
             	$html .= $this->fillTemplate($title, $file, $level, $sectionContent);
             }
        }

        return $html;
    }

    public function fillTemplate($title, $file, $level = 1, $sectionContent = false) 
    {

    	return $this->getLayout()->createBlock('onepica_styleguide/template')
        	->setFile($file)
        	->setTitle($title)
        	->setLevel($level)
        	->setSectionContent($sectionContent)
        	->toHtml();
    }


}

