var kv={
    templates: {
        alert : '<div class="alert alert-danger"><strong>{{error}}! </strong>' +
                '{{message}}' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>' +
                '</div>',
        success : '<div class="alert alert-success">{{message}}' +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>' +
                  '</div>'
        }
};
kv.utils = {
    parseAjaxData : function(data) {
        var retObject = {
            hasError : false
        }
        try {                
            var dataObj = JSON.parse(data);
        } catch (err) {
            retObject.hasError = true;
            retObject.errorCode = 0;
            retObject.errorMessage = 'Неверный формат данных';
            retObject.data = data;
            console.log(retObject.errorMessage);
            return retObject;
        }
        if (dataObj.hasOwnProperty('errorCode')) {
            retObject.errorCode = dataObj.errorCode;
            retObject.errorMessage = dataObj.message;
            retObject.hasError = true;
        } else {
            retObject.data = dataObj;
        }
                // console.log(retObject);
        return retObject;        
    },
    renderTemplate(type,data) {
        var template;
        if (type === 'undefined') {
            type = 'success';
        }
        switch (type) {
            case 'error': 
                template = kv.templates.alert;
                break;
        }
        return Handlebars.compile(template,data);
    }
}
//Расширкние JQuery
/**
 * 
 * @param {kv.utils.parseAjaxData} retObject
 * @returns {$.fn.displayMessage}
 */
$.fn.displayMessage = function(retObject) {
    var obj = this;
    obj.find('.alert').remove();
    if (!retObject.hasOwnProperty('hasError')) {
        return obj;
    }  
    var tplVars = {},
        template,htmlData;
    if (retObject.hasError === true) {
        tplVars.error = 'Ошибка';
        tplVars.message = retObject.errorMessage;
        template = Handlebars.compile(kv.templates.alert);        
    } else {
        tplVars.message = retObject.data.message;
        template = Handlebars.compile(kv.templates.success);
    }
    htmlData = template(tplVars);
    obj.prepend(htmlData);
    return obj;        
}


// main
$(function(){
    // личный кабинет
    $(".lk-form .input-group-addon").on("click",".glyphicon-pencil", function(e){         
        $(this).removeClass('glyphicon-pencil').addClass('glyphicon-ok').attr('title','Сохранить').after("<i class='glyphicon glyphicon-remove-sign' title='Отменить''></i>");
        $(this).parents(".input-group").find("input").removeAttr('disabled').focus();

    });
    $(".lk-form .input-group-addon").on("click",".glyphicon-ok", function(e){ 
        e.preventDefault();
        var $currentInput = $(this).parents('.input-group').find('input'),
        currentName = $currentInput.attr('name');
        console.log('name='+ currentName + 'val=' + $currentInput.val());
        $.post('/lk/save',{
            'name' : currentName,
            'value' :  $currentInput.val() 
        }, function(data){
            var parsed = kv.utils.parseAjaxData(data);
            $('.films-tabs__content').displayMessage(parsed);
        });        
    });
    // всплывающее окошко
    $('.pop-film')
            .on("mouseenter", function(e){
                    e.preventDefault();
                    $(this).find(".pop-film__data").addClass('pop-film__data--hover');
             })
            .on("mouseleave", function(e){
                    e.preventDefault();
                    $(this).find(".pop-film__data").removeClass('pop-film__data--hover');
             });

});


