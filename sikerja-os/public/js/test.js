
// const box = document.getElementById(id);

// const btn = document.getElementById('btn');

// btn.addEventListener('click', function handleClick() {
//   if (id.style.display === 'none') {
//     id.style.display = 'block';

//     btn.textContent = 'Hide div';
//   } else {
//     id.style.display = 'none';

//     btn.textContent = 'Show div';
//   }
// });

// function changeColor(id) {
//   const elem = document.getElementById(id);
//   elem.style.color = newColor;
// }

function showDiv() {
  document.getElementById("targetDiv").style.display = "block";
}

function hideDiv() {
  document.getElementById("targetDiv").style.display = "none";
}

$(document).ready(function() {
    $("#showDiv").click(function(){
        $("#targetDiv").show();
    });
    $("#hideDiv").click(function(){
        $("#targetDiv").hide();
    });
});


