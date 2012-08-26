<tr class="<?php echo $class;?>">
    
    <td valign='top'>
        <?php 
        $service_type=array("Radio_communication_station"=>"Radion communication station",
        							"Ship' Emergency Transmitters"=>"Ship' Emergency Transmitters",
        							"Survival Craft Transmitters"=>"Survival Craft Transmitters",
        							"Other Transmitting Equipment"=>"Other Transmitting Equipment"
        							);
        echo $form->dropdownList($frequencyApplicationEquipment,"[$id]type_service",$service_type,array('empty'=>'Select Service','style'=>'width:200px')); ?>
        <?php echo $form->error($frequencyApplicationEquipment,"type_service"); ?>
    </td>
    
  <td valign='top'>
        <?php 
        $list=array("HF","VHF");
        echo $form->dropdownList($frequencyApplicationEquipment,"[$id]type_radio",$list,array('empty'=>'Select radio','style'=>'width:100px')); ?>
        <?php echo $form->error($frequencyApplicationEquipment,"type_radio"); ?>
    </td>
    
   <td valign='top'>
        <?php echo $form->textField($frequencyApplicationEquipment,"[$id]model",array('size'=>20,'maxlength'=>100)); ?>
        <?php echo $form->error($frequencyApplicationEquipment,"model"); ?>
    </td>
    
    
      <td valign='top'>
        <?php echo $form->textField($frequencyApplicationEquipment,"[$id]power",array('size'=>20,'maxlength'=>100)); ?>
        <?php echo $form->error($frequencyApplicationEquipment,"power"); ?>
    </td>
    
    
   
    <td valign='top'><?php echo CHtml::link(
        'delete',
        '#',
        array(
            'submit'=>'',
            'params'=>array(
                'FrequencyApplicationEquipment[command]'=>'delete',
                'FrequencyApplicationEquipment[id]'=>$id,
                'noValidate'=>true)
            ));?>
    </td>
</tr>