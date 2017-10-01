
var downloads = 0;

function setDownloads(amount) {
    downloads = amount;
};

$('#file').hover(function() {
    $('#bigShadow').toggle();
}, function() {
    $('#file').mouseup();
});

$('#file').mousedown(function() {
    $('#triangle').attr('fill', 'rgb(30, 100, 130)');
    $('#body').attr('fill', 'rgb(30, 100, 130)');
    $('#flood').attr('flood-color', 'rgb(40, 75, 90)');

    downloads++;
    $('#downloads').text(downloads);
});

$('#file').mouseup(function() {
    $('#triangle').attr('fill', 'rgb(1, 145, 200)');
    $('#body').attr('fill', 'rgb(1, 145, 200)');
    $('#flood').attr('flood-color', 'rgb(30, 100, 130)');
    $('#bigShadow').toggle();
});
