<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class DockerController
{
	public function getStatus()
	{
		$systeminfo = Command::runSudo('docker info');
		return respond($systeminfo, strlen($systeminfo) ? 200 : 404);
	}

}
