jQuery(document).ready(function () {

    // Alert parent of new size after page has loaded
    window.onload = function () {
        var html = document.documentElement;

        parent.alertHtmlSize(html.scrollHeight);
    };

    // Alert parent the potential change in size after the browser has been resized
    $(window).resize(function () {
        var html = document.documentElement;

        parent.alertHtmlSize(html.scrollHeight);
    });
});