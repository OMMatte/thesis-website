function extendNamespace(callback, namespaceName) {
    if (typeof namespaceName === 'undefined') {
        namespaceName = 'elevutveckling';
    }
    (function (namespaceName, $, undefined) {
        //Private Property
        callback(namespaceName, $, undefined);
    }(window[namespaceName] = window[namespaceName] || {}, jQuery));
}

function alertHtmlSize(pixels) {
    //console.log(pixels);
    pixels += -30;
    document.getElementById('iframe_q2a').style.height = pixels + "px";
}