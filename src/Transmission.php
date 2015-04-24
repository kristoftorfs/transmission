<?php

namespace Transmission;

use Buzz\Client\Curl;
use Buzz\Exception\RuntimeException;
use Transmission\Responses\Blank;
use Transmission\Responses\BlockListUpdate;
use Transmission\Responses\FreeSpace;
use Transmission\Responses\PortTest;
use Transmission\Responses\SessionGet;
use Transmission\Responses\SessionStats;
use Transmission\Responses\TorrentAdd;
use Transmission\Responses\TorrentRenamePath;

/**
 * Class Transmission
 *
 * The regions in this class are numbered as they can be found in the
 * [RPC specs](https://trac.transmissionbt.com/browser/trunk/extras/rpc-spec.txt).
 *
 * @package Transmission
 */
final class Transmission {
    private $auth;
    /** @var Curl */
    private $client;
    private $host;
    private $path;
    private $port;
    private $token;
    private function call($method, \Transmission\Request $request) {
        try {
            $response = new \Buzz\Message\Response();
            $req = new \Buzz\Message\Request('POST', $this->path, sprintf('http://%s:%d', $this->host, $this->port));
            if (!empty($this->auth)) $req->addHeader(sprintf('Authorization: Basic %s', $this->auth));
            $req->addHeader('X-Transmission-Session-Id: ' . $this->token);
            $req->setContent($request->json($method));
            $this->client->send($req, $response);
            if (!in_array($response->getStatusCode(), array(200, 401, 409))) {
                throw new \ErrorException('Unexpected response received from Transmission', $response->getStatusCode());
            } elseif ($response->getStatusCode() == 401) {
                throw new \ErrorException('Transmission daemon reported an authentication failure', $response->getStatusCode());
            } elseif ($response->getStatusCode() == 409) {
                $this->token = $response->getHeader('X-Transmission-Session-Id');
                return $this->call($method, $request);
            } else {
                return json_decode($response->getContent(), true);
            }
        } catch (\ErrorException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new \Exception('Unable to connect to Transmission daemon', 0, $e);
        }
    }
    public function __construct($host = '127.0.0.1', $port = 9091, $path = '/transmission/rpc') {
        $this->client = new Curl();
        $this->host = $host;
        $this->port = $port;
        $this->path = $path;
    }
    public function authenticate($username = null, $password = null) {
        if (!empty($username) && !empty($password)) $this->auth = base64_encode(sprintf('%s:%s', $username, $password));
        else $this->auth = null;
    }
    #region 3.1. Torrent actions
    public function torrentStart(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-start', $request), $request);
    }
    public function torrentStartNow(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-start-now', $request), $request);
    }
    public function torrentStop(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-stop', $request), $request);
    }
    public function torrentVerify(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-verify', $request), $request);
    }
    public function torrentReannounce(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-reannounce', $request), $request);
    }
    #endregion
    #region 3.2 Torrent mutators
    public function torrentSet(\Transmission\Requests\TorrentSet $request) {
        return new Blank($this->call('torrent-set', $request), $request);
    }
    #endregion
    #region 3.3 Torrent accessors: TODO
    #endregion
    #region 3.4 Add torrent
    public function torrentAdd(\Transmission\Requests\TorrentAdd $request) {
        return new TorrentAdd($this->call('torrent-add', $request), $request);
    }
    #endregion
    #region 3.5 Remove torrent
    public function torrentRemove(\Transmission\Requests\TorrentRemove $request) {
        return new Blank($this->call('torrent-remove', $request), $request);
    }
    #endregion
    #region 3.6 Move torrent
    public function torrentSetLocation(\Transmission\Requests\TorrentSetLocation $request) {
        return new Blank($this->call('torrent-set-location', $request), $request);
    }
    #endregion
    #region 3.7 Rename torrent file
    /**
     * Note that the request should only contain one torrent id.
     *
     * @param Requests\TorrentRenamePath $request
     * @return TorrentRenamePath
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentRenamePath(\Transmission\Requests\TorrentRenamePath $request) {
        return new TorrentRenamePath($this->call('torrent-rename-path', $request), $request);
    }
    #endregion
    #region 4.1.1 Session mutators: TODO
    #endregion
    #region 4.1.2 Session accessors
    public function sessionGet() {
        $request = new \Transmission\Requests\Blank();
        return new SessionGet($this->call('session-get', $request), $request);
    }
    #endregion
    #region 4.2 Session statistics
    public function sessionStats() {
        $request = new \Transmission\Requests\Blank();
        return new SessionStats($this->call('session-stats', $request), $request);
    }
    #endregion
    #region 4.3 Blocklist
    public function blockListUpdate() {
        $request = new \Transmission\Requests\Blank();
        return new BlockListUpdate($this->call('blocklist-update', $request), $request);
    }
    #endregion
    #region 4.4 Port checking: TODO (this doesn't work)
    public function portTest(\Transmission\Requests\PortTest $request) {
        return new PortTest($this->call('port-test', $request), $request);
    }
    #endregion
    #region 4.5 Session shutdown
    public function sessionClose() {
        $request = new \Transmission\Requests\Blank();
        return new Blank($this->call('session-close', $request), $request);
    }
    #endregion
    #region 4.6 Queue movement requests
    public function queueMoveTop(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-top', $request), $request);
    }
    public function queueMoveUp(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-up', $request), $request);
    }
    public function queueMoveDown(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-down', $request), $request);
    }
    public function queueMoveBottom(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-bottom', $request), $request);
    }
    #endregion
    #region 4.7 Free space
    public function freeSpace(\Transmission\Requests\FreeSpace $request) {
        return new FreeSpace($this->call('free-space', $request), $request);
    }
    #endregion
}