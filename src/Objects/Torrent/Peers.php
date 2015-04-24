<?php

namespace Transmission\Objects\Torrent;

use Transmission\Object;

class Peers extends Object {
    /**
     * @var string
     */
    public $address;
    /**
     * @var string
     */
    public $clientName;
    /**
     * @var bool
     */
    public $clientIsChoked;
    /**
     * @var bool
     */
    public $clientIsInterested;
    /**
     * @var string
     */
    public $flagStr;
    /**
     * @var bool
     */
    public $isDownloadingFrom;
    /**
     * @var bool
     */
    public $isEncrypted;
    /**
     * @var bool
     */
    public $isIncoming;
    /**
     * @var bool
     */
    public $isUploadingTo;
    /**
     * @var bool
     */
    public $isUTP;
    /**
     * @var bool
     */
    public $peerIsChoked;
    /**
     * @var bool
     */
    public $peerIsInterested;
    /**
     * @var int
     */
    public $port;
    /**
     * @var float
     */
    public $progress;
    /**
     * @var int
     */
    public $rateToClient;
    /**
     * @var int
     */
    public $rateToPeer;
}