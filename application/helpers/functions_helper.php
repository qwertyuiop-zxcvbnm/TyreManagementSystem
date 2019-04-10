<?php
defined ('BASEPATH') or exit('No Direct Script Allowed');

if (!function_exists('return_output'))
{
	function return_output($response)
	{
   $ci=& get_instance();
	$ci->output
		->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		->_display()
		;
		  exit;
		  
	}
}
