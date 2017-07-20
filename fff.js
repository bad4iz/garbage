class UploadC {
    constructor(url) {
        this.url = url
    }

    _uploadFile(nameMashine, file) {
        var resp = false;
        var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
        var xhr = new XHR();

        // обработчик для закачки
        // xhr.upload.onprogress = function (event) {
        //     console.log(event.loaded + ' / ' + event.total);
        // };

        // обработчики успеха и ошибки
        // если status == 200, то это успех, иначе ошибка
        xhr.onload = xhr.onerror = function () {
            if (this.status == 200) {
                console.log(xhr.response);
                
                console.log("файл отправлен");
                resp = true;
            } else {
                console.log("error " + this.status);
            }
        };

        xhr.open("POST", 'upload.php', false);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        var formData = new FormData();
        formData.append(nameMashine, file);
        xhr.send(formData);
        return resp;

    }

    upload(nameMashine, file) {
        return this._uploadFile(nameMashine, file);
    }
}

const upl = new UploadC('upload.php');


document.forms.upload.onsubmit = function () {
    var input = this.elements.myfile;
    var file = input.files[0];
    // console.log(file);
    if (file) {
        console.log(upl.upload("mashine1", file));
    }
    return false;
}