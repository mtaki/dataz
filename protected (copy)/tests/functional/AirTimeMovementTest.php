<?php

class AirTimeMovementTest extends WebTestCase
{
	public $fixtures=array(
		'airTimeMovements'=>'AirTimeMovement',
	);

	public function testShow()
	{
		$this->open('?r=airTimeMovement/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=airTimeMovement/create');
	}

	public function testUpdate()
	{
		$this->open('?r=airTimeMovement/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=airTimeMovement/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=airTimeMovement/index');
	}

	public function testAdmin()
	{
		$this->open('?r=airTimeMovement/admin');
	}
}
