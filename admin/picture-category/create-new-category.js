import {createMessageBox} from "../../message_box.js";

//create alert messgae window
createMessageBox("msg_model","Warning","This Delete make your Eroo","ok_btn_model")

var message_model = new bootstrap.Modal(document.getElementById('msg_model'));
var ok_btn_model = document.getElementById('ok_btn_model')
var delete_butoon = document.querySelectorAll('.btn-delete')
    
let selected_Id = null;
delete_butoon.forEach(element => {
    element.addEventListener("click" , () => 
        {
            //set id
            selected_Id = element.value;

            // open model
            message_model.show();
            console.log(selected_Id);
            

        })
});

ok_btn_model.onclick = () => {
    console.log(selected_Id);
    delete_category(selected_Id);
    
}



//hide sesstion message
const server_mesasge_window = document.getElementById("server_msg");

//hide after show 5sec
if(server_mesasge_window !=null)
    {
         var hide_message =    setInterval(()=>
                                    {
                                        server_mesasge_window.style.display = "none";
                                        console.log("work");
                                        clearInterval(hide_message)
                                    },5000)

    }

    
    
//delete function
function delete_category(categoryId)
{
    $.get(`../../controllers/picture_category_control/delete_category.php?id=${categoryId}`, function(data, status)
    {
        var data = JSON.parse(data);
        if(data.status == "success")
            {
                window.location.href = "/hnd/admin/picture-category/create-new.php";
            }   
    });
}
  