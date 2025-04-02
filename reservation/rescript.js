


// Confirm delete
function confirmDelete() {
    return confirm("Are you sure you want to delete this reservation?");
}


document.getElementById('hotel').addEventListener('change', function() {
    const hotelValue = this.value;
});

document.addEventListener("DOMContentLoaded", function() {


    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            if (!confirm('Are you sure you want to delete this reservation?')) {
                event.preventDefault(); 
            }
        });
    });

   
    const form = document.getElementById("update-form");
    form.addEventListener("submit", function(event) {
        
        if (!confirm("Are you sure you want to update this reservation?")) {
            event.preventDefault(); 
        }
    });
});