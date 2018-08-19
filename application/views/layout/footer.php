</div>
</body>
</html>
<script>
$(document).ready(function(){
$("#myForm").validate({
rules: {                   
    txt_title: "required",
    txt_discription: "required"  
     },  
     errorElement: "span" ,                              
     messages: {
      txt_title: " Please Enter Your Name",
      txt_discription: " Enter Your Description"
     }
});
});
</script>