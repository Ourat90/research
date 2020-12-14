prevclose();
function prevclose() {
    $('#closePreview').hide();
}
function fileValidation() {
    var fileInput =
        document.getElementById('file1');
      
    var filePath = fileInput.value;
  
    // Allowing file type 
    var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      
    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        return false; 
    }
    else {
        readFile();
    }
}

function readFile(input, preview, selectFile) {
    // var allowedExtensions =
    //     /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      
    // if (!allowedExtensions.exec(input)) {
    //     alert('Invalid file type');
    //     return false; 
    // } else {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
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
        $('#selectFile').show();
        $('#closePreview').hide();
        $('#selectFile2').show();
        $('#closePreview2').hide();
        $('#selectFile3').show();
        $('#closePreview3').hide();
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

    $("#file3").change(function () {
            readFile(this, "#closePreview3", "#selectFile3");
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
