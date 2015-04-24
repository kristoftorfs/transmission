<?php

namespace Transmission\Requests;

use Transmission\Request;

class TorrentSetLocation extends TorrentAction {
    /**
     * @var string The new torrent location
     */
    public $location;
    /**
     * @var bool If TRUE move from previous location, otherwise search $location for files; defaults to FALSE
     */
    public $move;
}