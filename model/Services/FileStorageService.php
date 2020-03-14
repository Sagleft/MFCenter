<?php
  namespace App\Model\Services;

  class FileStorageService extends AbstractService {
    public $name = 'FileStorage Service';
    public $info = 'Сервис для работы с файлами, записанными в MFCoin Blockchain';
    public $docs_tag = 'fileStorage';

    protected $nvs_tag = 'file';
  }
