<?php

namespace Transmission\Objects\Torrent;

use Transmission\Object;

class TrackerStats extends Object {
    /**
     * @var string
     */
    public $announce;
    /**
     * @var int
     */
    public $announceState;
    /**
     * @var int
     */
    public $downloadCount;
    /**
     * @var bool
     */
    public $hasAnnounced;
    /**
     * @var bool
     */
    public $hasScraped;
    /**
     * @var string
     */
    public $host;
    /**
     * @var int
     */
    public $id;
    /**
     * @var bool
     */
    public $isBackup;
    /**
     * @var int
     */
    public $lastAnnouncePeerCount;
    /**
     * @var string
     */
    public $lastAnnounceResult;
    /**
     * @var int
     */
    public $lastAnnounceStartTime;
    /**
     * @var bool
     */
    public $lastAnnounceSucceeded;
    /**
     * @var int
     */
    public $lastAnnounceTime;
    /**
     * @var bool
     */
    public $lastAnnounceTimedOut;
    /**
     * @var string
     */
    public $lastScrapeResult;
    /**
     * @var int
     */
    public $lastScrapeStartTime;
    /**
     * @var bool
     */
    public $lastScrapeSucceeded;
    /**
     * @var int
     */
    public $lastScrapeTime;
    /**
     * @var bool
     */
    public $lastScrapeTimedOut;
    /**
     * @var int
     */
    public $leecherCount;
    /**
     * @var int
     */
    public $nextAnnounceTime;
    /**
     * @var int
     */
    public $nextScrapeTime;
    /**
     * @var string
     */
    public $scrape;
    /**
     * @var int
     */
    public $scrapeState;
    /**
     * @var int
     */
    public $seederCount;
    /**
     * @var int
     */
    public $tier;
}