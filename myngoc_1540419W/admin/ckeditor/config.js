/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin = 'moono-lisa';
	config.extraPlugins = 'lineheight';
	config.contentsCss = 'ckeditor/CustomFonts/fonts.css';
	config.font_names = 'Montserrat/Montserrat;' + config.font_names;

	config.line_height="1.0;1.1;1.2;1.3;1.4;1.5;1.5;1.6;1.7;1.8;1.9;2.0;3.0;4.0;5.0" ;
	
	config.entities = false;
	config.extraPlugins = 'youtube,tableresize,tabletools,table,dialog,dialogui,contextmenu,menu,floatpanel,panel';
	config.youtube_controls = true;
	
	config.toolbar = [
					   ['Source','Preview','Templates'],
					   ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
					   ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
					   '/',
					   ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
					   ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
					   ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					   ['BidiLtr', 'BidiRtl' ],
					   ['Link','Unlink','Anchor'],
					   ['Image','Flash','Iframe','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Youtube'],
					   '/',
					   ['Styles','Format','Font','FontSize','lineheight'],
					   ['TextColor','BGColor'],
					   ['Maximize','ShowBlocks','Syntaxhighlight']
                      ]
	config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
