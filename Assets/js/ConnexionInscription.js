const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

function validateFileType() {
    var fileName = document.getElementById("filename").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
        //TO DO
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'none';
        msgerror.innerHTML = "";
    } else {
        //alert("Only jpg/jpeg and png files are allowed!");
        document.getElementById("filename").value = null;
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'block';
        msgerror.innerHTML = "vous devez choisir une image !";
    }
}

function validateFileType1() {
    var fileName = document.getElementById("filename").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "pdf") {
        //TO DO
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'none';
        msgerror.innerHTML = "";
    } else {
        //alert("Only jpg/jpeg and png files are allowed!");
        document.getElementById("filename").value = null;
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'block';
        msgerror.innerHTML = "vous devez choisir un pdf !";
    }
}

function validateFileType2() {
    var fileName = document.getElementById("filename").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "xml") {
        //TO DO
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'none';
        msgerror.innerHTML = "";
    } else {
        //alert("Only jpg/jpeg and png files are allowed!");
        document.getElementById("filename").value = null;
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'block';
        msgerror.innerHTML = "vous devez choisir un fichier xml !";
    }
}

function validateFileType3() {
    var fileName = document.getElementById("filename").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "mp4") {
        //TO DO
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'none';
        msgerror.innerHTML = "";
    } else {
        //alert("Only jpg/jpeg and png files are allowed!");
        document.getElementById("filename").value = null;
        var msgerror = document.getElementById("msg-error");
        msgerror.style.display = 'block';
        msgerror.innerHTML = "vous devez choisir un fichier mp4 !";
    }
}

function setAction(action) {
    document.getElementById('userForm').action = action;
}

function setAction1(action) {
    document.getElementById('coursForm').action = action;
}

function setAction2(action) {
    document.getElementById('qcmForm').action = action;
}

function setAction3(action) {
    document.getElementById('videoForm').action = action;
}

function setAction4(action) {
    document.getElementById('pdfForm').action = action;
}


function confimerMDP() {
    let m1 = document.getElementById('mdp1').value;
    let m2 = document.getElementById('mdp2').value;
    if (m1 != m2) {
        document.getElementById('msg-mdp').style.display = 'block';
        document.getElementById('msg-mdp').innerHTML = 'Mot de passe incorrect!';
        let btn = document.getElementById('insc');
        btn.disabled = true;
    }
    else {
        document.getElementById('msg-mdp').style.display = 'none';
        document.getElementById('msg-mdp').innerHTML = '';
        let btn = document.getElementById('insc');
        btn.disabled = false;
    }

}

