<?php

class Docx {

    public function __construct() {
        
    }

    public function generar_docx($html, $path) {

        $shtml = $html;
        $file = $path.".doc";
        $fp = fopen($file, "w");
        fwrite($fp, $shtml);
        fclose($fp);
        
    }

}

?>
