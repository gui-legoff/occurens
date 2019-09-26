<script>
function getNotif(){
	
	
	new Ajax.Updater('notif','php/includes/notif.php',{
		onSuccess:function(){setTimeout(getNotif,2000);}
	});

}
getNotif();

function getMessages(){
	new Ajax.Updater('tchat','php/includes/messagerie.php',{
		onSuccess:function(){setTimeout(getMessages,2000);}
	});
}
getMessages();	
</script>
