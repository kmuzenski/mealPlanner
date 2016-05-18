function request() {	
	return $.ajax({
		crossDomain: true,
		type:'GET',
		dataType:'json',
		cache: false,


	
		url: "http://food2fork.com/api/search?key=41ea6ca476ba23e6554856b78d66c9d6&q=shredded%20chicken",
		success: function(r) {
					console.log(r);

					var output = ' ';
					$.each(r.results.slice(1,9), function(key, value){
						console.log(value.recipes.title);
						$("#app").append('<div class=col-md-4><p>' + value.recipes.title + '</p></div>');
			
						
					});
	
				}
	})
}


request();