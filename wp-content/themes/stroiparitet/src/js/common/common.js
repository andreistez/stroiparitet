import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import { ajaxRequest, getTargetElement, setTargetElement } from './global'

let isAjaxWorking = false

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	showModal( '.open-modal' )
	closeModal()
	sendForm()
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

const sendForm = () => {
	const form = document.querySelector( '.modal-form' )

	if( ! form ) return

	form.addEventListener( 'submit', e => {
		e.preventDefault()

		if( isAjaxWorking ) return

		isAjaxWorking = true

		const
			data	= new FormData( form ),
			note	= form.querySelector( '.note' )

		if( note ) note.innerHTML = ''

		form.classList.remove( 'success', 'error' )
		form.classList.add( 'disabled' )
		data.append( 'action', 'sp_ajax_send_form' )

		ajaxRequest( data ).then( res => {
			form.classList.remove( 'disabled' )

			if( res ){
				if( note ) note.innerHTML = res.data.msg

				switch( res.success ){
					case true:
						form.reset()
						form.classList.add( 'success' )
						break

					case false:
						console.error( res.data.msg )
						form.classList.add( 'error' )
						break
				}
			}

			isAjaxWorking = false
		} )
	} )
}