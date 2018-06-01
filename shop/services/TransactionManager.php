<?php

namespace shop\services;



<<<<<<< HEAD
use shop\dispatchers\DeferredEventDispatcher;

class TransactionManager
{
    private $dispatcher;

    public function __construct(DeferredEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function wrap(callable $function): void
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $this->dispatcher->defer();
            $function();
            $transaction->commit();
            $this->dispatcher->release();
        } catch (\Exception $e) {
            $transaction->rollBack();
            $this->dispatcher->clean();
            throw $e;
        }
=======
class TransactionManager
{

    public function wrap(callable $function): void
    {
        \Yii::$app->db->transaction($function);
>>>>>>> origin/master

    }
}