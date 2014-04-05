<?php
require_once dirname( __FILE__ ) . '/simpletest/autorun.php';

class GoLTest extends UnitTestCase {
	function testGameOfLifeCanBePlayed() {
		$this->assertTrue( GoL::play() );
	}
}

class GoL {
	static function play() {
		return false;
	}
}
