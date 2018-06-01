<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class DocController extends Controller
{
    public function actionBuild(): void
    {
        $swagger = Yii::getAlias('@vendor/zircote/swagger-php/bin/swagger');
        $source = Yii::getAlias('@api/controllers');
        $target = Yii::getAlias('@api/web/docs/swagger.json');

        passthru('"' . PHP_BINARY . '"' . " \"{$swagger}\" \"{$source}\" --output \"{$target}\"");
    }
}