<?php
    class Tabla{
        private $matriz = array();
        private $numFilas;
        private $numColumnas;
        private $estilo;

        public function __construct($rows, $cols, $style){
            $this->numFilas    = $rows;
            $this->numColumnas = $cols;
            $this->estilo      = $style;
        }

        public function cargar($row, $col, $val){
            $this->matriz[$row][$col] = $val;
        }

        private function inicio_tabla(){
            echo '<table style="'.$this->estilo.'">';
        }
    
        private function inicio_fila(){
            echo '<tr>';
        }
        
        private function mostrar_dato($row, $col){
            echo '<td style="'.$this->estilo.'">';
            echo $this->matriz[$row][$col];
            echo '</td>';
        }

        private function fin_fila(){
            echo '</tr>';
        }
        
        private function fin_tabla(){
            echo '</table>';
        }

        public function graficar(){
            $this->inicio_tabla();
            for($r = 0; $r < $this->numFilas; $r++){
                $this->inicio_fila();
                for($c = 0; $c < $this->numColumnas; $c++){
                    $this->mostrar_dato($r, $c);
                }
                $this->fin_fila();
            }
            $this->fin_tabla();
        }
    }
?>