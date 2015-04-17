function extendNamespace(callback, namespaceName) {
    if (typeof namespaceName === 'undefined') {
        namespaceName = 'elevutveckling';
    }
    (function (namespaceName, $, undefined) {
        //Private Property
        callback(namespaceName, $, undefined);
    }(window[namespaceName] = window[namespaceName] || {}, jQuery));
}
