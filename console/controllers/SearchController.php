<?php

namespace console\controllers;

use Elasticsearch\Client;
use shop\entities\Shop\Product\Product;
use shop\services\search\ProductIndexer;
use yii\console\Controller;

class SearchController extends Controller
{
    private $client;
    private $indexer;

    public function __construct($id, $module, ProductIndexer $indexer, Client $client, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->indexer = $indexer;
        $this->client = $client;
    }

    public function actionReindex(): void
    {
        $query = Product::find()
            ->active()
            ->with(['category', 'categoryAssignments', 'tagAssignments', 'values'])
            ->orderBy('id');

        $this->stdout('Clearing' . PHP_EOL);

        $this->indexer->clear();

        $this->stdout('Indexing of products' . PHP_EOL);

        foreach ($query->each() as $product) {
            /** @var Product $product */

            $this->stdout('Product #' . $product->id . PHP_EOL);
            $this->indexer->index($product);
        }

        $this->stdout('Done!' . PHP_EOL);
    }
}