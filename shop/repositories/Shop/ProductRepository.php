<?php

namespace shop\repositories\Shop;

<<<<<<< HEAD
use shop\dispatchers\EventDispatcher;
use shop\entities\Shop\Product\Product;
use shop\repositories\events\EntityPersisted;
use shop\repositories\events\EntityRemoved;
=======
use shop\entities\Shop\Product\Product;
>>>>>>> origin/master
use shop\repositories\NotFoundException;

class ProductRepository
{
<<<<<<< HEAD
    private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
=======
>>>>>>> origin/master

    public function get($id): Product
    {
        if (!$product = Product::findOne($id)) {
            throw new NotFoundException('Product is not found.');
        }
        return $product;
    }


    public function save(Product $product): void
    {
        if (!$product->save()) {
            throw new \RuntimeException('Saving error.');
        }
<<<<<<< HEAD
        $this->dispatcher->dispatchAll($product->releaseEvents());
        //$this->dispatcher->dispatch(new EntityPersisted($product));
=======
>>>>>>> origin/master
    }

    public function remove(Product $product): void
    {
        if (!$product->delete()) {
            throw new \RuntimeException('Removing error.');
        }
<<<<<<< HEAD
        $this->dispatcher->dispatchAll($product->releaseEvents());
        //$this->dispatcher->dispatch(new EntityRemoved($product));
=======
>>>>>>> origin/master
    }

    public function existsByBrand($id): bool
    {
        return Product::find()->andWhere(['brand_id' => $id])->exists();
    }

    public function existsByMainCategory($id): bool
    {
        return Product::find()->andWhere(['category_id' => $id])->exists();
    }
}