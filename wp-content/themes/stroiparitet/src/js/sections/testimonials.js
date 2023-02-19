import Swiper, { Pagination } from 'swiper'

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	initTestimonialsSlider()
} )

const initTestimonialsSlider = () => {
	const slider = document.querySelector( '.testimonials-inner' )

	if( ! slider ) return

	new Swiper( '.testimonials-inner', {
		loop		: false,
		modules		: [Pagination],
		pagination	: {
			el			: '.testimonials-pagination',
			clickable	: true
		}
	} )
}