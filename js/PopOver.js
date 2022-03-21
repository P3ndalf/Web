function showPopOver(input, popover, line){
    $(popover).html(line)
    input.parent().append($(popover));
    $(popover).addClass('popover');
    
    input.mouseenter(function() {
        $(popover).css('display','block');
        setTimeout(()=>{
            $(popover).css('display','none');
        }, 3000);
    })
}

var nameInput = $('#nameId');
var popoverName = document.createElement('div');
showPopOver(nameInput,popoverName,'Поле предназначено для вашего имени');

var lastNameInput = $('#lastNameId');
var popoverLastName = document.createElement('div');
showPopOver(lastNameInput,popoverLastName,'Поле предназначено для вашей фамилии');

var maleInput = $('#maleId');
var popoverGender = document.createElement('div');
showPopOver(maleInput,popoverGender,'Выберете один из представленных полов');

var femaleInput = $('#femaleId');
showPopOver(femaleInput,popoverGender,'Выберете один из представленных полов');

var emailInput = $('#inputEmailId');
var popoverEmail = document.createElement('div');
showPopOver(emailInput,popoverEmail,'Поле предназначено для вашей почты');

var phoneInput = $('#inputPhoneId');
var popoverPhone = document.createElement('div');
showPopOver(phoneInput,popoverPhone,'Поле предназначено для вашего телефона');