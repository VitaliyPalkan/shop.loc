<?php

namespace shop\forms\manage\Shop\Product;

use shop\entities\Shop\Product\Modification;
use yii\base\Model;

class ModificationForm extends Model
{
    public $code;
    public $name;
    public $price;
<<<<<<< HEAD
    public $quantity;
=======
>>>>>>> origin/master

    public function __construct(Modification $modification = null, $config = [])
    {
        if ($modification) {
            $this->code = $modification->code;
            $this->name = $modification->name;
            $this->price = $modification->price;
<<<<<<< HEAD
            $this->quantity = $modification->quantity;
=======
>>>>>>> origin/master
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['code', 'name', 'quantity'], 'required'],
            [['price'], 'integer'],
        ];
    }
}