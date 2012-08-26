<?php
$resource_type=$a->numbering_resource_type_id;
if ($resource_type == 1)//PSTN
{
	$this->renderPartial('epstn', array('a'=>$a,));
} 
elseif($resource_type == 2)//MNDC
{
	$this->renderPartial('emndc', array('a'=>$a,));
}

elseif($resource_type == 3)//MNIC
{
	$this->renderPartial('emnic', array('a'=>$a,));
}

elseif($resource_type == 4)//DNIC
{
	$this->renderPartial('ednic', array('a'=>$a,));
}

elseif($resource_type == 5)//SPC
{
	$this->renderPartial('espc', array('a'=>$a,));
}

elseif($resource_type == 6)//SIM HEADER
{
	$this->renderPartial('esim', array('a'=>$a,));
}

elseif($resource_type == 7)//NETWORK IDENTIFICATION NODE CODES
{
	$this->renderPartial('enetwork', array('a'=>$a,));
}

elseif($resource_type == 8)//CARRIER AND PRE-SELECTION CODES
{
	$this->renderPartial('ecarrier', array('a'=>$a,));
}

elseif($resource_type == 9)//SPECIAL/PREMIUM RATE CODES
{
	$this->renderPartial('especial', array('a'=>$a,));
}

elseif($resource_type == 10)//SHORT CODES
{
	$this->renderPartial('eshort', array('a'=>$a,));
}
?>