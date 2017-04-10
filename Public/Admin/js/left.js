$().ready(function(){
	$('ul').hide();
	$('button').click(function(){
		$('ul').hide();
		$(this).next('ul').show();
	});
});