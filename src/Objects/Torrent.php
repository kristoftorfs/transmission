<?php

namespace Transmission\Objects;

use Transmission\Object;
use Transmission\Objects\Torrent\File;
use Transmission\Objects\Torrent\FileStats;
use Transmission\Objects\Torrent\Peers;
use Transmission\Objects\Torrent\PeersFrom;
use Transmission\Objects\Torrent\Trackers;
use Transmission\Objects\Torrent\TrackerStats;

class Torrent extends Object {
    protected $_map = array(
        'peerLimit' => 'peer-limit'
    );
    /**
     * @var int
     */
    public $activityDate;
    /**
     * @var int
     */
    public $addedDate;
    /**
     * @var int
     */
    public $bandwidthPriority;
    /**
     * @var string
     */
    public $comment;
    /**
     * @var int
     */
    public $corruptEver;
    /**
     * @var string
     */
    public $creator;
    /**
     * @var int
     */
    public $dateCreated;
    /**
     * @var int
     */
    public $desiredAvailable;
    /**
     * @var int
     */
    public $doneDate;
    /**
     * @var string
     */
    public $downloadDir;
    /**
     * @var int
     */
    public $downloadedEver;
    /**
     * @var int
     */
    public $downloadLimit;
    /**
     * @var bool
     */
    public $downloadLimited;
    /**
     * @var int
     */
    public $error;
    /**
     * @var string
     */
    public $errorString;
    /**
     * @var int
     */
    public $eta;
    /**
     * @var int
     */
    public $etaIdle;
    /**
     * @var File[]
     */
    public $files;
    /**
     * @var FileStats[]
     */
    public $fileStats;
    /**
     * @var string
     */
    public $hashString;
    /**
     * @var int
     */
    public $haveUnchecked;
    /**
     * @var int
     */
    public $haveValid;
    /**
     * @var bool
     */
    public $honorsSessionLimits;
    /**
     * @var int
     */
    public $id;
    /**
     * @var bool
     */
    public $isFinished;
    /**
     * @var bool
     */
    public $isPrivate;
    /**
     * @var bool
     */
    public $isStalled;
    /**
     * @var int
     */
    public $leftUntilDone;
    /**
     * @var string
     */
    public $magnetLink;
    /**
     * @var int
     */
    public $manualAnnounceTime;
    /**
     * @var int
     */
    public $maxConnectedPeers;
    /**
     * @var float
     */
    public $metadataPercentComplete;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $peerLimit;
    /**
     * @var Peers[]
     */
    public $peers;
    /**
     * @var int
     */
    public $peersConnected;
    /**
     * @var PeersFrom
     */
    public $peersFrom;
    /**
     * @var int
     */
    public $peersGettingFromUs;
    /**
     * @var int
     */
    public $peersSendingToUs;
    /**
     * @var float
     */
    public $percentDone;
    /**
     * @var string
     */
    public $pieces;
    /**
     * @var int
     */
    public $pieceCount;
    /**
     * @var int
     */
    public $pieceSize;
    /**
     * @var int[]
     */
    public $priorities;
    /**
     * @var int
     */
    public $queuePosition;
    /**
     * @var int
     */
    public $rateDownload;
    /**
     * @var int
     */
    public $rateUpload;
    /**
     * @var int
     */
    public $recheckProgress;
    /**
     * @var int
     */
    public $secondsDownloading;
    /**
     * @var int
     */
    public $secondsSeeding;
    /**
     * @var int
     */
    public $seedIdleLimit;
    /**
     * @var int
     */
    public $seedIdleMode;
    /**
     * @var int
     */
    public $seedRatioLimit;
    /**
     * @var int
     */
    public $seedRatioMode;
    /**
     * @var int
     */
    public $sizeWhenDone;
    /**
     * @var int
     */
    public $startDate;
    /**
     * @var int
     */
    public $status;
    /**
     * @var Trackers[]
     */
    public $trackers;
    /**
     * @var TrackerStats[]
     */
    public $trackerStats;
    /**
     * @var int
     */
    public $totalSize;
    /**
     * @var string
     */
    public $torrentFile;
    /**
     * @var int
     */
    public $uploadedEver;
    /**
     * @var int
     */
    public $uploadLimit;
    /**
     * @var bool
     */
    public $uploadLimited;
    /**
     * @var float
     */
    public $uploadRatio;
    /**
     * @var int[]
     */
    public $wanted;
    /**
     * @var string[]
     */
    public $webseeds;
    /**
     * @var int
     */
    public $webseedsSendingToUs;

    public function __construct($json) {
        parent::__construct($json);
        if (is_array($this->files)) foreach($this->files as $key => $value) $this->files[$key] = new File($value);
        if (is_array($this->fileStats)) foreach($this->fileStats as $key => $value) $this->fileStats[$key] = new FileStats($value);
        if (is_array($this->peers)) foreach($this->peers as $key => $value) $this->peers[$key] = new Peers($value);
        if (is_array($this->trackers)) foreach($this->trackers as $key => $value) $this->trackers[$key] = new Trackers($value);
        if (is_array($this->trackerStats)) foreach($this->trackerStats as $key => $value) $this->trackerStats[$key] = new TrackerStats($value);
        $this->pieces = base64_decode($this->pieces);
    }
}