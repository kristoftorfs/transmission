<?php

namespace Transmission\Requests;

use Transmission\Request;

class TorrentAction extends Request {
    /**
     * @var string|array
     *
     * Specifies which torrents to use. All torrents are used if it is left blank. If not, it should be one:
     *
     * 1. An integer referring to a torrent id
     * 2. A list of torrent id numbers, sha1 hash strings, or both
     * 3. A string, "recently-active", for recently-active torrents
     */
    public $ids;
}