
var fileInput = document.getElementById('photo');
fileInput.addEventListener('change', function(){
    updateFileName()
})


function updateFileName() {

    var fileNameInput = document.getElementById('image');

    console.log(fileInput)
    console.log("value : "+fileInput.value+" "+ typeof(fileInput.value))
    console.log("split : "+fileInput.value.split('\\')+typeof(fileInput.value))
    console.log("split : "+fileInput.value.split('\\').pop()) 
    console.log("count : "+fileInput.value.split('\\').length)

    // Get the selected file name
    var image_name = fileInput.value.split('\\').pop();

    // Update the text input value
    fileNameInput.value = image_name;
}