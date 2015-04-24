<?php

namespace Transmission\Requests;

use Transmission\Request;

class TorrentRemove extends TorrentAction {
    protected $_map = array(
        'deleteLocalData' => 'delete-local-data'
    );
    /**
     * @var bool Delete local data, defaults to FALSE
     */
    public $deleteLocalData;
}