window.addEventListener("load", function() {
    document.getElementById("nombre").addEventListener("keyup", function() {
        //console.log(document.getElementById("nombre").value)
        if ((document.getElementById("nombre").value.length) >= 1)
        //fetch('/empleado/buscador/?nombre = $ { document.getElementById("nombre").value}', {
            fetch(`/empleado?nombre= ${document.getElementById("nombre").value}`, {
                method: 'get'
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById('resultados').innerHTML = html
            })
        else
            document.body.innerHTML = html;
    })
})