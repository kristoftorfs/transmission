<?php

namespace Transmission\Responses;

use Transmission\Request;
use Transmission\Response;

class SessionStats extends Response {
    protected $_map = array(
        'cumulativeStats' => 'cumulative-stats',
        'currentStats' => 'current-stats'
    );
    /**
     * @var int
     */
    public $activeTorrentCount;
    /**
     * @var int
     */
    public $downloadSpeed;
    /**
     * @var int
     */
    public $pausedTorrentCount;
    /**
     * @var int
     */
    public $torrentCount;
    /**
     * @var int
     */
    public $uploadSpeed;
    /**
     * @var \Transmission\Objects\SessionStats
     */
    public $cumulativeStats;
    /**
     * @var \Transmission\Objects\SessionStats
     */
    public $currentStats;

    public function __construct($json, Request $request) {
        parent::__construct($json, $request);
        $this->cumulativeStats = new \Transmission\Objects\SessionStats($this->cumulativeStats);
        $this->currentStats = new \Transmission\Objects\SessionStats($this->currentStats);
    }
}