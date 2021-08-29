//MODAL
  //Var that receives a HTML element (modal)
  var confirmationModal = document.getElementById('confirmationModal')
  //Add an event every time the modal is opened
  confirmationModal.addEventListener('show.bs.modal', function (event) {

    //Btn that adds the modal
    var button = event.relatedTarget

    //Var that receives the modal form
    var form = document.getElementById('formDeletePhoto')

    //Altering the Action(route) of the form
    form.action = "/photos/"+button.getAttribute('data-photo-id')
  })

// LOAD FILE
  function loadFile(event){

    //Var that receives the img element
    var imgPrev = document.getElementById('imgPrev')

    //Link for the image
    var url = URL.createObjectURL(event.target.files[0])

    //Alter the SRC property to the image link
    imgPrev.style.background = "url("+url+") no-repeat center"
    imgPrev.style.backgroundsize = "cover"
  }

