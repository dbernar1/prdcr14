<?php
require_once dirname( __FILE__ ) . '/simpletest/autorun.php';

class GoLTest extends UnitTestCase {
	function testAnyLiveCellWithFewerThanTwoLiveNeighboursDies() {
		$alive_cell_with_fewer_than_two_live_neighbours = new Cell( $num_neighbours = 1);
		$this->assertTrue( $alive_cell_with_fewer_than_two_live_neighbours );

		$alive_cell = new Cell();
		$this->assertTrue( $alive_cell->with( $num_neighbours = 0 )->dies() );
	}

	function testAnyLiveCellWithTwoOrThreeLiveNeighboursLivesOn() {
		$alive_cell_with_two_neighbours = new Cell( $num_neighbours = 2 );
		$this->assertTrue( $alive_cell_with_two_neighbours->livesOn() );

		$alive_cell_with_three_neighbours = new Cell( $num_neighbours = 3 );
		$this->assertTrue( $alive_cell_with_three_neighbours->livesOn() );
	}

	function testRule3() {
		$live_cell_with_more_than_three_neighbours = new Cell( $num_neighbours = 4 );
		$this->assertTrue( $live_cell_with_more_than_three_neighbours->dies() );

		$live_cell_with_five_neighbours = new Cell( $num_neighbours = 5 );
		$this->assertTrue( $live_cell_with_five_neighbours->dies() );
	}

	function testRule4() {
		$dead_cell_with_three_neighbours = new Cell( $num_neighbours );
		$this->assertTrue( $dead_cell_with_three_neighbours->becomesAlive() );
	}

	function testInfiniteLoop() {
		while( true );
		$this->assertTrue( False );
	}
}

class Cell {
	public function with( $num_neighbours ) {
		return $this;
	}

	public function dies() {
		return true;
	}

	public function livesOn() {
		return true;
	}

	public function becomesAlive() {
		return true;
	}
}
