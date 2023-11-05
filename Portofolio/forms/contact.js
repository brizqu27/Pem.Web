function sendMail(event) {
  event.preventDefault(); // Prevent the form from submitting the traditional way

  var params = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    message: document.getElementById("message").value,
  };

  const serviceID = "service_cxw9p8w"; // Replace with your actual service ID
  const templateID = "template_8pzbkvd"; // Replace with your actual template ID

  emailjs.send(serviceID, templateID, params)
    .then((res) => {
      document.getElementById("name").value = "";
      document.getElementById("email").value = "";
      document.getElementById("message").value = "";
      console.log(res);
      alert("Your Message Sent Successfully! :D");
    })
    .catch((err) => console.log(err));
}
