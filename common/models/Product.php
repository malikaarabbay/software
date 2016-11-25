<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use Yii\db\ActiveRecord;
use vova07\fileapi\behaviors\UploadBehavior;
use yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;
use himiklab\sortablegrid\SortableGridBehavior;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $announce
 * @property string $function
 * @property string $benefit
 * @property string $advantage
 * @property string $photo
 * @property string $photo_banefit
 * @property string $photo_advantage
 * @property string $slug
 * @property integer $created
 * @property integer $updated
 * @property integer $is_published
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    const IMAGE_DIR = 'product';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['announce', 'function', 'benefit', 'advantage'], 'string'],
            [['created', 'updated', 'is_published'], 'integer'],
            [['title', 'title_sec', 'photo', 'photo_banefit', 'photo_advantage', 'slug', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['file'], 'file', 'maxFiles' => 10],
            [['title', 'photo', 'announce'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'announce' => Yii::t('app', 'Announce'),
            'function' => Yii::t('app', 'Function'),
            'benefit' => Yii::t('app', 'Benefit'),
            'advantage' => Yii::t('app', 'Advantage'),
            'photo' => 'Главная картинка',
            'photo_banefit' => Yii::t('app', 'Photo Banefit'),
            'photo_advantage' => Yii::t('app', 'Photo Advantage'),
            'slug' => Yii::t('app', 'Slug'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'is_published' => Yii::t('app', 'Is Published'),
            'file' => Yii::t('app', 'File'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'title_sec' => 'Второй заголовок'
        ];
    }

    public function getImage()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return Yii::getAlias('@frontendWebroot/images').'/'.$image;
    }

    public function getImages()
    {
        return Image::find()->where(['model_name' => $this::IMAGE_DIR, 'item_id' => $this->id])->all();
    }

    public function getImagePath()
    {
        $image =  ($this->photo) ? $this->photo : 'placeholder.png';
        return '@frontend/web/images/'.$image;
    }

    public function getImagePathBenefit()
    {
        $image =  ($this->photo_banefit) ? $this->photo_banefit : 'placeholder.png';
        return '@frontend/web/images/'.$image;
    }

    public function getImagePathAdvantage()
    {
        $image =  ($this->photo_advantage) ? $this->photo_advantage : 'placeholder.png';
        return '@frontend/web/images/'.$image;
    }

    public function getReviews()
    {
        return Review::find()->where(['is_published' => 1, 'product_id' => $this->id])->orderBy('created DESC')->all();
    }

    public function saveImages(){

        $this->file = UploadedFile::getInstances($this, 'file');

        if ($this->file && $this->validate()) {
            foreach ($this->file as $file) {
                $filename = uniqid() . '.' . $file->extension;

                $file->saveAs(Yii::getAlias('@frontend/web/images/'. $filename));

                $image = new Image;
                $image->filename = $filename;
                $image->model_name = 'product';
                $image->item_id = $this->id;
                $image->save();
            }
        }
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'updated'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
            ],
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'photo' => [
                        'path' => '@frontend/web/images',
                        'tempPath' => '@frontend/web/images',
                        'url' => Yii::getAlias('@frontendWebroot/images')
                    ],
                    'photo_banefit' => [
                        'path' => '@frontend/web/images',
                        'tempPath' => '@frontend/web/images',
                        'url' => Yii::getAlias('@frontendWebroot/images')
                    ],
                    'photo_advantage' => [
                        'path' => '@frontend/web/images',
                        'tempPath' => '@frontend/web/images',
                        'url' => Yii::getAlias('@frontendWebroot/images')
                    ],
                ]
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug'
            ],
        ];

    }
}
