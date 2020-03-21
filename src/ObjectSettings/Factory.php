<?php

namespace srag\Plugins\Jitsi\ObjectSettings;

use srag\Plugins\Jitsi\Utils\JitsiTrait;
use ilJitsiPlugin;
use ilObjJitsi;
use ilObjJitsiGUI;
use srag\DIC\Jitsi\DICTrait;

/**
 * Class Factory
 *
 * Generated by SrPluginGenerator v1.3.5
 *
 * @package srag\Plugins\Jitsi\ObjectSettings
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 * @author studer + raimann ag - Team Core 1 <support-core1@studer-raimann.ch>
 */
final class Factory
{

    use DICTrait;
    use JitsiTrait;
    const PLUGIN_CLASS_NAME = ilJitsiPlugin::class;
    /**
     * @var self
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * Factory constructor
     */
    private function __construct()
    {

    }


    /**
     * @return ObjectSettings
     */
    public function newInstance() : ObjectSettings
    {
        $object_settings = new ObjectSettings();

        return $object_settings;
    }


    /**
     * @param ilObjJitsiGUI $parent
     * @param ilObjJitsi    $object
     *
     * @return ObjectSettingsFormGUI
     */
    public function newFormInstance(ilObjJitsiGUI $parent, ilObjJitsi $object) : ObjectSettingsFormGUI
    {
        $form = new ObjectSettingsFormGUI($parent, $object);

        return $form;
    }
}
