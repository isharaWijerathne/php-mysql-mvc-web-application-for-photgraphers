 export function createMessageBox(modelId,messageTitle,message,okBtnId)
{
    document.getElementById("msg__box__div").innerHTML = `<div class="modal fade" id="${modelId}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">${messageTitle}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>${message}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="${okBtnId}" class="btn btn-primary">ok</button>
      </div>
    </div>
  </div>
</div>
`;

}

