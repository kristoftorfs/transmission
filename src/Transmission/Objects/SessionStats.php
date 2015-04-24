<?php

namespace Transmission\Objects;

use Transmission\Object;

class SessionStats extends Object {
    /**
     * @var int
     */
    public $uploadedBytes;
    /**
     * @var int
     */
    public $downloadedBytes;
    /**
     * @var int
     */
    public $filesAdded;
    /**
     * @var int
     */
    public $sessionCount;
    /**
     * @var int
     */
    public $secondsActive;
}