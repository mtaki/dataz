<?php
/*$this->breadcrumbs=array(
	'Licence Applications'=>array('admin'),
	'New Licence Application',
);*/

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Manage LicenceApplication', 'url'=>array('admin')),
);
?>

<h1>Licence Application</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php $groups=LicenceGroup::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		$select_group=CHtml::dropDownList('group','', $groupsArray,
				array(
					'ajax' => array(
						'type'=>'POST', //request type
						'url'=>Yii::app()->createUrl('licenceApplication/categoryFilter'), //url to call
						'update'=>'#category', //selector to update
					)
				)
			);

		$select_category=CHtml::dropDownList('category','', array());
	echo "<table>
		<tr><td>Licence Group:</td><td>$select_group</td></tr>
		<tr><td>Licence Type:</td><td>$select_category</td></tr>
		<tr><td>&nbsp;</td><td>".CHtml::submitButton('Continue')."</td></tr>
	</table>";
?>

<?php $this->endWidget(); ?>
