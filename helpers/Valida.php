<?php
// essa class serve para realizar as validações nos formularios de cadastro
class Valida{
    private static $Data;
    private static $Format;
//Formato do email
    public static function Email($Email) {
        self::$Data = (string) $Email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';
        if(preg_match(self::$Format, self::$Data)) {
            return true;
        }
        else{
            return false;
        }

    }
// verifica se os campos estão vazios
    public static function Campos($campo) {

        if(in_array('',$campo)){
            return true;
        }
        else{
            return false;
        }
    }
//verifica se as senhas colocadas pelo usuario sao iguais
    public static function Senha($senha1,$senha2) {

        if($senha1 != $senha2){
            return true;
        }
        else{
            return false;
        }
    }
}
