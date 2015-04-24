<?php

namespace Transmission\Objects\Torrent;

use Transmission\Object;

class PeersFrom extends Object {
    /**
     * @var int
     */
    public $fromCache;
    /**
     * @var int
     */
    public $fromDht;
    /**
     * @var int
     */
    public $fromIncoming;
    /**
     * @var int
     */
    public $fromLpd;
    /**
     * @var int
     */
    public $fromLtep;
    /**
     * @var int
     */
    public $fromPex;
    /**
     * @var int
     */
    public $fromTracker;
}