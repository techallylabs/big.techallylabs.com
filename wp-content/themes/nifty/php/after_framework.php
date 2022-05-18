<?php

BoldThemes_Customize_Default::$data['body_font'] = 'Nunito Sans';
BoldThemes_Customize_Default::$data['heading_supertitle_font'] = 'Spartan';
BoldThemes_Customize_Default::$data['heading_font'] = 'Spartan';
BoldThemes_Customize_Default::$data['heading_subtitle_font'] = 'Spartan';
BoldThemes_Customize_Default::$data['menu_font'] = 'Nunito Sans';

BoldThemes_Customize_Default::$data['buttons_shape'] = 'hard-rounded';

BoldThemes_Customize_Default::$data['accent_color'] = '#057485';
BoldThemes_Customize_Default::$data['alternate_color'] = '#222e41';
BoldThemes_Customize_Default::$data['logo_height'] = '80';

BoldThemes_Customize_Default::$data['letter_spacing_heading'] = '-1';
BoldThemes_Customize_Default::$data['letter_spacing_button'] = '0';

BoldThemes_Customize_Default::$data['image_404'] = get_template_directory_uri() . '/gfx/404.jpg';


require_once( get_template_directory() . '/php/after_framework/functions.php' );
require_once( get_template_directory() . '/php/after_framework/customize_params.php' );