<?php

if(! function_exists('map_color')) {
    function map_color($percentage)
    {
        if ($percentage >= 0 && $percentage <= 30){
            return '#e20200';
        }

        if ($percentage >= 31 && $percentage <= 70){
            return '#f9eb00';
        }

        if ($percentage >= 71 && $percentage <= 100){
            return '#03cc3d';            
        }
    }
}