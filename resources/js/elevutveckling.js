extendNamespace(function (elevutveckling, $, undefined) {
        /**
         *
         * @param imageUrl
         * @param title
         * @param description
         * @param href
         * @returns {void|*|jQuery}
         */
        function generateIHoverImageHtml(title, description, imageUrl, href) {
            if (typeof description === 'undefined') {
                description = '';
            }
            if (typeof href === '') {
                href = '#';
            }

            var $returnHtml =
                $('<div>', {
                    class: 'col-md-4'
                }).append($('<div>', {
                    class: 'ih-item square effect13 bottom_to_top'
                }).append($('<a>', {
                    href: href
                }).append($('<div>', {
                    class: 'img'
                }).append($('<img>', {
                    src: imageUrl,
                    alt: '...'
                })), $('<div>', {
                    class: 'info'
                }).append($('<h3>').append(title), $('<p>').append(description)))));

            return $returnHtml;
        }

        /**
         *
         * @param title
         * @param description
         * @returns {*|jQuery|HTMLElement}
         */
        function generateJumbotronHeaderHtml(title, description) {
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
        elevutveckling.generateBootstrapAccordionHtml = function (jsonArray) {
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
        };
        /**
         * Basic call for retrieving information from a json file and sending it to a function
         * @param jsonPath The path to the json file
         * @param callback The callback function. Must have a parameter the json data.
         * @param jsonName Optional param. If the json file contains named elements, then only the element matching the given name.
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

//****************** HELPER FUNCTIONS ******************

        /**
         * Helper function for printing the title
         * @param jsonKey The json key to retrieve needed information from
         */
        elevutveckling.generateHeaderHelper = function (jsonKey, callback) {
            var $html = generateJumbotronHeaderHtml();
            callback($html);
            elevutveckling.retrieveJsonData(elevutveckling.paths.json + "titles.json", function (jsonData) {
                var title = jsonData["title"];
                var description = jsonData["description"];
                $html.replaceWith(generateJumbotronHeaderHtml(title, description));
            }, jsonKey);
        };

        /**
         * Helper function to generate IHoverImage given a json key and a callback.
         * @param jsonKey The json key to retrieve needed information from
         * @param callback The callback that will be filled with HTML. The content will change after asynch json call
         * @param href the href that the image links do, default is #
         */
        elevutveckling.genereateIHoverImageHelper = function (jsonKey, callback, href) {

            var $html = generateIHoverImageHtml();
            callback($html);

            elevutveckling.retrieveJsonData(elevutveckling.paths.json + "ihover_image.json", function (jsonData) {
                var title = jsonData["title"];
                var description = jsonData["description"];
                var imageUrl = elevutveckling.paths.images + jsonData["image_name"];

                $html.replaceWith(generateIHoverImageHtml(title, description, imageUrl, href));
            }, jsonKey);
        };

        elevutveckling.generateHeadingPanel = function (title, $bodyHtml) {
            if (typeof bodyHtml === 'undefined') {
                bodyHtml = '';
            }
            var $html = $(
                "<div class=\"panel panel-default\"> " +
                "<div class=\"panel-heading\">" +
                "<h3 class=\"panel-title\">" + title + "</h3>" +
                "</div>" +
                "<div class=\"panel-body\">" +
                "</div>" +
                "</div>");

            $html.find('.panel-body').append($bodyHtml);

            return $html;
        };

        elevutveckling.generateListGroup = function (title, itemList) {

            var html =
                "<div class=\"list-group\">" +
                "<a class=\"list-group-item active\">" + title + "</a>";
            itemList.forEach(function (item) {
                html += "<a href=\"" + item.href + "\" class=\"list-group-item\">" + item.name + "</a>";
            });
            html += "</div>";

            return $(html)
        };

        function isTrue(value) {
            return (value === 'true' || value === 1 || value === true);
        }


        function getRoomInstance(roomName, instanceName) {
            var id = "groupworld_frame";
            // Remove old instance
            $("#" + id).remove();
            var $roomFrame = $("<iframe width='100%' height='1000' scrolling='no' frameborder='0' src='http://www.groupworld.net/mp/parse.cgi?filename=mathjs&inst_id=1434&instance=" + instanceName + "&width=100%&height=100%&iframe=true'></iframe>");
            var $headingWithFrame = elevutveckling.generateHeadingPanel(roomName, $roomFrame);
            $headingWithFrame.attr("id", id);
            return $headingWithFrame;
        }


        function attemptAccessRoom(roomId, roomName, roomPassword, callback, callbackErrorInfo) {
            var postArray = {id: roomId};
            if (roomPassword !== undefined) {
                postArray['password'] = $.md5(roomPassword);
            }
            $.post(elevutveckling.paths.server + "get_hidden_room_name.php", postArray, function (result) {
                if (result.status === 'success') {
                    console.log(result);
                    $("#top_container").prepend(getRoomInstance(roomName, result.hiddenName));
                }
                else if (result.status === 'failure') {

                    // Show error info
                    var $errorInfo = $(
                        "<div class='alert alert-danger'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Fel!</strong> Antingen skrev du fel rumslösenord eller så finns inte rummet längre." +
                        "</div>");
                    $errorInfo.fadeTo(3000, 500).slideUp(500, function () {
                        $($errorInfo).remove();
                    });
                    if (callbackErrorInfo === undefined) {
                        $("#top_container").prepend($errorInfo);
                    } else {
                        callbackErrorInfo($errorInfo);
                    }
                }

                if (callback !== undefined) {
                    callback(result);
                }
            }, 'json');
        }

        function generateRooms(subject, callback) {
            $.getJSON(elevutveckling.paths.server + "get_rooms_list.php", {subject: subject}, function (result) {
                var $allRoomsHtml = $("<div class='row'>");
                var image_name = subject + "_room.png";
                result.forEach(function (room) {
                    // Create the basic info for each room:
                    var name = room.name;
                    var $roomHtml = $("<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>" +
                    "<a href='#' class='thumbnail'>" +
                    "<img src='" + elevutveckling.paths.images + image_name + "' alt='120x120'>" +
                    "<div class='caption'>" +
                    "<p class='text-center'><strong>" + name + "</strong></p>" +
                    "</div>" +
                    "</a>" +
                    "</div>");

                    if (isTrue(room.locked)) {
                        // Generate a dropdown for password input
                        $roomHtml.addClass("dropdown");
                        $roomHtml.find("a").addClass("dropdown-toggle").attr('data-toggle', 'dropdown');
                        $roomHtml.prepend(
                            "<div class='dropdown-menu dropdown-menu-rooms'>" +
                            "<h3>Rum: " + room.name + "</h2>" +
                            "<br/>" +
                            "<form action=''>" +
                            "<div class='form-group'>" +
                            "<label for='password' class='control-label'>Lösenord</label>" +
                            "<input data-error='Minst 4 tecken' class='form-control' data-minlength='4' name='password' id='room_password_" + room.id + "' type='password' placeholder='Lösenord' required>" +
                            "<div class='help-block with-errors'></div>" +
                            "<input type='hidden' name='room_id' value='" + room.id + "'>" +
                            "</div>" +
                            "<div class='form-group'>" +
                            "<button type='submit' class='btn btn-primary'>Öpnna rum</button>" +
                            "</div>" +
                            "</form>" +
                            "</div>");

                        // Activate the validator, that checks for correct user input
                        $($roomHtml).find("form").validator().on('submit', function (e) {
                            if (!e.isDefaultPrevented()) {
                                // The input is valid, try to access the room.
                                attemptAccessRoom(room.id, room.name, $roomHtml.find("#room_password_" + room.id).val(), function (result) {
                                    if (result.status === 'success') {
                                        $roomHtml.find(".dropdown-menu").toggle();
                                    }
                                }, function ($errorInfo) {
                                    $roomHtml.find('.dropdown-menu-rooms').append($errorInfo);
                                });
                                // Remove the password
                                $roomHtml.find("#room_password_" + room.id).val('');
                            }
                            return false; // return false to avoid page reload on submit
                        });

                    } else {
                        // The room is not locked, just try to open it directly
                        $roomHtml.click(function () {
                            attemptAccessRoom(room.id, room.name);
                        });
                    }

                    $allRoomsHtml.append($roomHtml);
                });
                callback($allRoomsHtml);
            });


        }


        /**
         *
         * @param subject
         * @param posCallback Callback ONLY for synchronous positioning of the generated HTML
         * @param fullCallbackA Callback for the full HTML after the async requests are finished, use this for editing the response
         */
        elevutveckling.generateSubjectBody = function (subject, posCallback, fullCallbackA) {
            var $outerSkeleton = $("<div class='row row-offcanvas row-offcanvas-right'>");
            var $innerSkeleton = $("<div class='col-xs-12 col-sm-9'>");
            var $innerSkeletonLinks = $("<div class='col-xs-6 col-sm-3 sidebar-offcanvas' id='sidebar'>");

            $outerSkeleton.append($innerSkeleton);
            $outerSkeleton.append($innerSkeletonLinks);

            posCallback($outerSkeleton);

            elevutveckling.retrieveJsonData(elevutveckling.paths.json + "subjects.json", function (jsonData) {

                var linkTitle = jsonData.links.title;
                var questionTitle = jsonData.question_and_answers.title;
                var roomsTitle = jsonData.virtual_rooms.title;

                // Variable in order to make rooms appear before qa
                var $panelRoom = elevutveckling.generateHeadingPanel(roomsTitle);
                $innerSkeleton.append($panelRoom);

                generateRooms(subject.eng, function ($rooms) {
                    $panelRoom.replaceWith(elevutveckling.generateHeadingPanel(roomsTitle, $rooms));
                });

                var $questionIFrame = $("<iframe id='iframe_q2a' width='100%' height='100%' scrolling='no' frameborder='0' seamless='seamless' src='http://" + location.hostname + "/" + elevutveckling.paths.qa + "/" + subject.sv + "'>");

                $innerSkeleton.append(elevutveckling.generateHeadingPanel(questionTitle, $questionIFrame));

                elevutveckling.retrieveJsonData(elevutveckling.paths.json + "links.json", function (jsonData) {
                    var linkList = jsonData["mathematics"];
                    $innerSkeletonLinks.append(elevutveckling.generateListGroup(linkTitle, linkList));
                });
            });

            $(document).ajaxStop(function () {
                if (typeof fullCallbackA != 'undefined') {
                    // Will be called when all async calls are completed
                    fullCallbackA($outerSkeleton);
                }
            });
        };
    }
);
