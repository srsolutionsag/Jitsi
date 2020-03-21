<?php

namespace srag\CustomInputGUIs\Jitsi\CheckboxInputGUI;

use ilCheckboxInputGUI;
use ilTableFilterItem;
use srag\DIC\Jitsi\DICTrait;

/**
 * Class CheckboxInputGUI
 *
 * @package srag\CustomInputGUIs\Jitsi\CheckboxInputGUI
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CheckboxInputGUI extends ilCheckboxInputGUI implements ilTableFilterItem
{

    use DICTrait;
}
