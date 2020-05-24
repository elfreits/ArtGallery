//image button js
function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("myimage");
    var addImageBtnIcon = document.getElementById("addImageBtnIcon");
    imgtag.title = selectedFile.name;

    reader.onload = function(event) {
        imgtag.style.display = "block";
        addImageBtnIcon.style.display = "none";
        imgtag.src = event.target.result;
    };
    reader.readAsDataURL(selectedFile);
}