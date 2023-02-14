import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import { getTargetElement, setTargetElement } from './global'

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	showModal( '.open-modal' )
} )

const showModal = selector => {
	const
		modal	= document.querySelector( '#modal' ),
		buttons	= document.querySelectorAll( selector )

	if( ! modal || ! buttons.length ) return

	setTargetElement( '#modal' )

	buttons.forEach( button => {
		button.addEventListener( 'click', () => {
			disableBodyScroll( getTargetElement(), { reserveScrollBarGap: true } )
			modal.classList.remove( 'hidden' )
			closeModal()
		} )
	} )
}

const closeModal = () => {
	const modal = document.querySelector( '#modal' )

	if( ! modal ) return

	modal.addEventListener( 'click', e => {
		e.stopPropagation()

		const target = e.target

		if(
			target.className &&
			( target.classList.contains( 'modal' ) ||
			target.classList.contains( 'modal-close' ) )
		){
			enableBodyScroll( getTargetElement() )
			modal.classList.add( 'hidden' )
		}
	} )
}