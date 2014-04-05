"use strict";

var gol = require( './gol.js' );

exports.testGol = function( test ) {
	test.expect( 1 );

	test.ok( gol.play(), "The game of life can be played" );

	test.done();
};
