<?php

class NumberingResourceTypeTest extends WebTestCase
{
	public $fixtures=array(
		'numberingResourceTypes'=>'NumberingResourceType',
	);

	public function testShow()
	{
		$this->open('?r=numberingResourceType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=numberingResourceType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=numberingResourceType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=numberingResourceType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=numberingResourceType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=numberingResourceType/admin');
	}
}
