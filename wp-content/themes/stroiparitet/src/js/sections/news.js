import Swiper, { Navigation } from 'swiper'

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	initNewsSlider()
} )

const initNewsSlider = () => {
	const slider = document.querySelector( '.news-inner' )

	if( ! slider ) return

	new Swiper( '.news-inner', {
		loop		: false,
		modules		: [Navigation],
	} )
}