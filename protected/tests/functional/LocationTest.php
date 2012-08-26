<?php

class LocationTest extends WebTestCase
{
	public $fixtures=array(
		'locations'=>'Location',
	);

	public function testShow()
	{
		$this->open('?r=location/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=location/create');
	}

	public function testUpdate()
	{
		$this->open('?r=location/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=location/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=location/index');
	}

	public function testAdmin()
	{
		$this->open('?r=location/admin');
	}
}
