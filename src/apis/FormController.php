<?php

namespace luya\forms\apis;

/**
 * Form Controller.
 *
 * File has been created with `crud/create` command.
 */
class FormController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'luya\forms\models\Form';
}
