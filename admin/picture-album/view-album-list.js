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