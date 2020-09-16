<?php

namespace luya\forms\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Submission Value.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $submission_id
 * @property string $attribute
 * @property string $label
 * @property string $hint
 * @property text $value
 */
class SubmissionValue extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%forms_submission_value}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-forms-submissionvalue';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'submission_id' => Yii::t('app', 'Submission ID'),
            'attribute' => Yii::t('app', 'Attribute'),
            'label' => Yii::t('app', 'Label'),
            'hint' => Yii::t('app', 'Hint'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['submission_id'], 'integer'],
            [['attribute', 'label'], 'required'],
            [['value'], 'string'],
            [['attribute', 'label', 'hint'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'submission_id' => 'number',
            'attribute' => 'text',
            'label' => 'text',
            'hint' => 'text',
            'value' => 'textarea',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['submission_id', 'attribute', 'label', 'hint', 'value']],
            [['create', 'update'], ['submission_id', 'attribute', 'label', 'hint', 'value']],
            ['delete', false],
        ];
    }
}