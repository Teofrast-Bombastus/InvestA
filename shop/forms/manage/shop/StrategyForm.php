<?php
namespace shop\forms\manage\shop;


use shop\entities\shop\Strategy;
use yii\web\UploadedFile;
use \yii\base\Model as BaseModel;


class StrategyForm extends BaseModel
{
    public $title;
    public $description;
    /**
     * @var  UploadedFile $image
     */
    public $image;

    private $_strategy;

    public function __construct(Strategy $strategy = null, $config = [])
    {
        if ($strategy) {
            $this->title = $strategy->title;
            $this->description = $strategy->description;
            $this->_strategy = $strategy;
        }
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['title'], 'required'],
            empty($this->_strategy->image) ? ['image', 'required'] : ['image', 'safe'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            ['image', 'file', 'extensions' => 'jpeg ,jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'image' => 'Изображение',
        ];
    }



    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->image = UploadedFile::getInstance($this, 'image');
            return true;
        }
        return false;
    }


}