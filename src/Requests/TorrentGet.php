<?php

namespace Transmission\Requests;

use Transmission\Request;

class TorrentGet extends TorrentAction {
    const activityDate = 'activityDate';
    const addedDate = 'addedDate';
    const bandwidthPriority = 'bandwidthPriority';
    const comment = 'comment';
    const corruptEver = 'corruptEver';
    const creator = 'creator';
    const dateCreated = 'dateCreated';
    const desiredAvailable = 'desiredAvailable';
    const doneDate = 'doneDate';
    const downloadDir = 'downloadDir';
    const downloadedEver = 'downloadedEver';
    const downloadLimit = 'downloadLimit';
    const downloadLimited = 'downloadLimited';
    const error = 'error';
    const errorString = 'errorString';
    const eta = 'eta';
    const etaIdle = 'etaIdle';
    const files = 'files';
    const fileStats = 'fileStats';
    const hashString = 'hashString';
    const haveUnchecked = 'haveUnchecked';
    const haveValid = 'haveValid';
    const honorsSessionLimits = 'honorsSessionLimits';
    const id = 'id';
    const isFinished = 'isFinished';
    const isPrivate = 'isPrivate';
    const isStalled = 'isStalled';
    const leftUntilDone = 'leftUntilDone';
    const magnetLink = 'magnetLink';
    const manualAnnounceTime = 'manualAnnounceTime';
    const maxConnectedPeers = 'maxConnectedPeers';
    const metadataPercentComplete = 'metadataPercentComplete';
    const name = 'name';
    const peerLimit = 'peer-limit';
    const peers = 'peers';
    const peersConnected = 'peersConnected';
    const peersFrom = 'peersFrom';
    const peersGettingFromUs = 'peersGettingFromUs';
    const peersSendingToUs = 'peersSendingToUs';
    const percentDone = 'percentDone';
    const pieces = 'pieces';
    const pieceCount = 'pieceCount';
    const pieceSize = 'pieceSize';
    const priorities = 'priorities';
    const queuePosition = 'queuePosition';
    const rateDownload = 'rateDownload';
    const rateUpload = 'rateUpload';
    const recheckProgress = 'recheckProgress';
    const secondsDownloading = 'secondsDownloading';
    const secondsSeeding = 'secondsSeeding';
    const seedIdleLimit = 'seedIdleLimit';
    const seedIdleMode = 'seedIdleMode';
    const seedRatioLimit = 'seedRatioLimit';
    const seedRatioMode = 'seedRatioMode';
    const sizeWhenDone = 'sizeWhenDone';
    const startDate = 'startDate';
    const status = 'status';
    const trackers = 'trackers';
    const trackerStats = 'trackerStats';
    const totalSize = 'totalSize';
    const torrentFile = 'torrentFile';
    const uploadedEver = 'uploadedEver';
    const uploadLimit = 'uploadLimit';
    const uploadLimited = 'uploadLimited';
    const uploadRatio = 'uploadRatio';
    const wanted = 'wanted';
    const webseeds = 'webseeds';
    const webseedsSendingToUs = 'webseedsSendingToUs';

    /**
     * @var string[] Array of fields you want returned in the response (use the constants defined in this class)
     */
    public $fields = array();

    /**
     * Make sure the response includes all fields
     */
    public function includeAll() {
        $this->fields = array();
        $ref = new \ReflectionClass($this);
        foreach($ref->getConstants() as $constant) {
            $this->fields[] = $constant;
        }
    }
}