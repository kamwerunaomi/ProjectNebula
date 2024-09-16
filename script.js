const openForm = document.getElementById('openForm');
const modal = document.getElementById('myModal');
const span = document.getElementsByClassName("close")[0];

openForm.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// fetch('C:\Users\Naomi.Kamweru\OneDrive - Anjarwalla & Khanna LLP\Documents\AzubiProject3\Nebula\studenttotal.php')
//     .then(response => response.json())
//     .then(data => {
//         document.getElementById('totalStudents').textContent = data.totalStudents;
//     });