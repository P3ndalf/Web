function createDropDown(){
        var dropDownMenuDiv = $('#dropDownMenu'); 

        var dropDownUl = document.createElement('ul');
        $(dropDownUl).attr("id", "dropDownUl");
        for(var interest in interests){
                var li = document.createElement('li');
                var a = document.createElement('a');
                $(a).attr('href', "MyInterests#" + interests[interest].Id);
                $(a).html(interest)
                $(li).append($(a));
                $(dropDownUl).append($(li));
        }
        dropDownMenuDiv.append($(dropDownUl));
        dropDownMenuDiv.mouseenter(() => {
                $(dropDownUl).addClass('show');
        });
        dropDownMenuDiv.mouseleave(() => {
                $(dropDownUl).removeClass('show');
        });
}

createDropDown();