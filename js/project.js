( function( $ ) {
	'use strict';

	$('[data-toggle="tooltip"]').tooltip({
		delay: { "show": 500 }
	});

	/* 메이슨리: 글 보관함에서 작동 */
	if ( $.isFunction( $.fn.masonry ) ) {
		var container = $( '.archive-list' );
		var options = {
			columnWidth: '.archive-item',
			itemSelector: '.archive-item',
			gutter: 10
		}
		/* 메이슨리 시작 */
		container.masonry(options);
		/* 이미지가 로드된 뒤 다시 메이슨리 작동 */
		container.imagesLoaded( function() {
			container.masonry(options);
		});
	}
} )( jQuery );
