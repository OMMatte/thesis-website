/**
 * TODO: Should be made dynamic so changes in the navbar does not alter the behaviour
 */
extendNamespace(function (elevutveckling, $, undefined) {
    if (typeof elevutveckling.header === "undefined") {
        elevutveckling.header = {};
    }
    var header = elevutveckling.header;

    header.navbarEffects = function () {

        $("#body_hjalp a:contains('Hjälp')").parent().addClass('active');
        $("#body_about a:contains('Om')").parent().addClass('active');
        $("#body_contact a:contains('Kontakt')").parent().addClass('active');


        var $math = $("#body_mathematics a:contains('Matematik')").parent();
        $math.addClass('active');
        var $physics = $("#body_physics a:contains('Fysik')").parent();
        $physics.addClass('active');
        var $chemistry = $("#body_chemistry a:contains('Kemi')").parent();
        $chemistry.addClass('active');

        if ($math.hasClass('active') || $physics.hasClass('active') || $chemistry.hasClass('active')) {
            $(".dropdown a:contains('Ämnen')").parent().addClass('active');
        }

        //make menus drop automatically
        $('ul.nav li.dropdown').hover(function () {
            $('.dropdown-menu', this).fadeIn();
        }, function () {
            $('.dropdown-menu', this).fadeOut('fast');
        });//hover
    };
});