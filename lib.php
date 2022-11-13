<?php

function get_links() {

    $contents = implode("", file("source/page_toc.markdown"));
    $contents = markdown($contents);

    preg_match_all('/<a href="((\/page\/)?[a-z0-9\?=\.-]*)" title="([a-z0-9\?=\. \/\(\)\:;&-]*)">([a-z0-9\?=\. \/\(\)\:;&-]*)<\/a>/i', $contents, $matches);

    if (empty($_GET['page'])) {
        return array("","");
    }

    $current = $_GET['page'].'"';

    $prev = "";
    $next = "";

    foreach($matches[0] as $key => $value) {

        if (strpos($value, $current)>0) {

            if (isset($matches[0][$key-1])) {
                $prev = $matches[0][$key-1];
            }
            if (isset($matches[0][$key+1])) {
                $next = $matches[0][$key+1];
            }

        }

    }

    return array($prev, $next);
}

function fetch_page($page, $keyword="") {

    //echo "<pre>\n"; print_r($_SERVER); echo "</pre>";

    $htmlfilename = "source/page_".$page.".html";
    $markdownfilename = "source/page_".$page.".markdown";

    /*
    if ($page=="toc") {
        $base = ""; // "index.php";
    } else {
        $base = "";
    }
    */

    if (file_exists($markdownfilename)) {

        $contents = implode("", file($markdownfilename));

        $contents = markdown($contents);

        // $contents .= "<small>This is Markdown, man.</small>";

    } else if (file_exists($htmlfilename)) {

        $contents = implode("\n", file($htmlfilename));

        // $contents .= "<small>Unfortunately, this page is still HTML.</small>";


    } else {
        $contents = "<p>Can't find that page. Oops!</p>";
    }

    /* grabbing the title */
    preg_match_all('/<h1>(.*)<\\/h1>/iUms', $contents, $titles);
    $title = $titles[1][0];

    /* Grabbing the headers.. */
    preg_match_all('/<h([23])([^>]*)>(.*)<\\/h[23]>/iUms', $contents, $headers);

    $sidebar = "";

    // echo "<pre>\n"; print_r($headers); echo "</pre>";

    if ( !empty($headers) && (count($headers[3])>1) ) {
        $sidebar = "<ul>\n";
        foreach($headers[0] as $key=>$dummy) {

            if (safe_string($headers[3][$key], true)=="") {
                // Skip it!
                continue;
            }

            if ($headers[1][$key]=="2") {
                $sidebar .= sprintf("<li><a href='#anchor-%s'>%s</a></li>\n",
                        safe_string($headers[3][$key], true),
                        strip_tags($headers[3][$key])
                    );
            }

            if ($headers[1][$key]=="3") {
                $sidebar .= sprintf("<li style='margin-left: 2em;'><a href='#anchor-%s'>%s</a></li>\n",
                        safe_string($headers[3][$key], true),
                        strip_tags($headers[3][$key])
                    );
            }

        }

        $sidebar .= "</ul>\n";

    }


    $contents = preg_replace_callback('/<h([23])([^>]*)>(.*)<\\/h[23]>/iUms', "headers_callback", $contents);

    // Add anchor to keyword..
    $keyword = safe_string($keyword);
    if (!empty($keyword)) {
        // echo "ja - $keyword !";
        $contents = preg_replace("/$keyword/i", "<a name=\"$keyword\"></a>$keyword", $contents);
    }

    return array($contents, $sidebar, $title);
}

/**
 * Returns a "safe" version of the given string - basically only US-ASCII and
 * numbers. Needed because filenames and titles and such, can't use all characters.
 *
 * @param string $str
 * @param boolean $strict
 * @return string
 */
function safe_string($str, $strict=false, $extrachars="") {

    // replace UTF-8 non ISO-8859-1 first
    $str = strtr($str, array(
        "\xC3\x80"=>'A', "\xC3\x81"=>'A', "\xC3\x82"=>'A', "\xC3\x83"=>'A',
        "\xC3\x84"=>'A', "\xC3\x85"=>'A', "\xC3\x87"=>'C', "\xC3\x88"=>'E',
        "\xC3\x89"=>'E', "\xC3\x8A"=>'E', "\xC3\x8B"=>'E', "\xC3\x8C"=>'I',
        "\xC3\x8D"=>'I', "\xC3\x8E"=>'I', "\xC3\x8F"=>'I', "\xC3\x90"=>'D',
        "\xC3\x91"=>'N', "\xC3\x92"=>'O', "\xC3\x93"=>'O', "\xC3\x94"=>'O',
        "\xC3\x95"=>'O', "\xC3\x96"=>'O', "\xC3\x97"=>'x', "\xC3\x98"=>'O',
        "\xC3\x99"=>'U', "\xC3\x9A"=>'U', "\xC3\x9B"=>'U', "\xC3\x9C"=>'U',
        "\xC3\x9D"=>'Y', "\xC3\xA0"=>'a', "\xC3\xA1"=>'a', "\xC3\xA2"=>'a',
        "\xC3\xA3"=>'a', "\xC3\xA4"=>'a', "\xC3\xA5"=>'a', "\xC3\xA7"=>'c',
        "\xC3\xA8"=>'e', "\xC3\xA9"=>'e', "\xC3\xAA"=>'e', "\xC3\xAB"=>'e',
        "\xC3\xAC"=>'i', "\xC3\xAD"=>'i', "\xC3\xAE"=>'i', "\xC3\xAF"=>'i',
        "\xC3\xB1"=>'n', "\xC3\xB2"=>'o', "\xC3\xB3"=>'o', "\xC3\xB4"=>'o',
        "\xC3\xB5"=>'o', "\xC3\xB6"=>'o', "\xC3\xB8"=>'o', "\xC3\xB9"=>'u',
        "\xC3\xBA"=>'u', "\xC3\xBB"=>'u', "\xC3\xBC"=>'u', "\xC3\xBD"=>'y',
        "\xC3\xBF"=>'y', "\xC4\x80"=>'A', "\xC4\x81"=>'a', "\xC4\x82"=>'A',
        "\xC4\x83"=>'a', "\xC4\x84"=>'A', "\xC4\x85"=>'a', "\xC4\x86"=>'C',
        "\xC4\x87"=>'c', "\xC4\x88"=>'C', "\xC4\x89"=>'c', "\xC4\x8A"=>'C',
        "\xC4\x8B"=>'c', "\xC4\x8C"=>'C', "\xC4\x8D"=>'c', "\xC4\x8E"=>'D',
        "\xC4\x8F"=>'d', "\xC4\x90"=>'D', "\xC4\x91"=>'d', "\xC4\x92"=>'E',
        "\xC4\x93"=>'e', "\xC4\x94"=>'E', "\xC4\x95"=>'e', "\xC4\x96"=>'E',
        "\xC4\x97"=>'e', "\xC4\x98"=>'E', "\xC4\x99"=>'e', "\xC4\x9A"=>'E',
        "\xC4\x9B"=>'e', "\xC4\x9C"=>'G', "\xC4\x9D"=>'g', "\xC4\x9E"=>'G',
        "\xC4\x9F"=>'g', "\xC4\xA0"=>'G', "\xC4\xA1"=>'g', "\xC4\xA2"=>'G',
        "\xC4\xA3"=>'g', "\xC4\xA4"=>'H', "\xC4\xA5"=>'h', "\xC4\xA6"=>'H',
        "\xC4\xA7"=>'h', "\xC4\xA8"=>'I', "\xC4\xA9"=>'i', "\xC4\xAA"=>'I',
        "\xC4\xAB"=>'i', "\xC4\xAC"=>'I', "\xC4\xAD"=>'i', "\xC4\xAE"=>'I',
        "\xC4\xAF"=>'i', "\xC4\xB0"=>'I', "\xC4\xB1"=>'i', "\xC4\xB4"=>'J',
        "\xC4\xB5"=>'j', "\xC4\xB6"=>'K', "\xC4\xB7"=>'k', "\xC4\xB8"=>'k',
        "\xC4\xB9"=>'L', "\xC4\xBA"=>'l', "\xC4\xBB"=>'L', "\xC4\xBC"=>'l',
        "\xC4\xBD"=>'L', "\xC4\xBE"=>'l', "\xC4\xBF"=>'L', "\xC5\x80"=>'l',
        "\xC5\x81"=>'L', "\xC5\x82"=>'l', "\xC5\x83"=>'N', "\xC5\x84"=>'n',
        "\xC5\x85"=>'N', "\xC5\x86"=>'n', "\xC5\x87"=>'N', "\xC5\x88"=>'n',
        "\xC5\x89"=>'n', "\xC5\x8A"=>'N', "\xC5\x8B"=>'n', "\xC5\x8C"=>'O',
        "\xC5\x8D"=>'o', "\xC5\x8E"=>'O', "\xC5\x8F"=>'o', "\xC5\x90"=>'O',
        "\xC5\x91"=>'o', "\xC5\x94"=>'R', "\xC5\x95"=>'r', "\xC5\x96"=>'R',
        "\xC5\x97"=>'r', "\xC5\x98"=>'R', "\xC5\x99"=>'r', "\xC5\x9A"=>'S',
        "\xC5\x9B"=>'s', "\xC5\x9C"=>'S', "\xC5\x9D"=>'s', "\xC5\x9E"=>'S',
        "\xC5\x9F"=>'s', "\xC5\xA0"=>'S', "\xC5\xA1"=>'s', "\xC5\xA2"=>'T',
        "\xC5\xA3"=>'t', "\xC5\xA4"=>'T', "\xC5\xA5"=>'t', "\xC5\xA6"=>'T',
        "\xC5\xA7"=>'t', "\xC5\xA8"=>'U', "\xC5\xA9"=>'u', "\xC5\xAA"=>'U',
        "\xC5\xAB"=>'u', "\xC5\xAC"=>'U', "\xC5\xAD"=>'u', "\xC5\xAE"=>'U',
        "\xC5\xAF"=>'u', "\xC5\xB0"=>'U', "\xC5\xB1"=>'u', "\xC5\xB2"=>'U',
        "\xC5\xB3"=>'u', "\xC5\xB4"=>'W', "\xC5\xB5"=>'w', "\xC5\xB6"=>'Y',
        "\xC5\xB7"=>'y', "\xC5\xB8"=>'Y', "\xC5\xB9"=>'Z', "\xC5\xBA"=>'z',
        "\xC5\xBB"=>'Z', "\xC5\xBC"=>'z', "\xC5\xBD"=>'Z', "\xC5\xBE"=>'z',
        ));
   
    // utf8_decode assumes that the input is ISO-8859-1 characters encoded 
    // with UTF-8. This is OK since we want US-ASCII in the end.
    $str = trim(utf8_decode($str));
    
    $str = strtr($str, array("\xC4"=>"Ae", "\xC6"=>"AE", "\xD6"=>"Oe", "\xDC"=>"Ue", "\xDE"=>"TH",
        "\xDF"=>"ss", "\xE4"=>"ae", "\xE6"=>"ae", "\xF6"=>"oe", "\xFC"=>"ue", "\xFE"=>"th"));

    $str=str_replace("&amp;", "", $str);

    $delim = '/';
    if ($extrachars != "") {
        $extrachars = preg_quote($extrachars, $delim);
    }
    if ($strict) {
        $str = strtolower(str_replace(" ", "-", $str));
        $regex = "[^a-zA-Z0-9_".$extrachars."-]";
    } else {
        $regex = "[^a-zA-Z0-9 _.,".$extrachars."-]";
    }

    $str = preg_replace("$delim$regex$delim", "", $str);

    return $str;
}

function headers_callback($match) {
    
    //echo "<pre>";
    //print_r($match);
    //echo "</pre>";

    $res = sprintf("<h%s id='anchor-%s'>%s</h%s>",
            $match[1],
            safe_string($match[3], true),
            trim($match[3]),
            $match[1]
        );

    // echo nl2br(htmlentities($res));

    return $res;

}

?>
