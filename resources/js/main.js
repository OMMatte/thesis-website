/**
 * A wrapper for using namespaces. Given a namespace name, the given callback is called with that namespace together
 * with the jQuery and undefined signs.
 * It guarantees that '$' refers to jQuery and that 'undefined' refers to a undefined parameter.
 * This is needed since libraries are able to override these basic JavaScript variables and cause strange errors.
 *
 * If the namespace is already defined, that namespace is used and is not overridden.
 *
 * @param callback The callback that will be called using the given namespace
 * @param namespaceName The namespace to extend functionality. If undefined a standard namespace is used
 */
function extendNamespace(callback, namespaceName) {
    if (typeof namespaceName === 'undefined') {
        namespaceName = 'elevutveckling';
    }
    (function (namespaceName, $, undefined) {
        callback(namespaceName, $, undefined);
    }(window[namespaceName] = window[namespaceName] || {}, jQuery));
}

extendNamespace(function (elevutveckling, $, undefined) {
    /**
     * Basic async call for retrieving information from a json file and sending it to a function
     * @param jsonPath The directory path to the json file
     * @param callback The callback function. Must have a parameter for the json data.
     * @param jsonName Optional param. If the json file contains named elements, then only the element matching the name is retrieved.
     * @returns {*}
     */
    elevutveckling.retrieveJsonData = function (jsonPath, callback, jsonName) {
        return $.getJSON(jsonPath).then(function (data) {
            var returnJson;
            if (jsonName === undefined) {
                returnJson = data;
            } else {
                returnJson = data[jsonName];
            }
            callback(returnJson);
        });
    };
});