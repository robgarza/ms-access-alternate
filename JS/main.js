  $(document).ready(function(){
    $("#bDay").change(function(){
      $("#bDay").css('color','black');
    });
  });
  $(document).ready(function(){
    $("#phoneNumber").change(function(){
      $("#phoneNumber").css('color','black');
    });
  });
  $(document).ready(function(){
    $("#civil-status").change(function(){
      $("#civil-status").css('color','black');
    });
  });
  $(document).ready(function(){
    $("#sex").change(function(){
      $("#sex").css('color','black');
    });
  });
  $(document).ready(function(){
    $("#position").change(function(){
      $("#position").css('color','black');
    });
  });
  // This code empowers all input tags having a placeholder and data-slots attribute. credit for this function goes to https://stackoverflow.com/a/55010378
document.addEventListener('DOMContentLoaded', () => {
    for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
        const pattern = el.getAttribute("placeholder"),
            slots = new Set(el.dataset.slots || "_"),
            prev = (j => Array.from(pattern, (c,i) => slots.has(c)? j=i+1: j))(0),
            first = [...pattern].findIndex(c => slots.has(c)),
            accept = new RegExp(el.dataset.accept || "\\d", "g"),
            clean = input => {
                input = input.match(accept) || [];
                return Array.from(pattern, c =>
                    input[0] === c || slots.has(c) ? input.shift() || c : c
                );
            },
            format = () => {
                const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                    i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                    return i<0? prev[prev.length-1]: back? prev[i-1] || first: i;
                });
                el.value = clean(el.value).join``;
                el.setSelectionRange(i, j);
                back = false;
            };
        let back = false;
        el.addEventListener("keydown", (e) => back = e.key === "Backspace");
        el.addEventListener("input", format);
        el.addEventListener("focus", format);
        el.addEventListener("blur", () => el.value === pattern && (el.value=""));
    }
});


function loadOtherPage() {

  $("<iframe>")                             // create a new iframe element
      .hide()                               // make it invisible
      .attr("src", "printable-employee-profile-master-list.php") // point the iframe to the page you want to print
      .appendTo("body");                    // add iframe to the DOM to cause it to load the page

}
function loadYetAnotherPage() {

  $("<iframe>")                             // create a new iframe element
      .hide()                               // make it invisible
      .attr("src", "printable-position-master-list.php") // point the iframe to the page you want to print
      .appendTo("body");                    // add iframe to the DOM to cause it to load the page

}