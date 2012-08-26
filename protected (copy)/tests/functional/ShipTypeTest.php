<?php

class ShipTypeTest extends WebTestCase
{
	public $fixtures=array(
		'shipTypes'=>'ShipType',
	);

	public function testShow()
	{
		$this->open('?r=shipType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=shipType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=shipType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=shipType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=shipType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=shipType/admin');
	}
}
