<?php

namespace luya\forms\blocks;

use Yii;
use luya\cms\base\PhpBlock;
use luya\forms\blockgroups\FormGroup;
use luya\forms\FieldBlockTrait;
use luya\helpers\ArrayHelper;

/**
 * Text Block.
 *
 * File has been created with `block/create` command.
 */
class TextBlock extends PhpBlock
{
    use FieldBlockTrait { config as parentConfig; }

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return FormGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Yii::t('forms', 'Text');
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'message';
    }

    public function config()
    {
        return ArrayHelper::merge($this->parentConfig(), [
            'vars' => [
                ['var' => 'isTextarea', 'label' => Yii::t('forms', 'Multiline Input'), 'type' => self::TYPE_CHECKBOX]
            ]
        ]);
    }
    
    /**
     * {@inheritDoc}
     *
     * @param {{vars.field}}
     * @param {{vars.hint}}
     * @param {{vars.label}}
    */
    public function admin()
    {
        return '<div>{{vars.label}} <span class="badge badge-secondary float-right">Text</span></div>';
    }

    public function frontend()
    {
        Yii::$app->forms->autoConfigureAttribute(
            $this->getVarValue($this->varAttribute),
            $this->getVarValue($this->varRule, $this->defaultRule),
            $this->getVarValue($this->varIsRequired),
            $this->getVarValue($this->varLabel),
            $this->getVarValue($this->varHint),
            $this->getVarValue($this->varFormatAs)
        );

        $activeField = Yii::$app->forms->form->field(Yii::$app->forms->model, $this->getVarValue($this->varAttribute));

        return $this->getVarValue('isTextarea') ? $activeField->textArea() : $activeField->textInput();
    }
}
