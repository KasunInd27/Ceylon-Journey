function displayDelete()
{
    alert ("Confirm Delete Account!");
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        const fullname = document.getElementById('fullname').value.trim();
        const username = document.getElementById('username').value.trim();
        const country = document.getElementById('country').value.trim();
        const contactnumber = document.getElementById('contactnumber').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        
        if (!fullname || !username || !country || !contactnumber || !email || !password) {
            alert('All fields are required!');
            event.preventDefault(); 
        }
    });
});
