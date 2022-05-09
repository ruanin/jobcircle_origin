$(document).ready(function() {
	'use strict';

	/**
	 * Count Up
	 */
	$('.stat-item').each(function() {
		var numAnim = new CountUp($('strong', this).attr('id'), 0, $(this).data('to'), 0, 1.5, {
			useEasing : true,
			useGrouping : true,
			separator : ',',
			decimal : '.',
			prefix : '',
			suffix : ''
		});
		numAnim.start();
	});

	/**
	 * Action Bar
	 */
	// Switch the body classes
	$('.action-bar-chapter a').on('click', function(e) {
		e.preventDefault();

		$(this).closest('ul').find('a').removeClass('active');
		$(this).closest('ul').find('a').each(function() {
			$('body').removeClass($(this).attr('data-action'));
		});
		$('body').addClass($(this).attr('data-action'));
		$(this).addClass('active');
	});

	// Change color combination
	$('.action-bar-chapter table a').on('click', function(e) {
		e.preventDefault();
		$(this).closest('table').find('a').removeClass('active');
		$(this).addClass('active');

		var uri = $(this).attr('href');
		$('#style-primary').attr('href', uri);
	});

	// Hide/Show
	$('.action-bar-title').on('click', function(e) {
		$('.action-bar-content').toggleClass('open');
	});

	/**
	 * ezMark
	 */
	$('input[type=radio], input[type=checkbox]').ezMark();


	/**
	 * Bootstrap wysiwyg
	 */
	$('#editor').wysihtml5();;

	/**
	 * Fileinput
	 */
	$("#form-register-photo").fileinput({
        language: "de",
		dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Photo</span>',
		uploadUrl: '/',
		maxFileCount: 1,
		showUpload: false,
		browseLabel: 'Browse',
		browseIcon: '',
		removeLabel: 'Remove',
		removeIcon: '',
		uploadLabel: 'Upload',
		uploadIcon: ''
	});
	$("#cv").fileinput({
        language: "de",
		dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Photo</span>',
		uploadUrl: '/',
		maxFileCount: 1,
		showUpload: false,
		showPreview: false,
		browseLabel: 'Durchsuchen',
		browseIcon: '',
		removeLabel: 'Löschen',
		removeIcon: '',
		uploadLabel: 'Hochladen',
		uploadIcon: ''
	});

	$("#file").fileinput({
        language: "de",
		dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Photo</span>',
		uploadUrl: '/',
		maxFileCount: 1,
		showUpload: false, 
		showPreview: false,
        showCancel: true,
		browseLabel: 'Durchsuchen',
		browseIcon: '',
		removeLabel: 'Löschen',
		removeIcon: '',
		uploadLabel: 'Hochladen',
		uploadIcon: ''
	});
    $("#file2").fileinput({
        language: "de",
		dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Photo</span>',
		uploadUrl: '/',
		maxFileCount: 1,
		showUpload: false, 
		showPreview: false,
        showCancel: true,
		browseLabel: 'Durchsuchen',
		browseIcon: '',
		removeLabel: 'Löschen',
		removeIcon: '',
		uploadLabel: 'Hochladen',
		uploadIcon: ''
	});
    $("#file3").fileinput({
        language: "de",
		dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Photo</span>',
		uploadUrl: '/',
		maxFileCount: 1,
		showUpload: false, 
		showPreview: false,
        showCancel: true,
		browseLabel: 'Durchsuchen',
		browseIcon: '',
		removeLabel: 'Löschen',
		removeIcon: '',
		uploadLabel: 'Hochladen',
		uploadIcon: ''
	});
});