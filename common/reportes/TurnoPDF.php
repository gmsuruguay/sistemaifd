<?php

namespace common\reportes;
use backend\models\Turno;
use common\models\FechaHelper;

class TurnoPDF extends ReporteBase {
    
    public $model;
    
    
    public function __construct(Turno $model) {
        parent::__construct();
        $this->model = $model;
        //$this->output = ReporteBase::OUTPUT_HTML;
    }

    
    public function getHtml(){
        $model = $this->model;
        $html = '';
        
        // cabecera
        $html .= '<table border="1" style="width:100%;">';
        $html .= '<tr>';
        $html .= '<td style="width:20%;">';
        $html .= '<img style="width:20%; text-align:center;" src="img/logo.png">';
        $html .= '</td>';
        $html .= '<td style="width:80%;">';
        $html .= $this->getCabeceraHtml();
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        
        // turno
        $html .= '';
        $html .= '<div style="text-align:center;">';
        $html .= '<h1>Turno '.$model->id.'</h1>';
        $html .= '<h3>Médico: Dr. '.$model->medico.'</h3>';
        $html .= '</div>';
        
        // detalles de turno
        $html .= '<table border="1" style="width:100%;">';
        $html .= '<tbody>';
        $html .= $this->getHtmlRenglon('Paciente', $model->paciente);
        $html .= $this->getHtmlRenglon('Tratamiento', $model->tratamiento);
        $html .= $this->getHtmlRenglon('Fecha', FechaHelper::fechaDMY($model->fecha));
        $html .= $this->getHtmlRenglon('Horario', $model->horario.' hs.');
        $html .= $this->getHtmlRenglon('Cobertura Social', $model->coberturaSocial);
        $html .= '</tbody>';
        $html .= '</table>';
        
        // preparacion
        $html .= '<br/>';
        $html .= '<th>Preparación</th>';
        $html .= '<table border="1" style="width:100%;">';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td style="padding:20px;background-color:#CCC;">';
        $html .= $model->tratamiento->modo_preparacion;
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        return $html;
    }
    
    private function getHtmlRenglon($th, $td){
        $html = '';
        $html .= '<tr>';
        $html .= '<th style="padding:5px;text-align:right;">'.$th.'</th>';
        $html .= '<td style="padding:5px;text-align:left;">'.$td.'</td>';
        $html .= '</tr>';
        return $html;
    }
    
    private function getCabeceraHtml(){
        $html = '';
        $html .= '<center>';
        $html .= '<h1>Medicina Nuclear</h1>';
        $html .= '<h2>Jujuy S.R.L.</h2>';
        $html .= '<p>Patricias Arg 252</p>';
        $html .= '<p>San Salvador de Jujuy, JUJUY</p>';
        $html .= '<p>Tel. 0388 422-3992</p>';
        $html .= '</center>';
        return $html;
    }
}
