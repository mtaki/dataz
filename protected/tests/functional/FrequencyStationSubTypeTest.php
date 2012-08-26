<?php

class FrequencyStationSubTypeTest extends WebTestCase
{
	public $fixtures=array(
		'frequencyStationSubTypes'=>'FrequencyStationSubType',
	);

	public function testShow()
	{
		$this->open('?r=frequencyStationSubType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=frequencyStationSubType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=frequencyStationSubType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=frequencyStationSubType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=frequencyStationSubType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=frequencyStationSubType/admin');
	}
}
