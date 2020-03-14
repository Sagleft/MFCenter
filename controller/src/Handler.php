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
		protected $mfcoin_client   = null;

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
				//new \App\Model\Services\NVSService(),
				//new \App\Model\Services\AbstractService(),
				new \App\Model\Services\DataStorageService(),
				new \App\Model\Services\DPOService(),
				new \App\Model\Services\DNSService(),
				new \App\Model\Services\FileStorageService(),
				new \App\Model\Services\EncryptedStorageService(),
			];
		}

		public function render($data = []) {
			$this->renderT = new \App\Controller\Render($data);
			$this->renderT->twigRender();
		}

		public function getServicesNamesList() {
			$services = [];
			for($i = 0; $i < count($this->mfcoin_services); $i++) {
					$services[] = $this->mfcoin_services[$i]->getServiceInfo();
			}
			return $services;
		}

		public function initClient(): bool {
			$this->mfcoin_client = new \MFCoin\Client(
				getenv('rpc_user'), getenv('rpc_password')
			);
			if($this->mfcoin_client->error) {
				$this->last_error = $this->mfcoin_client->error;
				return false;
			}
			return true;
		}
	}
