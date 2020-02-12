var toolbarOptions = [
    'bold',
    'underline',
    'italic',
    'link',
    { align: [] },
    { header: [1,2,3,4,5,6,false]},
    {'color': []}, {'background': []},
    'image'
];

var editorOptions = {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: 'Type text...',
    theme: 'snow'
};

var editor = new Quill('#editor',editorOptions);
var toolbar = editor.getModule('toolbar');

//Inserts image src path into editor and displays the image
function insertToEditor(image) {
    const range = editor.getSelection();

    editor.insertEmbed(range.index, 'image', image);
}

function saveToStorage(file) {
    var formData = new FormData();

    //Sets the data to be sent by form i can be caught as request in the backend
    formData.append('file', file);

    $.ajax({
        method: "POST",
        url: "/image/upload",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false
    })
        .fail(function(jqxhr, textStatus, errorThrown, data) {
            alert('An error occured! Please try againg later.');
        })
        .done(function(data) {
            if (data) {
                insertToEditor(data.image_name);
            }
        });
}

// Creates input file in the background and catches selected file
function selectLocalImage() {
    const input = document.createElement('input');

    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();

    // Listen upload local image and save storage
    input.onchange = () => {
        const file = input.files[0];

        if (file.type.startsWith("image/")) {
           saveToStorage(file);
        } else {
            alert('Only images are allowed for upload.');
        }

    };
}

// Add image handler
toolbar.addHandler('image', () => {
    selectLocalImage()
});

// Add tag to post Initial

if ($('.tags-add').length) {
    $('#post-tags').tagsInput({
        'height': '100%',
        'width': 'inherit',
        'defaultText': '',
    });
}


//   Post Submit
$('#post-submit').on('click',function (e) {
    e.preventDefault();
    var formData = new FormData();

    var file = document.getElementById('imageFile').files[0];
    formData.append('file', file);

    var subject = $('#subject').val();
    formData.append('title',subject);

    var category = $('#post-category').val();
    formData.append('category',category);

    var myEditor = document.querySelector('#editor');
    var content = myEditor.children[0].innerHTML;
    formData.append('content',content);

    var tags = $('#post-tags').val();
    formData.append('tags',tags);


    $.ajax({
        type:"POST",
        url:'/post/store',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false
    })
        .fail(function (jqxhr, textStatus, errorThrown) {

            var response = JSON.parse(jqxhr.responseText);
            var statusCode = jqxhr.status;

            //On every submit the span tags disappear and appear again
            $('.error-custom').hide();

            switch(statusCode) {
                case 403:
                    // user is not logged in
                    alert(response.message);
                    break;
                case 422:
                    // input fields validation failed
                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                    break;
                default:
                    alert("Application isn't currently working.Please come back later.");
            }

        })
        .done(function (data) {
            if (data.status === 'success') {
                alert("Your post has been successfully added. Please go to your account to see it.");
                window.location = data.url;
            }
        });

    // Add tag to post on Submit

    if ($('.tags-add').length) {
        $('#post-tags').tagsInput({
            'height': '100%',
            'width': 'inherit',
            'defaultText': '',
        });
    }

});
