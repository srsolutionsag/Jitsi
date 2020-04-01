<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class Participant
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Participant extends AbstractJasonable
{
    public $displayName = '';

    public $moderator = false;

    /**
     * @param string $displayName
     */
    public function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @param bool $moderator
     */
    public function setModerator(bool $moderator)
    {
        $this->moderator = $moderator;
    }

}
