<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class Config
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Config implements \JsonSerializable
{
    private $roomName = '';

    private $configOverwrite = [
        'desktopSharingChromeSources' => ['screen']
    ];

    private $interfaceConfigOverwrite = [
        'SHOW_JITSI_WATERMARK'            => false,
        'JITSI_WATERMARK_LINK'            => '',
        'SHOW_WATERMARK_FOR_GUESTS'       => false,
        'RECENT_LIST_ENABLED'             => false,
        'SUPPORT_URL'                     => '',
        'TOOLBAR_BUTTONS'                 => [
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
        ],
        'SETTINGS_SECTIONS'               => ['devices', 'moderator'],
        'DISABLE_RINGING'                 => true,
        'MOBILE_APP_PROMO'                => false,
        'DISABLE_TRANSCRIPTION_SUBTITLES' => true,
        'VERTICAL_FILMSTRIP'              => false,
        'LOCAL_THUMBNAIL_RATIO'           => 16 / 9,
        'REMOTE_THUMBNAIL_RATIO'          => 16 / 9
    ];

    private $height = 800;

    /**
     * Config constructor.
     * @param string $room_name
     * @param string $parent_html_node
     * @param int    $height
     */
    public function __construct(string $room_name, int $height)
    {
        $this->roomName = $room_name;
        $this->height   = $height;
    }

    public function jsonSerialize()
    {
        $data = new \stdClass();
        foreach (get_class_vars(self::class) as $k => $v) {
            $data->{$k} = $this->{$k};

        }

        return json_encode((object) $data, JSON_NUMERIC_CHECK);
    }

}
