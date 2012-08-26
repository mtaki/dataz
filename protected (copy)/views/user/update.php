<h1>Update user <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Cancel',array('submit'=>Yii::app()->controller->createUrl('admin')));?>
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->controller->createUrl('create')));?>