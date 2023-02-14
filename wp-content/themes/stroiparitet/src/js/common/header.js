import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import {
	WINDOW_WIDTH_XL,
	getWindowWidth,
	scrollToElem,
	setTargetElement,
	getTargetElement
} from './global'

document.addEventListener( 'DOMContentLoaded', () => {
	'use strict'

	toggleMobileMenu()
	scrollFromHeaderMenu()

	if( window.scrollY > 0 ) document.querySelector( '.header' ).classList.add( 'scrolled' )
} )

let header,
	isMenuOpened = false

const toggleMobileMenu = () => {
	header = document.querySelector( '.header' )
	const menuBtn = header.querySelector( '.menu-btn' )

	setTargetElement( '#header-menu-inner' )

	if( ! header || ! menuBtn ) return

	menuBtn.addEventListener( 'click', menuBtnClick )
}

const menuBtnClick = () => {
	if( ! header.classList.contains( 'active' ) ){
		disableBodyScroll( getTargetElement(), { reserveScrollBarGap: true } )
		header.classList.add( 'active' )
		isMenuOpened = true
	}	else {
		header.classList.remove( 'active' )
		enableBodyScroll( getTargetElement() )
		isMenuOpened = false
	}
}

const scrollFromHeaderMenu = () => {
	const menuItems = document.querySelectorAll( '.header-menu .menu-item a' )

	if( ! menuItems.length ) return

	menuItems.forEach( link => {
		link.addEventListener( 'click', e => {
			e.preventDefault()

			const urlLastPart = link.href.substring( link.href.lastIndexOf( '/' ) + 1 )

			// If this is an anchor.
			if( urlLastPart.includes( '#' ) ){
				// Scroll if currently this is Home or go home and to anchor.
				if( document.body.classList.contains( 'home' ) ) scrollToElem( urlLastPart )
				else location.href = `/${ urlLastPart }`
			}	else {
				// If simple URL - go ahead.
				location.href = link.href
			}

			if( isMenuOpened ) menuBtnClick()
		} )
	} )
}

window.addEventListener( 'scroll', () => {
	const scrolled	= window.scrollY
	header = document.querySelector( '.header' )

	if( ! header ) return

	if( scrolled ){
		if( ! header.classList.contains( 'scrolled' ) ) header.classList.add( 'scrolled' )
	}	else {
		if( header.classList.contains( 'scrolled' ) ) header.classList.remove( 'scrolled' )
	}
} )

window.addEventListener( 'resize', () => {
	if( getWindowWidth() >= WINDOW_WIDTH_XL ){
		if( isMenuOpened ) enableBodyScroll( getTargetElement() )
	}	else {
		if( isMenuOpened ) disableBodyScroll( getTargetElement(), { reserveScrollBarGap: true } )
	}
} )