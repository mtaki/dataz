<?php

class MarketSegmentTest extends WebTestCase
{
	public $fixtures=array(
		'marketSegments'=>'MarketSegment',
	);

	public function testShow()
	{
		$this->open('?r=marketSegment/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=marketSegment/create');
	}

	public function testUpdate()
	{
		$this->open('?r=marketSegment/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=marketSegment/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=marketSegment/index');
	}

	public function testAdmin()
	{
		$this->open('?r=marketSegment/admin');
	}
}
