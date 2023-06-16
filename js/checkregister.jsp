<script Language="JavaScript">
function CheckUserRegister()
	{	
		//Citizenship
		if(document.all.warganegara.selectedIndex == ""){
			alert("Sila Pilih Kewarganegaraan Anda!");
			document.all.warganegara.focus();
			return false;	
		}
		//No id
		if(document.getElementById('ShowWarga1').style.display == "block"){ 
			var suka=document.all.nokad_new.value;
			var atpos=suka.indexOf("-");
			var atpos2=suka.indexOf(" ");
			if(document.all.nokad_new.value =="" && document.all.nokad_new.value != "") {
				alert("Sila isi Nombor Kad Pengenalan Anda");
				document.all.nokad_new.focus();
				return false;
			}
			if(isNaN(suka))
			{
				alert("New IC format must be numeric.");
				document.all.nokad_new.focus();
				return false;
			}
			if (atpos>=0)
			{
				alert("You have enter '-' in New IC format. Please remove it.");
				document.all.nokad_new.focus();
				return false;
			}
			if (atpos2>=0)
			{
				alert("You have enter space in New IC format. Please remove it.");
				document.all.nokad_new.focus();
				return false;
			}
			if(document.all.nokad_new.value.length != 12 && document.all.nokad_new.value !=""){
				alert("You enter invalid New IC format");
				document.all.nokad_new.focus();
				return false;
			}
		}
		
		// passport
		if(document.getElementById('ShowBukanWarga1').style.display == "block"){ 
			if(document.all.nokad2.value == "") {
				alert("Sila masukkan nombor passport anda!");
				document.all.nokad2.focus();
				return false;
			}
		}
		
		// gelaran
		    if(document.all.gelaran.selectedIndex == ""){
			alert("Sila Pilih gelaran Anda!");
			document.all.gelaran.focus();
			return false;	
		}
		
		
		//nama penuh
		if(document.all.nama.value == ""){
			alert("Sila Masukkan Nama Penuh Anda!");
			document.all.nama.focus();
			return false;	
		}
		
		//DOB
		if(document.all.birthdate.value == ""){
			alert("Sila masukkan tarikh lahir anda!");
			document.all.birthdate.focus();
			return false;	
		}
		
		//Academic Level
		if(document.all.mini.selectedIndex == ""){
			alert("Sila masukkan akademik tertinggi anda!");
			document.all.mini.focus();
			return false;	
		}

  //Emel
  if (document.all.alamatemel.value == "")
  {
    alert("Sila masukkan alamat email anda.");
    document.all.alamatemel.focus();
    return (false);
  }
  
  //id pengguna
  if (document.all.userid.value == "")
  {
    alert("Sila masukkan id pengguna anda.");
    document.all.userid.focus();
    return (false);
  }
  
  if (document.all.password.value == "")
  {
    alert("Sila masukkan password pengguna anda.");
    document.all.password.focus();
    return (false);
  }
  
 /*  
  //Emel - Format
     if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formRegister1.textEmel.value)))
  {
	alert("Format email salah. Sila masukkan semula mengikut format berikut : xx@xxx.xxx")
	formRegister1.textEmel.value = "";
	formRegister1.textEmel.focus();
	return (false);
  }*/
  
 return (true);
}
</script>
