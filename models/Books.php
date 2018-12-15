<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $isbn
 * @property string $name
 * @property string $author
 * @property string $pdate
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isbn', 'name', 'author', 'pdate'], 'required'],
            [['pdate'], 'safe'],
            [['isbn', 'name', 'author'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isbn' => 'Isbn',
            'name' => 'Name',
            'author' => 'Author',
            'pdate' => 'Pdate',
        ];
    }
}
