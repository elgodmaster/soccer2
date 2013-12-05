<?php
/*
 * GCalendar is a calendar based on the JS Calendar (version 2.1) Calendar -
 * http://www.dhtmlgoodies.com/index.html?page=calendarScripts
 * Information and documentation can be found on this site
 *
 */
class GCalendar extends CWidget {
  
    /* @var $inputField String */
    private $_inputField;  
    /* @var $daFormat String */
    private $_daFormat; 
    /* @var $_model String */
    private $_model;
    /* @var $_attribute String */
    private $_attribute;
    /* @var $_languageCode String */
    private $_languageCode="en";
    /* @var $_languageCode String */
    private $_calButton=false;
    private $_baseUrl;
    
    public function setAttribute($attribute) {
        $this->_attribute = $attribute;
    }
     
     /**
     * The ID of your input field.
     * @param String $inputField
     */
    public function setInputField($inputField) {
        $this->_inputField = $inputField;
    }
    
    /**
     * Format of the date displayed in textbox
     * @param String $daFormat
     */
    public function setDaFormat($daFormat) {
        $this->_daFormat = $daFormat;
    }
    
    /**
    * The Model of the form
    * @param String $model
    */
    public function setModel($model) {
        $this->_model = $model;
    }
    
     /**
     * The languageCode of JS calendar
     * @param String $languagecode
     */
    public function setLanguageCode($languageCode) {
        $this->_languageCode = $languageCode;
    }
    
    /**
     * The Calendar button 
     * @param Bollean (true/false) $calButton
     */
    public function setCalButton($calButton) {
        $this->_calButton = $calButton;
    }
    
    /**
    * Execute the widget
    * This method registers necessary javascript and renders the needed HTML code.
    */
    public function run() {
        
        $this->registerClientScripts();
        
        if ($this->_calButton==false) {
            echo CHtml::activeTextField($this->_model, $this->_attribute,array(
                                    'id' => $this->_inputField,
                                    'onclick' => 'displayCalendar('. $this->_inputField . ',"' . $this->_daFormat . '",this,false)', 
                                    )
                        ); 
        }else {
            
            echo CHtml::activeTextField($this->_model, $this->_attribute,array(
                                    'id' => $this->_inputField,
            						'readonly'=> 'readonly')
                                    );

            echo CHtml::button('Calendar', array(
                                     'onclick' => 'displayCalendar('. $this->_inputField . ',"' . $this->_daFormat . '",this,false)',  
                                    )
                               );
        }
      
    }

    /**
    * Registers the clientside widget files (css & js)
    */
    protected function registerClientScripts()
    {
        // Get the resources path
        $resources = dirname(__FILE__).DIRECTORY_SEPARATOR.'resources';
        $cs=Yii::app()->clientScript;
          
        // publish the files
        $baseUrl = Yii::app()->getAssetManager()->publish($resources);
        
        //Pass asset folder path to a javascript of a widget
            //Add language support 15,Aug 2012 3:54 am
        $script = 'gcalendarAssetUrl = "' . $baseUrl . '"; gcalendarLanguageCode = "' . $this->_languageCode . '";';
        Yii::app()->getClientScript()->registerScript('_', $script, CClientScript::POS_HEAD);
        
        
        //foreach ($scripts as $file)
        $cs->registerScriptFile($baseUrl.'/gcalendar/gcalendar.js', CClientScript::POS_END);
        $cs->registerCssFile($baseUrl.'/gcalendar/gcalendar.css');
    
     }
    
}
?>
