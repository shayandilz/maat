<?php
/**
 * Enqueue scripts and styles.
 */
function theme_scripts()
{

    //    <!-- Icons -->
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/public/fonts/bootstrap/bootstrap-icons.css');
    wp_enqueue_style('Ravi', get_template_directory_uri() . '/public/fonts/Ravi/fontface.css', array());
    wp_enqueue_style('Sofia', get_template_directory_uri() . '/public/fonts/Sofia/fontface.css', array());
    wp_enqueue_style('icons', get_template_directory_uri() . '/public/fonts/icons/fontface.css', array());
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array(),);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/public/js/app.js', array(), true);
    wp_enqueue_script('snap-js', get_template_directory_uri() . '/public/js/snap.svg-min.js', array(), true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');


add_theme_support('title-tag');
add_theme_support('post-thumbnails');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup()
{

    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
    register_nav_menu('headerMenuLocation', 'منوی اصلی');
    register_nav_menu('footerLocationOne', 'منوی اول فوتر');
    register_nav_menu('footerLocationTwo', 'منوی دوم فوتر');
    register_nav_menu('footerLocationThree', 'منوی سوم فوتر');
}

add_action('after_setup_theme', 'theme_setup');

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

    // Check function exists.
    if (function_exists('acf_add_options_page')) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title' => __('Theme General Settings'),
            'menu_title' => __('Theme Settings'),
            'redirect' => false,
        ));

        // Add subpage
        $child = acf_add_options_page(array(
            'page_title' => __('Contact and Social'),
            'menu_title' => __('Contact and Social'),
            'parent_slug' => $parent['menu_slug'],
        ));
        $child = acf_add_options_page(array(
            'page_title' => __('Services'),
            'menu_title' => __('Services'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}


function add_menu_link_class($classes, $item, $args)
{
    if (isset($args->link_class)) {
        $classes['class'] = $args->link_class;
    }

    return $classes;


}

add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

//populate gravity form
/**
 * Populate ACF select field options with Gravity Forms
 */
function acf_populate_gf_forms_ids($field)
{
    if (class_exists('GFFormsModel')) {
        $choices = [];

        foreach (\GFFormsModel::get_forms() as $form) {
            $choices[$form->id] = $form->title;
        }

        $field['choices'] = $choices;
    }

    return $field;
}

add_filter('acf/load_field/name=gravity_choices', 'acf_populate_gf_forms_ids');


// helper function to find a menu item in an array of items
function wpd_get_menu_item($field, $object_id, $items)
{
    foreach ($items as $item) {
        if ($item->$field == $object_id) {
            return $item;
        }
    }

    return false;
}

/*--Offset Pre_Get_Posts pagination fix--*/

// add_action('pre_get_posts', 'myprefix_query_offset', 1);
function myprefix_query_offset(&$query)
{

    if ($query->is_home() && !$query->is_main_query()) {
        return;
    }

    $offset = 3;

    $ppp = get_option('posts_per_page');

    if ($query->is_paged) {

        $page_offset = $offset + (($query->query_vars['paged'] - 1) * $ppp);

        $query->set('offset', $page_offset);

    } else {

        if ($query->is_home() && $query->is_main_query()) {
            $query->set('offset', $offset);
        }

    }
}

// add_filter('found_posts', 'myprefix_adjust_offset_pagination', 1, 2);
function myprefix_adjust_offset_pagination($found_posts, $query)
{

    $offset = 3;

    if ($query->is_home()) {
        return $found_posts - $offset;
    }
    return $found_posts;
}


function the_breadcrumb()
{
    global $post;
    echo '<ul class="breadcrumb my-0 py-4">';
    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a class="text-decoration-none text-semi-light" href="';
        echo get_post_type_archive_link('post');
        echo '">';
        echo 'مقاله';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';
            the_category(' </li><li class="breadcrumb-item"> ');
            if (is_single()) {
                echo '</li><li class="breadcrumb-item">';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                $title = get_the_title();
                foreach ($anc as $ancestor) {
                    $output = '<li><a class="breadcrumb-item" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="' . $title . '"> ' . $title . '</strong>';
            } else {
                echo '<li><strong> ' . get_the_title() . '</strong></li>';
            }
        }
    }
    echo '</ul>';
}

/**
 * Disable the emoji's
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 *
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}


add_filter('is_xml_preprocess_enabled', 'wpai_is_xml_preprocess_enabled', 10, 1);
function wpai_is_xml_preprocess_enabled($is_enabled)
{
    return false;
}


// table of contents
/**
 * Automatically add IDs to headings such as <h2></h2>
 */
function auto_id_headings($content)
{
    $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function ($matches) {
        if (!stripos($matches[0], 'id=')) {
            $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title($matches[3]) . '">' . $matches[3] . $matches[4];
        }
        return $matches[0];
    }, $content);
    return $content;
}

add_filter('the_content', 'auto_id_headings');
function get_toc($content)
{
    // get headlines
    $headings = get_headings($content, 1, 6);

    // parse toc
    ob_start();
    echo "<div class='table-of-contents'>";
    echo "<!-- Table of contents by webdeasy.de -->";
    parse_toc($headings, 0, 0);
    echo "</div>";
    return ob_get_clean();
}

function parse_toc($headings, $index, $recursive_counter)
{
    // prevent errors

    if ($recursive_counter > 60 || !count($headings)) return;

    // get all needed elements
    $last_element = $index > 0 ? $headings[$index - 1] : NULL;
    $current_element = $headings[$index];
    $next_element = NULL;
    if ($index < count($headings) && isset($headings[$index + 1])) {
        $next_element = $headings[$index + 1];
    }

    // end recursive calls
    if ($current_element == NULL) return;

    // get all needed variables
    $tag = intval($headings[$index]["tag"]);
    $id = $headings[$index]["id"];
    $classes = isset($headings[$index]["classes"]) ? $headings[$index]["classes"] : array();
    $name = $headings[$index]["name"];

    // element not in toc
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("nitoc", $current_element["classes"])) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
        return;
    }

    // parse toc begin or toc subpart begin
    if ($last_element == NULL) echo "<ul class='list-unstyled'>";
    if ($last_element != NULL && $last_element["tag"] < $tag) {
        for ($i = 0; $i < $tag - $last_element["tag"]; $i++) {
            echo "<ul class='list-unstyled'>";
        }
    }

    // build li class
    $li_classes = "";
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) $li_classes = " class='bold'";

    // parse line begin
    echo "<li" . $li_classes . ">";

    // only parse name, when li is not bold
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) {
        echo $name;
    } else {
        echo "<a class='text-decoration-none text-danger' href='#" . $id . "'>" . $name . "</a>";
    }
    if ($next_element && intval($next_element["tag"]) > $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }

    // parse line end
    echo "</li>";

    // parse next line
    if ($next_element && intval($next_element["tag"]) == $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }

    // parse toc end or toc subpart end
    if ($next_element == NULL || ($next_element && $next_element["tag"] < $tag)) {
        echo "</ul>";
        if ($next_element && $tag - intval($next_element["tag"]) >= 2) {
            echo "</li>";
            for ($i = 1; $i < $tag - intval($next_element["tag"]); $i++) {
                echo "</ul>";
            }
        }
    }

    // parse top subpart
    if ($next_element != NULL && $next_element["tag"] < $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }
}

function get_headings($content, $from_tag = 1, $to_tag = 6)
{
    $headings = array();
    preg_match_all("/<h([" . $from_tag . "-" . $to_tag . "])([^<]*)>(.*)<\/h[" . $from_tag . "-" . $to_tag . "]>/", $content, $matches);

    for ($i = 0; $i < count($matches[1]); $i++) {
        $headings[$i]["tag"] = $matches[1][$i];
        // get id
        $att_string = $matches[2][$i];
        preg_match("/id=\"([^\"]*)\"/", $att_string, $id_matches);
        $headings[$i]["id"] = $id_matches[1];
        // get classes
        $att_string = $matches[2][$i];
        preg_match_all("/class=\"([^\"]*)\"/", $att_string, $class_matches);
        for ($j = 0; $j < count($class_matches[1]); $j++) {
            $headings[$i]["classes"] = explode(" ", $class_matches[1][$j]);
        }
        $headings[$i]["name"] = strip_tags($matches[3][$i]);
    }
    return $headings;
}

// TOC (from webdeasy.de)
function toc_shortcode()
{
    return get_toc(auto_id_headings(get_the_content()));
}

add_shortcode('TOC', 'toc_shortcode');
//estimated reading time

function reading_time()
{
    ob_start();
    the_content();
    $content = ob_get_clean();
    $readingtime = ceil(sizeof(explode(" ", utf8_decode($content))) / 200);

    return $readingtime;
}

