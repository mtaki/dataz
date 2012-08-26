<?php

class FrequencyTypeTest extends WebTestCase
{
	public $fixtures=array(
		'frequencyTypes'=>'FrequencyType',
	);

	public function testShow()
	{
		$this->open('?r=frequencyType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=frequencyType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=frequencyType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=frequencyType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=frequencyType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=frequencyType/admin');
	}
}
