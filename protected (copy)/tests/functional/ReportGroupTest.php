<?php

class ReportGroupTest extends WebTestCase
{
	public $fixtures=array(
		'reportGroups'=>'ReportGroup',
	);

	public function testShow()
	{
		$this->open('?r=reportGroup/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=reportGroup/create');
	}

	public function testUpdate()
	{
		$this->open('?r=reportGroup/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=reportGroup/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=reportGroup/index');
	}

	public function testAdmin()
	{
		$this->open('?r=reportGroup/admin');
	}
}
