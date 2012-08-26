<?php

class FrequencyStationTypeTest extends WebTestCase
{
	public $fixtures=array(
		'frequencyStationTypes'=>'FrequencyStationType',
	);

	public function testShow()
	{
		$this->open('?r=frequencyStationType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=frequencyStationType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=frequencyStationType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=frequencyStationType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=frequencyStationType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=frequencyStationType/admin');
	}
}
