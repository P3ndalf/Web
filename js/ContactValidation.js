
var nameInput = $('#nameId');
var nameInputValidity = false;
var lastNameInput = $('#lastNameId');
var lastNameInputValidity = false;
var genderMaleInput = document.forms[0].elements[2];
var genderFemaleInput = document.forms[0].elements[3];
var genderInputValidity = false;
var emailInput = document.forms[0].elements[4];
var emailInputValidity = false;
var phoneInput = document.forms[0].elements[5];
var phoneInputValidity = false;
var ageInput = document.forms[0].elements[6];
var ageInputValidity = false;
var birthdayInput = document.forms[0].elements[7];
var birthdayInputValidity = false;


var submit = document.getElementById('submit');
submit.disabled = false;
var emailCondition = /([a-zа-я0-9]){1,}\@([a-zа-я]){1,7}\.[a-zа-я]{2,}/
var nameCondition = /([A-Za-zА-Яа-я]){3,}/;
var phoneCondition = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,11}$/;
var dateCondition = /([0-9]|[0-9][0-9])\/([0-9]|[0-9][0-9])\/([0-9][0-9][0-9][0-9])/;

function nameValidation(){
        let validityDiv = $('#nameInputValidityId');
        
        if (nameCondition.test(nameInput.val())) {
                nameInput.css('border',"1px solid green");
                validityDiv.html("Верно!");
                if(validityDiv.hasClass("invalid")){
                        validityDiv.removeClass("invalid");
                }
                validityDiv.addClass("valid");
                nameInputValidity = true;
        }
        else {
                nameInput.css('border',"1px solid red");
                
                validityDiv.html('Неверно!');
                if(validityDiv.addClass("valid")){
                        validityDiv.removeClass("valid");
                }
                validityDiv.addClass("invalid");
                nameInputValidity = false;
                setTimeout(()=>{
                        validityDiv.html('');
                        validityDiv.removeClass("invalid");
                }, 4000);   
        }
}

function lastNameValidation() {
        let validityDiv = $('#lastNameInputValidityId');
        console.log(lastNameInput.val())
        if (nameCondition.test(lastNameInput.val())) {
                console.log('fdsgsd');
                lastNameInput.css('border',"1px solid green");
                console.log('fdsgsd222');
                if(validityDiv.hasClass("invalid")){
                        validityDiv.removeClass("invalid");
                }
                validityDiv.html("Верно!");
                validityDiv.addClass("valid");
                lastNameInputValidity = true;
        }
        else {
                lastNameInput.css('border',"1px solid red");
                
                validityDiv.html('Неверно!');
                if(validityDiv.addClass("valid")){
                        validityDiv.removeClass("valid");
                }
                validityDiv.addClass("invalid");
                lastNameInputValidity = false;
                setTimeout(()=>{
                        validityDiv.html('');
                        validityDiv.removeClass("invalid");
                }, 4000);   
        }
}

function genderValidation(){
        var validityDiv = document.getElementById('genderInputValidityId');
        if(genderMaleInput.checked || genderFemaleInput.checked){
                genderInputValidity = true;   
                genderMaleInput.parentElement.parentElement.style.color = "green";
                validityDiv.innerHTML = "Верно!";
                validityDiv.classList.add("valid");
        }
        else{
                genderInputValidity = false;
                genderMaleInput.parentElement.parentElement.style.color = "red";
                validityDiv.innerHTML = "Неверно!";
                if(validityDiv.classList.contains("valid")){
                        validityDiv.classList.remove("valid");
                }
                validityDiv.classList.add("invalid");
                setTimeout(()=>{
                        validityDiv.innerHTML = "";
                        validityDiv.classList.remove("invalid");
                }, 4000);
        }
}

function emailValidation(){
        var validityDiv = document.getElementById('emailInputValidityId');
        if(emailInput.value != "" && emailCondition.test(emailInput.value)) {
                emailInputValidity = true;
                emailInput.style.border = "1px solid green";
                if(validityDiv.classList.contains("invalid")){
                        validityDiv.classList.remove("invalid");
                }
                validityDiv.classList.add("valid");
                lastNameInputValidity = true;
        }
        else {
                emailInputValidity = false;
                emailInput.style.border = "1px solid red";
                if(validityDiv.classList.contains("valid")){
                        validityDiv.classList.remove("valid");
                }
                validityDiv.classList.add("invalid");
                lastNameInputValidity = false;
                setTimeout(()=>{
                        validityDiv.innerHTML = "";
                        validityDiv.classList.remove("invalid");
                }, 4000);
        }
}

function phoneValidation(){
        var validityDiv = document.getElementById('phoneInputValidityId');
        if (phoneCondition.test(phoneInput.value)){
                phoneInput.style.border = "1px solid green";
                validityDiv.innerHTML = "Верно!";
                if(validityDiv.classList.contains("invalid")){
                        validityDiv.classList.remove("invalid");
                }
                validityDiv.classList.add("valid");
                lastNameInputValidity = true;
        }
        else {
                phoneInput.style.border = "1px solid red";
                validityDiv.innerHTML = "Неверно!";
                if(validityDiv.classList.contains("valid")){
                        validityDiv.classList.remove("valid");
                }
                validityDiv.classList.add("invalid");
                phoneInputValidity = false;
                setTimeout(()=>{
                        validityDiv.innerHTML = "";
                        validityDiv.classList.remove("invalid");
                }, 4000);
        }
}

function birthdayValidation() {
        var validityDiv = document.getElementById('birthdayInputValidityId');
        if(dateCondition.test(birthdayInput.value)){
                birthdayInput.style.border = "1px solid green";
                validityDiv.innerHTML = "Верно!";
                if(validityDiv.classList.contains("invalid")){
                        validityDiv.classList.remove("invalid");
                }
                validityDiv.classList.add("valid");
                birthdayInputValidity = true;
        }
        else {
                birthdayInput.style.border = "1px solid red";
                validityDiv.innerHTML = "Неверно!";
                if(validityDiv.classList.contains("valid")){
                        validityDiv.classList.remove("valid");
                }
                validityDiv.classList.add("invalid");
                birthdayInputValidity = false;
                setTimeout(()=>{
                        validityDiv.innerHTML = "";
                        validityDiv.classList.remove("invalid");
                }, 4000);
        }
}

function ageValidation(){
        var validityDiv = document.getElementById('ageInputValidityId');
        if(ageInput.value != ""){
                ageInput.style.border = "1px solid green";
                validityDiv.innerHTML = "Верно!";
                if(validityDiv.classList.contains("invalid")){
                        validityDiv.classList.remove("invalid");
                }
                validityDiv.classList.add("valid");
                ageInputValidity = true;
        }
        else {
                ageInput.style.border = "1px solid red";
                validityDiv.innerHTML = "Неверно!";
                if(validityDiv.classList.contains("valid")){
                        validityDiv.classList.remove("valid");
                }
                validityDiv.classList.add("invalid");
                ageInputValidity = false;
                setTimeout(()=>{
                        validityDiv.innerHTML = "";
                        validityDiv.classList.remove("invalid");
                }, 4000);
        }
}

nameInput.blur(() => 
        nameValidation()
);

lastNameInput.blur(() =>
        lastNameValidation()
);

genderMaleInput.addEventListener("blur", () => {
        genderValidation();
});

genderFemaleInput.addEventListener("blur", () => {
        genderValidation();
});

emailInput.addEventListener("blur", () => {
        emailValidation();
})

phoneInput.addEventListener("blur", () => {
        phoneValidation();
})

ageInput.addEventListener("blur", () => {
        ageValidation();
})

birthdayInput.addEventListener("blur", () => {
        birthdayValidation();
})

submit.addEventListener('click', () => {
        nameValidation();
        lastNameValidation();
        genderValidation();
        emailValidation();
        phoneValidation();
        birthdayValidation();
        ageValidation();
        if (!nameInputValidity || !lastNameInputValidity 
                || !genderInputValidity || !emailValidity 
                || !phoneValidity || !birthdayInputValidity
                || !ageInputValidity) {
                submit.setAttribute("type", "button");
                submit.setAttribute("value", "");
        }
        else {
                submit.setAttribute("type", "submit");
                submit.setAttribute("value", "submit");
        }
});