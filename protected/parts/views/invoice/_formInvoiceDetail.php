<tr class="<?php echo $class;?>">
    <td>
        <?php echo $form->textField($model,"[$id]description",array('size'=>30,'maxlength'=>255)); ?>
        <?php echo $form->error($model,"description"); ?>
 
    </td>
 
    <td valign='top'>
        <?php echo $form->textField($model,"[$id]amount",array('size'=>20,'maxlength'=>30,'style'=>'text-align: right;')); ?>
        <?php echo $form->error($model,"amount"); ?>
    </td>
 
    <td valign='top'><?php echo CHtml::link(
        'delete', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'InvoiceDetail[command]'=>'delete', 
                'InvoiceDetail[id]'=>$id, 
                'noValidate'=>true)
            ));?>
    </td>
</tr>