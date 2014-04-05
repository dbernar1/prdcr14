<?php

require dirname( __FILE__ ) . '/GoL.php';

class GoLTest extends PHPUnit_Framework_TestCase {
	public function testCanBePlayed() {
		$this->assertTrue( GoL::play() );
	}
}
