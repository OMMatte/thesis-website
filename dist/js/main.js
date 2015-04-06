/**
 *
 * @param imageUrl
 * @param title
 * @param description
 * @returns {void|*|jQuery}
 */
function printIHoverImage(imageUrl, title, description) {
    if (typeof description === 'undefined') {
        description = '';
    }

    var $returnHtml =
        $('<div>', {
            class: 'col-md-4'
        }).append($('<div>', {
            class: 'ih-item square effect13 bottom_to_top'
        }).append($('<a>', {
            href: '#'
        }).append($('<div>', {
            class: 'img'
        }).append($('<img>', {
            src: imageUrl,
            alt: '...'
        })), $('<div>', {
            class: 'info'
        }).append($('<h3>').append(title), $('<p>').append(description)))));

    return $returnHtml;

    document.write(
        '<div class="col-md-4">'
    +       '<div class="ih-item square effect13 bottom_to_top">'
    +           '<a href="#">'
    +               '<div class="img">'
    +                   '<img src="' + imageUrl + '" alt="...">'
    +               '</div>'
    +               '<div class="info">'
    +                   '<h3>' + title + '</h3>'
    +                   '<p>' + description + '</p>'
    +               '</div>'
    +           '</a>'
    +       '</div>'
    +   '</div>');
}

/**
 *
 * @param title
 * @param description
 * @returns {*|jQuery|HTMLElement}
 */
function printJumbotronHeader(title, description) {
    if (typeof description === 'undefined') {
        description = '';
    }

    var $divJumbotron = $('<div/>', {'class': "jumbotron"});
    var $divContainer = $('<div/>', {'class': "container"});
    var $h = $('<h1/>');
    var $p = $('<p>');

    $h.append(title);
    $p.append(description);

    $divContainer.append($h);
    $divContainer.append($p);
    $divJumbotron.append($divContainer);

    return $divJumbotron;
}

// Functions for showing/hiding content
function hideContent(d) {
    document.getElementById(d).style.display = "none";
}
function showContent(d) {
    document.getElementById(d).style.display = "block";
}
function reverseDisplay(d) {
    if (document.getElementById(d).style.display == "none") {
        document.getElementById(d).style.display = "block";
    }
    else {
        document.getElementById(d).style.display = "none";
    }
}

/**
 * Dynamic script for a bootstrap accordion which is a list of headings and hidden text that shows on heading click.
 *
 * @param jsonArray The json object containing the array of key/value pair items representing the header and the collapsed text part
 * @returns {*|jQuery|HTMLElement} The html to show
 */
function bootstrapAccordion(jsonArray) {
    var accordionID = "accordion";
    var $divAccordion = $('<div/>', {
        'class': "panel-group",
        'id': accordionID,
        'role': "tablist",
        'aria-multiselectable': "true"
    });

    for (i = 0, len = jsonArray.length; i < len; i++) {

        var jsonObject = jsonArray[i];
        var heading = Object.keys(jsonObject)[0];
        var collapseText = jsonObject[heading];


        //Go through each question and answer
        //  var question = questions[i];
        //var answer = answers[i];
        var divHeadingID = "heading" + i;
        var divCollapseID = "collapsedText" + i;


        // Create elements for question
        var $divOuter = $('<div/>', {'class': "panel panel-default"});
        var $divInner = $('<div/>', {'class': "panel-heading", 'role': "tab", 'id': divHeadingID});
        var $header = $('<h4/>', {'class': "panel-title"});
        var $a = $('<a/>', {
            'class': "collapsed",
            'data-toggle': "collapse",
            'data-parent': "#" + accordionID,
            'href': "#" + divCollapseID,
            'aria-expanded': "false",
            'aria-controls': divCollapseID
        });

        // Combine them
        $($a).append(heading);
        $($header).append($a);
        $($divInner).append($header);
        $($divOuter).append($divInner);


        // Create elements for answer
        var $divAnswerOuter = $('<div/>', {
            'id': divCollapseID,
            'class': "panel-collapse collapse",
            'role': "tabpanel",
            'area-labelledby': divHeadingID
        });
        var $divAnswerInner = $('<div/>', {'class': "panel-body"});

        // Combine them
        $($divAnswerInner).append(collapseText);
        $($divAnswerOuter).append($divAnswerInner);

        // Combine answer with question elements
        $($divOuter).append($divAnswerOuter);

        // Finally add to highest div
        $($divAccordion).append($divOuter);
    }

    return $divAccordion;
}
/**
 *
 * @param jsonPath
 * @param callback
 * @param jsonName
 * @returns {*}
 */
function jsonFileCall(jsonPath, callback, jsonName) {
    return $.getJSON(jsonPath).then(function (data) {
        var returnJson;
        if (jsonName === undefined) {

            returnJson = data;
        } else {
            returnJson = data[jsonName];
        }
        callback(returnJson);
    });
}

/**
 * Helper function for printing the title
 * @param jsonKey The json-key to retrieve needed information from
 */
function printTitle(jsonKey) {

    $(document).ready(function () {
        jsonFileCall("/json/titles.json", function (jsonData) {
            var title = jsonData["title"];
            var description = jsonData["description"];
            console.log(title);
            console.log(description);
            $('body').prepend((printJumbotronHeader(title, description)));
        }, jsonKey);
    });
}




