(function( $ ) {
	'use strict';

	/**
	 * Called when the page has loaded.
	 *
	 * @since 2.4.3
	 */
	$(function() {

		// Common: Tags multiple select
		if ( $.fn.select2 ) {
			$( '.aiovg-select2' ).select2({
				language: {
					noResults: function () {
						return aiovg_public.i18n.no_tags_found;
					}
				}
			});
		}
		
	});
})( jQuery );
