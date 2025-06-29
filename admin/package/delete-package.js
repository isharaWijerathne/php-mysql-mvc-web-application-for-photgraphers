import { createMessageBox } from "../../message_box.js";

document.addEventListener("DOMContentLoaded", function () {
    // Create the message box
    createMessageBox("msg_model", "Warning", "This Delete will affect your data", "ok_btn_model");

    // Get modal and buttons
    var messageModalElement = document.getElementById('msg_model');
    var messageModal = new bootstrap.Modal(messageModalElement);
    var okBtnModel = document.getElementById('ok_btn_model');
    var deleteButtons = document.querySelectorAll('.btn-delete');
    let selectedId = null;

    // Attach event listeners to delete buttons
    deleteButtons.forEach(button => {
        button.addEventListener("click", () => {
            selectedId = button.value;
            messageModal.show();
            console.log("Selected ID:", selectedId);
        });
    });

    // Handle confirmation click
    okBtnModel.onclick = () => {
        console.log("Deleting:", selectedId);
        deleteCategory(selectedId);
    };

    // Hide nothification
    const serverMessageWindow = document.getElementById("server_msg");
    if (serverMessageWindow) {
        setTimeout(() => {
            serverMessageWindow.style.display = "none";
            console.log("Server message hidden");
        }, 5000);
    }

    // Delete category function  controllers\package_control\delete_package.php
    function deleteCategory(categoryId) {
        $.get(`../../controllers/package_control/delete_package.php?id=${categoryId}`, function (response, status) {
            try {
                const data = JSON.parse(response);
                if (data.status === "success") {
                    window.location.href = "/hnd/admin/package/package-details.php";
                } else {
                    alert("Failed to delete category.");
                }
            } catch (e) {
                console.error("Invalid JSON response:", response);
            }
        });
    }
});
