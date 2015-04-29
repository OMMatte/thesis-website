<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

/**
 * How-to add this custom functionality:
 *
 * ADD:
 * require_once $_SERVER['DOCUMENT_ROOT'] . '/qa/custom-files/custom-qa-donut-layer.php';
 * In the end of qa-theme.php in qa-theme/Donut/
 *
 * Rename class 'qa_html_theme' to 'qa_html_theme_ADDED_THIS' in qa-theme/Donut/qa-donut-layer.php
 *
 * Note that that most (maybe every) other custom file is added within this file.
 * So doing the above should automatically add those custom files as well
 */
class qa_html_theme extends qa_html_theme_ADDED_THIS
{


    /**
     * Commented sub-title for each navigation selection
     */
    function body_content()
    {
        $sub_navigation = @$this->content['navigation']['sub'];
        if ($this->template === 'admin') {
            unset($this->content['navigation']['sub']);
        }
        $navigation = &$this->content['navigation'];
        if (isset($navigation['cat'])) {
            donut_remove_brackets($navigation['cat']);
        }
        $this->body_prefix();
        $this->notices();

//			if ($this->template !== 'question') {
        $this->output('<main class="donut-masthead">');
//				$this->output('<div class="container">');
//				$this->output('<div class="page-title">');
//				$this->page_title_error();
//				$this->output('</div>');
//				$this->output('</div>');
        $this->output('</main>');
//			}

        $this->output('<div class="qa-body-wrapper">', '');

        $this->widgets('full', 'top');
        $this->header();
        $this->widgets('full', 'high');

        if (count($sub_navigation)) {
            // create the left side bar
            $this->left_side_bar($sub_navigation);
        }

        $this->main();

        if ($this->template !== 'admin' && $this->template != 'user') {
            $this->sidepanel();
        }

        $this->widgets('full', 'low');
        $this->footer();
        $this->widgets('full', 'bottom');

        $this->output('</div> <!-- END body-wrapper -->');

        $this->body_suffix();
    }

    /**
     * Added custom-donut.js
     */
    function head_script() // change style of WYSIWYG editor to match theme better
    {
        qa_html_theme_base::head_script();
        $js_paths = array(
            'bootstrap' => 'js/bootstrap.min.js',
            'donut'     => 'js/donut.js',
            'custom-donut' => '/../../../../custom-files/custom-donut.js',
        );
        if ($this->template == 'admin') {
            $js_paths['admin'] = 'js/admin.js' ;
        }

        if (DONUT_ACTIVATE_PROD_MODE) {
            $cdn_js_paths = array(
                'bootstrap' => donut_opt::BS_JS_CDN ,
            );
            unset($js_paths['bootstrap']);
            $this->donut_resources($cdn_js_paths , 'js' , TRUE );
        }

        $this->donut_resources($js_paths , 'js');
    }

    /**
     * Removed widget stuff on the side
     */
    function sidepanel()
    {
//			$this->output('<div class="qa-sidepanel pull-right">');
//			$this->widgets('side', 'top');
//			$this->sidebar();
//			$this->widgets('side', 'high');
//			$this->nav('cat', 1);
//			$this->widgets('side', 'low');
//			$this->output_raw(@$this->content['sidepanel']);
//			$this->feed();
//			$this->widgets('side', 'bottom');
//			$this->output('</div>', '');
    }

    /**
     * Removed entire footer
     */
    function body_suffix() // to replace standard Q2A footer
    {
//			$this->output('<footer class="donut-footer">');
//			$this->output('<div class="container">');
//
//			qa_html_theme_base::footer();
//			$this->output('</div>');
//			$this->output('</footer> <!-- END footer -->', '');
    }

    /**
     * Removed title and search bar
     * Added search to navigation
     */
    function donut_nav_bar($navigation)
    {
        $title = qa_opt('site_title');
        $home_url = qa_opt('site_url');
        ob_start();
        ?>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <!--			        <div class="logo">-->
                        <!--			          --><?php //$this->logo();
                        ?>
                        <!--			        </div>-->
                    </div>
                    <div class="col-sm-6">
                        <!--        			<div class="search-bar">-->
                        <!--				        --><?php //$this->search();
                        ?>
                        <!--        			</div>-->
                    </div>
                </div>
            </div>
        </header>
        <nav id="nav" class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="donut-navigation">
                    <ul class="nav navbar-nav navbar-right user-nav">
                        <?php $this->donut_user_drop_down(); ?>
                    </ul>
                    <div class="navbar-collapse collapse main-nav">
                        <ul class="nav navbar-nav inner-drop-nav">
                            <?php $this->donut_nav_bar_main_links($navigation['main']); ?>
                            <?php $this->search(); ?>
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
        <?php
        return ob_get_clean();
    }

    /**
     * Added custom login drop-down
     */
    function donut_user_drop_down(){
        if (qa_is_logged_in()) {
            require_once DONUT_THEME_BASE_DIR . '/templates/user-loggedin-drop-down.php';
        }else {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/qa/custom-files/custom-user-login-drop-down.php';
        }
    }
}
/*
	Omit PHP closing tag to help avoid accidental output
*/