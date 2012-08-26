<?php

class DistrictTest extends WebTestCase
{
	public $fixtures=array(
		'districts'=>'District',
	);

	public function testShow()
	{
		$this->open('?r=district/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=district/create');
	}

	public function testUpdate()
	{
		$this->open('?r=district/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=district/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=district/index');
	}

	public function testAdmin()
	{
		$this->open('?r=district/admin');
	}
}
