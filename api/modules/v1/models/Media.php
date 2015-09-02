<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%media}}".
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property integer $size
 * @property string $newname
 * @property string $user
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%media}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'size', 'newname', 'user'], 'required'],
            [['size'], 'integer'],
            [['id', 'type'], 'string', 'max' => 32],
            [['name', 'newname'], 'string', 'max' => 1024],
            [['user'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'size' => 'Size',
            'newname' => 'Newname',
            'user' => 'User',
        ];
    }
}
