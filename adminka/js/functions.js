function new_otziv(id){
     var text = $('#name_post').attr('value');
         $.post( "/adminka/inc_js/new_otziv.php", {text: text}, on_succ2);
    	function on_succ2(data)
	{
		$('#alias').val(data);
	}
}

function segodny(id){
     var data = 333;
         $.post( "/adminka/inc/segodny.php", {data: data}, on_succ2);
    	function on_succ2(data)
	{
		$('#segodny').val(data);
	}
}

function proverka_alias(id){
    var text = $('#alias').attr('value');    
             $.post( "/adminka/inc_js/proverka_alias.php", {text: text}, on_succ2);
    	function on_succ2(data)
	{
		$('#imgalias').html(data);
	}
}

function sortirovka_metro(id){
    var text = $('#sort_metro').attr('value');    
             $.post( "/adminka/inc_js/sort_metro.php", {text: text}, on_succ2);
    	function on_succ2(data)
	{
		$('#sort_metro_id').html(data);
	}
}

function filter(id){
    var text = $('#filter').attr('value');    
             $.post( "/adminka/inc_js/filter_novostroika.php", {text: text}, on_succ2);
    	function on_succ2(data)
	{
		$('#novostroiki').html(data);
	}
}