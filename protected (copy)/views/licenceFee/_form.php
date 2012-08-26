<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'licence-fee-form',
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
		echo CHtml::dropDownList('LicenceFee[licence_category_id]',$model->licence_category_id, $mArray,
				array(
						'ajax' => array(
								'type'=>'POST', //request type
								'url'=>Yii::app()->createUrl('licenceApplication/marketSegmentFilter'), //url to call
								'update'=>'#LicenceFee_market_segment_id', //selector to update
						)
				)
				);
		?>
		<?php echo $form->error($model,'licence_category_id'); ?>
		<?php echo $form->error($model,'licence_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_service'); ?>
		<?php echo $form->textField($model,'type_service',array('size'=>15,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'type_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_fee'); ?>
		<?php echo $form->textField($model,'application_fee',array('size'=>15,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'application_fee'); ?>
	
		<?php 
		$ms=Currency::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceFee[application_fee_currency_id]',$model->application_fee_currency_id, $mArray);
		?>
		<?php echo $form->error($model,'application_fee_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'initial_fee'); ?>
		<?php echo $form->textField($model,'initial_fee',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'initial_fee'); ?>
	
		<?php 
		$ms=Currency::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceFee[initial_fee_currency_id]',$model->initial_fee_currency_id, $mArray);
		?>
		<?php echo $form->error($model,'initial_fee_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annual_fee'); ?>
		<?php echo $form->textField($model,'annual_fee',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'annual_fee'); ?>
	<?php 
		$ms=Currency::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceFee[annual_fee_currency_id]',$model->annual_fee_currency_id, $mArray);
		?>
		<?php echo $form->error($model,'annual_fee_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_of_licence'); ?>
		<?php echo $form->textField($model,'type_of_licence',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'type_of_licence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'market_segment_id'); 
		$mArray=array();
		$mArray['']='Select';
		if (!empty($model->licence_category_id)){
			$ms=MarketSegment::model()->findAll("licence_category_id=$model->licence_category_id");
			foreach($ms as $m){
				if(!empty($m->licence_sub_category_id))
					$mArray[$m->id]=$m->licenceSubCategory->name.' - '.$m->name;
				else
					$mArray[$m->id]=$m->name;
			}
		}
		echo CHtml::dropDownList('LicenceFee[market_segment_id]',$model->market_segment_id, $mArray);
		echo $form->error($model,'market_segment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annual_fee_is_percentage'); ?>
		<?php echo $form->textField($model,'annual_fee_is_percentage',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'annual_fee_is_percentage'); ?>
	</div>
	<P></P>
	<B>Broadcasting Fees</B>
	<table border='1'  class='detail-view'>
	<tr class='odd'>
	<td></td><td>Public</td><td>Commerial</td><td>Non Commercial</td><td>Community</td>
	</tr>
	<tr class='even'>
	<td>Initial Fee</td><td><?php echo $form->textField($model,'initial_public',array('size'=>10,'maxlength'=>38)); ?></td><td><?php echo $form->textField($model,'initial_commercial',array('size'=>10,'maxlength'=>38)); ?></td><td><?php echo $form->textField($model,'initial_non_commercial',array('size'=>10,'maxlength'=>38)); ?></td><td><?php echo $form->textField($model,'initial_community',array('size'=>10,'maxlength'=>38)); ?></td>
	</tr>
	<tr class='even'>
	<td>Annual Fee</td><td><?php echo $form->textField($model,'annual_public',array('size'=>10,'maxlength'=>38)); ?></td><td><?php echo $form->textField($model,'annual_commercial',array('size'=>10,'maxlength'=>38)); ?></td><td><?php echo $form->textField($model,'annual_non_commercial',array('size'=>10,'maxlength'=>38)); ?></td><td><?php echo $form->textField($model,'annual_community',array('size'=>10,'maxlength'=>38)); ?></td>
	</tr>
	
	</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->