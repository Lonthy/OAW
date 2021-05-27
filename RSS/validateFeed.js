//function for validating feed creation
function validateFeedInsert() {
    var x = document.forms["newfeed"]["sName"].value;
    var y = document.forms["newfeed"]["sUrl"].value;
    if (x == "") {
        alert("Please enter a name for the new feed");
        return false;
    } else if(y == ""){
        alert("Please enter a valid feed URL");
        return false;
    }
  }
  function validateFeedDelete(){
    var x = document.forms["delfeed"]["sName"].value;
    if (x == "") {
      alert("Please enter a feed name to delete");
      return false;
    }
  }