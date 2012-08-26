<?php

class AirTimeDestinationTest extends WebTestCase
{
	public $fixtures=array(
		'airTimeDestinations'=>'AirTimeDestination',
	);

	public function testShow()
	{
		$this->open('?r=airTimeDestination/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=airTimeDestination/create');
	}

	public function testUpdate()
	{
		$this->open('?r=airTimeDestination/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=airTimeDestination/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=airTimeDestination/index');
	}

	public function testAdmin()
	{
		$this->open('?r=airTimeDestination/admin');
	}
}
