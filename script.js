function validateForm() {
    var productName = document.getElementById("productName").value;
    
    if (productName === "") {
      alert("Please enter a product name");
      return false;
    }
  
    return true;
  }
  