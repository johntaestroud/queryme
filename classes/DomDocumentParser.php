<?php

class DomDocumentParser {

    private $doc;

    public function __construct($url) {
        
        $options = array(
            'http'=>array('method'=>"GET", 'header'=>"User-Agent: queryBot/0.1\n"), #acessing the method gets GET
            
        );
        $context = stream_context_create($options);

        $this->doc = new DomDocument();
        @$this->doc->loadHTML(file_get_contents($url, false, $context)); #@ means not to show any warnings/errors
    }

    public function getLinks() {
        return $this->doc->getElementsByTagName("a");
    }
}

?>