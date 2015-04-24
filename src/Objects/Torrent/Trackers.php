<?php

namespace Transmission\Objects\Torrent;

use Transmission\Object;

class Trackers extends Object {
    /**
     * @var string
     */
    public $announce;
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $scrape;
    /**
     * @var int
     */
    public $tier;
}