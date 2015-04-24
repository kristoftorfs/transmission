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
use Transmission\Responses\TorrentGet;
use Transmission\Responses\TorrentRenamePath;

/**
 * Class Transmission
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

    /**
     * @param string $host
     * @param int $port
     * @param string $path
     */
    public function __construct($host = '127.0.0.1', $port = 9091, $path = '/transmission/rpc') {
        $this->client = new Curl();
        $this->host = $host;
        $this->port = $port;
        $this->path = $path;
    }

    /**
     * @param string $username
     * @param string $password
     */
    public function authenticate($username = null, $password = null) {
        if (!empty($username) && !empty($password)) $this->auth = base64_encode(sprintf('%s:%s', $username, $password));
        else $this->auth = null;
    }

    /**
     * @param Requests\TorrentAction $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentStart(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-start', $request), $request);
    }

    /**
     * @param Requests\TorrentAction $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentStartNow(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-start-now', $request), $request);
    }

    /**
     * @param Requests\TorrentAction $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentStop(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-stop', $request), $request);
    }

    /**
     * @param Requests\TorrentAction $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentVerify(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-verify', $request), $request);
    }

    /**
     * @param Requests\TorrentAction $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentReannounce(\Transmission\Requests\TorrentAction $request) {
        return new Blank($this->call('torrent-reannounce', $request), $request);
    }

    /**
     * @param Requests\TorrentSet $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentSet(\Transmission\Requests\TorrentSet $request) {
        return new Blank($this->call('torrent-set', $request), $request);
    }

    /**
     * @param Requests\TorrentGet $request
     * @return TorrentGet
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentGet(\Transmission\Requests\TorrentGet $request) {
        return new TorrentGet($this->call('torrent-get', $request), $request);
    }

    /**
     * @param Requests\TorrentAdd $request
     * @return TorrentAdd
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentAdd(\Transmission\Requests\TorrentAdd $request) {
        return new TorrentAdd($this->call('torrent-add', $request), $request);
    }

    /**
     * @param Requests\TorrentRemove $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentRemove(\Transmission\Requests\TorrentRemove $request) {
        return new Blank($this->call('torrent-remove', $request), $request);
    }

    /**
     * @param Requests\TorrentSetLocation $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function torrentSetLocation(\Transmission\Requests\TorrentSetLocation $request) {
        return new Blank($this->call('torrent-set-location', $request), $request);
    }

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

    /**
     * @param Requests\SessionSet $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function sessionSet(\Transmission\Requests\SessionSet $request) {
        return new Blank($this->call('session-set', $request), $request);
    }

    /**
     * @return SessionGet
     * @throws \ErrorException
     * @throws \Exception
     */
    public function sessionGet() {
        $request = new \Transmission\Requests\Blank();
        return new SessionGet($this->call('session-get', $request), $request);
    }

    /**
     * @return SessionStats
     * @throws \ErrorException
     * @throws \Exception
     */
    public function sessionStats() {
        $request = new \Transmission\Requests\Blank();
        return new SessionStats($this->call('session-stats', $request), $request);
    }

    /**
     * @return BlockListUpdate
     * @throws \ErrorException
     * @throws \Exception
     */
    public function blockListUpdate() {
        $request = new \Transmission\Requests\Blank();
        return new BlockListUpdate($this->call('blocklist-update', $request), $request);
    }

    /**
     * @param Requests\PortTest $request
     * @return PortTest
     * @throws \ErrorException
     * @throws \Exception
     */
    public function portTest(\Transmission\Requests\PortTest $request) {
        return new PortTest($this->call('port-test', $request), $request);
    }

    /**
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function sessionClose() {
        $request = new \Transmission\Requests\Blank();
        return new Blank($this->call('session-close', $request), $request);
    }

    /**
     * @param Requests\QueueMovement $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function queueMoveTop(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-top', $request), $request);
    }

    /**
     * @param Requests\QueueMovement $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function queueMoveUp(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-up', $request), $request);
    }

    /**
     * @param Requests\QueueMovement $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function queueMoveDown(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-down', $request), $request);
    }

    /**
     * @param Requests\QueueMovement $request
     * @return Blank
     * @throws \ErrorException
     * @throws \Exception
     */
    public function queueMoveBottom(\Transmission\Requests\QueueMovement $request) {
        return new Blank($this->call('queue-move-bottom', $request), $request);
    }

    /**
     * @param Requests\FreeSpace $request
     * @return FreeSpace
     * @throws \ErrorException
     * @throws \Exception
     */
    public function freeSpace(\Transmission\Requests\FreeSpace $request) {
        return new FreeSpace($this->call('free-space', $request), $request);
    }
}