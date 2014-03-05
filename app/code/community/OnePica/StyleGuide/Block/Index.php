<?php

class OnePica_StyleGuide_Block_Index extends Mage_Core_Block_Template 
{
	
	public $files = array(
        "Messages" => "messages.phtml",
        "Colors"   => "colors.phtml",
        "Buttons" => array(
            "Plain Button (class='button')"            => "buttons/button.phtml",
            "Primary Button (class='btn-primary')"     => "buttons/btn-primary.phtml",
            "Secondary Button (class='btn-secondary')" => "buttons/btn-secondary.phtml",
            "Small Button (class='btn-small')"         => "buttons/btn-small.phtml",
            "Large Button (class='btn-large')"         => "buttons/btn-large.phtml",
            "Disabled Button (class='btn-disabled')"   => "buttons/btn-disabled.phtml"
        ),
        "Text" => array(
            "Headers" => array(
                "&lt;h&gt; tags"  => "headers/h.phtml",
                "Category Titles" => "headers/category-title.phtml"
            ),
            "Paragraphs &lt;p&gt;"       => "text/p.phtml",
            "Unordered Lists &lt;ul&gt;" => "text/ul.phtml",
            "Ordered Lists &lt;ol&gt;"   => "text/ol.phtml",
            "Strong text &lt;strong&gt;" => "text/strong.phtml",
            "&lt;blockquote&gt;"         => "text/blockquote.phtml",
            "&lt;em&gt;"                 => "text/em.phtml",
            "Links"                      => "text/a.phtml"
        ),
        "Forms" => array(
            "Text input" => array(
                "Not Required"      => "forms/input-text.phtml",
                "Required"          => "forms/input-text-required.phtml",
                "Validaiton Failed" => "forms/input-text-validation-error.phtml",
            ),
            "Dropdowns" => array(
                "Normal"            => "forms/dropdown.phtml",
                "Validation Failed" => "forms/dropdown-validation-failed.phtml"
            ),
            "Radio buttons" => "forms/radio.phtml",
            "Checkboxes"    => "forms/checkboxes.phtml",
            "Text area"     => "forms/textarea.phtml"
             
        ),
        "Pagination toolbar" => "toolbar.phtml"

    );

	public function _prepareLayout() 
    {
        $this->setTemplate('styleguide/index.phtml');  
    }

    public function getHtml() 
    {
    	return $this->recurseFiles($this->files);
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

