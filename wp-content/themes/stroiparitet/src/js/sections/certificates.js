import Swiper, { Pagination } from 'swiper'

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	initCertificatesSlider()
} )

const initCertificatesSlider = () => {
	const slider = document.querySelector( '.certificates-inner' )

	if( ! slider ) return

	new Swiper( '.certificates-inner', {
		loop		: false,
		modules		: [Pagination],
		pagination	: {
			el			: '.certificates-pagination',
			clickable	: true
		},
		breakpoints	: {
			320: {
				slidesPerView: 1,
				spaceBetween: 10
			},
			576: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			992: {
				slidesPerView: 3,
				spaceBetween: 32
			},
			1280: {
				slidesPerView: 4,
				spaceBetween: 32
			}
		}
	} )
}