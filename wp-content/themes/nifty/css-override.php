<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = apply_filters( 'boldthemes_crush_vars', BoldThemesFramework::$crush_vars );
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#057485";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#222e41";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Nunito Sans";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Nunito Sans";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Spartan";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Spartan";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Spartan";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "80";
}
if ( isset( $boldthemes_crush_vars['letterSpacing'] ) ) {
	$letterSpacing = $boldthemes_crush_vars['letterSpacing'];
} else {
	$letterSpacing = "-1";
}
if ( isset( $boldthemes_crush_vars['letterSpacingButton'] ) ) {
	$letterSpacingButton = $boldthemes_crush_vars['letterSpacingButton'];
} else {
	$letterSpacingButton = "0";
}
if ( isset( $boldthemes_crush_vars['buttonFont'] ) ) {
	$buttonFont = $boldthemes_crush_vars['buttonFont'];
} else {
	$buttonFont = "Nunito Sans";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$css_override = sanitize_text_field("select,
input{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
input[type='submit']{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.fancy-select ul.options li:hover{color: {$accentColor};}
.bt-content a{color: {$accentColor};}
a:hover{
    color: {$accentColor};}
.btText a{color: {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{
    letter-spacing: {$letterSpacing}px;}
blockquote{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-content-holder table thead th{
    background-color: {$accentColor};}
.btAccentDarkHeader .btPreloader .animation > div:first-child,
.btLightAccentHeader .btPreloader .animation > div:first-child,
.btTransparentLightHeader .btPreloader .animation > div:first-child{
    background-color: {$accentColor};}
.btPreloader .animation .preloaderLogo{height: {$logoHeight}px;}
body.error404 .btErrorPage .port .bt_bb_button.bt_bb_style_filled a{
    box-shadow: 0 0 0 4em {$accentColor} inset;
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
body.error404 .btErrorPage .port .bt_bb_button.bt_bb_style_filled a:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.bt-no-search-results .bt_bb_port #searchform input[type='submit']{
    letter-spacing: {$letterSpacingButton}px;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.bt-no-search-results .bt_bb_port #searchform input[type='submit']:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.bt-no-search-results .bt_bb_port .bt_bb_button.bt_bb_style_filled a{
    letter-spacing: {$letterSpacingButton}px;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.bt-no-search-results .bt_bb_port .bt_bb_button.bt_bb_style_filled a:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.mainHeader{font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.mainHeader a:hover{color: {$accentColor};}
.menuPort{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btTextLogo{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacing}px;
    line-height: {$logoHeight}px;}
.bt-logo-area .logo img{height: {$logoHeight}px;}
.btTransparentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btDarkTransparentHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before .btAccentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btLightDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btDarkTransparentHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after .btAccentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btLightDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .bt-horizontal-menu-trigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li > a:after{
    background-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.on > a:after{
    background-color: {$accentColor} !important;}
.btStickyHeaderActive.btMenuHorizontal .menuPort nav > ul > li.on > a:after{background-color: {$accentColor};}
.btStickyHeaderActive.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor > a:after,
.btStickyHeaderActive.btMenuHorizontal .menuPort nav > ul > li.current-menu-item > a:after{background-color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li a:hover{color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li{padding: calc({$logoHeight}px * .25) calc(50px * .2) calc({$logoHeight}px * .25) 0;}
.btMenuHorizontal .menuPort > nav > ul > li > a{line-height: calc({$logoHeight}px * .5);}
.rtl.btMenuHorizontal .menuPort > nav > ul > li{padding: calc({$logoHeight}px * .25) 0 calc({$logoHeight}px * .25) calc(50px * .2);}
.btMenuHorizontal .menuPort > nav > ul > li > ul > li{font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.btMenuHorizontal .menuPort > nav > ul ul{
    top: calc({$logoHeight}px * .75);}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:before{
    border-top: 2px solid {$accentColor};}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{color: {$accentColor};}
.btMenuHorizontal.btMenuCenter .logo{
    height: {$logoHeight}px;}
.btMenuHorizontal.btMenuCenter .logo .btTextLogo{
    height: {$logoHeight}px;}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btAccentLightHeader .bt-below-logo-area,
.btAccentLightHeader .topBar{background-color: {$accentColor};}
.btAccentLightHeader .bt-below-logo-area a:hover,
.btAccentLightHeader .topBar a:hover{color: {$alternateColor};}
.btAccentDarkHeader .bt-below-logo-area,
.btAccentDarkHeader .topBar{background-color: {$accentColor};}
.btAccentDarkHeader .bt-below-logo-area a:hover,
.btAccentDarkHeader .topBar a:hover{color: {$alternateColor};}
.btLightAccentHeader .bt-logo-area,
.btLightAccentHeader .bt-vertical-header-top{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .bt-logo-area{background-color: {$accentColor};}
.btLightAccentHeader.btMenuVertical .mainHeader nav ul > li > ul > li.current_page_item > a{color: {$alternateColor};}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .logo img{height: calc({$logoHeight}px*0.5);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .btTextLogo{
    line-height: calc({$logoHeight}px*0.5);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .menuPort nav > ul > li > a,
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .menuPort nav > ul > li > .subToggler{line-height: calc({$logoHeight}px*0.5);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .topBarInMenu{height: calc({$logoHeight}px*0.5);}
.btStickyHeaderActive.btMenuBelowLogo.btMenuBelowLogoShowArea.btMenuHorizontal .mainHeader .bt-logo-area .topBarInLogoArea{height: calc({$logoHeight}px*0.5);}
.btTransparentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btDarkTransparentHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btAccentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btLightDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btDarkTransparentHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btAccentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btLightDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .bt-vertical-menu-trigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btDarkTransparentHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:hover:before{color: {$accentColor};}
.btMenuVertical .mainHeader nav ul > li > ul > li.current_page_item > a{color: {$accentColor};}
.btDarkSkin .bt-site-footer-copy-menu .port:before,
.btLightSkin .btDarkSkin .bt-site-footer-copy-menu .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .bt-site-footer-copy-menu .port:before{background-color: {$accentColor};}
.btArticleHeadline .bt_bb_headline .bt_bb_headline_content a:hover{color: {$accentColor};}
.btPostSingleItemStandard .btArticleShareEtc > div.btReadMoreColumn .bt_bb_button a:hover{color: {$accentColor};}
.btMediaBox.btQuote:before,
.btMediaBox.btLink:before{
    background-color: {$accentColor};}
.btShareColumn .bt_bb_icon .bt_bb_icon_holder:before,
.btShareRow .bt_bb_icon .bt_bb_icon_holder:before{box-shadow: 0 0 0 2em {$accentColor} inset;}
.btShareColumn .bt_bb_icon:hover .bt_bb_icon_holder:before,
.btShareRow .bt_bb_icon:hover .bt_bb_icon_holder:before{color: {$accentColor};
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.post-password-form p:first-child{color: {$alternateColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]{
    background: {$accentColor};}
.btPagination{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.btPagination .paging a{
    color: {$accentColor};}
.btPagination .paging a:after{
    color: {$accentColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{
    letter-spacing: {$letterSpacing}px;
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextDir{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.btArticleCategories a{color: {$accentColor};}
.btArticleComments{color: {$accentColor} !important;}
.btArticleAuthor a{color: {$accentColor} !important;}
.bt-link-pages ul a.post-page-numbers:hover{
    background: {$accentColor};}
.bt-link-pages ul span.post-page-numbers{
    background: {$accentColor};}
.bt-comments-box .vcard .posted{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .commentTxt p.edit-link,
.bt-comments-box .commentTxt p.reply{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.bt-comments-box .comment-navigation a,
.bt-comments-box .comment-navigation span{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.comment-awaiting-moderation{color: {$accentColor};}
a#cancel-comment-reply-link{
    color: {$accentColor};
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.bt-comment-submit{
    box-shadow: 0 0 0 4em {$accentColor} inset;
    letter-spacing: {$letterSpacingButton}px;
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt-comment-submit:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.btBox .btImageTextWidget .btImageTextWidgetText .bt_bb_headline_content span a:hover,
.btCustomMenu .btImageTextWidget .btImageTextWidgetText .bt_bb_headline_content span a:hover,
.btTopBox .btImageTextWidget .btImageTextWidgetText .bt_bb_headline_content span a:hover{color: {$accentColor};}
.btBox.woocommerce .quantity,
.btBox.woocommerce .posted{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.widget_calendar table caption{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacing}px;
    background: {$accentColor};}
.widget_calendar table tbody tr td#today{color: {$accentColor};}
.widget_rss li a.rsswidget{letter-spacing: {$letterSpacing}px;
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_rss li .rss-date{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.widget_shopping_cart .total{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacing}px;}
.widget_shopping_cart .buttons .button{
    background: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{background-color: {$alternateColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{font: normal 10px/1 \"{$menuFont}\";
    background-color: {$alternateColor};}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacing}px;}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.btBox .tagcloud a:before,
.btTags ul a:before{
    color: {$accentColor};}
.btBox .tagcloud a:hover,
.btTags ul a:hover{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
.bt-site-footer-widgets .btSearch button:hover:before,
.btSidebar .btSearch button:hover:before,
.btSidebar .widget_product_search button:hover:before{color: {$accentColor} !important;}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
.btButtonWidget .btButtonWidgetLink:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.2);}
.btButtonWidget .btButtonWidgetLink .btButtonWidgetContent span.btButtonWidgetText{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink:hover{color: {$accentColor};}
.btButtonWidget.btLightAccentButton.btFilledButton .btButtonWidgetLink{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btButtonWidget.btLightAccentButton.btFilledButton .btButtonWidgetLink:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.btStickyHeaderActive .btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink,
btStickyHeaderOpen .btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btButtonWidget.btLightAlternateButton.btOutlineButton .btButtonWidgetLink:hover{color: {$alternateColor};}
.btButtonWidget.btLightAlternateButton.btFilledButton .btButtonWidgetLink{
    box-shadow: 0 0 0 4em {$alternateColor} inset;}
.btButtonWidget.btLightAlternateButton.btFilledButton .btButtonWidgetLink:hover{box-shadow: 0 0 0 4em {$alternateColor} inset,0 5px 15px rgba(0,0,0,.1);}
.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink{color: {$accentColor};
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.btButtonWidget.btAccentLightButton.btFilledButton .btButtonWidgetLink{color: {$accentColor};}
.btBox.widget_bt_bb_twitter_widget .recentTweets small{
    color: {$accentColor};}
.btBox.widget_bt_bb_twitter_widget .recentTweets > p a{color: {$accentColor};}
.bt_bb_section[class*=\"accent_gradient\"]:before{background: linear-gradient(to bottom,{$accentColor} 0%,transparent 25%,transparent 75%,{$accentColor} 100%);}
.bt_bb_section[class*=\"alternate_gradient\"]:before{background: linear-gradient(to bottom,{$alternateColor} 0%,transparent 25%,transparent 75%,{$alternateColor} 100%);}
.bt_bb_section[class*=\"bottom_alternate_gradient\"]:before{background: linear-gradient(to bottom,transparent 80%,{$alternateColor} 100%);}
.bt_bb_separator.bt_bb_border_style_solid.bt_bb_border_color_accent{border-bottom: 1px solid {$accentColor};}
.bt_bb_separator.btWithText .bt_bb_separator_text{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_supertitle_style_accent.bt_bb_headline .bt_bb_headline_superheadline{color: {$accentColor};}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline h1 b,
.bt_bb_headline h2 b,
.bt_bb_headline h3 b,
.bt_bb_headline h4 b,
.bt_bb_headline h5 b,
.bt_bb_headline h6 b{
    color: {$accentColor};}
.bt_bb_dash_top.bt_bb_headline h1 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h1 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h1 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h2 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h2 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h2 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h3 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h3 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h3 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h4 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h4 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h4 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h5 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h5 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h5 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h6 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h6 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h6 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h6 .bt_bb_headline_content:after{border-color: {$accentColor};}
.bt_bb_text_color_accent.bt_bb_icon .bt_bb_icon_holder > span{color: {$accentColor};}
.bt_bb_text_color_alternate.bt_bb_icon .bt_bb_icon_holder > span{color: {$alternateColor};}
.bt_bb_button .bt_bb_button_text{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.bt_bb_button.bt_bb_style_clean a:hover{color: {$accentColor};}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title b{color: {$accentColor};}
.bt_bb_service:hover .bt_bb_service_content_title a{color: {$accentColor};}
.bt_bb_progress_bar .bt_bb_progress_bar_inner .bt_bb_progress_bar_text,
.bt_bb_progress_bar .bt_bb_progress_bar_inner .bt_bb_progress_bar_percentage{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category ul li a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta > span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_author a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_read_more a{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_read_more a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span,
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > .bt_bb_grid_item_category a{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta .bt_bb_grid_item_category a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta .bt_bb_grid_item_category ul li a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta .bt_bb_grid_item_item_author a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_post_share .bt_bb_icon a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_item_read_more a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:after{
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:hover,
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item.active{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_post_grid_loader{
    border-top: .4em solid {$accentColor};}
.bt_bb_navigation_color_accent .slick-dots li{background-color: {$accentColor};}
.bt_bb_navigation_color_accent .slick-dots li:after{border-color: {$accentColor};}
.bt_bb_navigation_color_alternate .slick-dots li{background-color: {$alternateColor};}
.bt_bb_navigation_color_alternate .slick-dots li:after{border-color: {$alternateColor};}
.bt_bb_style_simple ul.bt_bb_tabs_header li.on{border-color: {$accentColor};}
.bt_bb_countdown.btCounterHolder .btCountdownHolder span[class$=\"_text\"] > span{
    letter-spacing: {$letterSpacing}px;
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_top .bt_bb_accordion_item_number{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_top .bt_bb_accordion_item_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_style_filled.bt_bb_accordion .bt_bb_accordion_item.on .bt_bb_accordion_item_top,
.bt_bb_style_filled.bt_bb_accordion .bt_bb_accordion_item:hover .bt_bb_accordion_item_top{
    background: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_icon .bt_bb_icon_holder{
    color: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_title{
    letter-spacing: {$letterSpacing}px;
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_subtitle{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_price_list .bt_bb_price_list_price{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacing}px;}
.wpcf7-form .wpcf7-submit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.wpcf7-form .wpcf7-submit:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
div.wpcf7-validation-errors,
div.wpcf7-acceptance-missing{border: 2px solid {$accentColor};}
span.wpcf7-not-valid-tip{color: {$accentColor};}
.btLight.btNewsletter .btNewsletterButton input{
    color: {$accentColor} !important;}
.btLight.btNewsletter .btNewsletterButton input:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btContact.btLight .btContactButton input[type='submit']{
    color: {$accentColor} !important;
    box-shadow: 0 0 0 0 {$accentColor} inset;
    border: 1px solid {$accentColor};}
.btContact.btLight .btContactButton input[type='submit']:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.bt_bb_progress_bar_advanced .container .bt_bb_progress_bar_advanced_text{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_progress_bar_advanced .bt_bb_progress_bar_advanced_title,
.bt_bb_progress_bar_advanced .bt_bb_progress_bar_advanced_text_below{font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_card_image .bt_bb_card_image_content .bt_bb_card_image_text{font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_card_icon .bt_bb_card_icon_content .bt_bb_card_icon_text_inner .bt_bb_card_icon_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_colored_icon_color_scheme_accent svg .accent-color{fill: {$accentColor} !important;}
.bt_bb_colored_icon_color_scheme_alternate svg .accent-color{fill: {$alternateColor} !important;}
.bt_bb_steps .bt_bb_inner_step .bt_bb_inner_step_content .bt_bb_inner_step_supertitle{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};}
.bt_bb_steps .bt_bb_inner_step .bt_bb_inner_step_content .bt_bb_inner_step_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_colored_icon_color_scheme_light_accent svg .accent-color{fill: {$accentColor} !important;}
.bt_bb_testimonial .bt_bb_testimonial_text span{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacing}px;}
.bt_bb_quote_color_accent.bt_bb_testimonial .bt_bb_testimonial_text:before{color: {$accentColor};}
.bt_bb_quote_color_alternate.bt_bb_testimonial .bt_bb_testimonial_text:before{color: {$alternateColor};}
.products ul li.product .btWooShopLoopItemInner .added:after,
.products ul li.product .btWooShopLoopItemInner .loading:after,
ul.products li.product .btWooShopLoopItemInner .added:after,
ul.products li.product .btWooShopLoopItemInner .loading:after{
    background-color: {$alternateColor};}
.products ul li.product .btWooShopLoopItemInner .added_to_cart,
ul.products li.product .btWooShopLoopItemInner .added_to_cart{
    color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$alternateColor};}
nav.woocommerce-pagination ul li a,
nav.woocommerce-pagination ul li span{
    box-shadow: 0 0 0 0 {$accentColor} inset;
    border: 1px solid {$accentColor};
    color: {$accentColor};}
nav.woocommerce-pagination ul li a:focus,
nav.woocommerce-pagination ul li a:hover,
nav.woocommerce-pagination ul li a.next,
nav.woocommerce-pagination ul li a.prev,
nav.woocommerce-pagination ul li span.current{box-shadow: 0 0 0 4em {$accentColor} inset;}
div.product .onsale{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    color: {$accentColor};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
table.shop_table td.product-remove a.remove{
    color: {$accentColor};
    box-shadow: 0 0 0 1px {$accentColor} inset;}
table.shop_table td.product-remove a.remove:hover{background-color: {$accentColor};}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
.woocommerce-MyAccount-navigation ul li a{
    border-bottom: 2px solid {$accentColor};}
.btDarkSkin .woocommerce-error,
.btLightSkin .btDarkSkin .woocommerce-error,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-error,
.btDarkSkin .woocommerce-info,
.btLightSkin .btDarkSkin .woocommerce-info,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-info,
.btDarkSkin .woocommerce-message,
.btLightSkin .btDarkSkin .woocommerce-message,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-message{border-top: 4px solid {$accentColor};}
.woocommerce-info a:not(.button),
.woocommerce-message a:not(.button){color: {$accentColor};}
.woocommerce-message:before,
.woocommerce-info:before{
    color: {$accentColor};}
.woocommerce .btSidebar a.button,
.woocommerce .bt-content a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .bt-content a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .bt-content input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .bt-content input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .bt-content button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .bt-content button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .bt-content input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .bt-content input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .bt-content input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .bt-content input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .bt-content a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .bt-content a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .bt-content .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .bt-content .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .bt-content button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .bt-content button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;}
.woocommerce .btSidebar a.button,
.woocommerce .bt-content a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .bt-content a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .bt-content input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .bt-content input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .bt-content button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .bt-content button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .bt-content input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .bt-content input.button,
.woocommerce .btSidebar input.alt,
.woocommerce .bt-content input.alt,
.woocommerce-page .btSidebar input.alt,
.woocommerce-page .bt-content input.alt,
.woocommerce .btSidebar a.button.alt,
.woocommerce .bt-content a.button.alt,
.woocommerce-page .btSidebar a.button.alt,
.woocommerce-page .bt-content a.button.alt,
.woocommerce .btSidebar .button.alt,
.woocommerce .bt-content .button.alt,
.woocommerce-page .btSidebar .button.alt,
.woocommerce-page .bt-content .button.alt,
.woocommerce .btSidebar button.alt,
.woocommerce .bt-content button.alt,
.woocommerce-page .btSidebar button.alt,
.woocommerce-page .bt-content button.alt,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt,
div.woocommerce a.button.alt,
div.woocommerce .button.alt,
div.woocommerce button.alt{color: {$accentColor};
    border: 1px solid {$accentColor};
    box-shadow: 0 0 0 0 {$accentColor} inset;}
.woocommerce .btSidebar a.button:hover,
.woocommerce .bt-content a.button:hover,
.woocommerce-page .btSidebar a.button:hover,
.woocommerce-page .bt-content a.button:hover,
.woocommerce .btSidebar input[type=\"submit\"]:hover,
.woocommerce .bt-content input[type=\"submit\"]:hover,
.woocommerce-page .btSidebar input[type=\"submit\"]:hover,
.woocommerce-page .bt-content input[type=\"submit\"]:hover,
.woocommerce .btSidebar button[type=\"submit\"]:hover,
.woocommerce .bt-content button[type=\"submit\"]:hover,
.woocommerce-page .btSidebar button[type=\"submit\"]:hover,
.woocommerce-page .bt-content button[type=\"submit\"]:hover,
.woocommerce .btSidebar input.button:hover,
.woocommerce .bt-content input.button:hover,
.woocommerce-page .btSidebar input.button:hover,
.woocommerce-page .bt-content input.button:hover,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .bt-content input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .bt-content input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .bt-content a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .bt-content a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .bt-content .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .bt-content .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .bt-content button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .bt-content button.alt:hover,
div.woocommerce a.button:hover,
div.woocommerce input[type=\"submit\"]:hover,
div.woocommerce button[type=\"submit\"]:hover,
div.woocommerce input.button:hover,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{border: 1px solid {$accentColor};
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option--highlighted[data-selected]{background-color: {$accentColor};}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{background: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal .btQuoteTotalCalc{
    background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal .btQuoteTotalCurrency{
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btQuoteBooking .btContactNext{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;
    color: {$accentColor};
    box-shadow: 0 0 0 0 {$accentColor} inset,0 0 0 rgba(0,0,0,.1);
    border: 1px solid {$accentColor};}
.btQuoteBooking .btContactNext:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.btQuoteBooking .btQuoteContact .boldBtn .btContactSubmit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    letter-spacing: {$letterSpacingButton}px;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btQuoteBooking .btQuoteContact .boldBtn .btContactSubmit:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 15px rgba(0,0,0,.1);}
.btDatePicker .ui-datepicker-header{background-color: {$accentColor};}
.bold_timeline_container.bold_timeline_container_line_position_left.bold_timeline_container_has_line_style .bold_timeline_container_line{
    border-color: {$accentColor};}
.bold_timeline_container.bold_timeline_container_line_position_left.bold_timeline_container_has_line_style .bold_timeline_item_override_marker_type_inherit.bold_timeline_item .bold_timeline_item_marker{
    border-color: {$accentColor};
    background: {$accentColor};}
.bold_timeline_container .bold_timeline_item.btAccent .bold_timeline_item_inner{background: {$accentColor} !important;
    border-color: {$accentColor} !important;}
", array() );