<?php


class Nettoyer
{
    public static function nettoyer_string($s){
        return filter_var($s,FILTER_SANITIZE_STRING);
    }
    
    public static function nettoyer_int($vars){
        return filter_var($vars, FILTER_SANITIZE_NUMBER_INT);
    }
}