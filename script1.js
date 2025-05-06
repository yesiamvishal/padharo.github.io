// script1.js

document.addEventListener("DOMContentLoaded", () => {
    const cartForm = document.getElementById("cartForm");
    const paymentForm = document.getElementById("paymentForm");
    
    // Event listener for Add to Cart form submission
    cartForm.addEventListener("submit", (event) => {
        event.preventDefault();
        
        const itemName = document.getElementById("itemName").value;
        const quantity = document.getElementById("quantity").value;

        // Display the added item in the console (you can also store it in a cart array)
        console.log(`Added to cart: ${itemName}, Quantity: ${quantity}`);
        
        // Reset the form
        cartForm.reset();
        
        // Optionally, show a confirmation message
        alert(`${quantity} of "${itemName}" added to cart!`);
    });

    // Event listener for Payment form submission
    paymentForm.addEventListener("submit", (event) => {
        event.preventDefault();
        
        const cardName = document.getElementById("cardName").value;
        const cardNumber = document.getElementById("cardNumber").value;
        const expiry = document.getElementById("expiry").value;
        const cvv = document.getElementById("cvv").value;

        // Process the payment (you can add your own logic here)
        console.log(`Processing payment for: ${cardName}, Card Number: ${cardNumber}, Expiry: ${expiry}, CVV: ${cvv}`);
        
        // Reset the payment form
        paymentForm.reset();
        
        // Show a payment confirmation message
        alert("Payment processed successfully!");
    });
});
// script1.js

document.addEventListener("DOMContentLoaded", () => {
    const cartForm = document.getElementById("cartForm");
    const paymentForm = document.getElementById("paymentForm");
    const contactForm = document.getElementById("contactForm");
    
    // Add to Cart form event listener
    cartForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const itemName = document.getElementById("itemName").value;
        const quantity = document.getElementById("quantity").value;
        console.log(`Added to cart: ${itemName}, Quantity: ${quantity}`);
        cartForm.reset();
        alert(`${quantity} of "${itemName}" added to cart!`);
    });

    // Payment form event listener
    paymentForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const cardName = document.getElementById("cardName").value;
        const cardNumber = document.getElementById("cardNumber").value;
        const expiry = document.getElementById("expiry").value;
        const cvv = document.getElementById("cvv").value;
        console.log(`Processing payment for: ${cardName}, Card Number: ${cardNumber}, Expiry: ${expiry}, CVV: ${cvv}`);
        paymentForm.reset();
        alert("Payment processed successfully!");
    });

    // Contact form event listener
    contactForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const contactName = document.getElementById("contactName").value;
        const contactEmail = document.getElementById("contactEmail").value;
        const contactMessage = document.getElementById("contactMessage").value;
        console.log(`Contact Form Submitted: Name: ${contactName}, Email: ${contactEmail}, Message: ${contactMessage}`);
        contactForm.reset();
        alert("Your message has been sent!");
    });
});

