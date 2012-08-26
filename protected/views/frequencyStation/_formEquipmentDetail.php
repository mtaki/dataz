<tr class="<?php echo $class;?>">
    <td>
    <?php 
	
		$currencyArray=array();
		$currencyArray['']='Select';
		$currencyArray['HF']='HF';
		$currencyArray['VHF']='VHF';
		echo CHtml::dropDownList("FrequencyStationEquipment[$id][frequency_type]",$model->frequency_type, $currencyArray);
?>
        <?php //echo $form->error($model,"frequency_type"); ?>
 
    </td>
 	<td>
 		  <?php 
		$currencyArray=array();
		$currencyArray['']='Select';
		$currencyArray['Fixed']='Fixed';
		$currencyArray['Portable']='Portable';
		$currencyArray['Repeater']='Repeater';
		$currencyArray['Mobile']='Mobile';
		echo CHtml::dropDownList("FrequencyStationEquipment[$id][equipment_type]",$model->equipment_type, $currencyArray);
?>
        <?php //echo $form->error($model,"equipment_type"); ?>
 
    </td>
    <td>
        <?php echo $form->textField($model,"[$id]make",array('size'=>10,'maxlength'=>50)); ?>
        <?php //echo $form->error($model,"make"); ?>
 
    </td>
    <td>
        <?php echo $form->textField($model,"[$id]manufacturer",array('size'=>10,'maxlength'=>50)); ?>
        <?php //echo $form->error($model,"manufacturer"); ?>
 
    </td>
    
 
    <td valign='top'><?php echo CHtml::link(
        'delete', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'FrequencyStationEquipment[command]'=>'delete', 
                'FrequencyStationEquipment[id]'=>$id, 
                'noValidate'=>true)
            ));?>
    </td>
</tr>