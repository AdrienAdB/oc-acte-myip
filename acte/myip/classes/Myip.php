<?php namespace Acte\Myip\Classes;

use Response;

class Myip
{
    /**    Get client IP from server global variable     **/

    public $ip;


    function getIp(){
    	if 	(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
    	elseif 	(isset($_SERVER['REMOTE_ADDR'])){
        $this->ip = $_SERVER['REMOTE_ADDR'];
      }

      //validate ip format
    	if (! filter_var($this->ip, FILTER_VALIDATE_IP)){ $this->ip = "Error"; }

    }

    function json(){
      $this->getIp();
      return Response::json(['ip' => $this->ip]);
    }

    function raw(){
      $this->getIp();
      return $this->ip;
    }

}
