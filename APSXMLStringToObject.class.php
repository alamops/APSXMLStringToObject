<?php

class APSXMLStringToObject {
    
    private $xmlString;
    private $xmlArray = array();
    
    function __construct($xmlString) {
        $this->xmlString = $xmlString;
    }
    
    function get ($key) {
        if (isset($this->xmlArray[$key])) {
            return $this->xmlArray[$key];
        }
        else if (!strstr($this->xmlString, '<' . $key . '>')) {
            $this->xmlArray[$key] = false;
            return false;
        }
        else {
            $firstExplode = explode('<' . $key . '>', $this->xmlString, 2);
            $secondExplode = explode('</' . $key, end($firstExplode), 2);
            
            $this->xmlArray[$key] = $secondExplode[0];
            return $this->xmlArray[$key];
        }
    }
}
