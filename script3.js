document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const guests = document.getElementById('guests').value;

    const confirmation = document.getElementById('confirmation');
    confirmation.classList.remove('hidden');
    confirmation.innerHTML = `<h3>Booking Confirmed!</h3>
                              <p>Name: ${name}</p>
                              <p>Date: ${date}</p>
                              <p>Time: ${time}</p>
                              <p>Guests: ${guests}</p>`;
    
    // Clear the form
    this.reset();
});