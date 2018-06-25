var ysumma = function () {

    var self = {
        errors:[]
    };

    self.validate = function(form_id,content_id){
        var form = document.getElementById(form_id);
        if(form.length > 0){
            for(var i=0;i < form.length;i++){
                var id = form.elements[i].id;
                var type = form.elements[i].type;
                var value = form.elements[i].value;
                if(value === ''){
                    errors.push(
                        
                    );
                }
            }
        }
    };

    return self;
}(jQuery);