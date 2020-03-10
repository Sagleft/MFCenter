<?php
	namespace App\Controller;

	class Handler {
		public $logic = null;
		public $user  = null;
		public $renderT    = null;
		public $last_error = '';

		protected $db      = null;
		protected $enviro  = null;
		protected $mfcoin_services = [];

		public function __construct() {
			$this->enviro  = new \App\Model\Environment();
			//$this->db      = new \App\Model\DataBase(); //TODO: uncomment
			$this->logic   = new \App\Controller\Logic();
			$this->user    = new \App\Controller\User();
			$this->renderT = new \App\Controller\Render([]);

			//TODO: uncomment
			//$this->logic->setdb($this->db);
			//$this->user->setdb($this->db);
			$this->logic->setUser($this->user);

			$this->mfcoin_services = [
				new \App\Model\Services\NVSService(),
				new \App\Model\Services\AbstractService()
			];
		}

		public function render($data = []) {
			$this->renderT = new \App\Controller\Render($data);
			$this->renderT->twigRender();
		}

		public function getServicesNamesList() {
			$services_names = [];
			for($i = 0; $i < count($this->mfcoin_services); $i++) {
				$services_names[] = [
					'name' => $this->mfcoin_services[$i]->name,
					'info' => wordwrap($this->mfcoin_services[$i]->info, 170, '<br/>'),
				];
			}
			return $services_names;
		}
	}
