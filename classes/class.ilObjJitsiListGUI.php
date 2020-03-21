<?php

use srag\Plugins\Jitsi\Utils\JitsiTrait;
use srag\DIC\Jitsi\DICTrait;

/**
 * Class ilObjJitsiListGUI
 *
 * Generated by SrPluginGenerator v1.3.5
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 * @author studer + raimann ag - Team Core 1 <support-core1@studer-raimann.ch>
 */
class ilObjJitsiListGUI extends ilObjectPluginListGUI
{

    use DICTrait;
    use JitsiTrait;
    const PLUGIN_CLASS_NAME = ilJitsiPlugin::class;


    /**
     * ilObjJitsiListGUI constructor
     *
     * @param int $a_context
     */
    public function __construct(int $a_context = self::CONTEXT_REPOSITORY)
    {
        parent::__construct($a_context);
    }


    /**
     * @inheritDoc
     */
    public function getGuiClass() : string
    {
        return ilObjJitsiGUI::class;
    }


    /**
     * @inheritDoc
     */
    public function initCommands() : array
    {
        $this->commands_enabled = true;
        $this->copy_enabled = true;
        $this->cut_enabled = true;
        $this->delete_enabled = true;
        $this->description_enabled = true;
        $this->notice_properties_enabled = true;
        $this->properties_enabled = true;

        $this->comments_enabled = false;
        $this->comments_settings_enabled = false;
        $this->expand_enabled = false;
        $this->info_screen_enabled = false;
        $this->link_enabled = false;
        $this->notes_enabled = false;
        $this->payment_enabled = false;
        $this->preconditions_enabled = false;
        $this->rating_enabled = false;
        $this->rating_categories_enabled = false;
        $this->repository_transfer_enabled = false;
        $this->search_fragment_enabled = false;
        $this->static_link_enabled = false;
        $this->subscribe_enabled = false;
        $this->tags_enabled = false;
        $this->timings_enabled = false;

        $commands = [
            [
                "permission" => "read",
                "cmd"        => ilObjJitsiGUI::getStartCmd(),
                "default"    => true
            ]
        ];

        return $commands;
    }


    /**
     * @inheritDoc
     */
    public function getProperties() : array
    {
        $props = [];

        if (ilObjJitsiAccess::_isOffline($this->obj_id)) {
            $props[] = [
                "alert"    => true,
                "property" => self::plugin()->translate("status", ilObjJitsiGUI::LANG_MODULE_OBJECT),
                "value"    => self::plugin()->translate("offline", ilObjJitsiGUI::LANG_MODULE_OBJECT)
            ];
        }

        return $props;
    }


    /**
     * @inheritDoc
     */
    public function initType()/*: void*/
    {
        $this->setType(ilJitsiPlugin::PLUGIN_ID);
    }
}
