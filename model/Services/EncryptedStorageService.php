<?php
  namespace App\Model\Services;

  class EncryptedStorageService extends AbstractService {
    public $name = 'EncryptedStorage Service';
    public $info = 'Сервис для работы с зашифрованными данными';
    public $docs_tag = 'encryptedStorage';

    protected $nvs_tag = 'enc';
  }
