<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class Base
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Base extends AbstractJasonable
{
    public $roomName = '';
    public $password = '';
    public $domain = '';
    public $height = 800;
    public $parentNode;
    public $configOverwrite;
    public $interfaceConfigOverwrite;
    public $participant;
    public $roomId;

    /**
     * Base constructor.
     * @param string $domain
     * @param string $room_id
     * @param int    $height
     */
    public function __construct(string $domain, string $room_id, int $height)
    {
        $this->domain                   = $domain;
        $this->parentNode               = '#jitsi_meeting';
        $this->roomId                   = $room_id;
        $this->roomName                 = $room_id;
        $this->height                   = $height;
        $this->configOverwrite          = new ConfigOverwrite();
        $this->interfaceConfigOverwrite = new InterfaceConfigOverwrite();
        $this->participant              = new Participant();
    }

    /**
     * @param string $roomName
     */
    public function setRoomName(string $roomName)
    {
        $this->roomName = $roomName;
    }

    /**
     * @param string $parentNode
     */
    public function setParentNode(string $parentNode)
    {
        $this->parentNode = $parentNode;
    }

    /**
     * @return ConfigOverwrite
     */
    public function getConfigOverwrite() : ConfigOverwrite
    {
        return $this->configOverwrite;
    }

    /**
     * @return InterfaceConfigOverwrite
     */
    public function getInterfaceConfigOverwrite() : InterfaceConfigOverwrite
    {
        return $this->interfaceConfigOverwrite;
    }

    /**
     * @return Participant
     */
    public function getParticipant() : Participant
    {
        return $this->participant;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

}
