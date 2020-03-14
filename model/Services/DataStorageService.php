<?php
  namespace App\Model\Services;

  class DataStorageService extends AbstractService {
    public $name = 'DataStorage Service';
    public $info = 'Сервис для работы с произвольными данными, записанными в MFCoin Blockchain';
    public $docs_tag = 'dataStorage';

    protected $nvs_tag   = 'data';
    protected $is_active = true;
    protected $have_docs = true;
  }
