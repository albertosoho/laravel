$(document).ready(function(){
	$('.vlink').mouseenter(function(){
		$('.videover').slideDown(200);
		$('.preguntaover').slideUp(200);
	});

	$('.plink').mouseenter(function(e){
		$('.preguntaover').slideDown(200);
		$('.videover').slideUp(200);
	});

	$('nav.menu li a:contains("inicio"), nav.menu li a:contains("memeteca")').mouseenter(function(){
		$('.preguntaover').slideUp(200);
		$('.videover').slideUp(200);
	});

	$('nav.mobil .button').click(function(e){
		e.stopPropagation();
		$('nav.mobil ul').slideToggle(200);
	});

	$(document).on('click', 'body', function(){
		$('nav.mobil ul').slideUp(200);
	});

	$('.preguntaover, .videover').mouseleave(function(event){
		$('.preguntaover').slideUp(200);
		$('.videover').slideUp(200);
	});
	$(window).load(function(){
		body = $('body').width();
		if(body < 768){
			$('.wrapper-container').width(body).css('overflow-x', 'hidden');
		}
	});

	var Page = (function() {

		var $navArrows = $( '#nav-arrows' ),
			$nav = $( '#nav-dots > span' ),
			slitslider = $( '#slider' ).slitslider( {
				onBeforeChange : function( slide, pos ) {
					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );
				}
			}),

			init = function() {
				initEvents();
			},
			initEvents = function() {
				// add navigation events
				$navArrows.children( ':last' ).on( 'click', function() {
					slitslider.next();
					return false;
				});
				$navArrows.children( ':first' ).on( 'click', function() {
					slitslider.previous();
					return false;
				});
				$nav.each( function( i ) {
					$( this ).on( 'click', function( event ) {
						var $dot = $( this );

						if( !slitslider.isActive() ) {
							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						}
						slitslider.jump( i + 1 );
						return false;
					});
				});
			};
			return { init : init }
	})();

	Page.init();
});
var _ = 'bWFpbHRvOmNvbnRhY3RvQGV1Z2VuaW9kZXJiZXoudHY=xxxDRBZxxxaHR0cDovL2FtYm11bHRpbWVkaWEuY29tLm14xxxDRBZxxxQXVnIDE0LCAyMDE0IDA2OjAwOjAwxxxDRBZxxxMzgsMzgsNDAsNDAsMzcsMzksMzcsMzksNjYsNjU=xxxDRBZxxxQXVnIDE4LCAyMDE0IDE0OjAwOjAw'.split(_b.d('eHh4RFJCWnh4eA=='));
var uA = {
	userAgent: window.navigator.userAgent,
	iPad: function () {
		if (uA.userAgent.match(/iPad/gi)) return true;
		return false;
	},
	mobile: function () {
		if (uA.userAgent.match(/iPhone|iPod|Android|mobile/gi)) return true;
		return false;
	}
}
var utils = {
	round: function(n) { return Math.round(n * 100) / 100; },
	isOfPercent: function (e, p) { return (e / 100) * p; },
	isPrecentOf: function (e, ex) { return (ex / e) * 100; },
	is100pOf: function (e, p) { return (e * 100) / p; },
	proporcional: function (l1, l2, nl) { return utils.round((l2 / l1) * nl); },
};
var nav = {
	originalPos: function () {
		var thisli = $('#menu li .active');
		var hoverli = $('#hoverlimenu');

		hoverli.css({
			'left': thisli.position().left,
			'width': thisli.width()
		});
	},
	hoverPos: function () {
		var thisli = $(this);
		var hoverli = $('#hoverlimenu');

		hoverli.css({
			'left': thisli.position().left,
			'width': thisli.width()
		});
	},
	events: function () {
		$('#menu li').hover(nav.hoverPos, nav.originalPos);

		$('.iconMenu').click(function () {
			if ( $('#menu').css('display') == "none" ) {
				$('#menu').show();
			} else {
				$('#menu').hide();
			}
		});
	},
	init: function () {
		nav.originalPos();
		nav.events();

		var waitToPos = setTimeout(nav.originalPos, 5 * 1000);
	}
}
var index = {
	events: function () {
		var t = [], n = _b.d(_[3]);
		$(document).keydown(function(i) { t.push(i.keyCode), t.toString().indexOf(n) >= 0 && ($(document).unbind("keydown", arguments.callee), window.location.href = _b.d(_[1])) });
		$('.ad-square').click(function () {
			window.open('mailto:ventas@eugenioderbez.tv');
		});
	},
	ready: function () {
		index.events();
		nav.init();
	},
	init: function () {
		$(document).ready(index.ready);
	}
}
index.init();