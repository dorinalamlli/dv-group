<?php 

namespace DVGROUP;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
 	
 	function __construct()
 	{
 		$this->log_path = TEMPLATEPATH. '/logs/';
 		$this->log_file = 'log_date_' . date('d_m_Y') . '.log';
 		
 		$log = new Logger('log');
 		$log->pushHandler( new StreamHandler($this->log_path . $this->log_file, Logger::WARNING ) );
 		//$log->warning('tst');

 	}

}
return new \DVGROUP\Log();