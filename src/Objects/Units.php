<?php

namespace Transmission\Objects;

use Transmission\Object;

class Units extends Object {
    protected $_map = array(
        'memoryBytes' => 'memory-bytes',
        'memoryUnits' => 'memory-units',
        'sizeBytes' => 'size-bytes',
        'sizeUnits' => 'size-units',
        'speedBytes' => 'speed-bytes',
        'speedUnits' => 'speed-units'
    );
    /**
     * @var int Number of bytes in a KB (1000 for kB; 1024 for KiB)
     */
    public $memoryBytes;
    /**
     * @var string[] 4 strings: KB/s, MB/s, GB/s, TB/s
     */
    public $memoryUnits;
    /**
     * @var int Number of bytes in a KB (1000 for kB; 1024 for KiB)
     */
    public $sizeBytes;
    /**
     * @var string[] 4 strings: KB/s, MB/s, GB/s, TB/s
     */
    public $sizeUnits;
    /**
     * @var int Number of bytes in a KB (1000 for kB; 1024 for KiB)
     */
    public $speedBytes;
    /**
     * @var string[] 4 strings: KB/s, MB/s, GB/s, TB/s
     */
    public $speedUnits;
}