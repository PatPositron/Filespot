
var downloads = 0;
var hover = false;

$('#file').hover(function() {
    hover = true;
    $('#bigShadow').toggle();
}, function() {
    hover = false;
    $('#file').mouseup();
});

$('#file').mousedown(function() {
    $('#triangle').attr('fill', 'rgb(30, 100, 130)');
    $('#body').attr('fill', 'rgb(30, 100, 130)');
    $('#flood').attr('flood-color', 'rgb(40, 75, 90)');

    downloads++;
    $('#downloads').text(downloads.toLocaleString('en-US'));
});

$('#file').mouseup(function() {
    $('#triangle').attr('fill', 'rgb(1, 145, 200)');
    $('#body').attr('fill', 'rgb(1, 145, 200)');
    $('#flood').attr('flood-color', 'rgb(30, 100, 130)');

    if (!hover)
        $('#bigShadow').toggle();
});
