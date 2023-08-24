var person = document.getElementById("Persons");
var sugg = document.getElementById("Spot");
var out;
var personVal = person.value;

document.querySelectorAll('#Persons').value = "100";

personVal = "60";
function info(){
if( personVal == "20"){
  sugg.value = "mini";

}
else if(personVal == "60"){
  sugg.value = "medium";
}
else if(personVal == "100"){
  sugg.value = "large";
}
else if(personVal == "100plus"){
  sugg.value = "open";
}
}

info();