<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>
<table align='center'>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
		<table>
		<tr bgcolor="#1d406b"><th align="left" colspan="2"><font color="white">Please Login...</font></th></tr>
	
		<tr bgcolor="#dAe4f0"><td>Username</td><td align='left'>
		<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?></td></tr>
		<tr bgcolor="#dAe4f0"><td>Password</td><td align='left'>
		<?php echo $form->passwordField($model,'password',array('size'=>15,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password'); ?></td></tr>
		<tr bgcolor="#1d406b"><td align="right" colspan="2"><?php echo CHtml::submitButton('Login'); ?></td></tr>
		</table>
		</td>	
	</tr>
</table>

<?php $this->endWidget(); ?>
