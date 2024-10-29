/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 * Tích hợp và hướng dẫn bởi https://trungtrinh.com - Website chia sẻ bách khoa toàn thư */

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = './js/ckeditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = './js/ckeditor/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = './js/ckeditor/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = './js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = './js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = './js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	config.height = '600px';
};
