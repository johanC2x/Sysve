var customer = function () {

    var self = {
        current_url : "",
        list_customer : [],
        list_comision : [],
        last_travel : '',
        last_list_comision: [],
        customer_documentos_list : [], // ejemplo
        customer_pasaportes_list : [],
        customer_direcciones_list : [],
        customer_tarjetas_list : [],
        customer_generales_list : [],
        customer_empresa_list : [],
        customer_contactar_list : [],
        customer_pasajeros_list : [],
        customer_emails_list : [],
        customer_celulares_list : [],
        customer_familiares_list : [],
        customer_visado_list : [],
        customer_asiento_list : [],
    };

    

    self.saveCustomerDocumentos = function(){

        console.log('saveCustomerDocumentos');
        var documento = $(".documento").val();
        var nro = $(".nro").val();
        if(documento !== '' && nro !== ''){
            self.customer_documentos_list.push({
                documento : documento,
                nro : nro,
            });
            // self.makeTableAddress();
        }
        $(".documento").removeClass('documento');
        $(".nro").removeClass('nro');
        return false;
    };

    self.saveCustomerPasaportes = function(){ 
        var pais = $(".pais").val();
        var nro_pasaporte = $(".nro_pasaporte").val();
        var fecha_ven = $(".fecha_ven").val();

        if(pais !== '' && nro_pasaporte !== '' && fecha_ven != ''){
            self.customer_pasaportes_list.push({
                pais : pais,
                nro_pasaporte : nro_pasaporte,
                fecha_ven : fecha_ven,
            });
            // self.makeTableAddress();
        }
        $(".pais").removeClass('pais');
        $(".nro_pasaporte").removeClass('nro_pasaporte');
        $(".fecha_ven").removeClass('fecha_ven');
        return false;
    };



    self.saveCustomerDirecciones = function(){ 
        var direccion = $(".direccion").val();
        var distrito = $(".distrito").val();
        var referencia = $(".referencia").val();

        if(direccion !== '' && distrito !== '' && referencia != ''){
            self.customer_direcciones_list.push({
                direccion : direccion,
                distrito : distrito,
                referencia : referencia,
            });
            // self.makeTableAddress();
        }
        $(".direccion").removeClass('direccion');
        $(".distrito").removeClass('distrito');
        $(".referencia").removeClass('referencia');
        return false;
    };



    self.saveCustomerTarjetas = function(){ 
        var tipo_tarjeta = $(".tipo_tarjeta").val();
        var nro_tarjeta = $(".nro_tarjeta").val();
        var debito_credito = $(".debito_credito").val();

        if(tipo_tarjeta !== '' && nro_tarjeta !== '' && debito_credito != ''){
            self.customer_tarjetas_list.push({
                tipo_tarjeta : tipo_tarjeta,
                nro_tarjeta : nro_tarjeta,
                debito_credito : debito_credito,
            });
            // self.makeTableAddress();
        }
        $(".tipo_tarjeta").removeClass('tipo_tarjeta');
        $(".nro_tarjeta").removeClass('nro_tarjeta');
        $(".debito_credito").removeClass('debito_credito');
        return false;
    };


    self.saveCustomerPasaportes = function(){ 
        var nro= $(".nro").val();
        var fecha_emision = $(".fecha_emision").val();
        var  fecha_expiracion= $(".fecha_expiracion").val();
        var  pais_emision= $(".pais_emision").val();
        var  nacionalidad= $(".nacionalidad").val();

        if(nro !== '' && fecha_emision !== '' && fecha_expiracion != '' && pais_emision != '' && nacionalidad != ''){
            self.customer_pasaportes_list.push({
                nro : nro,
                fecha_emision : fecha_emision,
                fecha_expiracion : fecha_expiracion,
                pais_emision : pais_emision,
                nacionalidad : nacionalidad,

            });
            // self.makeTableAddress();
        }
        $(".nro").removeClass('nro');
        $(".fecha_emision").removeClass('fecha_emision');
        $(".fecha_expiracion").removeClass('fecha_expiracion');
        $(".pais_emision").removeClass('pais_emision');
        $(".nacionalidad").removeClass('nacionalidad');
        return false;
    };



    self.saveCustomerGenerales = function(){ 
        var tipo= $(".tipo").val();
        var direccion = $(".direccion").val();
        var  distrito= $(".distrito").val();
        var  pais= $(".pais").val();
        var  tlfono= $(".tlfono").val();
        var  referencia= $(".referencia").val();

        if(tipo !== '' && direccion !== '' && distrito != '' && pais != '' && tlfono != ''&& referencia != ''){
            self.customer_generales_list.push({
                tipo : tipo,
                direccion : direccion,
                distrito : distrito,
                pais : pais,
                tlfono : tlfono,
                referencia : referencia,

            });
            // self.makeTableAddress();
        }
        $(".tipo").removeClass('tipo');
        $(".direccion").removeClass('direccion');
        $(".distrito").removeClass('distrito');
        $(".pais").removeClass('pais');
        $(".tlfono").removeClass('tlfono');
        $(".referencia").removeClass('referencia');
        return false;
    };






    self.saveCustomerEmpresa = function(){ 
        var ruc= $(".ruc").val();
        var razon_social = $(".razon_social").val();
        var  direccion= $(".direccion").val();
        var  distrito= $(".distrito").val();
        var  estado= $(".estado").val();
        var  correo= $(".correo").val();
        var  tlfono= $(".tlfono").val();
        var  referencia= $(".referencia").val();

        if(ruc !== '' && razon_social !== '' && direccion != '' && distrito != '' && estado !='' && correo != '' && tlfono != ''&& referencia != ''){
            self.customer_empresa_list.push({
                ruc : ruc,
                razon_social : razon_social,
                direccion : direccion,
                distrito : distrito,
                estado : estado,
                correo : correo,
                tlfono : tlfono,
                referencia : referencia,

            });
            // self.makeTableAddress();
        }
        $(".ruc").removeClass('ruc');
        $(".razon_social").removeClass('razon_social');
        $(".direccion").removeClass('direccion');
        $(".distrito").removeClass('distrito');
         $(".estado").removeClass('estado');
          $(".correo").removeClass('correo');
        $(".tlfono").removeClass('tlfono');
        $(".referencia").removeClass('referencia');
        return false;
    };

    self.saveCustomerContactar = function(){ 
        var ruc = $(".ruc").val();
        var telefono = $(".telefono").val();
        var fecha_ven = $(".fecha_ven").val();

        if(ruc !== '' && telefono !== '' && fecha_ven != ''){
            self.customer_contactar_list.push({
                ruc : ruc,
                telefono : telefono,
                fecha_ven : fecha_ven,
            });
            // self.makeTableAddress();
        }
        $(".ruc").removeClass('ruc');
        $(".telefono").removeClass('telefono');
        $(".correo").removeClass('correo');
        return false;
    };


    self.saveCustomerPasajeros = function(){ 
        var millaje= $(".millaje").val();
        var nro = $(".nro").val();
        var  usuario= $(".usuario").val();
        var  clave= $(".clave").val();
        var  fin= $(".fin").val();

        if(millaje !== '' && nro !== '' && usuario != '' && clave != '' && fin !='' ){
            self.customer_pasajeros_list.push({
                millaje : millaje,
                nro : nro,
                usuario : usuario,
                clave : clave,
                fin : fin,
                

            });
            // self.makeTableAddress();
        }
        $(".millaje").removeClass('millaje');
        $(".nro").removeClass('nro');
        $(".usuario").removeClass('usuario');
        $(".clave").removeClass('clave');
         $(".fin").removeClass('fin');
        return false;
    };




    self.saveCustomerEmails = function(){ 
        var tipo_email = $(".tipo_email").val();
        var email = $(".email").val();
        

        if(tipo_email !== '' && email !== '' ){
            self.customer_emails_list.push({
                tipo_email : tipo_email,
                email : email,
                
            });
            // self.makeTableAddress();
        }
        $(".tipo_email").removeClass('tipo_email');
        $(".email").removeClass('email');
        return false;
    };





    self.saveCustomerCelulares = function(){ 
        var tipo_contacto = $(".tipo_contacto").val();
        var nro = $(".nro").val();
        

        if(tipo_contacto !== '' && nro !== '' ){
            self.customer_celulares_list.push({
                tipo_contacto : tipo_contacto,
                nro : nro,
                
            });
            // self.makeTableAddress();
        }
        $(".tipo_contacto").removeClass('tipo_contacto');
        $(".nro").removeClass('nro');
        return false;
    };






    self.saveCustomerFamiliares = function(){ 
        var relacion = $(".relacion").val();
        var nombre = $(".nombre").val();
        var telefono = $(".telefono").val();
        

        if(relacion !== '' && nombre !== '' && telefono != ''){
            self.customer_familiares_list.push({
                relacion : relacion,
                nombre : nombre,
                telefono : telefono,
                
            });
            // self.makeTableAddress();
        }
        $(".relacion").removeClass('relacion');
         $(".nombre").removeClass('nombre');
        $(".telefono").removeClass('telefono');
       return false;
    };







    self.saveCustomerVisado = function(){ 
        var  pais_visado= $(".pais_visado").val();
        var numero= $(".numero").val();
        var fecha_emision = $(".fecha_emision").val();
        var  fecha_expiracion= $(".fecha_expiracion").val();
        


        if(pais_visado != '' && numero !== '' && fecha_emision !== '' && fecha_expiracion != '' ){
            self.customer_visado_list.push({
                pais_visado : pais_visado,
                numero : numero,
                fecha_emision : fecha_emision,
                fecha_expiracion : fecha_expiracion,
                

            });
            // self.makeTableAddress();
        }
         $(".pais_visado").removeClass('pais_visado');
        $(".numero").removeClass('numero');
        $(".fecha_emision").removeClass('fecha_emision');
        $(".fecha_expiracion").removeClass('fecha_expiracion');
       return false;
        
    };

    self.populateProperties = function(){
        var childrens = [];
        $("#content_properties input").each(function(){ 
            var element = this;
            var children = {};
            if(element.id !== undefined){
                var type = $("#"+element.id.toString()).attr("data-type");
                if(type === "text" || type === "date"){
                    children.idObj = element.id;
                    children.id = element.id;
                    children.value = $("#"+element.id.toString()).val();
                    children.name = $("#"+element.id.toString()).attr("data-name");
                    children.type = $("#"+element.id.toString()).attr("data-type");
                    children.parent = element.id;
                    childrens.push(children);
                }
            }
        });
        return childrens;
    }

    self.validarInfoCustomer = function(){
        $('#customer_form').bootstrapValidator({
            container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                person_id: {
                    validators: {
                        notEmpty: { message: "<?php echo $this->lang->line('common_document_required'); ?>"}
                    }
                },
                
            }
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            $( "#submit" ).prop("disabled", false);
            var msg = "";
            var data = self.populateProperties();
            $("#data").val(JSON.stringify(data));

            //ultima guardada
            self.saveCustomerDocumentos();
            self.saveCustomerPasaportes();
            self.saveCustomerDirecciones();
            self.saveCustomerTarjetas();
            self.saveCustomerPasaportes();
            self.saveCustomerGenerales();
            self.saveCustomerEmpresa();
            self.saveCustomerContactar();
            self.saveCustomerPasajeros();
            self.saveCustomerEmails();
            self.saveCustomerCelulares();
            self.saveCustomerFamiliares();
            self.saveCustomerVisado();
            self.saveCustomerAsiento();

            var data_tablas = {};
            data_tablas.documentos = self.customer_documentos_list;
            data_tablas.pasaportes = self.customer_pasaportes_list;
            data_tablas.direcciones = self.customer_direcciones_list;
            data_tablas.tarjetas = self.customer_tarjetas_list;
            data_tablas.pasaportes = self.customer_pasaportes_list;
            data_tablas.generales = self.customer_generales_list;
            data_tablas.empresa = self.customer_empresa_list;
            data_tablas.contactar = self.customer_contactar_list;
            data_tablas.pasajeros = self.customer_pasajeros_list;
            data_tablas.emails = self.customer_emails_list;
            data_tablas.celulares = self.customer_celulares_list;
            data_tablas.familiares = self.customer_familiares_list;
            data_tablas.visado = self.customer_visado_list;
            data_tablas.asiento = self.customer_asiento_list;
            data_tablas.familares = self.customer_familiares_list;
            console.log(data_tablas);
            var enviar = JSON.stringify(data_tablas);
            console.log(enviar)
            // $("#data_customer").val(enviar);
            
            // $("#data_customer").val('jajajaja');
            data_string = $("#customer_form").serialize()+'&data_customer='+enviar;
            console.log(data_string);
            $.ajax({
                type:"POST",
                url:$("#customer_form").attr('action'),
                data:data_string,
                // data:$("#data_customer").val(),
                success:function(msg){
                    var kit = JSON.parse(msg);
                    if(kit.success){
                        msg = getMessageSuccess('Operación realizada con exito...');
                        $("#messages").html(msg);   
                        location.reload();          
                    }else{
                        msg = getMessageError(kit.message);
                        $("#messages").html(msg);                   
                    }
                }
            });
       });
    }





    self.saveCustomerAsiento = function(){ 
        var tipo_asiento = $(".tipo_asiento").val();
        var indicaciones = $(".indicaciones").val();
        

        if(tipo_asiento !== '' && indicaciones !== '' ){
            self.customer_asiento_list.push({
                tipo_asiento : tipo_asiento,
                indicaciones : indicaciones,
                
            });
            // self.makeTableAddress();
        }
        $(".tipo_asiento").removeClass('tipo_asiento');
        $(".indicaciones").removeClass('indicaciones');
        return false;
    };

    

	return self;
}(jQuery);
