const groceryList = document.querySelector("tbody");
var updateStatus = document.getElementsByName("update_status");

document.getElementById("item-count").innerHTML = `${updateStatus.length - document.getElementsByClassName("complete").length} items remaining`;

Array.prototype.forEach.call(updateStatus, function(item) {
    item.addEventListener('click', function(e) { 
        
        let id = e.target.id.split("_")[2];
        var xhttp = new XMLHttpRequest();
    
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) { 
             if (this.responseText == "success") {

                if (e.target.checked) {
                    document.getElementById(id).classList.toggle("complete");
                    
                    // If they are all complete, leave item where it is
                    // Otherwise, move to the bottom 
                    if (document.getElementsByClassName("complete").length == document.getElementsByName("update_status").length) {
                    } else {
                        let thisItem = e.target.parentNode.parentNode.parentNode;
                        groceryList.appendChild(thisItem);
                    }

                } else {
                    document.getElementById(id).classList.remove("complete");
                }

                // Update count
                document.getElementById("item-count").innerHTML = `${document.getElementsByName("update_status").length - document.getElementsByClassName("complete").length} items remaining`;
            }
          }
        }
    
        xhttp.open("POST", "/core/update_status.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(`id=${id}&checked=${e.target.checked}`);

    }, false);
});