jQuery(document).ready(function () {

    /**
     * The following section is needed to make sure the iframe holding this document changes size as the document changes size
     * In simple terms: Make the frame, holding the Q2A page, change size when the Q2A page changes content.
     */
    {
        /**
         * Changes the parent iframe to fit the current content size
         * @param info
         */
        function changeParentIframe(info) {
            var height = document.documentElement.offsetHeight;
            if (info != 'undefined') {
                console.log(info + ": " + height);
            }
            parent.document.getElementById('iframe_q2a').style.height = Math.max(height, 0) + "px";
        }

        /**
         * This is to make sure we set the correct iframe size when a page loads
         */
        window.onload = function () {
            changeParentIframe("onload height change: ");
        };

        /**
         * Special observer on DOM events.
         * MutationObserver for FireFox, WebKitMutationObserver for chrome.
         * Watches over changes on the DOM given a few parameters
         * @type {MutationObserver|*}
         */
        MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
        new MutationObserver(function (mutations, observer) {
            changeParentIframe("mutate-observe height change");
        }).observe(document.body, { //Only watch on body element
                subtree: true, // Watch all sub-elements in the body
                attributes: true // Watch all type of attribute changes
                //...
            });
    }
});