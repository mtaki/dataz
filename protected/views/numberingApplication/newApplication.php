<?php
$resource_type=$a->numbering_resource_type_id;
if ($resource_type == 1)//PSTN
{
	$this->renderPartial('pstn', array('a'=>$a,'c'=>$c,));
} 
elseif($resource_type == 2)//MNDC
{
	$this->renderPartial('mndc', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 3)//MNIC
{
	$this->renderPartial('mnic', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 4)//DNIC
{
	$this->renderPartial('dnic', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 5)//SPC
{
	$this->renderPartial('spc', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 6)//SIM HEADER
{
	$this->renderPartial('sim', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 7)//NETWORK IDENTIFICATION NODE CODES
{
	$this->renderPartial('network', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 8)//CARRIER AND PRE-SELECTION CODES
{
	$this->renderPartial('carrier', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 9)//SPECIAL/PREMIUM RATE CODES
{
	$this->renderPartial('special', array('a'=>$a,'c'=>$c,));
}

elseif($resource_type == 10)//SHORT CODES
{
	$this->renderPartial('short', array('a'=>$a,'c'=>$c,));
}
elseif($resource_type == 11)//ISPC
{
	$this->renderPartial('ispc', array('a'=>$a,'c'=>$c,));
}
elseif($resource_type == 12)//NCC
{
	$this->renderPartial('ncc', array('a'=>$a,'c'=>$c,));
}
elseif($resource_type == 13)//COORPORATE
{
	$this->renderPartial('coorporate', array('a'=>$a,'c'=>$c,));
}
elseif($resource_type == 14)//PREMIUM
{
	$this->renderPartial('premium', array('a'=>$a,'c'=>$c,));
}
?>