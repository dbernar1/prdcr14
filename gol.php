<?php
require_once dirname( __FILE__ ) . '/simpletest/autorun.php';

class GoLTest extends UnitTestCase {

	function setup() {
		$this->universe = new Universe;
	}

	function testUniverseCanEvolve() {
		$this->assertTrue( $this->universe->evolve() );
	}

	function testUniverseWithOneAliveCellHasNoAliveCellsInNextGeneration() {
		$universe_with_one_alive_cell = new Universe();
		$universe_with_one_alive_cell->add( new Cell( 5, 5 ) );

		$this->assertEqual( 0, $universe_with_one_alive_cell->evolve()->numAliveCells() );
	}

	function testUniverseWithVerticalBlinkerOscillatesToHorizontalBlinker() {
		$universe_with_vertical_blinker = new Universe();

		$universe_with_vertical_blinker->add( $vertical_blinker );
		$horizontal_blinker = array();

		$this->assertTrue( $universe_with_vertical_blinker->evolve()->containsCells( $horizontal_blinker ) );
	}

	function testUniverseCanBeProvidedAliveCells() {
		$cell = new Cell( 1, 2 );
		$this->universe->add( $cell );

		$this->assertTrue( $this->universe->containsCell( $cell ) );
	}

	function testUniverseHasOnlyTheCellsThatItDoesHave() {
		$not_a_live_cell = new Cell( 1, 1 );

		$this->assertFalse( $this->universe->containsCell( $not_a_live_cell ) );
	}

	function testUniverseCanBeCreated() {
		$this->assertEqual( 'Universe', get_class( $this->universe ) );
	}

}

class Universe {

	private $alive_cells = array();
	function add( $cell ) {
		$this->alive_cells[] = $cell;
	}

	function numAliveCells() {
		return count( $this->alive_cells );
	}

	function containsCell( $cell ) {
		return in_array( $cell, $this->alive_cells );
	}
	
	function evolve() {
		$this->alive_cells = array();
		return $this;
	}
}

class Cell {}
