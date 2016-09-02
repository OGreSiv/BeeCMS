<?php

namespace bee\menu\models;

use Bee;

/**
 * This is the model class for view "v_menu_ru".
 *
 * @property integer $menu_id
 * @property string $zone_code
 * @property integer $extension_id
 * @property integer $menutype_id
 * @property string $menutype_name
 * @property string $menutype_params
 * @property integer $menutype_is_published
 * @property integer $menutype_is_removable
 * @property integer $parent_id
 * @property string $title
 * @property string $subtitle
 * @property string $alias
 * @property string $component_path
 * @property string $query_params
 * @property string $link
 * @property string $image
 * @property string $params
 * @property string $zone_name
 * @property string $component_name
 * @property string $controller_name
 * @property string $action_name
 * @property string $ext_params
 * @property integer $ext_is_published
 * @property integer $component_is_published
 * @property integer $is_home
 * @property integer $is_menu_displayed
 * @property integer $is_published
 * @property integer $ordering
 * @property integer $lft
 * @property integer $rgt
 */
class Menu extends \yii\db\ActiveRecord
{
    public static function primaryKey() {
        return 'menu_id';
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'v_menu_' . Bee::$app->getLanguageKey();
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['menu_id', 'extension_id', 'menutype_id', 'menutype_is_published', 'menutype_is_removable', 'parent_id', 'ext_is_published', 'component_is_published', 'is_home', 'is_menu_displayed', 'is_published', 'ordering', 'lft', 'rgt'], 'integer'],
            [['zone_code', 'extension_id', 'menutype_id', 'menutype_name', 'menutype_params', 'title', 'alias', 'zone_name', 'component_name', 'action_name', 'ext_params'], 'required'],
            [['menutype_params', 'link', 'params', 'ext_params'], 'string'],
            [['zone_code', 'title'], 'string', 'max' => 100],
            [['menutype_name', 'alias'], 'string', 'max' => 50],
            [['subtitle', 'image'], 'string', 'max' => 255],
            [['component_path'], 'string', 'max' => 74],
            [['query_params'], 'string', 'max' => 256],
            [['zone_name'], 'string', 'max' => 10],
            [['component_name', 'controller_name', 'action_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'menu_id' =>                Bee::t('bee', 'menu', 'VIEW_MENU_MENU_ID'),
            'zone_code' =>              Bee::t('bee', 'menu', 'VIEW_MENU_ZONE_CODE'),
            'extension_id' =>           Bee::t('bee', 'menu', 'VIEW_MENU_EXTENSION_ID'),
            'menutype_id' =>            Bee::t('bee', 'menu', 'VIEW_MENU_MENUTYPE_ID'),
            'menutype_name' =>          Bee::t('bee', 'menu', 'VIEW_MENU_MENUTYPE_NAME'),
            'menutype_params' =>        Bee::t('bee', 'menu', 'VIEW_MENU_MENUTYPE_PARAMS'),
            'menutype_is_published' =>  Bee::t('bee', 'menu', 'VIEW_MENU_MENUTYPE_IS_PUBLISHED'),
            'menutype_is_removable' =>  Bee::t('bee', 'menu', 'VIEW_MENU_IS_REMOVABLE'),
            'parent_id' =>              Bee::t('bee', 'menu', 'VIEW_MENU_PARENT_ID'),
            'title' =>                  Bee::t('bee', 'menu', 'VIEW_MENU_TITLE'),
            'subtitle' =>               Bee::t('bee', 'menu', 'VIEW_MENU_SUBTITLE'),
            'alias' =>                  Bee::t('bee', 'menu', 'VIEW_MENU_ALIAS'),
            'component_path' =>         Bee::t('bee', 'menu', 'VIEW_MENU_COMPONENT_PATH'),
            'query_params' =>           Bee::t('bee', 'menu', 'VIEW_MENU_QUERY_PARAMS'),
            'link' =>                   Bee::t('bee', 'menu', 'VIEW_MENU_LINK'),
            'image' =>                  Bee::t('bee', 'menu', 'VIEW_MENU_IMAGELINK'),
            'params' =>                 Bee::t('bee', 'menu', 'VIEW_MENU_PARAMS'),
            'zone_name' =>              Bee::t('bee', 'menu', 'VIEW_MENU_ZONE_NAME'),
            'component_name' =>         Bee::t('bee', 'menu', 'VIEW_MENU_COMPONENT_NAME'),
            'controller_name' =>        Bee::t('bee', 'menu', 'VIEW_MENU_CONTROLLER_NAME'),
            'action_name' =>            Bee::t('bee', 'menu', 'VIEW_MENU_ACTION_NAME'),
            'ext_params' =>             Bee::t('bee', 'menu', 'VIEW_MENU_EXT_PARAMS'),
            'ext_is_published' =>       Bee::t('bee', 'menu', 'VIEW_MENU_EXT_IS_PUBLISHED'),
            'component_is_published' => Bee::t('bee', 'menu', 'VIEW_MENU_COMPONENT_IS_PUBLISHED'),
            'is_home' =>                Bee::t('bee', 'menu', 'VIEW_MENU_IS_HOME'),
            'is_menu_displayed' =>      Bee::t('bee', 'menu', 'VIEW_MENU_IS_MENU_DISPLAYED'),
            'is_published' =>           Bee::t('bee', 'menu', 'VIEW_MENU_IS_PUBLISHED'),
            'ordering' =>               Bee::t('bee', 'menu', 'VIEW_MENU_ORDERING'),
            'lft' =>                    Bee::t('bee', 'menu', 'VIEW_MENU_LFT'),
            'rgt' =>                    Bee::t('bee', 'menu', 'VIEW_MENU_RGT')
        ];
    }

    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find() {
        return new MenuQuery(get_called_class());
    }
}
