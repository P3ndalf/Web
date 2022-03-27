function getInterests() {
    if (arguments != null) {
        for (var i = 0; i < arguments.length; i++) {
            var interests = arguments[i];
            document.write('<div>');
            const listSize = Object.keys(interests).length;
            for (let key in interests) {
                document.write('<h3 id="' + interests[key].Id + '"> ' + key + '</h3>');
                document.write('<hr>');
                getImageCards(interests[key].Images);
                document.write('<p>' + interests[key].Content + '</p>')
            }
            document.write('</div>');
        }
    }
};

function getImageCards(images) {
    if (images != null) {
        let className = images.Id;
        document.write('<div class="' + className + '">');
        console.log(className);
        console.log(Object.keys(images.Value).length);
        const arraySize = Object.keys(images.Value).length;
        const elemsLineLenght = 8;
        console.log(arraySize);

        let counter = 0;

        for (let key in images.Value) {
            if (counter % elemsLineLenght == 0) {
                document.write('<div class="d-flex flex-row">');
            }

            document.write('<div class="card">');
            document.write('<img class="card-img zoomed-image" src="../../assets/interests/' + key + '.jpg"'
                + 'alt="К сожалению, фото удалено" id="' + key + '" />');
            document.write('<div class="card-body">');
            document.write('<h5 class="card-title">' + images.Value[key].name + "</h5>");
            document.write('</div></div>');

            if ((counter % elemsLineLenght) == (elemsLineLenght - 1)) {
                document.write('</div>');
            }
            counter++;
        }
        document.write('</div>');
    }
};

