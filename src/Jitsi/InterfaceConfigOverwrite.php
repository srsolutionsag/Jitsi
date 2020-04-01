<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class InterfaceConfigOverwrite
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class InterfaceConfigOverwrite extends AbstractJasonable
{
    public $SHOW_JITSI_WATERMARK = false;
    public $JITSI_WATERMARK_LINK = '';
    public $SHOW_WATERMARK_FOR_GUESTS = false;
    public $RECENT_LIST_ENABLED = false;
    public $SUPPORT_URL = '';
    public $TOOLBAR_BUTTONS = [
        'microphone',
        'camera',
        //            'closedcaptions',
        'desktop',
        'fullscreen',
        'fodeviceselection',
        'hangup',
        //            'profile',
        //            'info',
        'chat',
        //            'livestreaming',
        'etherpad',
        'settings',
        'raisehand',
        //            'videoquality',
        //            'shortcuts',
        'tileview',
        //            'mute-everyone'
    ];
    public $SETTINGS_SECTIONS = ['devices', 'moderator'];
    public $DISABLE_RINGING = true;
    public $MOBILE_APP_PROMO = false;
    public $DISABLE_TRANSCRIPTION_SUBTITLES = true;
    public $VERTICAL_FILMSTRIP = false;
    public $LOCAL_THUMBNAIL_RATIO = 16 / 9;
    public $REMOTE_THUMBNAIL_RATIO = 16 / 9;

}
