<?php namespace Acte\Myip\Components;

use Cms\Classes\ComponentBase;
use Response;

class Myip extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'MyIP',
            'description' => 'Display client public ip in many ways'
        ];
    }


    /**
     * Identifier value to load the record from the database.
     */
    public $identifierValue;


    public function defineProperties()
    {
        return [];
    }

    //Get client IP from server global variable

    function getIp()
    {
	$ip = 0;
	if 	(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
	elseif 	(isset($_SERVER['REMOTE_ADDR'])) { $ip = $_SERVER['REMOTE_ADDR']; }

	if (filter_var($ip, FILTER_VALIDATE_IP)){ return $ip; }
	else { return $ip = "Error"; }

    }

    function onRun()
    {

	$format = $this->param('format');
	$ip = $this->getIp();

	if ($format == 'json') { return Response::json(['ip' => $ip]); }
	if ($format == 'raw')  { return $ip; }

	return $ip;

    }

}
