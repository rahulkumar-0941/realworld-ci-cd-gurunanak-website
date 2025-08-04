const YOUR_SERVICE_ID = "";
const YOUR_TEMPLATE_ID = "";

document.getElementById('loadForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;

    const data = {
      name: form.name.value,
      role: form.role.value,
      pickup: form.pickup.value,
      drop: form.drop.value,
      type: form.type.value,
      details: form.details.value
    };

    emailjs.send(YOUR_SERVICE_ID, YOUR_TEMPLATE_ID, data)
      .then(() => {
        alert("Your request has been sent successfully!");
        form.reset();
      })
      .catch((error) => {
        console.error("EmailJS Error:", error);
        alert("There was an error sending your message.");
      });
});