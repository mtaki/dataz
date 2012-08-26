<?php 
if ($model->licenceCategory->id >= 1 && $model->licenceCategory->id <=4)
	$this->renderPartial('applicationCommunication/detailCommunication', array('id'=>$model->id));
elseif ($model->licenceCategory->id >= 5 && $model->licenceCategory->id <=10)
	$this->renderPartial('applicationCourier/detailCourier', array('id'=>$model->id));
elseif ($model->licenceCategory->id == 12)
	$this->renderPartial('applicationClass/detailInstallation', array('id'=>$model->id));
elseif ($model->licenceCategory->id == 13)
	$this->renderPartial('applicationClass/detailImportation', array('id'=>$model->id));
elseif ($model->licenceCategory->id == 14)
	$this->renderPartial('applicationClass/detailDistribution', array('id'=>$model->id));
elseif ($model->licenceCategory->id == 15)
	$this->renderPartial('applicationClass/detailSelling', array('id'=>$model->id));
?>
