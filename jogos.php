<?php

class Jogos {
    private $qtdDezenas = [6,7,8,9,10];
    private $resultado;
    private $totalJogos;
    private $jogos;
    
    public function __construct(){
        $this->qtdDezenas = 6;
        $this->totalJogos = 5;
    }
    
    public function getQtdDezenas() {
        return $this->qtdDezenas;
    }
    
    public function setQtdDezenas($qtdDezenas) {     
        if($qtdDezenas > 5 && $qtdDezenas < 11) $this->qtdDezenas = $qtdDezenas;
        else return false;
    }
    
    public function getResultado() {
        return $this->resultado;
    }
    public function setResultado($resultado) {
        
        $this->resultado = $resultado;
    }
    
    public function getTotalJogos() {
        return $this->totalJogos;
    }
    
    public function setTotalJogos($totalJogos) {
        $this->totalJogos = $totalJogos;
    }
    public function getJogos() {
        return $this->jogos;
    }
    
    public function setJogos($jogos) {
        $this->jogos = $jogos;
    }
    
    private function returnArray($qtdDezenas = false){
        if(!$qtdDezenas){
            $qtdDezenas = $this->getQtdDezenas();
        }
        $dezenas = [];
        for ($j = 1; $j <= $qtdDezenas; $j++) {
            while (count($dezenas) < $qtdDezenas) {
                $dezenaGerada = str_pad(rand(1, 60), 2, 0, STR_PAD_LEFT);
                if (!in_array($dezenaGerada, $dezenas)) {
                    $dezenas[] = $dezenaGerada;
                }
            }
        }
        sort($dezenas, SORT_NUMERIC); // ordernar da dezena menor para maior
        return $dezenas;      
    }
    
    public function totalJogos(){
        $jogos = [];
        for($i = 0; $i < $this->getTotalJogos(); $i++){
            $dezenas = $this->returnArray();
            $jogos[] = $dezenas; 
        }
        $this->setJogos($jogos);
        return $this->getJogos();
    }
    
    public function sortResultados(){
        $dezenas =  $this->returnArray(6);
        $this->setResultado( $dezenas);
        return $this->getResultado();
    }
    
    public function html(){
        $this->totalJogos();
        $jogos = $this->getJogos();
        $qtdDezenas = $this->getQtdDezenas();
        $html = '<h4 style="text-align:center">Tabela Jogos </h4><table style="margin:0 auto; border: 1px solid black; border-collapse: collapse;"> <thead>';
        $html .= '</thead> <tbody>';
        foreach($jogos as $key => $item){
            $html .= '<tr>';
            foreach($item as $k => $number){
                $html .= '<td style=" border: 1px solid black; padding:5px">'.$number.'</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody> </table>';
        $this->sortResultados();

        $html .= '<p style="text-align:center"> Resultado: ';
        foreach($this->getResultado() as $key => $item){
            if(count($this->getResultado())-1 == $key) $html .= '<span>'.$item.'</span>';
            else $html .= '<span>'.$item.' </span>';
        }
        $html .='</p>';
        return $html;
    }
}
?>