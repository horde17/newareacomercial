<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Color_aleatorio {

    function __construct() {
        
    }

    public function crear_color() {

        $str = '#';
        for ($i = 0; $i < 6; $i++) {
            $randNum = rand(0, 15);
            switch ($randNum) {
                case 10: $randNum = 'A';
                    break;
                case 11: $randNum = 'B';
                    break;
                case 12: $randNum = 'C';
                    break;
                case 13: $randNum = 'D';
                    break;
                case 14: $randNum = 'E';
                    break;
                case 15: $randNum = 'F';
                    break;
            }
            $str .= $randNum;
        }
        return $str;
    }

}
