<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'market-segment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'licence_category_id'); ?>
		<?php 
		$ms=LicenceCategory::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('MarketSegment[licence_category_id]',$model->licence_category_id, $mArray,
				array(
						'ajax' => array(
								'type'=>'POST', //request type
								'url'=>Yii::app()->createUrl('licenceApplication/subCategoryFilter'), //url to call
								'update'=>'#MarketSegment_licence_sub_category_id', //selector to update
						)
				)
				);
		?>
		<?php echo $form->error($model,'licence_category_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'licence_sub_category_id'); ?>
		<?php 
		$ls=array();
		if($model->licence_category_id)
			$ls=LicenceSubCategory::model()->findAll("licence_category_id=$model->licence_category_id");
		
		$mArray=array();
		$mArray['']='Select';
		foreach($ls as $l){
			$mArray[$l->id]=$l->name;
		}
		echo CHtml::dropDownList('MarketSegment[licence_sub_category_id]',$model->licence_sub_category_id, $mArray);
		?>
		<?php echo $form->error($model,'licence_sub_category_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
