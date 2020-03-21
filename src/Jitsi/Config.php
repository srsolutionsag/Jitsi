<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class Config
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Config implements \JsonSerializable
{
    private $room_name = '';

    private $parent_html_node = '#jitsi_meeting';

    private $interfaceConfigOverwrite = [
        'SHOW_JITSI_WATERMARK'      => false,
        'JITSI_WATERMARK_LINK'      => '',
        'SHOW_WATERMARK_FOR_GUESTS' => false,
        'TOOLBAR_BUTTONS'           => [
            'microphone',
            'camera',
            'closedcaptions',
            'desktop',
            'fullscreen',
            'fodeviceselection',
            'hangup',
            'profile',
            'info',
            'chat',
            'livestreaming',
            'etherpad',
            'settings',
            'raisehand',
            'videoquality',
            'shortcuts',
            'tileview',
            'mute-everyone'
        ],
        'SETTINGS_SECTIONS'         => ['devices', 'moderator'],
        'DISABLE_RINGING'           => true,
        'MOBILE_APP_PROMO'          => false
    ];

    private $height = 800;

    /**
     * Config constructor.
     * @param string $room_name
     * @param string $parent_html_node
     * @param int    $height
     */
    public function __construct(string $room_name, string $parent_html_node, int $height)
    {
        $this->room_name        = $room_name;
        $this->parent_html_node = $parent_html_node;
        $this->height           = $height;
    }

    public function jsonSerialize()
    {
        $data = new \stdClass();
        foreach (get_class_vars(self::class) as $k => $v) {
            $data->{$k} = $this->{$k};

        }

        $json_encode = json_encode($data, JSON_FORCE_OBJECT);
        return $json_encode;
    }

}
