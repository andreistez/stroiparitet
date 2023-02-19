import Swiper, { Navigation } from 'swiper'
import { decodeEntities } from '@wordpress/html-entities'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import { getTargetElement, setTargetElement } from '../common/global'

let isAjaxWorking = false

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	initNewsSlider()
	getPostFromApi()
} )

const initNewsSlider = () => {
	const slider = document.querySelector( '.news-inner' )

	if( ! slider ) return

	const
		prev	= slider.querySelector( '.news-nav-prev' ),
		next	= slider.querySelector( '.news-nav-next' )

	new Swiper( '.news-inner', {
		loop		: false,
		modules		: [Navigation],
		navigation	: {
			prevEl	: prev,
			nextEl	: next
		},
		breakpoints	: {
			320: {
				slidesPerView: 1,
				spaceBetween: 10
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			992: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			1366: {
				slidesPerView: 3,
				spaceBetween: 46
			}
		}
	} )
}

const getPostFromApi = () => {
	const
		buttons	= document.querySelectorAll( '.article-button .btn' ),
		popup	= document.querySelector( '.article-popup' )

	if( ! buttons.length || ! popup ) return

	buttons.forEach( button => {
		button.addEventListener( 'click', e => {
			e.preventDefault()

			if( isAjaxWorking ) return

			isAjaxWorking = true

			button.closest( '.article').classList.add( 'disabled' )
			getWpPost( button.dataset.id )
				.then( json => {
					button.closest( '.article').classList.remove( 'disabled' )

					const
						postTitle	= decodeEntities( json.title.rendered ),
						postContent	= decodeEntities( json.content.rendered ),
						postThumb	= json.featured_media

					getPostThumb( postThumb ).then( json => {
						const src = json.guid.rendered

						popup.querySelector( '.article-popup-body' ).innerHTML = `
							<div class="article-popup-thumb display-flex justify-center">
								<img src="${ src }" alt="${ postTitle }" />
							</div>
							<h2 class="article-popup-title">${ postTitle }</h2>
							${ postContent }
						`
						setTargetElement( '#article-popup' )
						disableBodyScroll( getTargetElement(), { reserveScrollBarGap: true } )
						popup.classList.remove( 'hidden' )
						closePopup()
						isAjaxWorking = false
					} )
				} )
		} )
	} )
}

const getWpPost = async postId => {
	if( ! postId.trim() ) return

	let response

	try {
		response = await fetch( `/wp-json/wp/v2/posts/${ postId }` )
	}	catch( err ){
		isAjaxWorking = false
		throw new Error( 'Error: ' + err.message )
	}

	return await response.json()
}

const getPostThumb = async postThumbId => {
	if( ! postThumbId ) return

	let response

	try {
		response = await fetch( `/wp-json/wp/v2/media/${ postThumbId }` )
	}	catch( err ){
		isAjaxWorking = false
		throw new Error( 'Error: ' + err.message )
	}

	return await response.json()
}

const closePopup = () => {
	const popup = document.querySelector( '#article-popup' )

	if( ! popup ) return

	popup.addEventListener( 'click', e => {
		e.stopPropagation()

		const target = e.target

		if(
			target.className &&
			( target.classList.contains( 'article-popup' ) ||
			target.classList.contains( 'article-popup-close' ) )
		){
			enableBodyScroll( getTargetElement() )
			popup.classList.add( 'hidden' )
		}
	} )
}