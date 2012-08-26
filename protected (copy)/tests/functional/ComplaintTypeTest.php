<?php

class ComplaintTypeTest extends WebTestCase
{
	public $fixtures=array(
		'complaintTypes'=>'ComplaintType',
	);

	public function testShow()
	{
		$this->open('?r=complaintType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=complaintType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=complaintType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=complaintType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=complaintType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=complaintType/admin');
	}
}
