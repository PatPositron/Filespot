var downloads = 0,
    hover = false,
    url = $('#url'),
    clip = $('#cliphint'),
    icon = $('#file');

url.focus(function() {
    url[0].setSelectionRange(0, url.val().length);
    document.execCommand('copy');
    
    clip.text(clip.attr('m2'));
});

url.blur(function() {
    clip.text(clip.attr('m1'));
});

icon.hover(function() {
    hover = true;
    $('#bigShadow').toggle();
}, function() {
    hover = false;
    icon.mouseup();
});

icon.mousedown(function(event) {
    if (event.button != 0)
        return;

    $('#triangle').attr('fill', 'rgb(30, 100, 130)');
    $('#body').attr('fill', 'rgb(30, 100, 130)');
    $('#flood').attr('flood-color', 'rgb(40, 75, 90)');

    downloads++;
    $('#downloads').text(downloads.toLocaleString('en-US'));

    setTimeout(function() {
        location.reload(true);
    }, 1500);
});

icon.mouseup(function() {
    $('#triangle').attr('fill', 'rgb(1, 145, 200)');
    $('#body').attr('fill', 'rgb(1, 145, 200)');
    $('#flood').attr('flood-color', 'rgb(30, 100, 130)');

    if (!hover)
        $('#bigShadow').toggle();
});
