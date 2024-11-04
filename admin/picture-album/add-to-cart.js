
const quill = new Quill('#editor', {
    theme: 'snow'
  });


const quill_edit = new Quill('#editor_edit', {
    theme: 'snow'
  });


const picTitle = document.getElementById("title");
const photographerName = document.getElementById("photographer_name");
const picLocation = document.getElementById("file_location");

const album_name = document.getElementById("album_name");
const selected_cat = document.getElementById("selected_cat");


const picTitle_edit = document.getElementById("title_edit");
const photographerName_edit = document.getElementById("photographer_name_edit");
const picLocation_edit = document.getElementById("file_location_edit");
const img_edit = document.getElementById("edit_img");

const tableDiv = document.getElementById("cartTable");


var cart = [];

let selectedpic = null;
let selectedpic_for_send = null;
const getfilePath = picLocation.addEventListener("change",function()
{
  const file = picLocation.files[0]
  selectedpic_for_send = file;
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = () => {
        selectedpic = reader.result;      
  };
})

function removeCartItem(index)
{
  cart.splice(index,1)
  createTable();
}

function createTable()
{
   var table = `<table class="table">
    <tr>
      <th>Title</th>
      <th>Photographer Name</th>
      <th>Info</th>
      <th>Picture</th>
      <th>Edit</th>
      <th>Remove</th>
    </tr>
    ${cart.map((item,index) => `
    <tr>
      <td>${item.title}</td>
      <td>${item.photographer_name}</td>
      <td>${item.info}</td>
      <td>
        <img src="${item.location}" class="img-thumbnail" style="width : 150px" alt="asd"/>
      </td>
      <td>
        <button class="btn btn-success" onClick="showmodel(${index})" >Edit</button>
      </td>
      <td>
         <button class="btn btn-danger"  onClick="removeCartItem(${index})">Remove</button>
      </td>
    </td>
    `).join('')}
</table>
 <button class='btn btn-danger' id='upload__btn'>upload</button>
 `;


tableDiv.innerHTML = table;
document.getElementById("upload__btn").onclick = uploadData;
}

function clearForm()
{
  picTitle.value = "";
  photographerName.value = "";
  quill.setText("");
  picLocation.value = "";
}

document.getElementById("btn").onclick = (event)=> 
  {
    event.preventDefault();
    const cartItem = {
      "title" : picTitle.value,
      "photographer_name" : photographerName.value,
      "info" : quill.getSemanticHTML(),
      "location" : selectedpic,
      'img' : selectedpic_for_send
    }

    cart.push(cartItem);
    createTable();
    clearForm();
   
}

var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

let selectedpic_edit = null;
let selectedpic_edit_for_send = null;
const getfilePath_edit = picLocation_edit.addEventListener("change",function()
{
  const file = picLocation_edit.files[0]
  selectedpic_edit_for_send = file
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = () => {
    selectedpic_edit = reader.result;  
    img_edit.setAttribute("src",selectedpic_edit);  
  };
  
})


var selected_index = null;
function showmodel(index)
{
  myModal.show();
  selected_index = index;
  const seleted_cart_item = cart[index];
  
  picTitle_edit.value = seleted_cart_item.title;
  photographerName_edit.value = seleted_cart_item.photographer_name;
  quill_edit.setText(seleted_cart_item.info);
  img_edit.setAttribute("src",seleted_cart_item.location)
 
}

function saveChangeEdit()
{
  const edit_cart_item = {
    "title" : picTitle_edit.value,
    "photographer_name" : photographerName_edit.value,
    "info" : quill_edit.getText(),
    "location" : selectedpic_edit,
    'img' : selectedpic_edit_for_send

  }
  cart[selected_index] = edit_cart_item;
  createTable()
  myModal.hide();
}

document.getElementById("btnSaveChangeEdit").onclick = saveChangeEdit;





//Upload
function uploadData()
{
  var formData = new FormData();
  let cartValue = cart.length;
  formData.append("album_name",album_name.value)
  formData.append("selected_cat",selected_cat.value)

  formData.append("cart_length",cartValue)
  
      // "title" : picTitle.value,
      // "photographer_name" : photographerName.value,
      // "info" : quill.getSemanticHTML(),
      // "location" : selectedpic,
      // 'img' : selectedpic_for_send

  cart.forEach((cartItem,index) => {
    formData.append(`titel_${index + 1}`,cartItem.title)
    formData.append(`photographer_name_${index + 1}`,cartItem.photographer_name)
    formData.append(`info_${index + 1}`,cartItem.info)
    formData.append(`img_${index + 1}`,cartItem.img)

  });
  
  
  $.ajax({
    url: "../../controllers/picture_album_control/create_album.php",
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(data) {
        console.log(data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Upload failed: ' + textStatus + ', ' + errorThrown);
    }
});


}