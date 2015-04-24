<?php

namespace Transmission\Objects\Torrent;

use Transmission\Object;

class FileStats extends Object {
    /**
     * @var int
     */
    public $bytesCompleted;
    /**
     * @var bool
     */
    public $wanted;
    /**
     * @var int
     */
    public $priority;
}