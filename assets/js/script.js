/* Author: 
 Crystal Presentations Ltd
 */
$(function () {
    $('.key').click(function (event) {
        checkKeys();
    });
    function checkKeys() {
        if ($('#key1').is(':checked') && $('#key2').is(':checked')) {
            $('#goButton').attr('disabled', false);
        } else {
            $('#goButton').attr('disabled', true);
        }
    }

    var pageId;

    function updatePage() {
        pageId = "mail/" + $('#emailSelect').val();
        $('iframe').attr('src', pageId);
        $.ajax({url:pageId, cache:false}).done(function (html) {
            var theTitle = $(html).filter('title').text();
            $('#emailTitle').val(theTitle);
        });
    }

    function getSize() {
        $('#previewArea').height($(window).height() - 80);
    }

    $('#refreshButton').click(function (event) {
        event.preventDefault();
        updatePage();
    });
    $('#emailSelect').change(function (event) {
        event.preventDefault();
        updatePage();
    });
    $('#turn').toggle(function () {
        $('#key1, #key2').attr('checked', true);
        checkKeys();
    }, function () {
        $('#key1, #key2').attr('checked', false);
        checkKeys();
    });
    $('#mailForm').submit(function (event) {

        event.preventDefault();

        var address = '';
        $.each($('input[name="testCheck"]:checked'), function () {
            var email = $(this).val() + '@crystalpresentations.com';
            address = address + email + ', ';
        });

        var theTitle = $('#emailTitle').val();
        console.debug(theTitle);

        $.ajax({url:pageId, cache:false}).done(function (html) {
            $.post('mail.php', {to:address, message:html, title:theTitle},
                function (data) {
                    if (data.error) {
                        $('#feedback').removeClass().addClass('error');
                        //console.debug('error!');
                    } else {
                        $('#feedback').removeClass().addClass('success');
                    }
                    $('#feedback').empty().append(data.feedback).fadeIn();
                }, "json").error(function () {
                    $('#feedback').removeClass().addClass('error').empty().append("Ajax Error!").fadeIn();
                });
        });
    });
    $(window).resize(function () {
        getSize();
    });
    updatePage();
    getSize();
});