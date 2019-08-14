$().ready(function(){
	$("#Session").validate({
		rules:{
			Usuario:{
				required:true,
				Usuario:true
			},
			Password:{
				required:true,
				minlength:6
			}
		},
		messages:{
			Usuario:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su usuario</font></td></center>",
			},
			Password:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su Password</font></td></center>",
			}
		}
	});
	$("#Usuario").focus();
});
$().ready(function(){
	$("#registrar").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true,
				minlength:6
			},
			name:{
				required:true,
				//name:true
			},
			lastname:{
				required:true,
				//lastname:true
			},
			usuario:{
				required:true,
				//usuario:true
			}
		},
		messages:{
			email:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su email</font></td></center>",
			},
			password:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su password</font></td></center>",
			},
			name:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su nombre</font></td></center>",
			},
			lastname:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su apellido</font></td></center>",
			},
			usuario:{
				required:"<center><td colspan='2'><font color='red'>Por favor escriba su usuario</font></td></center>",
			}
		}
	});
	$("#name").focus();
});