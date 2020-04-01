<?php

namespace srag\Plugins\Jitsi\Jitsi;

/**
 * Class AbstractJasonable
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
abstract class AbstractJasonable implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $data = [];
        $r    = new \ReflectionClass($this);

        foreach ($r->getProperties() as $property) {
            if ($property->getValue($this) instanceof AbstractJasonable) {
                $value                      = (array) $property->getValue($this);
                $data[$property->getName()] = $value;
            } else {
                $data[$property->getName()] = $property->getValue($this);
            }

        }

        return json_encode((object) $data);
    }
}
