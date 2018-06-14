<?php

namespace gorriecoe\PredefinedLink\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\DropdownField;
use gorriecoe\PredefinedLink\Models\PredefinedLink;
use SilverStripe\ORM\DataExtension;
use UncleCheese\DisplayLogic\Forms\Wrapper;

/**
 * Add default link types define in site settings
 *
 * @package silverstripe-linkdefaults
 */
class PredefinedLinkExtension extends DataExtension
{
    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = [
        'PredefinedLink' => PredefinedLink::class
    ];

    /**
     * A map of object types that can be linked to
     * Custom dataobjects can be added to this
     *
     * @var array
     **/
    private static $types = [
        'Predefined' => 'Predefined link',
    ];

    /**
     * Update Fields
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $owner = $this->owner;
        if ($owner->ClassName != PredefinedLink::class) {
            // Insert predefined select field
            $fields->insertAfter(
                'Type',
                Wrapper::create(
                    DropdownField::create(
                        'PredefinedLinkID',
                        _t(__CLASS__ . '.SELECTAPREDEFINEDLINK', 'Select a predefined Link'),
                        PredefinedLink::get()->map()
                    )
                )
                ->displayIf('Type')->isEqualTo('Predefined')->end()
            );
        }
    }

    public function updateTypes(&$types)
    {
        $owner = $this->owner;
        if ($owner->ClassName == PredefinedLink::class) {
            unset($types['Predefined']);
        }
    }

    public function updateLinkURL(&$LinkURL)
    {
        $owner = $this->owner;
        if ($owner->ClassName == PredefinedLink::class) {
            $LinkURL = $owner->PredefinedLink()->LinkURL;
        }
    }

    public function updateTarget(&$target)
    {
        $owner = $this->owner;
        if ($owner->ClassName == PredefinedLink::class) {
            $target = $owner->PredefinedLink()->Target;
        }
    }

    /**
     * Event handler called after writing to the database.
     */
    public function onAfterWrite()
    {
        // parent::onAfterWrite();
        // $owner = $this->owner;
        // if (!$owner->Title && $owner->Type == 'Predefined') {
        //     $owner->Title = $owner->PredefinedLink()->Title;
        //     $owner->write();
        // }
    }
}
