# Transmission RPC client

A 100% OOP RPC client for Transmission. This library gives you code-completion for all requests and responses available
from the Transmission daemon.

The plan is to keep this in sync at all times with [Transmission RPC specs](https://trac.transmissionbt.com/browser/trunk/extras/rpc-spec.txt). Should you notice
I'm behind on the specs, please notify me by opening a new [issue](https://github.com/kristoftorfs/transmission/issues/new).

## Installation

Installation is done through composer.

## Usage example

```php
use \Transmission\Transmission;
use \Transmission\Requests;
use \Transmission\Responses;

try {
    $tr = new Transmission();
    $request = new Requests\TorrentGet();
    $request->fields = array(Requests\TorrentGet::eta, Requests\TorrentGet::name, Requests\TorrentGet::percentDone);
    #$request->includeAll();
    $response = $tr->torrentGet($request);
    foreach($response->torrents as $torrent) {
        printf('%s: %d%% done, %d seconds left<br>', $torrent->name, $torrent->percentDone * 100, $torrent->eta);
    }
} catch (Exception $e) {
    printf('Error %d - %s', $e->getCode(), $e->getMessage());
}
```