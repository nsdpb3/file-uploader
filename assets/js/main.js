document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const resultDiv = document.getElementById('result');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      const formData = new FormData(form);
  
      fetch(form.getAttribute('action'), {
        method: form.getAttribute('method'),
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        resultDiv.innerHTML = data;
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });