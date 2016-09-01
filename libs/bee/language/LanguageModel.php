<?php

namespace bee\language;

use Bee;

/**
 * This is the model class for table "{{%language}}".
 *
 * @property integer $language_id
 * @property integer $is_published
 * @property integer $ordering
 * @property integer $is_default
 * @property string $language_code
 * @property string $language_local
 * @property string $name
 * @property string $title
 * @property string $flag
 * @property string $date_create
 * @property string $date_update
 */
class LanguageModel extends \yii\db\ActiveRecord
{
    public function behaviors () {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_published', 'ordering', 'is_default'], 'integer'],
            [['language_code', 'language_local', 'name', 'title', 'date_create', 'date_update'], 'required'],
            [['date_create', 'date_update'], 'safe'],
            [['language_code'], 'string', 'max' => 2],
            [['language_local'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 60],
            [['title'], 'string', 'max' => 100],
            [['flag'], 'string', 'max' => 50],
            [['language_code', 'language_local'], 'unique', 'targetAttribute' => ['language_code', 'language_local'], 'message' => 'The combination of URL ссылка выбранного языка and Код языка has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_LANGUAGE_ID'),
            'is_published' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_IS_PUBLISHED'),
            'ordering' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_ORDERING'),
            'is_default' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_IS_DEFAULT'),
            'language_code' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_LANGUAGE_CODE'),
            'language_local' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_LANGUAGE_LOCAL'),
            'name' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_NAME'),
            'title' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_TITLE'),
            'flag' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_FLAG'),
            'date_create' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_DATE_CREATE'),
            'date_update' => Bee::t('bee', 'language', 'TABLE_LANGUAGE_DATE_UPDATE'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getBlogs()
//    {
//        return $this->hasMany(Blog::className(), ['language_local' => 'language_local']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getCategories()
//    {
//        return $this->hasMany(Category::className(), ['language_local' => 'language_local']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getMenus()
//    {
//        return $this->hasMany(Menu::className(), ['language_local' => 'language_local']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getPages()
//    {
//        return $this->hasMany(Page::className(), ['language_local' => 'language_local']);
//    }
}
