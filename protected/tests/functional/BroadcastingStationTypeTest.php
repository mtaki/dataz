<?php

class BroadcastingStationTypeTest extends WebTestCase
{
	public $fixtures=array(
		'broadcastingStationTypes'=>'BroadcastingStationType',
	);

	public function testShow()
	{
		$this->open('?r=broadcastingStationType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=broadcastingStationType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=broadcastingStationType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=broadcastingStationType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=broadcastingStationType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=broadcastingStationType/admin');
	}
}
