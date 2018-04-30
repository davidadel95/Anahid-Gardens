function loadFields(x) 
        {
            
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("Options").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "ajaxPaymentFields.php?q=" + x, true);
          xhttp.send();
        }
        
        function loadEventNames(x)
        {
            var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("EventNames").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "ajaxEventNames.php?q=" + x, true);
          xhttp.send();
        }
        function showPrice(x)
            {
                var quan = document.getElementById("Quantity").value;
                
                var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("priceDiv").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "ajaxEventPrice.php?q=" + x + "&y=" + quan, true);
              xhttp.send();
            }
        function checkEmail(x)
        {
            if (x.length == 0) {
                document.getElementById("emailResults").innerHTML = "";
                return;
            } 
            else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("emailResults").innerHTML = this.responseText;
                    }
                };
            xmlhttp.open("GET", "ajaxUserMail.php?q=" + x, true);
            xmlhttp.send();
            }
        }
        function showPrice2(x)
            {
                if( !$('#EventName').val() ) {
                    return;
                }
                var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("priceDiv").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "ajaxEventPrice.php?q=" + $('#EventName').val() + "&y=" + x, true);
              xhttp.send();
            }
        function emptyChecker()
        {
            if( $('#EventType').val() == "SelectEventType" ) {
                alert("Please Select an Event Type");
                return false;
            }
            if( $('#TypeSelected').val() == "SelectPaymentType" ) {
                alert("Please Select a Payment Type");
                return false;
            }
            if( $('#EventName').val() == "SelectEventName" ) {
                alert("Please Select the Event Name");
                return false;
            }
            
        }

