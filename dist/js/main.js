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


function bootstrapAccordion(containerID) {
    var questions = ["Saab", "Volvo", "BMW"];
    var answers = ["Car", "Train", "Plain"];

    var accordionID = "accordion";
    var $divAccordion = $('<div/>', { 'class': "panel-group", 'id': accordionID, 'role':"tablist", 'aria-multiselectable':"true"});

    for (i = 0, len = questions.length; i < len; i++) {
    //Go through each question and answer
    //  var question = questions[i];
    //var answer = answers[i];
        var divHeadingID = "questionAnswerHeading" + i;
        var divCollapseID = "questionAnswerCollapse" + i;


        // Create elements for question
        var $divOuter = $('<div/>', { 'class': "panel panel-default" });
        var $divInner = $('<div/>', { 'class': "panel-heading", 'role':"tab", 'id':divHeadingID });
        var $header = $('<h4/>', { 'class': "panel-title" });
        var $a = $('<a/>', { 'class':"collapsed", 'data-toggle': "collapse", 'data-parent':"#" + accordionID, 'href':"#" + divCollapseID, 'aria-expanded':"false", 'aria-controls':divCollapseID});

        // Combine them
        $($a).append("Nu testar jag");
        $($header).append($a);
        $($divInner).append($header);
        $($divOuter).append($divInner);


        // Create elements for answer
        var $divAnswerOuter = $('<div/>', {'id': divCollapseID, 'class':"panel-collapse collapse", 'role':"tabpanel", 'area-labelledby':divHeadingID});
        var $divAnswerInner = $('<div/>', {'class':"panel-body"});

        // Combine them
        $($divAnswerInner).append("Nu testar jag andra");
        $($divAnswerOuter).append($divAnswerInner);

        // Combine answer with question elements
        $($divOuter).append($divAnswerOuter);

        // Finally add to highest div
        $($divAccordion).append($divOuter);

        //containerID.appendChild(divAccordion);
    }

    // Finally add everything to the given ID
    $('#' + containerID).prepend($divAccordion);
}

function questionAndAnswer(containerID) {
    //console.log('test');
    var questions = ["Saab", "Volvo", "BMW"];
    var answers = ["Car", "Train", "Plain"];

    var container = document.getElementById(containerID);

    for (i = 0, len = questions.length; i < len; i++) {
        //Go through each question and answer
        var question = questions[i];
        var answer = answers[i];

        //Create the elements for the question
        var divQ = document.createElement("div");
        var hrefQ = document.createElement("a");
        var textQ = document.createTextNode(question);

        //Create the elements for the answer
        var divA = document.createElement("div");
        var pA = document.createElement("p");
        var textA = document.createTextNode(answer);

        //Set attributes for the question and answer
        divA.style.display = 'none';
        divA.id = 'answer_' + i;
        hrefQ.href = "javascript:reverseDisplay('" + divA.id + "')";

        //Finally add the question and then the answer to the given container
        hrefQ.appendChild(textQ);
        divQ.appendChild(hrefQ);
        container.appendChild(divQ);

        pA.appendChild(textA);
        divA.appendChild(pA);
        container.appendChild(divA);
    }


}


