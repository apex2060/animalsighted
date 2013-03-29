function iAlert(id, type, message){
	var alert='<div class="alert '+type+'">'+message+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
	$('#'+id).prepend(alert);
}