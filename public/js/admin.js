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

    if ($('#submit-faq-form')) {
        $('#submit-faq-form').on('submit', function(e) {
            e.preventDefault();

            $('.error-custom-input').hide();

            var question = $('textarea[name=question]').val();
            var answer = $('textarea[name=answer]').val();

            $.ajax({
                method: "POST",
                url: "/admin/faqs/add",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    question: question,
                    answer: answer
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

    if ($('#submit-faq-edit-form')) {
        $('#submit-faq-edit-form').on('submit', function(e) {
            e.preventDefault();

            $('.error-custom-input').hide();

            var id = $('input[name=id]').val();
            var question = $('textarea[name=question]').val();
            var answer = $('textarea[name=answer]').val();

            $.ajax({
                method: "POST",
                url: "/admin/faqs/update/" + id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    question: question,
                    answer: answer
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

    function getId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return 'error';
        }
    }

    function setVideoYoutube(){
        var myUrl = $('#youtube').val();
        // var iframeHolder = $('#iframe-holder').val();

        myId = getId(myUrl);

        if(myId == 'error') {
            $('#iframe-holder').html('<span>There was an error! Please check URL of the video.</span>');
        }else{
            $('#iframe-holder').html('<iframe width="100%" height="100%" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
        }
    }

    $('#youtube').on('input', setVideoYoutube);

    if ($('#submit-tutorial-form')) {
        $('#submit-tutorial-form').on('submit', function(e) {
            e.preventDefault();

            $('.error-custom-input').hide();

            var tutorialarray = [];
            var tutorialCategoryId = $(".checkbox input").each(function(){
                if ( $(this).is(":checked") ) {
                    tutorialarray.push($(this).val())
                }
            });

            // var tutorialCategoryId = $('.checkbox input').val();

            var title = $('input[name=title]').val();
            var description = $('textarea[name=description]').val();
            var youtube = $('input[name=youtube]').val();
            var tags = $('input[name=tags]').val();

            $.ajax({
                method: "POST",
                url: "/admin/tutorials/add",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    tutorial_category_ids: tutorialarray,
                    title: title,
                    description: description,
                    youtube: youtube,
                    tags: tags
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

    if ($('#submit-tutorial-edit-form')) {
        $('#submit-tutorial-edit-form').on('submit', function(e) {
            e.preventDefault();

            $('.error-custom-input').hide();

            var tutorialarray = [];
            var tutorialCategoryId = $(".checkbox input").each(function(){
                if ( $(this).is(":checked") ) {
                    tutorialarray.push($(this).val())
                }
            });

            var id = $('input[name=id]').val();
            var title = $('input[name=title]').val();
            var description = $('textarea[name=description]').val();
            var tags = $('input[name=tags]').val();
            var youtube = $('input[name=youtube]').val();

            $.ajax({
                method: "POST",
                url: "/admin/tutorials/update/" + id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    tutorial_category_ids: tutorialarray,
                    title: title,
                    description: description,
                    tags: tags,
                    youtube: youtube
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


    // $('.answer-verification').on('click', function(e) {
    //     e.preventDefault();
    //
    //     var id = $(this).data('id');
    //     var status = $(this).data('status');
    //
    //     $.ajax({
    //         method: "POST",
    //         url: "/admin/answers/verify",
    //         context: $(this),
    //         data: {
    //             _token: $('meta[name="csrf-token"]').attr('content'),
    //             id: id,
    //             status: status
    //         },
    //         dataType: 'json'
    //     })
    //     .fail(function(jqxhr, textStatus, errorThrown) {
    //         alert('Something went wrong! Please try again later.');
    //     })
    //     .done(function(data) {
    //         $(this).data('status', data.status);
    //         $(this).next('span').click();
    //
    //         alert(data.message);
    //     });
    // });

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






function generateItem(elementName) {
    var item = document.createElement('div');

    item.setAttribute('class', 'col-md-3 col-sm-12 col-xs-12 ' + elementName);

    return item;
}

function generateRemoveItem(elementName) {
    var removeItem = document.createElement('a');
    var removeIcon = document.createElement('i');

    removeItem.setAttribute('class', 'remove-' + elementName);
    removeIcon.setAttribute('class', 'fa fa-close');

    removeItem.appendChild(removeIcon);

    return removeItem;
}

function generateInputEelement(inputName) {
    var input = document.createElement('input');

    input.setAttribute('type', 'text');
    input.setAttribute('name', inputName);
    input.setAttribute('class', 'form-control col-md-12 col-sm-12 col-xs-12');

    return input;
}

function generateCheckboxEelement(inputName) {
    var checkboxDiv = document.createElement('div');
    var checkboxLabel = document.createElement('label');
    var checkbox = document.createElement('input');

    checkboxDiv.setAttribute('class', 'checkbox');
    checkbox.setAttribute('type', 'checkbox');
    checkbox.setAttribute('name', inputName);
    checkbox.setAttribute('value', 'yes');

    checkboxLabel.appendChild(checkbox);
    checkboxDiv.appendChild(checkboxLabel);

    return checkboxDiv;
}

function generateTextareaEelement(inputName) {
    var textarea = document.createElement('textarea');

    textarea.setAttribute('name', inputName);
    textarea.setAttribute('class', 'form-control col-md-12 col-sm-12 col-xs-12');
    textarea.setAttribute('rows', '5');

    return textarea;
}

function generateInput(inputType, inputName) {
    if (inputType == 'input') { var input = generateInputEelement(inputName); }
    if (inputType == 'checkbox') { var input = generateCheckboxEelement(inputName); }
    if (inputType == 'textarea') { var input = generateTextareaEelement(inputName); }

    return input;
}

function generateFormGroupElement(inputType, inputName) {
    var formGroup = document.createElement('div');
    var label = document.createElement('label');
    var inputHolderDiv = document.createElement('div');
    var input = generateInput(inputType, inputName);
    var error = document.createElement('span');

    formGroup.setAttribute('class', 'form-group');
    label.setAttribute('class', 'col-md-12 col-sm-12 col-xs-12');
    label.textContent = inputName.charAt(0).toUpperCase() + inputName.slice(1).replace(/_/g, ' ');
    inputHolderDiv.setAttribute('class', 'col-md-12 col-sm-12 col-xs-12');
    error.setAttribute('class', 'error-custom error-custom-input error-' + inputName.replace(/_/g, '-'));

    inputHolderDiv.appendChild(input);
    inputHolderDiv.appendChild(error);

    formGroup.appendChild(label);
    formGroup.appendChild(inputHolderDiv);

    return formGroup;
}

function generateNewParameterElement(elementName) {
    var parameterDiv = generateItem(elementName);
    var removeParameter = generateRemoveItem(elementName);
    var nameInput = generateFormGroupElement('input', 'parameter_name');
    var requiredInput = generateFormGroupElement('checkbox', 'parameter_required');
    var typeInput = generateFormGroupElement('input', 'parameter_type');
    var descriptionInput = generateFormGroupElement('textarea', 'parameter_description');

    parameterDiv.appendChild(removeParameter);
    parameterDiv.appendChild(nameInput);
    parameterDiv.appendChild(requiredInput);
    parameterDiv.appendChild(typeInput);
    parameterDiv.appendChild(descriptionInput);

    return parameterDiv;
}

function generateNewExampleElement(elementName) {
    var exampleDiv = generateItem(elementName);
    var removeExample = generateRemoveItem(elementName);
    var exampleInput = generateFormGroupElement('textarea', 'example');

    exampleDiv.appendChild(removeExample);
    exampleDiv.appendChild(exampleInput);

    return exampleDiv;
}

$('.new-parameter').on('click', function(e) {
    e.preventDefault();

    var newParameter = generateNewParameterElement('parameter');
    var parametersEelement = document.getElementById('parameters');
    var parametersRowEelement = document.getElementById('parameters-row');
    var addParametersEelement = document.getElementById('add-parameter');

    parametersRowEelement.insertBefore(newParameter, addParametersEelement);
});

$('.new-example').on('click', function(e) {
    e.preventDefault();

    var newExample = generateNewExampleElement('example');
    var examplesEelement = document.getElementById('examples');
    var examplesRowEelement = document.getElementById('examples-row');
    var addExampleEelement = document.getElementById('add-example');

    examplesRowEelement.insertBefore(newExample, addExampleEelement);
});

$('body').on('click', '.remove-parameter, .remove-example , .remove-main-optional , .remove-subTitle, .remove-Sub-title-description, .remove-DevElement, .remove-dropoble, .remove-sortableexample, .remove-sortableiframe , .remove-sortablefunction, .remove-sortablefunctionexampletitle', function(e) {
    e.preventDefault();

    $(this).parent().remove();
});

// Edit Api-Docs Fuction
$('#submit-api-docs-function-edit-form').on('submit', function(e) {
    e.preventDefault();

    var title = $('input[name=title]').val();
    var apiFunction = $('input[name=function]').val();
    var description = $('input[name=description]').val();
    var group = $('#selectedgroupe option:selected').val();
    var maxVersion = $('#selectMaxVers option:selected').val();
    var minVersion = $('#selectMinVers option:selected').val();

    var parametersNamesArray = [];
    var parametersRequiredsArray = [];
    var parametersTypesArray = [];
    var parametersDescriptionsArray = [];
    var examplesArray = [];

    var parametersNames = $("input[name='parameter_name']").each(function(){ parametersNamesArray.push($(this).val()) });
    var parametersRequireds = $('input[name=parameter_required]').each(function(){ if ($(this).is(':checked')) { parametersRequiredsArray.push('yes') } else { parametersRequiredsArray.push('no') }  });
    var parametersTypes = $('input[name=parameter_type]').each(function(){ parametersTypesArray.push($(this).val()) });
    var parametersDescriptions = $('textarea[name=parameter_description]').each(function(){ parametersDescriptionsArray.push($(this).val()) });
    var examples = $('textarea[name=example]').each(function(){ examplesArray.push($(this).val()); });

    $.ajax({
        method: "POST",
        url: "/admin/documentation/api/update/" + functionId,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            title: title,
            description: description,
            function: apiFunction,
            parameters_names: parametersNamesArray,
            parameters_requireds: parametersRequiredsArray,
            parameters_types: parametersTypesArray,
            parameters_descriptions: parametersDescriptionsArray,
            examples: examplesArray,
            group_id: group,
            maxVersion :maxVersion,
            minVersion :minVersion
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

                if (response.errors['title'] && response.errors['title'].length > 0) { $('.error-title').html(response.errors.title[0]).show(); }
                if (response.errors['function'] && response.errors['function'].length > 0) { $('.error-function').html(response.errors.function[0]).show(); }
                if (response.errors['description'] && response.errors['description'].length > 0) { $('.error-description').html(response.errors.description[0]).show(); }

                $.each(response.errors, function(key, value) {
                    if (
                        key.indexOf('parameters_names') !== -1 ||
                        key.indexOf('parameters_requireds') !== -1 ||
                        key.indexOf('parameters_types') !== -1 ||
                        key.indexOf('parameters_descriptions') !== -1 ||
                        key.indexOf('examples') !== -1
                    ) {
                        var trueKey = key.substring(0, key.length - 2);
                        var objectType = key.substring(key.length - 1, key.length);
                        var trueIndex = key.substring(key.length - 1, key.length);

                        if (trueKey.indexOf('examples') !== -1) {
                            $('.example').eq(trueIndex).find('.error-example').html(value).show();
                        } else {
                            var objectName = trueKey.substring(trueKey.indexOf('_') + 1, trueKey.length);
                            var element = $('.parameter').eq(trueIndex);

                            if (objectName == 'names') { element.find('.error-parameter-name').html(value[0]).show(); }
                            if (objectName == 'requireds') { element.find('.error-parameter-required').html(value[0]).show(); }
                            if (objectName == 'types') { element.find('.error-parameter-type').html(value[0]).show(); }
                            if (objectName == 'descriptions') { element.find('.error-parameter-description').html(value[0]).show(); }
                        }
                    }
                });

                break;
            case 500:
                alert(response.message);

                break;
            default:
                alert('Something went wrong! Please try again later.');

                break;
        }
    })
    .done(function(data) {
        if (data.status === 'success') {
            window.location = data.url;
        }
    });
});

// Adding API Documentation Function on Submit
$('#submit-api-docs-function-create-form').on('submit', function(e) {
    e.preventDefault();

    var title = $('input[name=title]').val();
    var apiFunction = $('input[name=function]').val();
    var description = $('input[name=description]').val();
    var group = $('#selectedgroupe option:selected').val();
    var maxVersion = $('#selectMaxVers option:selected').val();
    var minVersion = $('#selectMinVers option:selected').val();

    var parametersNamesArray = [];
    var parametersRequiredsArray = [];
    var parametersTypesArray = [];
    var parametersDescriptionsArray = [];
    var examplesArray = [];

    var parametersNames = $("input[name='parameter_name']").each(function(){ parametersNamesArray.push($(this).val()) });
    var parametersRequireds = $('input[name=parameter_required]').each(function(){ if ($(this).is(':checked')) { parametersRequiredsArray.push('yes') } else { parametersRequiredsArray.push('no') }  });
    var parametersTypes = $('input[name=parameter_type]').each(function(){ parametersTypesArray.push($(this).val()) });
    var parametersDescriptions = $('textarea[name=parameter_description]').each(function(){ parametersDescriptionsArray.push($(this).val()) });
    var examples = $('textarea[name=example]').each(function(){ examplesArray.push($(this).val()); });

    $.ajax({
        method: "POST",
        url: "/admin/documentation/api/add",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            title: title,
            description: description,
            function: apiFunction,
            parameters_names: parametersNamesArray,
            parameters_requireds: parametersRequiredsArray,
            parameters_types: parametersTypesArray,
            parameters_descriptions: parametersDescriptionsArray,
            examples: examplesArray,
            group_id: group,
            maxVersion :maxVersion,
            minVersion :minVersion
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

                if (response.errors['title'] && response.errors['title'].length > 0) { $('.error-title').html(response.errors.title[0]).show(); }
                if (response.errors['function'] && response.errors['function'].length > 0) { $('.error-function').html(response.errors.function[0]).show(); }
                if (response.errors['description'] && response.errors['description'].length > 0) { $('.error-description').html(response.errors.description[0]).show(); }

                $.each(response.errors, function(key, value) {
                    if (
                        key.indexOf('parameters_names') !== -1 ||
                        key.indexOf('parameters_requireds') !== -1 ||
                        key.indexOf('parameters_types') !== -1 ||
                        key.indexOf('parameters_descriptions') !== -1 ||
                        key.indexOf('examples') !== -1
                    ) {
                        var trueKey = key.substring(0, key.length - 2);
                        var objectType = key.substring(key.length - 1, key.length);
                        var trueIndex = key.substring(key.length - 1, key.length);

                        if (trueKey.indexOf('examples') !== -1) {
                            $('.example').eq(trueIndex).find('.error-example').html(value).show();
                        } else {
                            var objectName = trueKey.substring(trueKey.indexOf('_') + 1, trueKey.length);
                            var element = $('.parameter').eq(trueIndex);

                            if (objectName == 'names') { element.find('.error-parameter-name').html(value[0]).show(); }
                            if (objectName == 'requireds') { element.find('.error-parameter-required').html(value[0]).show(); }
                            if (objectName == 'types') { element.find('.error-parameter-type').html(value[0]).show(); }
                            if (objectName == 'descriptions') { element.find('.error-parameter-description').html(value[0]).show(); }
                        }
                    }
                });

                break;
            case 500:
                alert(response.message);

                break;
            default:
                alert('Something went wrong! Please try again later.');

                break;
        }
    })
    .done(function(data) {
        if (data.status === 'success') {
            window.location = data.url;
        }
    });
});

// Adding API Documentation version on Submit
$('#submit-api-docs-version-create-form').on('submit', function(e) {
    e.preventDefault();

    var version = $('input[name=version]').val();
    var description = $('textarea[name=description]').val();
    var fixedBugs = $('textarea[name=fixedbugs]').val();

    $.ajax({
        method: "POST",
        url: "/admin/documentation/api/versions/add",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            version: version,
            description: description,
            fixedBugs: fixedBugs,
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

                if (response.errors['version'] && response.errors['version'].length > 0) { $('.error-version').html(response.errors.version[0]).show(); }
                if (response.errors['description'] && response.errors['description'].length > 0) { $('.error-description').html(response.errors.description[0]).show(); }
                if (response.errors['fixedbugs'] && response.errors['fixedbugs'].length > 0) { $('.error-fixedbugs').html(response.errors.fixedbugs[0]).show(); }


                break;
            case 500:
                alert(response.message);

                break;
            default:
                alert('Something went wrong! Please try again later.');

                break;
        }
    })
    .done(function(data) {
        if (data.status === 'success') {
            window.location = data.url;
        }
    });
});

// edit API Documentation version on Submit
$('#submit-api-docs-version-edit-form').on('submit', function(e) {
    e.preventDefault();

    var version = $('input[name=version]').val();
    var description = $('textarea[name=description]').val();
    var fixedBugs = $('textarea[name=fixedbugs]').val();

    $.ajax({
        method: "POST",
        url: "/admin/documentation/api/versions/update/" + versionId,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            version: version,
            description: description,
            fixedBugs: fixedBugs,
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

                if (response.errors['version'] && response.errors['version'].length > 0) { $('.error-version').html(response.errors.version[0]).show(); }
                if (response.errors['description'] && response.errors['description'].length > 0) { $('.error-description').html(response.errors.description[0]).show(); }
                if (response.errors['fixedbugs'] && response.errors['fixedbugs'].length > 0) { $('.error-fixedbugs').html(response.errors.fixedbugs[0]).show(); }


                break;
            case 500:
                alert(response.message);

                break;
            default:
                alert('Something went wrong! Please try again later.');

                break;
        }
    })
    .done(function(data) {
        if (data.status === 'success') {
            window.location = data.url;
        }
    });
});
// generating new elements for DEV DOCS
function generateSelect(inputName){
    var select = document.createElement('select');
    select.setAttribute('class', 'form-control');
    select.setAttribute('id', inputName);
    return select;
}
function generateOption(value , text){
    var option = document.createElement('option');
    option.setAttribute('value', value);
    option.textContent = text;

    return option;
}
function generateDropoble(id){
    var dropoboldDiv = document.createElement('div');
    dropoboldDiv.setAttribute('class','droppable');
    dropoboldDiv.setAttribute('id','drop'+id);
    dropoboldDiv.setAttribute('ondrop','drop(event)');
    dropoboldDiv.setAttribute('ondragover','allowDrop(event)');
    dropoboldDiv.setAttribute('style','padding:2rem 0; margin:0.5rem 0;');

    return dropoboldDiv;
}
// ' <div class="sortableexample" id="dragExampleTitle{{$indexKey}}" draggable="true" ondragstart="drag(event)" ondragover="allowDrop(event)">'

function generateWrap(name, id){
    let sortname;
    if( name == 'Subtitleexampletitle' )
    {
        sortname= 'sortableexample';
    }
    else if( name == 'Subtitleiframetitle')
    {
        sortname= 'sortableiframe';
    }
    else if( name == 'Subtitlefunction')
    {
        sortname= 'sortablefunction';
    }
    else if( name == 'Subtitlefunctionexampletitle')
    {
        sortname= 'sortablefunctionexampletitle';
    }
    var wrap = document.createElement('div');
    wrap.setAttribute('class',sortname);
    wrap.setAttribute('id','drop'+name+id);
    wrap.setAttribute('draggable','true');
    wrap.setAttribute('ondragstart','drag(event)');
    wrap.setAttribute('ondragover','allowDrop(event)');

    return wrap;
}
function generateFormGroupElementDev(inputType, inputName) {
    var formGroup = document.createElement('div');
    var label = document.createElement('label');
    var inputHolderDiv = document.createElement('div');
    var input = generateInput(inputType, inputName.replace(/ /g, '_'));
    var error = document.createElement('span');
    var arrows = document.createElement('i');

    formGroup.setAttribute('class', 'form-group');


    if(!inputName.includes("Subtitle") ||
     inputName.replace(/ /g, '_').includes( "Subtitle_example_title") ||
      inputName.replace(/ /g, '_').includes( "Subtitle_iframe_title")  ||
       inputName.replace(/ /g, '_') ==  "Subtitle_function" ||
       inputName.replace(/ /g, '_') == "Subtitle_function_example_title" )
    {

    }
    else
    {
        subTitleLoop++;
        formGroup.setAttribute('id', 'drag'+inputName.replace(/ /g, '')+subTitleLoop);
        formGroup.setAttribute('draggable', 'true');
        formGroup.setAttribute('ondragstart', 'drag(event)');
    }
    label.setAttribute('class', 'col-md-4 col-sm-12 col-xs-12');
    label.textContent = inputName.charAt(0).toUpperCase() + inputName.slice(1);
    inputHolderDiv.setAttribute('class', 'col-md-7 col-sm-12 col-xs-12');
    error.setAttribute('class', 'error-custom error-custom-input error-' + inputName.replace(/ /g, '-'));
    arrows.setAttribute('class' , 'fa fa-arrows-v');


    inputHolderDiv.appendChild(input);
    inputHolderDiv.appendChild(error);
    if(inputName.replace(/ /g, '_') == "Subtitle_example")
    {
        var select = generateSelect('selectCode');
        var label1 = document.createElement('label');
        label1.setAttribute('class', 'col-md-4 col-sm-12 col-xs-12');
        label1.textContent = 'select language';
        array = ['html','javascript']
        for (let index = 0; index < 2; index++) {
           var option = generateOption(array[index], array[index]);
            select.appendChild(option);
        }

        inputHolderDiv.appendChild(label1);
        inputHolderDiv.appendChild(select);
    }

    formGroup.appendChild(label);
    formGroup.appendChild(inputHolderDiv);
    formGroup.appendChild(arrows);

    if(inputName == "Subtitle"){
        subTitleLoop++;
        subTitledropLoop++;

        let removeOptional = generateRemoveItem('DevElement');
        let removedropoble = generateRemoveItem('dropoble');
        formGroup.setAttribute('id', 'drag'+subTitleLoop);
        formGroup.setAttribute('draggable', 'true');
        formGroup.setAttribute('ondragstart', 'drag(event)');
        formGroup.appendChild(removeOptional);

        let dropoble = generateDropoble(subTitledropLoop);
        dropoble.appendChild(removedropoble);
        dropoble.appendChild(formGroup);

        return dropoble;
    }
    else if(inputName.replace(/ /g, '_').includes( "Subtitle_example_title"))
    {
        subTitleLoop++;
        let wrap = generateWrap(inputName.replace(/ /g, ''), subTitleLoop);
        let removesortableexample = generateRemoveItem('sortableexample');

        wrap.appendChild(removesortableexample);
        wrap.appendChild(formGroup);

        return wrap;
    }
    else if(inputName.replace(/ /g, '_').includes( "Subtitle_iframe_title"))
    {
        subTitleLoop++;
        let wrap = generateWrap(inputName.replace(/ /g, ''), subTitleLoop);
        let removesortableexample = generateRemoveItem('sortableiframe');

        wrap.appendChild(removesortableexample);
        wrap.appendChild(formGroup);

        return wrap;
    }
    else if(inputName.replace(/ /g, '_') ==  "Subtitle_function" )
    {
        subTitleLoop++;
        let wrap = generateWrap(inputName.replace(/ /g, ''), subTitleLoop);
        let removesortableexample = generateRemoveItem('sortablefunction');

        wrap.appendChild(removesortableexample);
        wrap.appendChild(formGroup);

        return wrap;
    }
    else if(inputName.replace(/ /g, '_') == "Subtitle_function_example_title" )
    {
        subTitleLoop++;
        let wrap = generateWrap(inputName.replace(/ /g, ''), subTitleLoop);
        let removesortableexample = generateRemoveItem('sortablefunctionexampletitle');

        wrap.appendChild(removesortableexample);
        wrap.appendChild(formGroup);

        return wrap;
    }
    else{
        var removeOptional = generateRemoveItem('DevElement');
        formGroup.appendChild(removeOptional);

        return formGroup;
    }
}

$('.new-developer').on('click', function(e) {
    e.preventDefault();


    let elementType = $('#selectedElement option:selected').val();

    let name = $('#selectedElement option:selected').html();

    var element = generateFormGroupElementDev(elementType, name);


    if(name.includes("Title"))
    {
        var mainElement = document.getElementById('sortableTitle');
        var addMainEelement = document.getElementById('insertBeforeSortableTitle');
    }
    if(name.includes("Subtitle"))
    {
        var mainElement = document.getElementById('sortablesubtitle');
        var addMainEelement = document.getElementById('insertBeforeSortableSubtitle');
    }

    $(document).ready(function() {
        $('input , textarea, select').on('drop', function() {
            return false;
        });
    });
    mainElement.insertBefore(element, addMainEelement);
    $( function() {
        $( "#sortablesubtitle , .droppable , #sortableTitle , .sortableexample , .sortableiframe , .sortablefunction , .sortablefunctionexampletitle " ).sortable({
            revert: true
        });
    });
});





// edit develeper docs
$('#submit-developer-docs-main-edit-form').on('submit', function(e) {
    e.preventDefault();

    let arrayOfitem =  preperingItemsForDeveloperDocs();

    $.ajax({
        method: "POST",
        url: "/admin/documentation/developer/update/"+mainId,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id : mainId,
            title : arrayOfitem[0],
            maxVersion : arrayOfitem[1],
            minVersion : arrayOfitem[2],

            title_descriptions : arrayOfitem[3],
            title_links : arrayOfitem[4],
            title_link_descriptions : arrayOfitem[5],

            subtitles : arrayOfitem[6]
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
                if (response.errors['title'] && response.errors['title'].length > 0) { $('.error-title').html(response.errors.title[0]).show(); }
                break;
            case 500:
                alert(response.message);

                break;
            default:
                alert('Something went wrong! Please try again later.');

                break;
        }
    })
    .done(function(data) {
        if (data.status === 'success') {
            window.location = data.url;
        }
    });
});

// adding develeper docs
$('#submit-developer-docs-main-create-form').on('submit', function(e) {
    e.preventDefault();

    let arrayOfitem =  preperingItemsForDeveloperDocs();

    $.ajax({
        method: "POST",
        url: "/admin/documentation/developer/add",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            title : arrayOfitem[0],
            maxVersion : arrayOfitem[1],
            minVersion : arrayOfitem[2],

            title_descriptions : arrayOfitem[3],
            title_links : arrayOfitem[4],
            title_link_descriptions : arrayOfitem[5],

            subtitles : arrayOfitem[6]

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
                if (response.errors['title'] && response.errors['title'].length > 0) { $('.error-title').html(response.errors.title[0]).show(); }

                break;
            case 500:
                alert(response.message);

                break;
            default:
                alert('Something went wrong! Please try again later.');

                break;
        }
    })
    .done(function(data) {
        if (data.status === 'success') {
            window.location = data.url;
        }
    });;
});

// ovde pripremam vrednosti za dev docs add i edit ;)
function preperingItemsForDeveloperDocs(){
    var title = $('input[name=title]').val();

    var maxVersion = $('#selectMaxVers option:selected').val();
    var minVersion = $('#selectMinVers option:selected').val();

    var TitleDescriptionsArray = [];
    var TitleLinkArray = [];
    var TitleLinkDescriptionsArray = [];

    $("textarea[name='Title_description']").each(function(){ TitleDescriptionsArray.push($(this).val()) });
    $("textarea[name='Title_Link']").each(function(){ TitleLinkArray.push($(this).val()) });
    $("textarea[name='Title_link_description']").each(function(){ TitleLinkDescriptionsArray.push($(this).val()) });


    // subtitle
    var subtitles_array = [];
    var subtitle_object = {};
    var subtitle_descriptions = [];

    // example
    var subtitle_examples_array = [];
    var subtitle_examples_object = {};
    var subtitle_examples = []; var subtitle_examples_code = []; var subtitle_example_descriptions = []; var subtitle_example_notes = [];

    // iframe
    var subtitle_iframes_array = [];
    var subtitle_iframes_object = {};
    var subtitle_iframes = []; var subtitle_iframe_descriptions = []; var subtitle_iframe_notes = [];

    // function
    var subtitle_functions_array = [];
    var subtitle_functions_object = {};
    var subtitle_function_descriptions = [];

    // function example
    var subtitle_function_example_object = {};
    var subtitle_function_example_array =[];
    var subtitle_function_examples = [];

    // subtitle
    $('.subTitles .droppable').each(function(i, e){

        $(this).find("textarea[name='Subtitle_description']").each(function(){ subtitle_descriptions.push($(this).val()) });

        // example
        $(this).find('.sortableexample').each(function(i, e){

            $(this).find("textarea[name='Subtitle_example']").each(function(){ subtitle_examples.push($(this).val()) });
            $(this).find("#selectCode option:selected").each(function(){ subtitle_examples_code.push($(this).val()) });
            $(this).find("textarea[name='Subtitle_example_description']").each(function(){ subtitle_example_descriptions.push($(this).val()) });
            $(this).find("textarea[name='Subtitle_example_note']").each(function(){ subtitle_example_notes.push($(this).val()) });

            subtitle_examples_object= {
                'id' : i,
                'subtitle_example_title' :$(this).find('input[name=Subtitle_example_title]').val(),
                'subtitle_examples' : subtitle_examples,
                'subtitle_examples_code' : subtitle_examples_code,
                'subtitle_example_descriptions' : subtitle_example_descriptions,
                'subtitle_example_notes' : subtitle_example_notes,
            }
            subtitle_examples = []; subtitle_examples_code = []; subtitle_example_descriptions = []; subtitle_example_notes = [];

            subtitle_examples_array.push(subtitle_examples_object);


        });

        // iframe
        $(this).find('.sortableiframe ').each(function(i, e){

            $(this).find("textarea[name='Subtitle_iframe']").each(function(){ subtitle_iframes.push($(this).val()) });
            $(this).find("textarea[name='Subtitle_iframe_description']").each(function(){ subtitle_iframe_descriptions.push($(this).val()) });
            $(this).find("textarea[name='Subtitle_iframe_note']").each(function(){ subtitle_iframe_notes.push($(this).val()) });

            subtitle_iframes_object= {
                'id' : i,
                'subtitle_iframe_title' :$(this).find('input[name=Subtitle_iframe_title]').val(),
                'subtitle_iframes' : subtitle_iframes,
                'subtitle_iframe_descriptions' : subtitle_iframe_descriptions,
                'subtitle_iframe_notes' : subtitle_iframe_notes,
            }
            subtitle_iframes = []; subtitle_iframe_descriptions = []; subtitle_iframe_notes = [];

            subtitle_iframes_array.push(subtitle_iframes_object);

        });



        // function
        $(this).find('.sortablefunction').each(function(i, e){
            // function example title
            $(this).find('.sortablefunctionexampletitle').each(function(i, e){

                $(this).find("textarea[name='Subtitle_function_example']").each(function(){ subtitle_function_examples.push($(this).val()) });

                subtitle_function_example_object= {
                    'id' : i,
                    'subtitle_function_example_title' :$(this).find('input[name=Subtitle_function_example_title]').val(),
                    'subtitle_function_examples' : subtitle_function_examples,
                }
                subtitle_function_examples = [];

                subtitle_function_example_array.push(subtitle_function_example_object);

            });

            $(this).find("textarea[name='Subtitle_function_description']").each(function(){ subtitle_function_descriptions.push($(this).val()) });

            subtitle_functions_object= {
                'id' : i,
                'subtitle_function' :$(this).find('input[name=Subtitle_function]').val(),
                'subtitle_function_descriptions' : subtitle_function_descriptions,
                'subtitle_function_examples' : subtitle_function_example_array,
            }
            subtitle_function_descriptions = []; subtitle_function_example_array = [];

            subtitle_functions_array.push(subtitle_functions_object);

        });

        subtitle_object = {
            'id' : i ,
            'subtitle':  $(this).find('input[name=Subtitle]').val(),
            'subtitle_descriptions': subtitle_descriptions,

            'subtitle_examples' : subtitle_examples_array,
            'subtitle_iframes' : subtitle_iframes_array,
            'subtitle_functions' : subtitle_functions_array,
        };

            subtitles_array.push(subtitle_object);

            subtitle_iframes_array = [];
            subtitle_functions_array = [];
            subtitle_examples_array = [];
            subtitle_descriptions = [];
        });

        let arrayOfitem=[title, maxVersion, minVersion, TitleDescriptionsArray, TitleLinkArray, TitleLinkDescriptionsArray, subtitles_array];

        return arrayOfitem;
}


// demo edit submit
$('#submit-demo-edit-form').on('submit', function(e) {
    e.preventDefault();
    let demo_id = $("input[name='id']").val();

    let title = $("input[name='title']").val();
    let link = $("textarea[name='link']").val();
    let image_src = $('.demo-image-src').attr('src');
    let image_alt = image_src.substring(image_src.indexOf("demos")+6).replace(/-/g,' ').split('_');

    let product_type_id = $('.productTypes option:selected').val();
    let threeDFeatures_id = [];
    $(".checkbox input").each(function(){
        if ( $(this).is(":checked") ) {
            threeDFeatures_id.push($(this).val())
        }
    });
    $.ajax({
        method: "POST",
        url: "/admin/demos/update/"+demo_id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            title : title,
            link : link,
            image_src : image_src,
            image_alt : image_alt[0],
            product_type_id : product_type_id,
            threeDFeatures_id : threeDFeatures_id
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
// demo add (create) submit
$('#submit-demo-create-form').on('submit', function(e) {
    e.preventDefault();

    let title = $("input[name='title']").val();
    let link = $("textarea[name='link']").val();
    let image_src = $('.demo-image-src').attr('src');
    let image_alt = image_src.substring(image_src.indexOf("demos")+6).replace(/-/g,' ').split('_');

    let product_type_id = $('.productTypes option:selected').val();
    let threeDFeatures_id = [];
    $(".checkbox input").each(function(){
        if ( $(this).is(":checked") ) {
            threeDFeatures_id.push($(this).val())
        }
    });
    $.ajax({
        method: "POST",
        url: "/admin/demos/store",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            title : title,
            link : link,
            image_src : image_src,
            image_alt : image_alt[0],
            product_type_id : product_type_id,
            threeDFeatures_id : threeDFeatures_id
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

// pricing edit
$('#submit-pricing-edit-form').on('submit', function(e) {
    e.preventDefault();
    var pricing_id = $(this).find("input[name='id']").val();
    var package = $(this).find("input[name='package']").val();
    var price = $(this).find("input[name='price']").val() ;
    var annual = 0;
    var save = 0;
    if( parseIntThrowsException(price) != "isNotInt"){
        annual =  annual_price_monthly($(this).find("input[name='discount']").val() , price);
        save= (price - annual)*12;
    }
    // if( (['bespoke', 'free'].includes(price )) ){ annual = 0; save = 0;}

    var pricing_plan_values_array = [];
    $(this).find('.pricing_plans').each(function(i, e){
        var value = $(this).find(`#plan_${i}`).val();
        var plan_id = $(this).find(`#plan_${i}`).attr('plan_id');
        pricing_plan_values = {
            'value': value,
            'plan_id': plan_id,
        }
        pricing_plan_values_array.push(pricing_plan_values);
        pricing_plan_values={};

    });


    $.ajax({
        method: "POST",
        url: "/admin/pricing/update/"+pricing_id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'id' : pricing_id,
            'package': package,
            'price': price,
            'annual_price': annual,
            'save' : save,
            'pricing_plan_values' : pricing_plan_values_array,

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
// pricing create package
$('#submit-pricing-package-create-form').on('submit', function(e) {
    e.preventDefault();
    var pricing_id = $(this).find("input[name='id']").val();
    var package = $(this).find("input[name='package']").val();
    var price = $(this).find("input[name='price']").val() ;
    var annual = 0;
    var save = 0;
    if( parseIntThrowsException(price) != "isNotInt"){
        annual =  annual_price_monthly($(this).find("input[name='discount']").val() , price);
        save= (price - annual)*12;
    }
    // if( (['bespoke', 'free'].includes(price )) ){ annual = 0; save = 0;}

    var pricing_plan_values_array = [];
    $(this).find('.pricing_plans').each(function(i, e){
        var value = $(this).find(`#plan_${i}`).val();
        var plan_id = $(this).find(`#plan_${i}`).attr('plan_id');
        pricing_plan_values = {
            'value': value,
            'plan_id': plan_id,
        }
        pricing_plan_values_array.push(pricing_plan_values);
        pricing_plan_values={};

    });


    $.ajax({
        method: "POST",
        url: "/admin/pricing/store/package",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'id' : pricing_id,
            'package': package,
            'price': price,
            'annual_price': annual,
            'save' : save,
            'pricing_plan_values' : pricing_plan_values_array,
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

// pricing plan edit
$('#submit-pricing-plan-edit-form').on('submit', function(e) {
    e.preventDefault();
    var id = $(this).find("input[name='id']").val();
    var plan = $(this).find("input[name='pricing-plan']").val();
    var categorie_id = $('#selected_categorie option:selected').val();
    $.ajax({
        method: "POST",
        url: "/admin/pricing/plan/update/"+id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'id' : id,
            'plan': plan,
            'categorie_id': categorie_id,

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

// pricing plan create
$('#submit-pricing-plan-create-form').on('submit', function(e) {
    e.preventDefault();

    var plan = $(this).find("input[name='pricing-plan']").val();
    var categorie_id = $('#selected_categorie option:selected').val();

    $.ajax({
        method: "POST",
        url: "/admin/pricing/plan/store",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'plan': plan,
            'categorie_id': categorie_id,},
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











// testimonials edit
$('#submit-testimonials-edit-form').on('submit', function(e) {
    e.preventDefault();
    var id = $(this).find("input[name='id']").val();
    var full_name = $(this).find("input[name='full_name']").val();
    var position = $(this).find("input[name='position']").val();
    var company = $(this).find("input[name='company']").val();
    var link = $(this).find("input[name='link']").val();
    var description = $(this).find("textarea[name='description']").val();

    $.ajax({
        method: "POST",
        url: "/admin/testimonials/update/"+id,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'id' : id,
            'full_name': full_name,
            'position': position,
            'company': company,
            'link' : link,
            'description' : description,
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
            if (data.status === 'success') {
                window.location = data.url;
            }
        });
});

// testimonials create
$('#submit-testimonials-create-form').on('submit', function(e) {
    e.preventDefault();
    var full_name = $(this).find("input[name='full_name']").val();
    var position = $(this).find("input[name='position']").val();
    var company = $(this).find("input[name='company']").val();
    var link = $(this).find("input[name='link']").val();
    var description = $(this).find("textarea[name='description']").val();

    $.ajax({
        method: "POST",
        url: "/admin/testimonials/store",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'full_name': full_name,
            'position': position,
            'company': company,
            'link' : link,
            'description' : description,
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
            if (data.status === 'success') {
                window.location = data.url;
            }
        });
});

// pricing discount for annual price calculator
function discount(annual_price, price){ var discount =  ((price - annual_price) / price)*100; return discount; }
function annual_price_monthly(discount_percentage, price_percentage) { var annual_monthly_Price =  price_percentage - ( price_percentage / 100)*discount_percentage; return annual_monthly_Price; }

function parseIntThrowsException(value) {
    if ( isNaN(parseInt(value)) )
        return 'isNotInt';
    else
        return parseInt(value);
}




