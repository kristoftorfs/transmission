<?php

namespace Transmission\Responses;

use Transmission\Objects\Torrent;
use Transmission\Request;
use Transmission\Response;

class TorrentGet extends Response {
    /**
     * @var Torrent[]
     */
    public $torrents;
    /**
     * @var int[] If the request's "ids" field was "recently-active", a "removed" array of torrent-id numbers
     * of recently-removed torrents.
     */
    public $removed;

    public function __construct($json, Request $request) {
        parent::__construct($json, $request);
        $torrents = array();
        foreach($this->torrents as $torrent) {
            $torrents[] = new Torrent($torrent);
        }
        $this->torrents = $torrents;
    }


}