let avatar = document.getElementById('avatar');
let image = document.getElementById('image');
let input = document.getElementById('input');
let $alert = $('.alert');
let $modal = $('#modal');
let cropper;

$('[data-toggle="tooltip"]').tooltip();

input.addEventListener('change', function (e) {
    let files = e.target.files;
    let done = function (url) {
        input.value = '';
        image.src = url;
        $alert.hide();
        $modal.modal('show');
    };
    let reader;
    let file;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        modal: true,
        autoCrop: true,
        autoCropArea: 1,
        responsive: true,
        background: true,
        zoomOnTouch: true,
        viewMode: 2,
        dragMode: 'move',
        aspectRatio: 1 / 1,
        built: function () {
            $toCrop.cropper("setCropBoxData", {width: "300", height: "300"});
        }
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});

document.getElementById('crop').addEventListener('click', function () {
    let canvas;
    $modal.modal('hide');

    if (cropper) {
        canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 300,
        });

        avatar.src = canvas.toDataURL('image/jpeg');
        $alert.removeClass('alert-success alert-warning');

        $("#avatar_hidden").val(avatar.src);
        $("#avatar_hidden-error").hide();
    }
});
