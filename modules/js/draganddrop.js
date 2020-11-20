prevclose();
function prevclose() {
    $('#closePreview').hide();
}

function readFile(input, preview, selectFile) {
   
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(preview).show();
                $(selectFile).hide();
                var htmlPreview =
                    '<img src="' + e.target.result + '" />';
                var wrapperZone = $(input).parent();
                var previewZone = $(input).parent().parent().find('.preview-zone');
                var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                wrapperZone.removeClass('dragover');
                previewZone.removeClass('hidden');
                boxZone.empty();
                boxZone.append(htmlPreview);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
        $('#closePreview').hide();
        $('#selectFile').show();
        $('#closePreview2').hide();
        $('#selectFile2').show();
    }
    $("#file1").change(function() {
        readFile(this, "#closePreview", "#selectFile");
    });

$("#file2").change(function () {
        readFile(this, "#closePreview2", "#selectFile2");
    });

    $('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });
    $('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });
    
    $('.remove-preview').on('click', function() {
        var boxZone = $(this).parents('.preview-zone').find('.box-body');
        var previewZone = $(this).parents('.preview-zone');
        var dropzone = $(this).parents('.form-group').find('.dropzone');
        boxZone.empty();
        previewZone.addClass('hidden');
        reset(dropzone);
    });
    // https://medium.com/@purnamaanaking/cara-simple-membuat-drag-and-drop-image-upload-b745343b0171
    // https://codepen.io/YinkaEnoch/pen/PxqrZV
