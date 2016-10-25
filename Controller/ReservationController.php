<?php
namespace Controller;

use View\ReserveView;
use Dao\ReserveDao;
use Interfaces\IGetPostCount;
use Interfaces\AllPostsTrait;
use View\ErrorView;

class ReservationController implements IGetPostCount{
	
	public function __construct(){
		$this->ids=[];
	}
	use AllPostsTrait;
	
	public function ShowReservation() {
		$postId = isset($_GET['id']) ? $_GET['id'] : null;
		
		$this->getAllIds();
		if(!in_array($postId,$this->ids)) {
			$view = new ErrorView();
			$view->render();
			die();
		}
		
		$reservation = ReserveDao::getReservation($postId);
		$name = $reservation['name'];
		$email = $reservation['email'];
		$phone = $reservation['telepfone'];
		$msg = $reservation['msg'];
		$data = $reservation['data'];
		
		$view = new ReserveView();
		$view->render($name, $phone, $email, $msg, $data);
	}
}