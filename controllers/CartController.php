<?php 
   namespace app\controllers; 
   use yii\web\Controller; 
   class CartController extends Controller { 
      public function actionIndex() { 
         $message = "index action of the ExampleController"; 
         return $this->render("index",[ 
            'message' => $message 
         ]); 
      } 
   } 
?>