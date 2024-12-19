let ultimoMensaje = 0;
async function enseñarUltimosMensajes(){
    try{
        const mensajes = await recogerMensajes(ultimoMensaje);
        crearMensajes(mensajes, document.getElementById("mensajesDiv"));
        console.log("mensajes")  
    }catch(error){
        console.error("Error del servidor:", error)
    }
}
function crearMensajes(fetch, mensajesDiv){
    for(let i = 0 ; i < fetch.length ; i++){
        const date = new Date(fetch[i].fecha);
        const p = document.createElement("p");
        p.innerHTML = `<b>${fetch[i].username.toUpperCase()}</b>: ${fetch[i].mensaje}<br>`;
        const fecha = document.createElement("p");
        fecha.innerText = date.toLocaleString("es-ES");
        fecha.classList.add("fecha");
        mensajesDiv.appendChild(p);
        mensajesDiv.appendChild(fecha);
        ultimoMensaje = fetch[i].id;
    }
}
async function recogerMensajes(ultimoMensaje = 0){
    try{
        const response = await fetch("selectMensajes.php",{
            method:"POST",
            headers:{"Content-Type": "application/json"},
            body: JSON.stringify({ultimaID: ultimoMensaje})
        })
        return await response.json();
    }catch(error){
        return [];
    }    
}
async function requerirID(){
    try{
        const response = await fetch("requerirUsuario.php",{
            method:"POST",
            headers:{"Content-Type": "application/json"}
        })
        return await response.json();
    }catch(error){
        return [];
    }
}
function limpiarTabla(){
    fetch("limpiarTabla.php", {
        method:"POST",
        headers:{"Content-Type":"application/json"}
    })
    .then(response=>response.json())
    .catch(error=>console.error("Error del servidor:", error))
}
async function enviarMensaje(){
    const info = {
        usuario: await requerirID(),
        mensaje: document.getElementById("mensaje").value,
    }
    fetch("guardarMensajes.php",{
        method:"POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(info)
        })
        .then(response=>response.json())
        .catch(error=>{
        console.error("Error del servidor:",error)
        })
}
document.getElementById("form").addEventListener('submit', async (event) =>{
    event.preventDefault();
    try{
        await enviarMensaje();
    }catch(error){
        console.error("Error del servidor:", error)
    }
    enseñarUltimosMensajes();
    document.getElementById("form").reset();

    document.getElementById("mensajesDiv").scrollTo({
        top: document.getElementById("mensajesDiv").scrollHeight
    })
});

document.addEventListener('keydown',(event)=>{
    if(event.key == "Enter") document.getElementById("boton").click();
})
setTimeout(()=>{
    setInterval(limpiarTabla, 1000 * 60 * 10);
},1000 * 60 * 10)
setInterval(enseñarUltimosMensajes, 2000)