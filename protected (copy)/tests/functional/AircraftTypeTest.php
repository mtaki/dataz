<?php

class AircraftTypeTest extends WebTestCase
{
	public $fixtures=array(
		'aircraftTypes'=>'AircraftType',
	);

	public function testShow()
	{
		$this->open('?r=aircraftType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=aircraftType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=aircraftType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=aircraftType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=aircraftType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=aircraftType/admin');
	}
}
