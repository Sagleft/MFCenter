<?php
  namespace App\Model\Services;

  class DNSService extends AbstractService {
    public $name = 'DNS Service';
    public $info = 'Децентрализованная система доменных имен';
    public $docs_tag = 'dns';

    protected $nvs_tag = 'dns';
  }
