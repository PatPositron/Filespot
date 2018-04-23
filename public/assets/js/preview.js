var downloads = 0;
var hover = false;

var url = $('#url');
var icon = $('#file');

url.focus(function() {
    url.select();
});

icon.hover(function() {
    hover = true;
    $('#bigShadow').toggle();
}, function() {
    hover = false;
    icon.mouseup();
});

icon.mousedown(function() {
    $('#triangle').attr('fill', 'rgb(30, 100, 130)');
    $('#body').attr('fill', 'rgb(30, 100, 130)');
    $('#flood').attr('flood-color', 'rgb(40, 75, 90)');

    downloads++;
    $('#downloads').text(downloads.toLocaleString('en-US'));
});

icon.mouseup(function() {
    $('#triangle').attr('fill', 'rgb(1, 145, 200)');
    $('#body').attr('fill', 'rgb(1, 145, 200)');
    $('#flood').attr('flood-color', 'rgb(30, 100, 130)');

    if (!hover)
        $('#bigShadow').toggle();
});
