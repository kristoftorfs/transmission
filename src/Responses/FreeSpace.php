<?php

namespace Transmission\Responses;

use Transmission\Response;

class FreeSpace extends Response {
    /**
     * @var string The directory that was queried
     */
    public $path;
    /**
     * @var int The size, in bytes, of the free space in that directory
     */
    public $sizeBytes;

    /**
     * Returns the free space in human readable format.
     *
     * @return string
     */
    public function humanReadable() {
        $decimals = 2;
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($this->sizeBytes) - 1) / 3);
        return sprintf("%.{$decimals}f ", $this->sizeBytes / pow(1024, $factor)) . @$size[$factor];
    }
}