<?php

namespace Transmission\Requests;

use Transmission\Request;

/**
 * Either "filename" OR "metainfo" MUST be included.
 * All other arguments are optional.
 *
 * The format of the "cookies" should be NAME=CONTENTS, where NAME is the
 * cookie name and CONTENTS is what the cookie should contain.
 * Set multiple cookies like this: "name1=content1; name2=content2;" etc.
 * <http://curl.haxx.se/libcurl/c/curl_easy_setopt.html#CURLOPTCOOKIE>
 */
class TorrentAdd extends Request {
    protected $_map = array(
        'downloadDir' => 'download-dir',
        'filesWanted' => 'files-wanted',
        'filesUnwanted' => 'files-unwanted',
        'metaInfo' => 'metainfo',
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
     * @var string String of one or more cookies
     */
    public $cookies;
    /**
     * @var string Path to download the torrent to
     */
    public $downloadDir;
    /**
     * @var string Filename or URL of the .torrent file
     */
    public $filename;
    /**
     * @var int[] Indices of file(s) to download
     */
    public $filesWanted;
    /**
     * @var int[] Indices of file(s) to not download
     */
    public $filesUnwanted;
    /**
     * @var string Base64-encoded .torrent content
     */
    public $metaInfo;
    /**
     * @var bool If TRUE, don't start the torrent
     */
    public $paused;
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
}