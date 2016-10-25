<?php
namespace Exceptions;

use View\ErrorView;

class ExceptionHandler
{
	const IS_DEBUG = false;

	const NON_DEBUG_MESSAGE = 'Woops , something went wrong';

	public static function handleError($level, $message, $file, $line, $context)
	{
		$e =  new ErrorHandlerException($message, $level);
		$e->setFile($file);
		$e->setLine($line);
		$e->setStackTrace(debug_backtrace());

		throw $e;
	}

	public static function handleException(\Exception $e)
	{
		$info = <<<EOT
			Message: %s
			File : %s
			Line: %d
EOT;
		$info = sprintf($info, $e->getMessage(), $e->getFile(), $e->getLine());

		if (self::IS_DEBUG) {
			echo $info;
		} else {
			$view = new ErrorView();
			$view->render();
			
		}

		self::log($info);
	}

	protected static function log($message)
	{
		$message = date('[H:i:s Y.m.d]') . PHP_EOL . $message . PHP_EOL;
		
		if(!is_dir('Exceptions/logs')){
			if(!@mkdir('Exceptions/logs')) {
				throw new Exception('Cant make directory');
			}
		}
		$filename =  'Exceptions/logs/errors_'. date('Y_m_d') . '.log';
		file_put_contents($filename, $message, FILE_APPEND);
	}
}