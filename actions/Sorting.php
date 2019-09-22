<?php

namespace uraankhayayaal\sortable\actions;

use yii\base\Action;
use yii\db\ActiveQuery;
use yii\web\BadRequestHttpException;
use yii\web\Response;

class Sorting extends Action
{
    public $query;
    public $orderAttribute = 'sort';
    public $pk = 'id';
    
    public function run()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        $offset = \Yii::$app->request->post('offset');
        try {
            foreach (\Yii::$app->request->post('sorting') as $order => $id) {
                $query = clone $this->query;
                $model = $query->andWhere([$this->pk => $id])->one();
                if ($model === null) {
                    throw new BadRequestHttpException();
                }
                $model->{$this->orderAttribute} = $offset + $order;
                $model->update(false, [$this->orderAttribute]);
            }
            $transaction->commit();
            //\Yii::$app->session->setFlash('success', 'Сортровка прошла успешно!');
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'type' => 'success',
                'message' => 'Сортровка прошла успешно!'
            ];
        } catch (\Exception $e) {
            $transaction->rollBack();
            //\Yii::$app->session->setFlash('error', 'Ошибка при сортировке!');
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'type' => 'error',
                'message' => 'Ошибка при сортировке!'
            ];
        }
    }
}