<?php

namespace Transmission\Responses;

use Transmission\Request;
use Transmission\Response;

class TorrentAdd extends Response {
    /**
     * @var bool
     */
    private $_duplicate;
    /**
     * @var string
     */
    public $hashString;
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $name;

    public function __construct($json, Request $request) {
        $this->_duplicate = array_key_exists('torrent-duplicate', $json['arguments']);
        if ($this->isDuplicate()) $json['arguments'] = $json['arguments']['torrent-duplicate'];
        else $json['arguments'] = $json['arguments']['torrent-added'];
        parent::__construct($json, $request);
    }

    public function isDuplicate() {
        return $this->_duplicate;
    }
}