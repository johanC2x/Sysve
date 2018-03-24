var payment = function () {
	var self = {};

	self.filterPayment = function(){
		$.ajax({
			type: 'POST',
			url: $("#form_travel_code_search").attr("action"),
			data: $("#form_travel_code_search").serialize(),
			success: function(response){
				console.log(response);
				var data = JSON.parse(response);
			}
		});
	};

	return self;
}(jQuery);