document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      showResults();
    });
  
    function showResults() {
      var search = document.getElementById('search-input').value;
      window.location.href = 'products.php?search=' + encodeURIComponent(search);
    }
  });
  