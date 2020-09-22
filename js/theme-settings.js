  
( function( $ ) {

	var Page = (function() {

		var $container = $( '#primary' ),
		$bookBlock = $( '#bb-bookblock' ),
		$items = $bookBlock.children(),
		itemsCount = $items.length,
		current = 0,
		bb = $( '#bb-bookblock' ).bookblock( {
			speed : 800,
			perspective : 2000,
			shadowSides	: 0.8,
			shadowFlip	: 0.4,
			onEndFlip : function(old, page, isLimit) {
				
				current = page;
				// update TOC current
				updateTOC();
				// updateNavigation
				updateNavigation( isLimit );
				// initialize jScrollPane on the content div for the new item
				setJSP( 'init' );
				// destroy jScrollPane on the content div for the old item
				setJSP( 'destroy', old );

			}
		} ),
		$navNext = $( '#bb-nav-next' ),
		$navPrev = $( '#bb-nav-prev' ).hide(),
		$menuItems = $container.find( 'ul.menu-toc > li' ),
		$tblcontents = $( '#tblcontents' ),
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
		supportTransitions = Modernizr.csstransitions;

		function init() {

		// initialize jScrollPane on the content div of the first item
		setJSP( 'init' );
		initEvents();

	}
	
	function initEvents() {

		// add navigation events
		$navNext.on( 'click', function() {
			bb.next();
			return false;
		} );

		$navPrev.on( 'click', function() {
			bb.prev();
			return false;
		} );
		
		// add swipe events
		$items.on( {
			'swipeleft'		: function( event ) {
				if( $container.data( 'opened' ) ) {
					return false;
				}
				bb.next();
				return false;
			},
			'swiperight'	: function( event ) {
				if( $container.data( 'opened' ) ) {
					return false;
				}
				bb.prev();
				return false;
			}
		} );

		// show table of contents
		$tblcontents.on( 'click', toggleTOC );

		// click a menu item
		$menuItems.on( 'click', function() {

			var $el = $( this ),
			idx = $el.index(),
			jump = function() {
				bb.jump( idx + 1 );
			};
			
			current !== idx ? closeTOC( jump ) : closeTOC();

			return false;
			
		} );

		// reinit jScrollPane on window resize
		$( window ).on( 'debouncedresize', function() {
			// reinitialise jScrollPane on the content div
			setJSP( 'reinit' );
		} );

	}

	function setJSP( action, idx ) {
		
		var idx = idx === undefined ? current : idx,
		$content = $items.eq( idx ).find( 'div.content' ),
		apiJSP = $content.data( 'jsp' );
		
		if( action === 'init' && apiJSP === undefined ) {
			$content.jScrollPane({verticalGutter : 0, hideFocus : true });
		}
		else if( action === 'reinit' && apiJSP !== undefined ) {
			apiJSP.reinitialise();
		}
		else if( action === 'destroy' && apiJSP !== undefined ) {
			apiJSP.destroy();
		}

	}

	function updateTOC() {
		$menuItems.removeClass( 'menu-toc-current' ).eq( current ).addClass( 'menu-toc-current' );
	}

	function updateNavigation( isLastPage ) {
		
		if( current === 0 ) {
			$navNext.show();
			$navPrev.hide();

			$navNext.addClass("animate-surf-hint");
			$navPrev.removeClass("animate-surf-hint");



		}
		else if( isLastPage ) {
			$navNext.hide();
			$navPrev.show();

			$navNext.removeClass("animate-surf-hint");
			$navPrev.addClass("animate-surf-hint");
		}
		else {
			$navNext.show();
			$navPrev.show();

			$navNext.removeClass("animate-surf-hint");
			$navPrev.removeClass("animate-surf-hint");
		}

	}

	function toggleTOC() {
		var opened = $container.data( 'opened' );
		opened ? closeTOC() : openTOC();
	}

	function openTOC() {
		$navNext.hide();
		$navPrev.hide();
		$container.addClass( 'slideRight' ).data( 'opened', true );
	}

	function closeTOC( callback ) {

		updateNavigation( current === itemsCount - 1 );
		$container.removeClass( 'slideRight' ).data( 'opened', false );
		if( callback ) {
			if( supportTransitions ) {
				$container.on( transEndEventName, function() {
					$( this ).off( transEndEventName );
					callback.call();
				} );
			}
			else {
				callback.call();
			}
		}

	}

	return { init : init };

})();


Page.init();



// Other


let navItems = [];

let links = document.getElementsByClassName("bb-item");

for(let i = 0; i < links.length; i++){
	navItems.push(links[i].id);
}

console.log(navItems);



let secName = [];

navItems.forEach(function(i) {
	let sectionId = ('#'+i.toString());
	let sectionName = sectionId.substring(1);

	secName.push(sectionName);

	console.log(sectionId);

	jQuery(sectionId).find('.btn_readmore').addClass("btn_read_"+sectionName);
	jQuery(sectionId).find('#readmore-close').addClass("read_close_"+sectionName);
	jQuery(sectionId).find('.block_readmore').addClass("block_readmore_"+sectionName);
	jQuery(sectionId).find('.block_readmore_inner').addClass("block_readmore_inner_"+sectionName);
});

console.log(secName);

secName.forEach(function(q) {

	console.log(q);

	jQuery(".btn_read_"+q).click(function(evt){
		evt.preventDefault();
		let readWrappersInnerH = jQuery(".block_readmore_inner_"+q).innerHeight();
		jQuery(".block_readmore_"+q).css('height', readWrappersInnerH);

		jQuery(".arrow").hide(500);

		console.log("Opened in #"+q);
	});

	jQuery(".read_close_"+q).click(function(evt){
		evt.preventDefault();
		jQuery(".block_readmore_"+q).css('height',0);


		jQuery(".arrow").show(500);
		console.log("Closed in #"+q);
	});

});


function readmore_effect(){

}

function readmore_close(){

}


})(jQuery);