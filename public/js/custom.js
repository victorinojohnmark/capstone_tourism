// function handleImageChange(input, imageId) {
//     const files = input.files; // Get the selected files from the input
//     const selectedImage = document.getElementById(imageId);

//     // Clear the existing content in the image viewer
//     selectedImage.innerHTML = '';

//     for (const file of files) {
//         const reader = new FileReader(); // Create a FileReader

//         reader.onload = function(e) {
//             const imgElement = document.createElement('img');
//             imgElement.src = e.target.result;
//             imgElement.className = 'w-full';
            
//             // Append each image to the image viewer
//             selectedImage.appendChild(imgElement);
//         };

//         reader.readAsDataURL(file); // Read the file as a data URL
//     }
// }