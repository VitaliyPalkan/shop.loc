<?php

namespace shop\entities\Shop\Product;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $price
<<<<<<< HEAD
 * @property int $quantity
 */
class Modification extends ActiveRecord
{
    public static function create($code, $name, $price, $quantity): self
=======
 *
 */
class Modification extends ActiveRecord
{
    public static function create($code, $name, $price): self
>>>>>>> origin/master
    {
        $modification = new static();
        $modification->code = $code;
        $modification->name = $name;
        $modification->price = $price;
<<<<<<< HEAD
        $modification->quantity = $quantity;
        return $modification;
    }

    public function edit($code, $name, $price, $quantity): void
=======
        return $modification;
    }

    public function edit($code, $name, $price): void
>>>>>>> origin/master
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
<<<<<<< HEAD
        $this->quantity = $quantity;
    }

    public function checkout($quantity): void
    {
        if ($quantity > $this->quantity) {
            throw new \DomainException('Only ' . $this->quantity . ' items are available.');
        }
        $this->quantity -= $quantity;
=======
>>>>>>> origin/master
    }

    public function isIdEqualTo($id)
    {
        return $this->id == $id;
    }

    public function isCodeEqualTo($code)
    {
        return $this->code === $code;
    }

    public static function tableName(): string
    {
        return '{{%shop_modifications}}';
    }
}