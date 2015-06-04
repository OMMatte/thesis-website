<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<script>
    // anonymous function to handle navigation events without name collisions
    (function () {

        /**
         * Uses this function to check weather the navigation item should be counted as active or not
         */
        function isPartOfHref(subHref) {
            return window.location.href.indexOf(window.location.hostname + subHref) !== -1;
        }

        function handleNavItem($navPos, name, href) {
            $navItem = $('<li><a href="' + href + '">' + name + '</a></li>');
            $navPos.append($navItem);
            if (isPartOfHref(href)) {
                $navItem.addClass('active');
            }
        }

        $navItemRoot = $('ul.nav.navbar-nav');
        // Uses the Json data to populate the navigation bar with all info
        elevutveckling.retrieveJsonData(elevutveckling.paths.json + "navigator.json", function (jsonData) {
            jsonData.forEach(function (navItem) {
                if (navItem.type === "title") {
                    $('a.navbar-brand').append(navItem.name);
                }

                else if (navItem.type === "default") {
                    handleNavItem($navItemRoot, navItem.name, navItem.href);

                } else if (navItem.type === "dropdown") {
                    $dropdownRoot = $('<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' + navItem.name + '<span class="caret"></span></a><ul class="dropdown-menu" role="menu">');
                    $navItemRoot.append($dropdownRoot);
                    navItem.items.forEach(function (navDropdownItem) {
                        handleNavItem($dropdownRoot.find('ul'), navDropdownItem.name, navDropdownItem.href);
                        if (isPartOfHref(navDropdownItem.href)) {
                            $dropdownRoot.addClass('active');
                        }
                    });

                }
            });
            //make menus drop automatically
            $('ul.nav li.dropdown').hover(function () {
                if ($("a.dropdown-toggle").attr('aria-expanded') == "false") {
                    if ($(".navbar-toggle").is(':hidden')) {
                        $('.dropdown-menu', this).fadeIn();
                    }
                }
            }, function () {
                if ($("a.dropdown-toggle").attr('aria-expanded') == "false") {
                    $('.dropdown-menu', this).fadeOut('fast', function () {
                        $('.dropdown-menu').removeAttr('style');
                    });
                }
            });//hover
        });
    })();
</script>