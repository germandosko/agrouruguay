$(document).ready(function() {
	$('#progressbar').progressbar({
		value: 80
	});
	//see http://caroufredsel.dev7studios.com/configuration.php
	$('#caroufredsel').carouFredSel({
		auto: true,
		circular: true,
		cookie: true,
		direction: 'left',
		infinite: true,
		items: 3,
		scroll:1,
		next: {
			button: '#promo-next',
			key: 'right'
		},
		prev: {
			button: '#promo-prev',
			key: 'left'
		}
	}); 
	$("#searchIcon").click(function(){
		var q = $.trim($("#search").val());
		if(q.length > 0 ){
			window.location.href = '/buscar.html?q='+q;
		}
	});
	$("#system").tabs();
	$('td.options a.delete').on("click", function(event) {
		var message = 'Seguro que desea eliminar?\n';
		if (!confirm(message)) {
			event.preventDefault();
		}
	});
	$('body').on("keyup", function(event) {
		if(event.which == 13 && $("#search").is(":focus")){
			$("#searchIcon").click();
		}
	});
	$('#jCropTarget').Jcrop({
		aspectRatio: 1.5,
		setSelect: [300, 200, 0, 0],
		minSize: [300, 200],
		//maxSize: [950, 630],
		onSelect: function(event){
			$('#x').val(event.x);
			$('#y').val(event.y);
			$('#w').val(event.w);
			$('#h').val(event.h);
		}
	});
});


		
