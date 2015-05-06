extendNamespace(function (elevutveckling, $, undefined) {
        /**
         *
         * @param imageUrl
         * @param title
         * @param description
         * @param href
         * @returns {void|*|jQuery}
         */
        function generateIHoverImageButtons(title, description, imageUrl, href) {
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
        function generateJumbotronHeader(title, description) {
            if (description == undefined) {
                description = '';
            }

            var $divJumbotron = $('<div/>', {'class': "jumbotron jumbotron-elevu"});
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
                if (jsonName == undefined) {
                    returnJson = data;
                } else {
                    returnJson = data[jsonName];
                }
                callback(returnJson);
            });
        };

//****************** HELPER FUNCTIONS ******************

        /**
         * Function for generating the header for a page
         * @param jsonKey The json key to retrieve needed information from
         * @param callback Callback that will contain the generated header HTML
         */
        elevutveckling.generateHeader = function (jsonKey, callback) {
            var $outerSkeleton = $('<div>');
            elevutveckling.retrieveJsonData(elevutveckling.paths.json + "titles.json", function (jsonData) {
                var title = jsonData["title"];
                var description = jsonData["description"];
                $outerSkeleton.append(generateJumbotronHeader(title, description));
                if (callback != undefined) {
                    callback($outerSkeleton);
                }
            }, jsonKey);
            return $outerSkeleton;
        };

        /**
         * Helper function to generate IHoverImage given a json key and a callback.
         * @param jsonKey The json key to retrieve needed information from
         * @param callback The callback that will be filled with HTML. The content will change after asynch json call
         * @param href the href that the image links do, default is #
         */
        elevutveckling.generateSubjectImageButtons = function (jsonKey, href, callback) {

            var $skeleton = $('<div>');

            elevutveckling.retrieveJsonData(elevutveckling.paths.json + "ihover_image.json", function (jsonData) {
                var title = jsonData["title"];
                var description = jsonData["description"];
                var imageUrl = elevutveckling.paths.images + jsonData["image_name"];

                $skeleton.append(generateIHoverImageButtons(title, description, imageUrl, href));
            }, jsonKey);
            return $skeleton;
        };

        elevutveckling.generatePanelWithHeading = function (title, $bodyContent) {
            var $html = $(
                "<div class=\"panel panel-default\"> " +
                "<div class=\"panel-heading\">" +
                "<h3 class=\"panel-title\">" + title + "</h3>" +
                "</div>" +
                "<div class=\"panel-body\">" +
                "</div>" +
                "</div>");

            if ($bodyContent != undefined) {
                $html.find('.panel-body').append($bodyContent);
            }
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
            var $headingWithFrame = elevutveckling.generatePanelWithHeading(roomName, $roomFrame);
            $headingWithFrame.attr("id", id);
            return $headingWithFrame;
        }


        function attemptAccessRoom(roomId, roomName, roomPassword, callback) {
            var postArray = {id: roomId};
            if (roomPassword != undefined) {
                // Make sure to hash the password for some safety
                postArray['password'] = $.md5(roomPassword);
            }

            var $skeleton = $('<div>');
            $.post(elevutveckling.paths.server + "get_hidden_room_name.php", postArray, function (result) {
                console.log(result)
                if (result.status === 'success') {
                    $skeleton.append(getRoomInstance(roomName, result.hiddenName));
                }
                else if (result.status === 'failure') {
                    // Show error info
                    var $errorInfo = $(
                        "<div class='alert alert-danger'>" +
                        "<strong>Fel!</strong> Antingen skrev du fel rumslösenord eller så finns inte rummet längre." +
                        "</div>");
                    $skeleton.fadeTo(3000, 500).slideUp(500, function () {
                        $($skeleton).remove();
                    });
                    $skeleton.append($errorInfo);
                }

                if (callback != undefined) {
                    callback(result, $skeleton);
                }
            }, 'json');
            return $skeleton;
        }

        function attemptCreateRoom(roomName, roomPassword, subject, callback) {
            var postArray = {name: roomName, subject: subject};

            if (roomPassword != undefined) {
                // Make sure to hash the password for some safety
                postArray['password'] = $.md5(roomPassword);
            }

            var $skeleton = $('<div>');
            $.post(elevutveckling.paths.server + "create_new_room.php", postArray, function (result) {
                if (result.status === 'failure') {
                    var $errorInfo = $(
                        "<div class='alert alert-danger'>" +
                        "<strong>Fel!</strong> Skapandet av rum misslyckades. Kontrollera att rumsnamnet inte redan finns och försök igen." +
                        "</div>");
                    $skeleton.fadeTo(3000, 500).slideUp(500, function () {
                        $($skeleton).remove();
                    });
                    $skeleton.append($errorInfo);
                }

                if (callback != undefined) {
                    callback(result, $skeleton);
                }
            }, 'json');
            return $skeleton;
        }


        function generateRoomsAndRoomClickEvents(subject, callback) {
            var $outerSkeleton = $('<div>');
            var $innerSkeleton = $('<div>');
            $outerSkeleton.append($innerSkeleton);


            function generateBasicRoomContent(roomName, roomId, closing_time) {
                var imageName = subject + "_room.png";
                var $content = $("<div class='col-xs-4 col-sm-4 col-md-3 col-lg-2'>" +
                "<a href='#' class='thumbnail thumbnail-rooms'>" +
                "<img src='" + elevutveckling.paths.images + imageName + "' alt='120x120'>" +
                "<div class='caption'>" +
                "<p class='text-center'><strong>" + roomName + "</strong></p>" +
                "<div class='text-center countdown-timer' id='countdown_timer_" + roomId + "'> </div>" +
                "</div>" +
                "</a>" +
                "</div>");

                // update the tag with id "countdown" every 1 second
                function countdown(seconds) {

                    // do some time calculations
                    var days = parseInt(seconds / 86400);
                    seconds = seconds % 86400;

                    var hours = parseInt(seconds / 3600);
                    seconds = seconds % 3600;

                    var minutes = parseInt(seconds / 60);
                    var seconds = parseInt(seconds % 60);

                    var countdownString = "";
                    if (days > 0) {
                        countdownString += '<span class="days">' + days + ':</span>';
                    }
                    if (hours > 0) {
                        countdownString += '<span class="hours">' + hours + ':</span>';
                    }
                    if (minutes > 0) {
                        countdownString += ' <span class="minutes">' + minutes + ':</span>';
                    }
                    countdownString += '<span class="seconds">' + seconds + '</span>';

                    return $(countdownString);
                }

                if (closing_time != undefined) {

                    function countdownHandler() {
                        var current_date = new Date().getTime();
                        var end_date = new Date(closing_time);
                        var seconds = (end_date - current_date) / 1000;
                        if (seconds < 0) {
                            $content.hide();
                        }
                        $content.find('#countdown_timer_' + roomId).html(countdown(seconds));
                    }

                    countdownHandler();
                    setInterval(countdownHandler, 1000);

                }
                return $content;
            }

            function addDropdown($room, content) {
                $room.addClass("dropdown");
                $room.find("a").addClass("dropdown-toggle").attr('data-toggle', 'dropdown');
                var $dropdownMenu = $("<div class='dropdown-menu dropdown-menu-rooms'></div>");
                $dropdownMenu.append(content);
                $room.prepend($dropdownMenu);
            }

            $.getJSON(elevutveckling.paths.server + "get_rooms_list.php", {subject: subject}, function (result) {
                result.forEach(function (room) {
                    // Create the basic info for each room:
                    var $roomHtml = generateBasicRoomContent(room.name, room.id, room.closing_time);


                    var $openedRoomPlacement = $('#opened_room_placement');
                    if (isTrue(room.locked)) {
                        // Generate a dropdown for password input

                        var $passwordId = "room_password_" + room.id;
                        var $dropdownContent = $(
                            "<h3>Rum: " + room.name + "</h3>" +
                            "<br/>" +
                            "<form action=''>" +
                            "<div class='form-group'>" +
                            "<label for='password' class='control-label'>Lösenord</label>" +
                            "<input data-error='Minst 4 tecken' class='form-control' data-minlength='4' name='password' id='" + $passwordId + "' type='password' placeholder='Lösenord' required>" +
                            "<div class='help-block with-errors'></div>" +
                            "<input type='hidden' name='room_id' value='" + room.id + "'>" +
                            "</div>" +
                            "<div class='form-group'>" +
                            "<button type='submit' class='btn btn-primary'>Öpnna rum</button>" +
                            "</div>" +
                            "</form>");

                        addDropdown($roomHtml, $dropdownContent);

                        $roomHtml.addClass("dropdown");
                        $roomHtml.find("a").addClass("dropdown-toggle").attr('data-toggle', 'dropdown');
                        $roomHtml.prepend(
                            "<div class='dropdown-menu dropdown-menu-rooms'>" +

                            "</div>");

                        // Activate the validator, that checks for correct user input
                        $($roomHtml).find("form").validator().on('submit', function (e) {

                            if (!e.isDefaultPrevented()) {
                                // The input is valid, try to access the room.
                                attemptAccessRoom(room.id, room.name, $roomHtml.find("#" + $passwordId).val(), function (result, content) {
                                    if (result.status === 'success') {
                                        // Use standard placement for generated html
                                        $openedRoomPlacement.append(content);
                                        // Remove the room dropdown
                                        $roomHtml.find(".dropdown-menu").toggle();
                                    } else {
                                        // Special placement for error code
                                        $roomHtml.find('.dropdown-menu-rooms').append(content);
                                    }
                                });
                                // Clear password after submit
                                $roomHtml.find("#" + $passwordId).val('');
                            }
                            return false; // return false to avoid page reload on submit
                        });

                    } else {
                        // The room is not locked, just try to open it directly when clicked
                        $roomHtml.click(function () {
                            console.log('BAJS');
                            $openedRoomPlacement.append(attemptAccessRoom(room.id, room.name));
                        });
                    }

                    $innerSkeleton.append($roomHtml);
                });


                var $createNewRoom = generateBasicRoomContent('Nytt Rum');
                $createNewRoom.addClass('create-new-room');
                $createNewRoom.find('p').addClass('text-primary');



                var nameMin = elevutveckling.form.newRoom.name.min;
                var nameMax = elevutveckling.form.newRoom.name.max;
                var nameRegex = elevutveckling.form.newRoom.name.regex;
                var passwordMin = 4;
                var $dropdownContent = $("<h3>Skapa Nytt Rum</h3>" +
                "<br/>" +
                "<form action=''>" +
                "<div class='form-group'>" +
                "<label for='room_name' class='control-label'>Namn</label>" +
                "<input data-error='Minst " + nameMin + " bokstäver, siffror, - och _' class='form-control' maxlength='" + nameMax + "' pattern='" + nameRegex + "' name='room_name' id='create_new_room_name' type='text' placeholder='Namn på rummet' required>" +
                "<div class='help-block with-errors'>Minst " + nameMin + " bokstäver, siffror och -_:;,.</div>" +
                "</div>" +
                "<div class='form-group'>" +
                "<div class='checkbox'>" +
                "<label>" +
                "<input type='checkbox' id='create_new_room_locked'>" +
                "Lösenord" +
                "</label>" +
                "</div>" +
                "</div>" +
                "<div class='form-group' id='create_new_room_password_form'>" +
                "<label for='password' class='control-label'>Lösenord</label>" +
                "<input data-error='Minst " + passwordMin + " tecken' class='form-control' data-minlength='" + passwordMin + "' name='password' id='create_new_room_password' type='password' placeholder='Lösenord' required>" +
                "<div class='help-block with-errors'></div>" +
                "</div>" +
                "<div class='form-group'>" +
                "<button type='submit' class='btn btn-primary'>Öpnna rum</button>" +
                "</div>" +
                "</form>");

                var passwordForm = $dropdownContent.find('#create_new_room_password_form');
                passwordForm.hide();
                $dropdownContent.find('#create_new_room_locked').change(function () {
                    if (this.checked) {
                        passwordForm.show();
                    } else {
                        passwordForm.hide();
                    }
                });

                addDropdown($createNewRoom, $dropdownContent);

                $($createNewRoom).find("form").validator().on('submit', function (e) {
                    if (!e.isDefaultPrevented()) {
                        var roomName = $('#create_new_room_name').val();
                        var roomPassword = $('#create_new_room_locked').is(':checked') ? $('#create_new_room_password').val() : undefined;
                        attemptCreateRoom(roomName, roomPassword, subject, function (result, content) {
                            if (result.status === 'success') {
                                location.reload();
                            } else {
                                // Special placement for error code
                                $createNewRoom.find('.dropdown-menu-rooms').append(content);
                            }
                        });

                        // Clear password after submit
                        $createNewRoom.find("#create_new_room_password").val('');
                    }
                    return false; // return false to avoid page reload on submit
                });

                $innerSkeleton.append($createNewRoom);

                $(window).load(function () {
                    console.log("TEST");
                    console.log($innerSkeleton.find(".thumbnail-rooms").height());
                    var heights = $innerSkeleton.find(".thumbnail-rooms").find("a").map(function () {
                            return $(this).height();
                        }).get(),
                        maxHeight = Math.max.apply(null, heights);
                    console.log(heights);
                    console.log(maxHeight);

                    $innerSkeleton.find(".thumbnail-rooms").height(maxHeight);
                });


                callback($outerSkeleton);
            });
            return $outerSkeleton;
        }


        /**
         * Will generate the entire content for a subject page.
         * @param subject The subject, must be an array containing {eng, sv} TODO: sv should be in a translation file instead
         * @param posCallback Callback ONLY for synchronous positioning of the generated HTML
         * @param callback Callback for the generated code. Note that it returns before all async calls are completed. Meaning that it might change its content after beeing returned
         */
        elevutveckling.generateSubjectContent = function (subject, callback) {
            // Create the outer divs holding the subject body
            var $outerSkeleton = $('<div class="row row-offcanvas row-offcanvas-right">');
            var $innerSkeletonCenter = $('<div class="col-xs-12 col-sm-9">');
            var $innerSkeletonRight = $('<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">');
            $outerSkeleton.append($innerSkeletonCenter);
            $outerSkeleton.append($innerSkeletonRight);

            var $roomPlacement = $('<div id="room_placement">');
            var $q2aPlacement = $('<div id="q2a_placement">');
            $innerSkeletonCenter.append($roomPlacement);
            $innerSkeletonCenter.append($q2aPlacement);

            var $link_placement = $('<div id="links_placement">');
            $innerSkeletonRight.append($link_placement);

            elevutveckling.retrieveJsonData(elevutveckling.paths.json + "subjects.json", function (jsonData) {

                // This is in order to make sure that all ajax-calls within this function are done when calling the callback
                var callbackCounter = 0;
                var checkAndIncreaseCallback = function () {
                    callbackCounter++;
                    if (callbackCounter === 2 && callback != undefined) {
                        console.log("BAJSDSADASDS");
                        callback($outerSkeleton);
                    }
                };

                // Get the title information for the different main parts of the page
                var linkTitle = jsonData.links.title;
                var q2aTitle = jsonData.question_and_answers.title;
                var roomsTitle = jsonData.virtual_rooms.title;

                {
                    generateRoomsAndRoomClickEvents(subject.eng, function ($rooms) {
                        // We have generated the rooms, now add them with a panel
                        $roomPlacement.append(elevutveckling.generatePanelWithHeading(roomsTitle, $rooms));
                        checkAndIncreaseCallback();
                    });
                }

                {
                    var $q2aIFrame = $('<iframe id="iframe_q2a" width="100%" height="100%" scrolling="no" frameborder="0">');
                    $q2aIFrame.attr('src', "http://" + location.hostname + "/" + elevutveckling.paths.qa + "/" + subject.sv);

                    // Set the question2answer with with the heading
                    $q2aPlacement.append(elevutveckling.generatePanelWithHeading(q2aTitle, $q2aIFrame));
                }


                {
                    elevutveckling.retrieveJsonData(elevutveckling.paths.json + "links.json", function (jsonData) {
                        var linkList = jsonData["mathematics"];
                        $link_placement.append(elevutveckling.generateListGroup(linkTitle, linkList));
                        checkAndIncreaseCallback();
                    });
                }

            });
            return $outerSkeleton;
        };
    }
);
