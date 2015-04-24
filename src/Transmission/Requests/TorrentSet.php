<?php

namespace Transmission\Requests;

use Transmission\Request;

/**
 * Just as an empty "ids" value is shorthand for "all ids", using an empty array
 * for "files-wanted", "files-unwanted", "priority-high", "priority-low", or
 * "priority-normal" is shorthand for saying "all files".
 */
class TorrentSet extends Request {
    protected $_map = array(
        'filesWanted' => 'files-wanted',
        'filesUnwanted' => 'files-unwanted',
        'peerLimit' => 'peer-limit',
        'priorityHigh' => 'priority-high',
        'priorityLow' => 'priority-low',
        'priorityNormal' => 'priority-normal'
    );
    /**
     * @var int This torrent's bandwidth
     */
    public $bandwidthPriority;
    /**
     * @var int Maximum download speed (KBps)
     */
    public $downloadLimit;
    /**
     * @var bool TRUE if $downloadLimit is honored
     */
    public $downloadLimited;
    /**
     * @var int[] Indices of file(s) to download
     */
    public $filesWanted;
    /**
     * @var int[] Indices of file(s) to not download
     */
    public $filesUnwanted;
    /**
     * @var bool TRUE if session upload limits are honored
     */
    public $honorsSessionLimits;
    /**
     * @var string|array
     *
     * Specifies which torrents to use. All torrents are used if it is left blank. If not, it should be one:
     *
     * 1. An integer referring to a torrent id
     * 2. A list of torrent id numbers, sha1 hash strings, or both
     * 3. A string, "recently-active", for recently-active torrents
     */
    public $ids;
    /**
     * @var string New location of the torrent's content
     */
    public $location;
    /**
     * @var int Maximum number of peers
     */
    public $peerLimit;
    /**
     * @var int[] Indices of high-priority file(s)
     */
    public $priorityHigh;
    /**
     * @var int[] Indices of low-priority file(s)
     */
    public $priorityLow;
    /**
     * @var int[] Indices of normal-priority file(s)
     */
    public $priorityNormal;
    /**
     * @var int Position of this torrent in its queue [0...n)
     */
    public $queuePosition;
    /**
     * @var int Torrent-level number of minutes of seeding inactivity
     */
    public $seedIdleLimit;
    /**
     * @var int Which seeding inactivity to use
     */
    public $seedIdleMode;
    /**
     * @var float Torrent-level seeding ratio
     */
    public $seedRatioLimit;
    /**
     * @var int Which ratio to use
     */
    public $seedRatioMode;
    /**
     * @var string[] Strings of announce URLs to add
     */
    public $trackerAdd;
    /**
     * @var int[] Ids of trackers to remove
     */
    public $trackerRemove;
    /**
     * @var array Pairs of <trackerId/new announce URLs>
     */
    public $trackerReplace;
    /**
     * @var int Maximum upload speed (KBps)
     */
    public $uploadLimit;
    /**
     * @var bool TRUE if $uploadLimit is honored
     */
    public $uploadLimited;
}