<tr class="<?php echo $class;?>">
    <td>
	    <?php echo $form->textField($model,"[$id]frequency",array('size'=>10,'maxlength'=>50)); ?>
        
        <?php //echo $form->error($model,"frequency"); ?>
 
    </td>
 	<td>
 		  <?php 
		$fArray=array();
		$fArray['']='Select';
		$frequencyUnits=FrequencyUnit::model()->findAll();
		foreach($frequencyUnits as $frequencyUnit){
			$fArray[$frequencyUnit->id]=$frequencyUnit->name;
		}
		echo CHtml::dropDownList("FrequencyStationFrequency[$id][frequency_unit]",$model->frequency_unit, $fArray);
?>
        <?php //echo $form->error($model,"equipment_type"); ?>
 
    </td>
   
    
 
    <td valign='top'><?php echo CHtml::link(
        'delete', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'FrequencyStationFrequency[command]'=>'delete', 
                'FrequencyStationFrequency[id]'=>$id, 
                'noValidate'=>true)
            ));?>
    </td>
</tr>