<?php


namespace console\controllers;


use yii\console\Controller;

class TestController extends Controller
{
    public function actionTest(){
        \Yii::$app->queue->push(new TestJob([
            'name' => 'Vasya',
        ]));
    }
}