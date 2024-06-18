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

function restrictToNumbers(inputElement) {
    // Add event listener for keydown event to restrict non-numeric keys
    inputElement.addEventListener('keydown', function(event) {
      // Allow control keys such as backspace, delete, arrow keys, etc.
      const controlKeys = [
        'Backspace', 'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 
        'Delete', 'Tab', 'Escape', 'Enter', 'Home', 'End'
      ];
      
      // Check if the key is a control key or a numeric key (0-9)
      if (
        controlKeys.indexOf(event.key) !== -1 ||
        (event.key >= '0' && event.key <= '9') ||
        (event.key === '.' && !inputElement.value.includes('.'))
      ) {
        return; // Allow the key press
      } else {
        event.preventDefault(); // Prevent the key press
      }
    });
  
    // Add event listener for input event to remove non-numeric characters
    inputElement.addEventListener('input', function() {
      inputElement.value = inputElement.value.replace(/[^0-9.]/g, '');
    });
  }
  