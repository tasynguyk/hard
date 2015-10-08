<HTML>
<HEAD>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
function makeAjaxCall(){
	$.ajax({
		type: "post",
		url: "http://localhost/ci_user/index.php/ajax/ajax/xuly",
		cache: false,				
		data: $('#userForm').serialize(),
		success: function(json){						
		try{		
			var obj = jQuery.parseJSON(json);
			alert( obj['STATUS']);
					
			
		}catch(e) {		
			alert('Exception while request..');
		}		
		},
		error: function(){						
			alert('Error while request..');
		}
 });
}
</script>
</HEAD>
<BODY>
    <form name="userForm" id="userForm" action="<?php echo base_url().'index.php/ajax/ajax/xuly'; ?>" method="post">
<table>
    <tr>
        <td>Upload image</td>
        <td>
            <input type="file" id="ifile" name="ifile" />
        </td>
    </tr>
    <tr>
        <td>Title</td>
        <td>
            <input type="text" id="title" name="title" />
        </td>
    </tr>
    <tr>
	<td>
            <input type="button" onclick="javascript:makeAjaxCall();" value="Submit"/>
            <input type="submit" values="upload" />
        </td>
    </tr>
</table>
</form>
 </BODY>
</HTML>