if(document.getElementById('editor')) {
	var editor = CKEDITOR.replace('editor');
	CKFinder.setupCKEditor( editor );

	var tid;

	CKEDITOR.instances.editor.on( 'change', function() {
		clearTimeout(tid);
		tid = setTimeout(function() {
			var editorData = CKEDITOR.instances.editor.getData();
			var APP_URL = jQuery('meta[name="APP_URL"]').attr('content');
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				dataType : "text",
				type: "POST",
				url : APP_URL + "/note/save",
				data :  { editorData : editorData, editorFileName : jQuery('#editorFileName').val() },
				success: function (response) {
					alert(response);
				},
				error: function(xhr){
					alert("Errore nell'autosalvataggio: " + xhr.status + " " + xhr.statusText);
				}
			});
		}, 3000);
	});
}

function showEditor() {
	if(jQuery('#editorFileName').val()) {
		jQuery('#editorFormName').hide(500, function() {
			jQuery('#editorContainer').show(500);
		});
	} else {
		alert('Digitare nome file');
	}
}