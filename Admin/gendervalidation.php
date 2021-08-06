<form action="" method="post" name="register_form" id="register_form" enctype="multipart/form-data">

    <div class="text-input">
        <label>Gender: </label>
        <input class="form-control" type="radio" name="gender" id="male" value="male" />
        <label for="male">Male</label>
        <input class="form-control" type="radio" name="gender" id="female" value="female" />
        <label for="female">Female</label>
    </div>
    <div class="text-input" align="center">
        <input type="submit" name="register" value="Submit" onclick="return radioValidation();" />
    </div>

</form>

<script type="text/javascript">
   function mycalid()
   {
		var gender=document.getElementByName("gender").value;  
		var gendevalue=false;
		for(var i=0; i<gender; i++)
		{
			if(gender[i].checked==true)
				gendevalue=true;
		}
		if(!gendevalue)
		{
			document.getElementByName("gender").innerHTML="Choose gender";  
			error=document.getElementByName("gender").style.color="red";  
			gendevalue=true;
		}
   }
</script>