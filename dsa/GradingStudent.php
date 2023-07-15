<?php 
namespace Dsa;

class GradingStudent {

    public static function run($grades) {
        return array_map(function($grade) {
            if ($grade<38) {
                return $grade;
            }
            
            $i = ceil($grade/5);
            if (($i*5) - $grade < 3) {
                return (int) $i*5;
            }
            
            return $grade;
        }, $grades);
    }

}