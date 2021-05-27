function validateSearch() {
    var x = document.forms["searchnews"]["searched"].value;
    if (x == "") {
      alert("Please enter a search term");
      return false;
    }
  }