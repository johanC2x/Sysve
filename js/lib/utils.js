function getMessages(idObj,messages,type){
	var messsages = "";
	switch(type){
		case 'success':
			messsages = `<div class="alert alert-success alert-dismissible fade in">
						   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						   `+ messages +`
						 </div>`;
			break;
		case 'info':
			messsages = `<div class="alert alert-info alert-dismissible fade in">
						   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						   `+ messages +`
						 </div>`;
			break;
		case 'warning':
			messsages = `<div class="alert alert-warning alert-dismissible fade in">
						   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						   `+ messages +`
						 </div>`;
			break;
		case 'danger':
			messsages = `<div class="alert alert-danger alert-dismissible fade in">
						   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						   `+ messages +`
						 </div>`;
			break;
	}
	$("#"+idObj).html(messages);
}