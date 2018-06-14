<?php

namespace gorriecoe\PredefinedLink\Models;

use gorriecoe\Link\Models\Link;

/**
 * PredefinedLink
 *
 * @package silverstripe
 * @subpackage silverstripe-linkdefault
 */
class PredefinedLink extends Link
{
    /**
     * Defines the database table name
     * @var string
     */
    private static $table_name = 'PredefinedLink';

    /**
     * Singular name for CMS
     * @var string
     */
    private static $singular_name = 'Link';

    /**
     * Plural name for CMS
     * @var string
     */
    private static $plural_name = 'Links';

    /**
     * Has_many relationship
     * @var array
     */
    private static $has_many = [
        'Links' => Link::class
    ];
}
