<h1 class="form-heading">Register Form</h1>
<div class="login-form">
  <div class="main-div">
    <div class="panel">
      <h2>Register</h2>
      <p><div class="alert alert-danger" style="display:none"></div></p>
    </div>
    <form id="register" action="" method="POST">
      <div class="form-group">
        <input type="text" name="name" class="form-control" id="name" placeholder="name">
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
      </div>  
      <button type="button" id="form-submit-button" class="btn btn-primary">Register</button>
    </form>
  </div>
</div>
<script type="text/javascript"> 
  $(document).ready(function(){
     $('#form-submit-button').on('click', function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('register/insert');?>", 
            data: $("#register").serialize(),
            dataType: "json", 
            success: function(data)
            {
             
             /* if($.isEmptyObject(data.error))
              {
                alert("hello");
                $(".alert-danger").css('display','none');
                alert(data.success);
              }
              else
              {
                $(".alert-danger").css('display','block');
                $(".alert-danger").html(data.error);
                window.setTimeout(function() {
                        window.location.href = '<?php echo base_url('blog'); ?>';
                    }, 2000);
              }*/

              if (data.status == "success") {
                $(".alert-danger").css('display','block');
                $(".alert-danger").html(data.message);;
                window.setTimeout(function() {
                        window.location.href = '<?php echo base_url('login'); ?>';
                    }, 2000);
              } 
              else
              {
                $(".alert-danger").css('display','block');
                $(".alert-danger").html(data.message);;
              }



            }
        });
    });  
  })
</script>