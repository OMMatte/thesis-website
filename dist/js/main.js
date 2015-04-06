// For the clickable images
function printIHoverImage(imageUrl, title, description) {
    if (typeof description === 'undefined') {
        description = '';
    }
    document.write('<div class="col-md-4">'
    + '<div class="ih-item square effect13 bottom_to_top">'
    + '<a href="#">'
    + '<div class="img">'
    + '<img src="' + imageUrl + '" alt="...">'
    + '</div>'
    + '<div class="info">'
    + '<h3>' + title + '</h3>'
    + '<p>' + description + '</p>'
    + '</div>'
    + '</a>'
    + '</div>'
    + '</div>');
}

// For the "header" of the site. 
function printJumbotronHeader(title, description) {
    if (typeof description === 'undefined') {
        description = '';
    }
    document.write('<div class="jumbotron">'
    + '<div class="container">'
    + '<h1>' + title + '</h1>'
    + '<p>' + description + '</p>'
    + '</div>'
    + '</div>');
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

function getJson(path) {
    $.getJSON(path, function (data) {
        var items = [];
        $.each(data, function (key, val) {
            items.push("<li id='" + key + "'>" + val + "</li>");
        });

        $("<ul/>", {
            "class": "my-new-list",
            html: items.join("")
        }).appendTo("body");
    });
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
        callback(data);
    });
}




