<?php

namespace gorriecoe\PredefinedLink\Admin;

use gorriecoe\PredefinedLink\Models\PredefinedLink;
use SilverStripe\Core\Config\Config;
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridFieldPrintButton;
use SilverStripe\Forms\GridField\GridFieldImportButton;
use SilverStripe\Forms\GridField\GridFieldExportButton;

/**
 * CMS Admin area to maintain menus
 *
 * @package silverstripe
 * @subpackage silverstripe-menu
 */
class PredefinedLinkAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        PredefinedLink::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'predefinedlinks';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Links';

    /**
     * @var int
     */
    private static $menu_priority = 7;

    /**
     * @param Int $id
     * @param FieldList $fields
     * @return Form
     */
    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);
        $form->Fields()
            ->fieldByName($this->sanitiseClassName($this->modelClass))
            ->getConfig()
            ->removeComponentsByType([
                GridFieldImportButton::class,
                GridFieldExportButton::class,
                GridFieldPrintButton::class
            ]);
        return $form;
    }
}
