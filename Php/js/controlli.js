function getcube() {

        var number2=document.getElementById("number2").value;
        var espressione = new RegExp('^[1-9]\\d*(\\.\\d+)?$')
        var res =espressione.test(number2);
        if (espressione.test(number2)== true)
         {
           // "stringa" è conforme all'espressione
           alert("la stringa e ' conforme")
         }
         else
         {
            alert("la stringa non  e ' conforme errore3")
           // "stringa" NON è conforme all'espressione
         }


 }
