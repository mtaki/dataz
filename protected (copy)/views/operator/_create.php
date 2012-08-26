<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'operator-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>
<table>
<tr><td colspan='2'><fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Contact Details</strong></legend>
<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>NAME</td><td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>ADDRESS</td><td><?php echo $form->textField($model,'address',array('size'=>20,'maxlength'=>50)); ?></td>

  </tr>
  <tr>
    
    <td>TELEPHONE</td><td><?php echo $form->textField($model,'telephone',array('size'=>20,'maxlength'=>50)); ?></td><td>MOBILE</td><td><?php echo $form->textField($model,'telephone',array('size'=>20,'maxlength'=>50)); ?></td>
  </tr>
  <tr>
    <td>FAX</td><td><?php echo $form->textField($model,'fax',array('size'=>20,'maxlength'=>50)); ?></td><td>EMAIL</td><td><?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>50)); ?></td>
  </tr>
	<tr>
    <td>WEBSITE</td><td><?php echo $form->textField($model,'website',array('size'=>20,'maxlength'=>50)); ?></td><td>&nbsp;</td><td>&nbsp;</td>
  </tr>
    <tr>
    <td>CONTACT PERSON 1</td><td><?php echo $form->textField($model,'contact_person',array('size'=>20,'maxlength'=>100)); ?></td><td>CONTACT PERSON 2</td><td><?php echo $form->textField($model,'contact_person_2',array('size'=>20,'maxlength'=>100)); ?></td>
  </tr>

  </table>
  </fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Physical Address</strong></legend>

<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>POST CODE</td><td><?php echo $form->textField($model,'postal_code',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>TOWN</td><td><?php echo $form->textField($model,'town',array('size'=>20,'maxlength'=>50)); ?></td>
  </tr>
  <tr>
    <td>STREET</td><td><?php echo $form->textField($model,'street',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>PLOT NUMBER</td><td><?php echo $form->textField($model,'plot_no',array('size'=>20,'maxlength'=>50)); ?></td>

  </tr>
  </table>
  </fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Business Details</strong></legend>
<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>TYPE/NAME OF BUSINESS</td><td><?php echo $form->textField($model,'type_name_business',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>BUSINESS REGISTRATION NO</td><td><?php echo $form->textField($model,'business_registration_number',array('size'=>20,'maxlength'=>50)); ?></td>

  </tr>
  <tr>
    <td>REGISTRATION PLACE</td><td><?php echo $form->textField($model,'registration_place',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>REGISTRATION DATE</td><td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Operator[registration_date]',
        'value'=>($model->registration_date=='01-01-1970')?'':$model->registration_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>
  </tr>
  <tr>
    <td>TIN NUMBER</td><td><?php echo $form->textField($model,'tin',array('size'=>20,'maxlength'=>50)); ?></td>

    <td>CERTIFICATE OF INCORPORATION</td><td><?php echo $form->textField($model,'certificate_incorporation',array('size'=>20,'maxlength'=>50)); ?></td>
  </tr>
  <tr>
    <td>PLACE OF CERTIFICATION</td><td><?php echo $form->textField($model,'certificate_place',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>DATE OF CERTIFICATION</td><td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Operator[certificate_date]',
        'value'=>($model->certificate_date=='01-01-1970')?'':$model->certificate_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>
  </tr>
  <tr>

    <td>SHARE CAPITAL</td><td><?php echo $form->textField($model,'share_capital',array('size'=>20,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>


</td></tr>
<tr><td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td><td>&nbsp;</td></tr>
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->
