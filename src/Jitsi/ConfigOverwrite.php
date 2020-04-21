<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class ConfigOverwrite
 * @see    https://github.com/jitsi/jitsi-meet/blob/master/config.js
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class ConfigOverwrite extends AbstractJasonable
{
    public $desktopSharingChromeSources = ['screen'];
    public $startWithVideoMuted = true;
    public $startWithAudioMuted = false;
    public $enableWelcomePage = false;
    public $enableClosePage = false;
    public $prejoinPageEnabled = true;
    public $defaultLanguage = 'de';
    public $disableRemoteMute = false;
    public $analytics = [];
}
