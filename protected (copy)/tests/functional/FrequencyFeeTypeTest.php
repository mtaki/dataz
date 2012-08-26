<?php

class FrequencyFeeTypeTest extends WebTestCase
{
	public $fixtures=array(
		'frequencyFeeTypes'=>'FrequencyFeeType',
	);

	public function testShow()
	{
		$this->open('?r=frequencyFeeType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=frequencyFeeType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=frequencyFeeType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=frequencyFeeType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=frequencyFeeType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=frequencyFeeType/admin');
	}
}
