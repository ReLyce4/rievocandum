function showEditorBack() {
	jQuery('#btnShowEditorBack').fadeOut("fast", function() {
		jQuery('#btnHideEditorBack').fadeIn();
		jQuery('#editorBackContainer').fadeIn();
	});
}
function hideEditorBack() {
	jQuery('#btnHideEditorBack').fadeOut("fast", function() {
		jQuery('#btnShowEditorBack').fadeIn();
		jQuery('#editorBackContainer').fadeOut();
	});
}

jQuery( document ).ready(function() {

	jQuery('#editorBackContainer').fadeOut(0);
	jQuery('#btnHideEditorBack').fadeOut(0);

	if(document.getElementById('editor')) {
		var editor = CKEDITOR.replace('editor');
		CKFinder.setupCKEditor( editor );
		
		var APP_URL = jQuery('meta[name="APP_URL"]').attr('content');
		setInterval(function() {
			editorData = CKEDITOR.instances.editor.getData();
			jQuery.ajax({
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
	} else if(document.getElementById('editorFront')) {
		var editorFront = CKEDITOR.replace('editorFront');
		var editorBack = CKEDITOR.replace('editorBack');
		CKFinder.setupCKEditor( editorFront );
		CKFinder.setupCKEditor( editorBack );
		
		var APP_URL = jQuery('meta[name="APP_URL"]').attr('content');
		setInterval(function() {
			editorDataFront = CKEDITOR.instances.editorFront.getData();
			editorDataBack = CKEDITOR.instances.editorBack.getData();
			jQuery.ajax({
				dataType : "text",
				type: "POST",
				url : APP_URL + "/flashcard/save",
				data :  { editorDataFront : editorDataFront, editorDataBack : editorDataBack, fileName : jQuery('#fileName').val() },
				success: function (response) {
					jQuery('#save-datetime').text('Ultimo salvataggio automatico: ' + response);
				},
				error: function(xhr){
					alert("Errore nell'autosalvataggio: " + xhr.status + " " + xhr.statusText);
				}
			});
		}, 3000);
	} else if(document.getElementById('editorReadOnlyFront')) {
		var editorFront = CKEDITOR.replace('editorReadOnlyFront');
		var editorBack = CKEDITOR.replace('editorReadOnlyBack');
		CKFinder.setupCKEditor( editorFront );
		CKFinder.setupCKEditor( editorBack );
	}
});