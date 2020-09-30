function fun() {
  // $(".aa").css("display", "block");
  $(".aa").show("slow");
  $("form").css("margin-top", "30%");
  console.log($("#select").val());
}


var username = $("#username");
console.log($("#password").val());
function submit(){

  var firebaseRef = firebase.database().ref();

  var msgText = username.val();

  firebaseRef.child("username").set(msgText);
}