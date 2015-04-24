<?php

namespace Transmission\Objects\Torrent;

use Transmission\Object;

class File extends Object {
    /**
     * @var int
     */
    public $bytesCompleted;
    /**
     * @var int
     */
    public $length;
    /**
     * @var string
     */
    public $name;
}