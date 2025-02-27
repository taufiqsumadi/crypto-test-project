<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>  
    <link type="text/css" src="toast/toastr.min.css">
    <script type="text/javascript" src="toast/toastr.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
   <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
     <img src="cloud.png" width="40" height="40" class="d-inline-block align-top" alt="">
     Crypto Test Using AES
  </a>
  
  <form class="form-inline">
    <button style="margin-top: 10px; margin-right: 10px;" class="btn btn-sm btn-outline-light" type="button" onclick="GotoCryptoText()" > Crypto Text </button>
    <button style="margin-top: 10px; margin-right: 50px" class="btn btn-sm btn btn-outline-light" type="button" onclick="GotoCryptoFile()" >Crypto File</button>
    <button style="margin-top: 10px;" class="btn btn-sm btn btn-outline-light" type="button">Network Security Project</button>
  </form>
</nav>

   <div class="containers" style="margin-top:20px; margin-left: 100px; margin-right: 100px;">  
    <!-- Modaladd -->
    <div class="form-inline">
    <div id="myModal_Encrypt"  style="display:inline; padding-right: 100px" >
        <div style="width:500px">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                <h4 class="modal-title">Encryption </h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                <form method="post" id="encryption_form">     
                  <p>Input Plaintext</p>
				   <!--<input type="text" name="message" id="message" class="form-control" style="height:150px; width: 450px" /> 
				   <input name="key" id="key" type="password" class="form-control" style="width: 450px"></input>-->
				  <textarea name="message" id="message" class="form-control" rows="4" cols="55">
				  </textarea>
                  <br />
                  <br />
                  <p>Input Key</p>
				  <input name="key" id="key" type="password" class="form-control" style="width: 430px">
                  <br />
                  <br />
                  <div id="button_encrypt" style="padding-left: 80px">
                    <button id="submit_enc" type="submit" class="btn btn-success" style="width:300px;">Encrypt</button>
                  </div>
                  <br />
                  <div id="chiper_text">
                    <p><strong>Ciphertext:</strong></p>
				    <textarea name="chiper_text" id="chiper"  class="form-control" rows="4" cols="55">
				    </textarea>
                  </div>
                </form>
                </div>
                <!-- footer modal -->
                <button  onclick="refreshEncrypt()" type="button" class="btn btn-success">Refresh</button>
          
            </div>
        </div>
    </div>

    <div id="myModal_Decrypt"  style="display:inline; " >
        <div style="width:500px">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                <h4 class="modal-title">Decryption </h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                <form method="post" id="decryption_form">     
                  <p>Input Ciphertext</p>
                  <!--<input type="text" name="cipher_text2" id="cipher_text2" class="form-control" style="height:150px; width: 450px" />
                  <input name="key" id="key" type="password" class="form-control" style="width: 450px"></input>-->
				  <textarea type="text" name="cipher_text2" id="cipher_text2" class="form-control" rows="4" cols="55">
				  </textarea>
				  <br />
                  <br />
                  <p>Input Key</p>
				   <input name="key2" id="key2" type="password" class="form-control" style="width: 430px">
                  <br />
                  <br />
                  <div id="button_decrypt" style="padding-left: 80px">
                    <button id="submit_dec" type="submit" class="btn btn-success" style="width:300px;">Decrypt</button>
                  </div>
                  <br />
                  <div id="plain_text">
                    <p><strong>Plaintext:</strong></p>
					 <textarea name="plaintext" id="plain"  class="form-control" rows="4" cols="55">
				    </textarea>
                  </div>
                </form>

                </div>
                <!-- footer modal -->
                <button  onclick="refreshDecrypt()" type="button" class="btn btn-success">Refresh</button>
          
            </div>
        </div>
    </div>

<script type="text/javascript">
      
//Encryption
$('#encryption_form').on("submit", function(event){  
  event.preventDefault();  
    $.ajax({  
      url:"encrypt_AES.php",  
      method:"POST",  
      data:$('#encryption_form').serialize(),
      beforeSend:function(){  
        $("#submit_enc").attr("disabled", true);
      },    
      success:function(data){  
       /// success();
        $('#chiper').html(data);
        $("#submit_enc").attr("disabled", false);
      }  
    });
});

//Decryption
$('#decryption_form').on("submit", function(event){  
  event.preventDefault();  
    $.ajax({  
      url:"decrypt_AES.php",  
      method:"POST",  
      data:$('#decryption_form').serialize(),
      beforeSend:function(){  
        $("#submit_dec").attr("disabled", true);
      },    
      success:function(data){  
       // success();
        $('#plain').html(data);
        $("#submit_dec").attr("disabled", false);
      }  
    });
});

//function success(){
  //Swal.fire(
  //'Berhasil',
  //'success')
//}

function refreshEncrypt(){
document.getElementById("message").value ="";
document.getElementById("key").value ="";
document.getElementById("chiper").value ="";
}

function refreshDecrypt(){
document.getElementById("cipher_text2").value ="";
document.getElementById("key2").value ="";
document.getElementById("plain").value ="";
}

</script>
</body>
</html>

