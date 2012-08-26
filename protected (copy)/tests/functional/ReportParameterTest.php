<?php

class ReportParameterTest extends WebTestCase
{
	public $fixtures=array(
		'reportParameters'=>'ReportParameter',
	);

	public function testShow()
	{
		$this->open('?r=reportParameter/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=reportParameter/create');
	}

	public function testUpdate()
	{
		$this->open('?r=reportParameter/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=reportParameter/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=reportParameter/index');
	}

	public function testAdmin()
	{
		$this->open('?r=reportParameter/admin');
	}
}
