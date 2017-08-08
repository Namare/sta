REG = {
    init:function(){
        REG.fields();
        $('.o_a').hide();
        $('select[name="ai"]').change(function(){
            if($(this).val()==7){
                $('.o_a').show(250);
            }
        });

        $('input[name="company_name"]').autocomplete({
            minLength: 0,
            source: company, select: function( event, ui ) {
                $('input[name="ci"]').val(ui.item.id);
            }
        });




    },
    fields:function(){
        rule = true;



        $('input[name="cpassword"]').on('change',function(){
            if($(this).val() != $('input[name="password"]').val()){
                redform($(this));
                redform($('input[name="password"]'));
                rule=false;
            }else{

                passtrue($(this));
                passtrue($('input[name="password"]'));
            }
        });


        $('.reg_send').on('click',function(){

            if($('input[name="email"]').val()=='')      {redform($('input[name="email"]'));}        else{rule=true}
            if($('input[name="username"]').val()=='')   {redform($('input[name="username"]'));}     else{rule=true}
            if($('input[name="firstname"]').val()=='')  {redform($('input[name="firstname"]'));}    else{rule=true}
            if($('input[name="lastname"]').val()=='')   {redform($('input[name="lastname"]'));}     else{rule=true}
            if($('input[name="password"]').val()=='')   {redform($('input[name="password"]'));}     else{rule=true}
            if($('input[name="cpassword"]').val()=='')  {redform($('input[name="cpassword"]'));}    else{rule=true}
            if($('select[name="sp"] option:selected').val()!=4){
                if($('input[name="cpassword"]').val()=='')  {redform($('input[name="company_name"]'));}    else{rule=true}
            }

            if(rule==false){
                $(".regErr").text('Ошибка! Заполните все поля');
            }else{
                var data_reg= 'fn=' +$('input[name="firstname"]').val()+
                    '&ln=' +$('input[name="lastname"]').val()+
                    '&username=' +$('input[name="username"]').val()+
                    '&password=' +$('input[name="password"]').val()+
                    '&email=' +$('input[name="email"]').val()+
                    '&sp=' +$('select[name="sp"]').val()+
                    '&hl=' +$('input[name="hl"]').val()+
                    '&ai=' +$('select[name="ai"]').val();

                if( $('select[name="ai"] option:selected').val()==7){
                    data_reg += '&ci=' +$('select[name="ci"]').val();}


                $(".regErr").text('');
                $.ajax({
                    url:BASE_URL+'auth/new_user',
                    method:'post',
                    data:data_reg,
                    success:function(data){
                        if(data==1){window.location.href=BASE_URL+"auth/login"}
                    }
                })
            }
        });


        function redform(d){
            d.animate({
                'border-color':"#c32121"
            },500);
            d.parent().find('label').animate({
                'color':"#c32121"
            },500);
            rule = false;

        }

        function passtrue(d){
            d.animate({
                'border-color':"#08b326"
            },500);
            d.parent().find('label').animate({
                'color':"#08b326"
            },500);
        }



    }
}
REG.init();