(function(window) {
	'use strict';
	var decoder = $('#qr-canvas'),
		sl = $('.scanner-laser'),
		pl = $('#play'),
		si = $('#scanned-img'),
		sQ = $('#scanned-QR'),
		sv = $('#save'),
		sp = $('#stop'),
		spAll = $('#stopAll');
		
		$('[data-toggle="tooltip"]').tooltip();
	sl.css('opacity', .5);
	pl.click(function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") {
			decoder.WebCodeCam({
				videoSource: {
					id: $('select#cameraId').val(),
					maxWidth: 640,
					maxHeight: 480
				},
				autoBrightnessValue: 120,
				resultFunction: function(text, imgSrc) {
					si.attr('src', imgSrc);
					sQ.text("CHECK IN SUCCESSFUL.");
					$.ajax({
						url: "scanqrcode.php",
						type: "POST",
						dataType: "json",
						data: {scannedQR:text},
						success: function(data){
						}
					});
					sl.fadeOut(150, function() {
						sl.fadeIn(150);
					});
				},
				getUserMediaError: function() {
					alert('Sorry, the browser you are using doesn\'t support getUserMedia');
				},
				cameraError: function(error) {
					var p, message = 'Error detected with the following parameters:\n';
					for (p in error) {
						message += p + ': ' + error[p] + '\n';
					}
					alert(message);
				}
			});
			sQ.text('Scanning ...');
			sv.removeClass('disabled');
			sp.click(function(event) {
				sv.addClass('disabled');
				sQ.text('Stopped');
				decoder.data().plugin_WebCodeCam.cameraStop();
			});
			spAll.click(function(event) {
				sv.addClass('disabled');
				sQ.text('Stopped');
				decoder.data().plugin_WebCodeCam.cameraStopAll();
			});
		} else {
			sv.removeClass('disabled');
			sQ.text('Scanning ...');
			decoder.data().plugin_WebCodeCam.cameraPlay();
		}
	});
	sv.click(function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var src = decoder.data().plugin_WebCodeCam.getLastImageSrc();
		si.attr('src', src);
	});
	

	function gotSources(sourceInfos) {
		for (var i = 0; i !== sourceInfos.length; ++i) {
			var sourceInfo = sourceInfos[i];
			var option = document.createElement('option');
			option.value = sourceInfo.id;
			if (sourceInfo.kind === 'video') {
				var face = sourceInfo.facing == '' ? 'unknown' : sourceInfo.facing;
				option.text = sourceInfo.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
				videoSelect.appendChild(option);
			}
		}
	}
	if (typeof MediaStreamTrack.getSources !== 'undefined') {
		var videoSelect = document.querySelector('select#cameraId');
		$(videoSelect).change(function(event) {
			if (typeof decoder.data().plugin_WebCodeCam !== "undefined") {
				decoder.data().plugin_WebCodeCam.options.videoSource.id = $(this).val();
				decoder.data().plugin_WebCodeCam.cameraStop();
				decoder.data().plugin_WebCodeCam.cameraPlay(false);
			}
		});
		MediaStreamTrack.getSources(gotSources);
	} else {
		document.querySelector('select#cameraId').remove();
	}
}).call(window.Page = window.Page || {});