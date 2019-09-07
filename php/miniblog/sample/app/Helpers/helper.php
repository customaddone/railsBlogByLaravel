<?php

if (!function_exists('menu_link_to'))
    {
        function menu_link_to($text = "", $path = "", $options = [])
        {
            if( "/" . request()->path() == $path){
               echo "<li>" . $text . "</li>";
            } else {
               echo "<li><a href='" . $path . "'>" . $text . "</a></li>";
            }
        }
    }
