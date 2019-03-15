/* =============== delete confim code start ========== */

$('button[name="delete_product"]').on('click', function(e){
    var $form=$(this).closest('form');
    e.preventDefault();
    
        $(document).on('click', '#delete', function (e) {
            $form.trigger('submit');
        });
});

/*=============== delete confim code close ============*/


/* ==============Function to show image preview ======================*/

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    document.getElementById('img-previews').innerHTML = '';
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }
        //$('.img-preview-wrapper').removeClass('hidden');
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                var figure = document.createElement('figure');
                figure.innerHTML = ['<img class="img-preview" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'].join('');
                document.getElementById('img-previews').insertBefore(figure, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}

$("input[type=file]").bind('change', handleFileSelect);

/*============ Function and code clolse to show image preview =========== */