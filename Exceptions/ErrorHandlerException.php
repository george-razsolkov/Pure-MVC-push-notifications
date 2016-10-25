<?php

namespace Exceptions;
class ErrorHandlerException extends \Exception
{
	private $trace;

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function setLine($line)
	{
		$this->line = $line;
	}

	public function getStackTrace()
	{
		return $this->trace;
	}

	public function setStackTrace($trace)
	{
		$this->trace = $trace;
	}
}
