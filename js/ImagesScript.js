
function getImageCards() {
    if (arguments != null) {
        for (var i = 0; i < arguments.length; i++) {
            var images = arguments[i];
            console.log(images);
            document.write('<div class="Images">');
            const elemsLineLenght = 8;
            let counter = 0;
            for (let key in images) {
                if (counter % elemsLineLenght == 0) {
                    document.write('<div class="card-group">');
                }

                document.write('<div class="card">');
                document.write('<div class="card-img zoomed-image">');

                document.write('<img class="crop" src=' + images[key].photo
                    + ' alt="К сожалению, фото удалено" id="' + images[key].photo + '"/>');
                var image = document.getElementById(images[key].photo);
                image.addEventListener("click", () => {
                    getImage(key);
                })
                document.write('</div>');
                document.write('<div class="card-body">');
                document.write('<h5 class="card-title">' + images[key].title + "</h5>");
                document.write('</div></div>');

                if ((counter % elemsLineLenght) == (elemsLineLenght - 1)) {
                    document.write('</div>');
                }
                counter++;
            }
            document.write('</div>');
        }
    }
};

function getImage(index) {
    console.log(index);
    var modal = $('#imageModal');
    var modalImg = $("#img01");
    var caption = $("#caption");
    caption.html(images[index].title);
    modal.css('display', 'block');
    modalImg.attr('src', "../../assets/photos/" + images[index].photo + ".jpg");
    var close = $('#close');
    close.click(function () {
        modal.css('display', 'none');
    });
    if (images[index - 1] != undefined) {
        $('#scrollLeft').one("click", function(){

            getImage(index - 1);
        });
    }
    if(images[index + 1] != undefined){
        $('#scrollRight').one("click", function() {
                getImage(index + 1);
        });
    }
}
