$(document).ready(function() {

    function startLoading() {
        $('.loading').show();
    }

    function stopLoading() {
        $('.loading').hide();
    }
    // Insert blog headline image
    function selectLocalImage(size) {
        const input = document.createElement('input');

        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'video/*,image/*');
        input.click();

        // Listen upload local image and save to server
        input.onchange = () => {
            const file = input.files[0];

            // console.log(file);
            saveToServer(file,size);

            // if (file.type.startsWith("image/")) {
            //     saveToServer(file,size);
            // } else {
            //     alert('Only images are allowed for upload.');
            // }
        };
    }

    // demos
    $('.demo-image-button').click(function () {
        selectLocalImage('large');

        $(this).data('clicked', true);
    });

    $('.user-image-button').click(function () {
        selectLocalImage('large');
    });

    var imageTypeSupport = ['image/gif','image/png','image/bmp','image/jpg','image/jpeg'];
    var videoTypeSupport = ['video/mov','video/mp4','video/ogg'];

    function insertToEditor(url, fileType) {

        const range = quill.getSelection();

        if (imageTypeSupport.includes(fileType))
        {
            quill.insertEmbed(range.index, 'image', url);
        }

        if(videoTypeSupport.includes(fileType))
        {
            quill.insertEmbed(range.index, 'video', url);
        }
    }

    function saveToServer(file,size) {
        var fd = new FormData();
        startLoading();

        let url = "/admin/images/upload";

        // if($(".demo-image-button").data('clicked'))
        // {
        //    url = "/admin/images/upload/demo";
        // }

        fd.append('file', file);

        $.ajax({
            method: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false
        })
            .fail(function(jqxhr, textStatus, errorThrown, data) {
                stopLoading();
                if (size === "large") {
                    $('.fa-check').hide();
                    $('.fa-times').show(100,function () {
                        alert('An error occured! Please try againg later.');
                    });
                }else {
                    alert('An error occured! Please try againg later.');
                }
            })
            .done(function(response) {
                stopLoading();
                $('.error-custom').hide();
                if (response) {
                    if(size === "large") {
                        $('.fa-times').hide();
                        $('.fa-check').show(100);

                        $('.demo-image-url').val(response.url);
                        $('.demo-image-src').attr('src', response.url);

                        $('.profile-image-url').val(response.url);
                    } else {
                        insertToEditor(response.url, response.type);
                    }
                }
            });
    }



    // Add User

    $('#submit-admin-user-form').on('submit', function(e) {
        e.preventDefault();

        startLoading();
        var username = $('input#username').val();
        var profileImageUrl = $('.profile-image-url').val();
        var email = $('input#email').val();
        var password = $('input#password').val();
        var role = $('select#user-role').val();

        $.ajax({
            method: "POST",
            url: "/admin/users",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                username : username,
                url : profileImageUrl,
                email: email,
                password : password,
                role: role
            },
            dataType: 'json'
        })
            .fail(function(jqxhr, textStatus, errorThrown) {
                stopLoading();

                var response = JSON.parse(jqxhr.responseText);
                var statusCode = jqxhr.status;

                $('.error-custom').hide();

                switch (statusCode) {
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
                        alert('An error occured! Please try againg later.');
                        break;
                }

            })
            .done(function(data) {
                stopLoading();
                window.location = data.url;
            });
    });


    $('.changeUserRole').on('change', function() {

        let role = this.value;
        let userId = $(this).data('id');

        $.ajax({
            method: "POST",
            url: '/admin/user/role',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'role': role,
                'userId' : userId
            },
            dataType: 'json',
        })
            .fail(function(jqxhr, textStatus, errorThrown, data) {
                stopLoading();
                // alert('An error occured! Please try againg later.');
            })
            .done(function(response) {
                stopLoading();
                alert(response.message);
            });
    });




    if($('#editor').length){

        // var toolbarOptions = [
        //     'bold', 'underline', 'italic', 'link',
        //     { align: '' },
        //     { align: 'center' },
        //     { align: 'right' },
        //     { align: 'justify' },
        //     { 'font': [] },
        //     { 'header': [1, 2, 3, 4, 5, 6, false] },
        //     'blockquote', 'code-block',
        //     { 'list': 'ordered'}, { 'list': 'bullet' },
        //     { 'script': 'sub'}, { 'script': 'super' },
        //     { 'indent': '-1'}, { 'indent': '+1' },
        //     // { 'direction': 'rtl' },
        //     // { 'size': ['small', false, 'large', 'huge'] },
        //     { 'color': [] }, { 'background': [] },
        //
        //     'image'
        // ];

        //Dodavanje custom fontova
        let Font = Quill.import('formats/font');
        // We do not add Sans Serif since it is the default
        Font.whitelist = ['montserrat'];
        Quill.register(Font, true);

        //Dodavanje line spacing
        var Parchment = Quill.import('parchment');
        var lineHeightConfig = {
            scope: Parchment.Scope.INLINE,
            whitelist: [
                '1.0',
                '1.3',
                '1.5',
                '1.6',
                '1.8',
                '2.0',
                '2.4',
                '2.8',
                '3.0',
                '4.0',
                '5.0'
            ]
        };
        var lineHeightClass = new Parchment.Attributor.Class('lineheight', 'ql-line-height', lineHeightConfig);
        var lineHeightStyle = new Parchment.Attributor.Style('lineheight', 'line-height', lineHeightConfig);

        Parchment.register(lineHeightClass);
        Parchment.register(lineHeightStyle);


        var editorOptions = {
            modules: {
                toolbar: '#toolbar-container'
            },
            placeholder: 'Type your story...',
            theme: 'snow'
        };

        var quill = new Quill('#editor', editorOptions);
        var toolbar = quill.getModule('toolbar');

        // Default text color
        quill.format('color', 'rgb(0, 102, 204)');

        toolbar.addHandler('image', () => {
            selectLocalImage('small')
        });

        // Starting and stopping loading circle in the middle of the screen

        function selectedCategoryArray(array) {
            let selectedArray = [];

            for (let i in array) {
                if (array[i].checked)
                {
                    selectedArray.push(array[i].value);
                }
            }

            if (selectedArray === [])
            {
                return null;
            }

            return selectedArray;
        }

        var blogCheckboxes = document.getElementsByName('categories[]');
        var myEditor = document.querySelector('#editor');



        // Submit Story form

        $('#submit-blog-form').on('submit', function(e) {
            e.preventDefault();

            startLoading();
            var selected = selectedCategoryArray(blogCheckboxes);
            var headlineImageUrl = $('.headline-image-url').val();
            var html = myEditor.children[0].innerHTML;
            var title = $('input#title').val();
            var subtitle = $('input#subtitle').val();
            var tags = $('#tags_1').val();

            $.ajax({
                method: "POST",
                url: "/admin/blog/store",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    categories : selected,
                    headline_image : headlineImageUrl,
                    title: title,
                    subtitle : subtitle,
                    content: html,
                    tags: tags
                },
                dataType: 'json'
            })
                .fail(function(jqxhr, textStatus, errorThrown) {
                    stopLoading();

                    var response = JSON.parse(jqxhr.responseText);
                    var statusCode = jqxhr.status;

                    $('.error-custom').hide();

                    switch (statusCode) {
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
                            alert('An error occured! Please try againg later.');
                            break;
                    }

                })
                .done(function(data) {
                    stopLoading();
                    window.location = data.url;
                });
        });

        // Update Story

        $('#update-blog-form').on('submit', function(e) {
            e.preventDefault();

            startLoading();

            var selectedUpdate = selectedCategoryArray(blogCheckboxes);
            var headlineImageUrlUpdate = $('.headline-image-url').val();
            var storyId = $('.story-id').val();
            var htmlUpdate = myEditor.children[0].innerHTML;
            var titleUpdate = $('input#title').val();
            var subtitleUpdate = $('input#subtitle').val();
            var tagsUpdate = $('#tags_1').val();

            $.ajax({
                method: "POST",
                url: "/admin/blog/update",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    categories : selectedUpdate,
                    headline_image : headlineImageUrlUpdate,
                    title: titleUpdate,
                    subtitle : subtitleUpdate,
                    content: htmlUpdate,
                    tags: tagsUpdate,
                    id : storyId
                },
                dataType: 'json'
            })
                .fail(function(jqxhr, textStatus, errorThrown) {
                    stopLoading();

                    var response = JSON.parse(jqxhr.responseText);
                    var statusCode = jqxhr.status;

                    $('.error-custom').hide();

                    switch (statusCode) {
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
                            alert('An error occured! Please try againg later.');
                            break;
                    }
                })
                .done(function(data) {
                    stopLoading();
                    window.location = data.url;
                });


        });


    }



    if ($('#submit-admin-form')) {
        $('#submit-admin-form').on('submit', function(e) {
            e.preventDefault();

            $('.error-custom-input').hide();

            var firstName = $('input[name=first_name]').val();
            var lastName = $('input[name=last_name]').val();
            var email = $('input[name=email]').val();
            var password = $('input[name=password]').val();

            $.ajax({
                method: "POST",
                url: "/admin/admins/add",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    password: password
                },
                dataType: 'json'
            })
            .fail(function(jqxhr, textStatus, errorThrown) {
                var response = JSON.parse(jqxhr.responseText);
                var statusCode = jqxhr.status;

                $('.error-custom-input').hide();

                if(statusCode === 422) {
                    // input fields validation failed

                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                }
            })
            .done(function(data) {
                if (data.status === 'success' && data.code === 200) {
                    alert('success');
                    window.location = data.url;
                } else {
                    $('.alert').html(data.message);
                    $('.alert').show();
                }
            });
        });
    }

    if ($('#submit-admin-edit-form')) {
        $('#submit-admin-edit-form').on('submit', function(e) {
            e.preventDefault();

            $('.error-custom-input').hide();

            var id = $('input[name=id]').val();
            var firstName = $('input[name=first_name]').val();
            var lastName = $('input[name=last_name]').val();
            var email = $('input[name=email]').val();
            var password = $('input[name=password]').val();

            $.ajax({
                method: "POST",
                url: "/admin/admins/update/" + id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    password: password
                },
                dataType: 'json'
            })
            .fail(function(jqxhr, textStatus, errorThrown) {
                var response = JSON.parse(jqxhr.responseText);
                var statusCode = jqxhr.status;

                $('.error-custom-input').hide();

                if(statusCode === 422) {
                    // input fields validation failed

                    $.each(response.errors, function(key, value) {
                        $('.error-' + key).html(value).show();
                    });
                }
            })
            .done(function(data) {
                if (data.status === 'success' && data.code === 200) {
                    window.location = data.url;
                } else {
                    $('.alert').html(data.message);
                    $('.alert').show();
                }
            });
        });
    }



});

$('.post-verification, .comment-verification, .answer-verification').on('click', function(e) {

    e.preventDefault();

    var id = $(this).data('id');
    var status = $(this).data('status');
    var url = "/admin/posts/verify";

    if($(this).hasClass('comment-verification')) {
        url = "/admin/comments/verify";
    }

    if($(this).hasClass('answer-verification')) {
        url = "/admin/answers/verify";
    }

    $.ajax({
        method: "POST",
        url: url,
        context: $(this),
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            status: status
        },
        dataType: 'json'
    })
        .fail(function(jqxhr, textStatus, errorThrown) {
            alert('Something went wrong! Please try again later.');
        })
        .done(function(data) {
            $(this).data('status', data.status);
            $(this).next('span').click();

            alert(data.message);
        });
});


$('.post-selection').on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var select = $(this).data('status');

    $.ajax({
        method: "POST",
        url: '/admin/posts/select',
        context: $(this),
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            select: select
        },
        dataType: 'json'
    })
        .fail(function(jqxhr, textStatus, errorThrown) {
            alert('Something went wrong! Please try again later.');
        })
        .done(function(data) {
            $(this).data('status', data.status);
            $(this).next('span').click();

            alert(data.message);
        });
});




$('.user-verification').on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var status = $(this).data('status');

    $.ajax({
        method: "POST",
        url: "/admin/users/verify",
        context: $(this),
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            status: status
        },
        dataType: 'json'
    })
        .fail(function(jqxhr, textStatus, errorThrown) {
            alert('Something went wrong! Please try again later.');
        })
        .done(function(data) {
            $(this).data('status', data.status);
            $(this).next('span').click();

            alert(data.message);
        });
});

// email edit submit
$('#submit-email-edit-form').on('submit', function(e) {
    e.preventDefault();

    let email = $("input[name='email']").val();
    let email_id = $("input[name='id']").val();
    $.ajax({
        method: "POST",
        url: "/admin/email/update/"+email_id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            email : email,
        },
        dataType: 'json'
    })
        .fail(function(jqxhr, textStatus, errorThrown) {

            var response = JSON.parse(jqxhr.responseText);
            var statusCode = jqxhr.status;

            $('.error-custom').hide();

            switch (statusCode) {
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
                    alert('An error occured! Please try againg later.');
                    break;
            }

        })
        .done(function(data) {
            window.location = data.url;
        });
});








