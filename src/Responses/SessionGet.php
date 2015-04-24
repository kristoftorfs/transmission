<?php

namespace Transmission\Responses;

use Transmission\Objects\Units;
use Transmission\Request;
use Transmission\Response;

/**
 * "rpc-version" indicates the RPC interface version supported by the RPC server.
 * It is incremented when a new version of Transmission changes the RPC interface.
 *
 * "rpc-version-minimum" indicates the oldest API supported by the RPC server.
 * It is changes when a new version of Transmission changes the RPC interface
 * in a way that is not backwards compatible.  There are no plans for this
 * to be common behavior.
 */
class SessionGet extends Response {
    protected $_map = array(
        'altSpeedDown' => 'alt-speed-down',
        'altSpeedEnabled' => 'alt-speed-enabled',
        'altSpeedTimeBegin' => 'alt-speed-time-begin',
        'altSpeedTimeEnabled' => 'alt-speed-time-enabled',
        'altSpeedTimeEnd' => 'alt-speed-time-end',
        'altSpeedTimeDay' => 'alt-speed-time-day',
        'altSpeedUp' => 'alt-speed-up',
        'blocklistUrl' => 'blocklist-url',
        'blocklistEnabled' => 'blocklist-enabled',
        'blocklistSize' => 'blocklist-size',
        'cacheSize' => 'cache-size-mb',
        'configDir' => 'config-dir',
        'downloadDir' => 'download-dir',
        'downloadQueueSize' => 'download-queue-size',
        'downloadQueueEnabled' => 'download-queue-enabled',
        'dhtEnabled' => 'dht-enabled',
        'idleSeedingLimit' => 'idle-seeding-limit',
        'idleSeedingLimitEnabled' => 'idle-seeding-limit-enabled',
        'incompleteDir' => 'incomplete-dir',
        'incompleteDirEnabled' => 'incomplete-dir-enabled',
        'lpdEnabled' => 'lpd-enabled',
        'peerLimitGlobal' => 'peer-limit-global',
        'peerLimitPerTorrent' => 'peer-limit-per-torrent',
        'pexEnabled' => 'pex-enabled',
        'peerPort' => 'peer-port',
        'peerPortRandomOnStart' => 'peer-port-random-on-start',
        'portForwardingEnabled' => 'port-forwarding-enabled',
        'queueStalledEnabled' => 'queue-stalled-enabled',
        'queueStalledMinutes' => 'queue-stalled-minutes',
        'renamePartialFiles' => 'rename-partial-files',
        'rpcVersion' => 'rpc-version',
        'rpcVersionMinimum' => 'rpc-version-minimum',
        'scriptTorrentDoneFilename' => 'script-torrent-done-filename',
        'scriptTorrentDoneEnabled' => 'script-torrent-done-enabled',
        'seedQueueSize' => 'seed-queue-size',
        'seedQueueEnabled' => 'seed-queue-enabled',
        'speedLimitDown' => 'speed-limit-down',
        'speedLimitDownEnabled' => 'speed-limit-down-enabled',
        'speedLimitUp' => 'speed-limit-up',
        'speedLimitUpEnabled' => 'speed-limit-up-enabled',
        'startAddedTorrents' => 'start-added-torrents',
        'trashOriginalTorrentFiles' => 'trash-original-torrent-files',
        'utpEnabled' => 'utp-enabled'
    );
    /**
     * @var int Max global download speed (KBps)
     */
    public $altSpeedDown;
    /**
     * @var bool TRUE means use the alt speeds
     */
    public $altSpeedEnabled;
    /**
     * @var int When to turn on alt speeds (units: minutes after midnight)
     */
    public $altSpeedTimeBegin;
    /**
     * @var bool TRUE means the scheduled on/off times are used
     */
    public $altSpeedTimeEnabled;
    /**
     * @var int When to turn off alt speeds (units: minutes after midnight)
     */
    public $altSpeedTimeEnd;
    /**
     * @var int What day(s) to turn on alt speeds
     */
    public $altSpeedTimeDay;
    /**
     * @var int Max global upload speed (KBps)
     */
    public $altSpeedUp;
    /**
     * @var string Location of the blocklist to use for "blocklist-update"
     */
    public $blocklistUrl;
    /**
     * @var bool TRUE means enabled
     */
    public $blocklistEnabled;
    /**
     * @var int Number of rules in the blocklist
     */
    public $blocklistSize;
    /**
     * @var string Maximum size of the disk cache (MB)
     */
    public $cacheSize;
    /**
     * @var string Location of transmission's configuration directory
     */
    public $configDir;
    /**
     * @var string Default path to download torrents
     */
    public $downloadDir;
    /**
     * @var int Max number of torrents to download at once (see $downloadQueueEnabled)
     */
    public $downloadQueueSize;
    /**
     * @var bool If TRUE, limit how many torrents can be downloaded at once
     */
    public $downloadQueueEnabled;
    /**
     * @var bool TRUE means allow dht in public torrents
     */
    public $dhtEnabled;
    /**
     * @var string "required", "preferred", "tolerated"
     */
    public $encryption;
    /**
     * @var int Torrents we're seeding will be stopped if they're idle for this long
     */
    public $idleSeedingLimit;
    /**
     * @var bool TRUE if the seeding inactivity limit is honored by default
     */
    public $idleSeedingLimitEnabled;
    /**
     * @var string Path for incomplete torrents, when enabled
     */
    public $incompleteDir;
    /**
     * @var bool TRUE means keep torrents in incomplete-dir until done
     */
    public $incompleteDirEnabled;
    /**
     * @var bool TRUE means allow Local Peer Discovery in public torrents
     */
    public $lpdEnabled;
    /**
     * @var int Maximum global number of peers
     */
    public $peerLimitGlobal;
    /**
     * @var int Maximum number of peers per torrent
     */
    public $peerLimitPerTorrent;
    /**
     * @var bool TRUE means allow pex in public torrents
     */
    public $pexEnabled;
    /**
     * @var int Port number
     */
    public $peerPort;
    /**
     * @var bool TRUE means pick a random peer port on launch
     */
    public $peerPortRandomOnStart;
    /**
     * @var bool TRUE means enabled
     */
    public $portForwardingEnabled;
    /**
     * @var bool Whether or not to consider idle torrents as stalled
     */
    public $queueStalledEnabled;
    /**
     * @var int Torrents that are idle for N minutes aren't counted toward $seedQueueSize or $downloadQueueSize
     */
    public $queueStalledMinutes;
    /**
     * @var bool TRUE means append ".part" to incomplete files
     */
    public $renamePartialFiles;
    /**
     * @var int The current RPC API version
     */
    public $rpcVersion;
    /**
     * @var int The minimum RPC API version supported
     */
    public $rpcVersionMinimum;
    /**
     * @var string Filename of the script to run
     */
    public $scriptTorrentDoneFilename;
    /**
     * @var bool Whether or not to call the "done" script
     */
    public $scriptTorrentDoneEnabled;
    /**
     * @var int The default seed ratio for torrents to use
     */
    public $seedRatioLimit;
    /**
     * @var bool TRUE if seedRatioLimit is honored by default
     */
    public $seedRatioLimited;
    /**
     * @var int Max number of torrents to uploaded at once (see $seedQueueEnabled)
     */
    public $seedQueueSize;
    /**
     * @var bool If TRUE, limit how many torrents can be uploaded at once
     */
    public $seedQueueEnabled;
    /**
     * @var int Max global download speed (KBps)
     */
    public $speedLimitDown;
    /**
     * @var bool TRUE means enabled
     */
    public $speedLimitDownEnabled;
    /**
     * @var int Max global upload speed (KBps)
     */
    public $speedLimitUp;
    /**
     * @var bool TRUE means enabled
     */
    public $speedLimitUpEnabled;
    /**
     * @var bool TRUE means added torrents will be started right away
     */
    public $startAddedTorrents;
    /**
     * @var bool TRUE means the .torrent file of added torrents will be deleted
     */
    public $trashOriginalTorrentFiles;
    /**
     * @var Units
     */
    public $units;
    /**
     * @var TRUE means allow utp
     */
    public $utpEnabled;
    /**
     * @var string Long version string "$version ($revision)"
     */
    public $version;

    public function __construct($json, Request $request) {
        parent::__construct($json, $request);
        $this->units = new Units($this->units);
    }


}