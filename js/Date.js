function dateInit(){
    let date = new Date();
    let dayStr = date.getDay();
    switch (dayStr) {
        case 0:
            dayStr = "Воскресенье";
            break;
        case 1:
            dayStr = "Понедельник";
            break;
        case 2:
            dayStr = "Вторник";
            break;
        case 3:
            dayStr = "Среда";
            break;
        case 4:
            dayStr = "Четверг";
            break;
        case 5:
            dayStr = "Пятница";
            break;
        case 6:
            dayStr = "Суббота";
            break;
        default:
            break;
    }
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    return (day < 10 ? ('0' + day) : (day))
            + '.'
            + (month < 10 ? ('0' + month) : (month))
            + '.' 
            + (year < 10 ? ('000' + year) : (year < 100 ? ('00' + year) : (year < 1000 ? ('0' + year) : year)))
            + ' ' 
            + dayStr;
}

function ShowDate() {
    let date = document.getElementById("date");
    date.innerHTML = dateInit();
    setInterval(() => {
        date.innerHTML = dateInit();
    }, 1000);   
}

ShowDate();
