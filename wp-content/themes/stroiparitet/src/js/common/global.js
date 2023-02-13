export const WINDOW_WIDTH_XL = 1200

let windowWidth	= window.innerWidth

/**
 * Scroll document to top.
 */
export const scrollToTop = () => {
	window.scroll( {
		top: -window.scrollY,
		behavior: 'smooth'
	} )
}

/**
 * Scroll document to specific element.
 *
 * @param {String|Object} elementSelector	DOM element selector to scroll to.
 * @param ignoreHeaderHeight
 */
export const scrollToElem = ( elementSelector, ignoreHeaderHeight = false ) => {
	let bodyRect = document.body.getBoundingClientRect(),
		elemRect,
		element,
		offset,
		header

	switch( typeof elementSelector ){
		case 'string':
			element = document.querySelector( elementSelector )

			if( element ){
				elemRect	= element.getBoundingClientRect()
				offset		= elemRect.top - bodyRect.top
			}
			break

		case 'object':
			if( elementSelector ){
				elemRect	= elementSelector.getBoundingClientRect()
				offset		= elemRect.top - bodyRect.top
			}
			break

		default:
			offset = elementSelector
			break
	}

	if( ! offset ) return

	// If need to check for header hight.
	if( ! ignoreHeaderHeight ){
		header = document.querySelector( '.header' )

		if( header && getWindowWidth() < WINDOW_WIDTH_XL )
			offset -= header.clientHeight
	}

	window.scroll( {
		top		: offset,
		behavior: 'smooth'
	} )
}

/**
 * Get window inner width.
 *
 * @returns {Number}	windowWidth	Window inner width value.
 */
export const getWindowWidth = () => windowWidth

/**
 * Window on resize event.
 */
window.addEventListener( 'resize', () => {
	windowWidth = window.innerWidth
} )