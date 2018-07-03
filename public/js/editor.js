jQuery( document ).ready(function() {
	if(document.getElementById('editor')) {
		var editor = CKEDITOR.replace('editor');
		CKFinder.setupCKEditor( editor );
		
		var APP_URL = jQuery('meta[name="APP_URL"]').attr('content');
		setInterval(function() {
			editorData = CKEDITOR.instances.editor.getData();
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				dataType : "text",
				type: "POST",
				url : APP_URL + "/note/save",
				data :  { editorData : editorData, fileName : jQuery('#fileName').val() },
				success: function (response) {
					jQuery('#save-datetime').text('Ultimo salvataggio automatico: ' + response);
				},
				error: function(xhr){
					alert("Errore nell'autosalvataggio: " + xhr.status + " " + xhr.statusText);
				}
			});
		}, 3000);
	} else if(document.getElementById('editorReadOnly')) {
		var editor = CKEDITOR.replace('editorReadOnly');
		CKFinder.setupCKEditor( editor );
	}
});