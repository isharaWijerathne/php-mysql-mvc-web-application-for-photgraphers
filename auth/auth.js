$(document).ready(function()
{

    var validatoer =  $("#validater");
    
    validatoer.css("visibility","hidden")
    $("#btn").click( function(event)
        {
         
            event.preventDefault();
            var email_form_user = $("#email").val();
            var password_from_user = $("#password").val();

            var post_data = 
            {
                email : email_form_user,
                password : password_from_user
            }
           
           $.post("../controllers/authController.php",post_data, function(data, status)
            {
                console.log(data);
                
                var result = JSON.parse(data);
                if(result.message === "fail")   
                {
                    validatoer.css("visibility","visible")
                    setInterval(()=>{
                        validatoer.css("visibility","hidden")
                        
                    },5000)
                }
               
                if(result.message === "done")   
                {
                        window.location.href ="../admin/dashboard/index.php"
                }
                
            
                    
                    
                    
                
            });
        })
})