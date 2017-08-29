<?php

namespace common\reportes;

/**
 * Clase base muy simple para la generación de reportes en diferentes formatos (html, excel, pdf).
 */
abstract class ReporteBase {
    
    const OUTPUT_PDF = 'PDF';
    const OUTPUT_HTML = 'HTML';
    const OUTPUT_EXCEL = 'EXCEL';
    
    public $output;
    public $html;
    public $mpdf;
    
    
    function __construct() {
        $this->html = '';
        $this->mpdf = new \mPDF();
        $this->output = self::OUTPUT_PDF;
    }

    
    public function imprimir(){
        if($this->isValidOutput()){
            $methodName = 'imprimir'.$this->output;
            $this->$methodName();
        }else{
            throw new Exception('Output inválido');
        }
    }
    
    private function isValidOutput(){
        return $this->output == self::OUTPUT_PDF  
                ||  $this->output == self::OUTPUT_HTML
                || $this->output == self::OUTPUT_EXCEL;
    }
    
    public abstract function getHtml();
    
    ////////////////////////////////////////////////////////////////////////////
    
    public function imprimirPDF(){
        $this->html .= $this->getHtml();
        $this->mpdf->WriteHTML($this->html);
        $this->mpdf->Output();
    }
    
    public function imprimirHTML(){
        $this->html .= $this->getHtml();
        echo $this->html;
    }
    
    public function imprimirEXCEL(){
        $this->html .= $this->getHtml();
        throw new Exception('Método no implementado');
    }
    
}
