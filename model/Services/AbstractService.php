<?php
  namespace App\Model\Services;

  class AbstractService {
    public $name = 'Abstract MFCoin Service';
    public $info = 'Здесь будет описание сервиса';
    public $docs_tag = 'abstract';
    public $last_error = '';

    //MFCoin\Client object
    protected $mfcoin_client = null;
    protected $nvs_tag       = 'abstract';
    protected $is_active     = false;
    protected $have_docs     = false;

    public function setClient($client) {
      $this->mfcoin_client = &$client;
    }

    public function getServiceInfo() {
      return [
        'name'      => $this->name,
        'info'      => $this->info,
        'active'    => $this->is_active,
        'have_docs' => $this->have_docs,
        'docs_tag'  => $this->docs_tag
      ];
    }

    public function getNVSEntryName($entry_name = 'test') {
      //получаем имя NVS записи в blockchain
      if($this->nvs_tag == '') {
        return $entry_name;
      }
      return $this->nvs_tag . ':' . $entry_name;
    }

    public function isClientConnected(): bool {
      if($this->mfcoin_client->error) {
        $this->last_error = $this->mfcoin_client->error;
        return false;
      }
      return true;
    }

    public function isServiceActive() {
      return $this->is_active;
    }

    public function getNVSEntryData($entry_name = 'test'): array {
      $NVS_entryName = $this->getNVSEntryName($entry_name);
      if($NVS_entryName == '') {
        $this->last_error = 'Anonymous record requested';
        return [];
      }
      if(!isClientConnected()) {
        return [];
      }
      return $this->mfcoin_client->name_show($NVS_entryName);
    }

    public function getNVSEntrys($filter = ''): array {
      if(!isClientConnected()) {
        return [];
      }
      $name_filter = '^' . $this->nvs_tag . ':' . $filter;
      return $this->mfcoin_client->name_filter($name_filter);
    }
  }
