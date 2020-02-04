var toolbarOptions = [
    'bold',
    'underline',
    'italic',
    'link',
    { align: '' },
    { align: 'center' },
    { align: 'right' },
    { align: 'justify' },
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



// Add tag to post Initial

if ($('.tags-add').length) {
    $('#post-tags').tagsInput({
        'height': '100%',
        'width': 'inherit',
        'defaultText': '',
    });
}



$('#post-submit').on('click',function (e) {
    e.preventDefault();

    var subject = $('#subject').val();
    var myEditor = document.querySelector('#editor');
    var html = myEditor.children[0].innerHTML;
    var tags = $('#post-tags').val();

    $.ajax({
        type:"POST",
        url:'/post/store',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            title : subject,
            content : html,
            tags : tags
        },
        dataType:'json'
    })
        .fail(function (jqxhr, textStatus, errorThrown) {

        })
        .done(function (data) {
            alert('Proslo');
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
