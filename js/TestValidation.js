var textAreaInput = document.forms[0].elements[4]
var conditionValue = /^([A-Za-zА-Яа-я])+/;
var conditionWordLength = /([A-Za-zА-Яа-я0-9\S]+(\s)){20,}/;

var validator = () => {
        if (conditionValue.test(textAreaInput.value) && conditionWordLength.test(textAreaInput.value)){
                textAreaInput.setCustomValidity(""); 
        }
        else{
                textAreaInput.setCustomValidity("Ввод не соответствует требованиям");  
        }
};

textAreaInput.addEventListener('change', validator);

validator();





