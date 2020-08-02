( function( $ ) {


    /******************************
	 Other settings
	 ******************************/
			var Page = (function() {
				
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 1000,
							shadowSides : 0.8,
							shadowFlip : 0.4
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// add swipe events
						$slides.on( {
							'swipeleft' : function( event ) {
								config.$bookBlock.bookblock( 'next' );
								return false;
							},
							'swiperight' : function( event ) {
								config.$bookBlock.bookblock( 'prev' );
								return false;
							}
						} );

						// add keyboard events
						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
									break;
							}
						} );
					};

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