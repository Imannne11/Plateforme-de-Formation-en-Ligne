const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});


function setTheme() {
    var bodyBackgroundColor = window.getComputedStyle(document.body).getPropertyValue('background-color');
    console.log('Body background color is ' + bodyBackgroundColor);
    document.cookie = "theme=" + bodyBackgroundColor + "; max-age=" + (60 * 60 * 24 * 365);

    // Check if the background color matches #181a1e
    // if (bodyBackgroundColor == '#181a1e') {
    //     console.log('Body background color is #181a1e');
    //     document.cookie = "theme=dark; max-age=" + (60 * 60 * 24 * 365);
    // } else {
    //     console.log('Body background color is #f6f6f9');
    //     document.cookie = "theme=light; max-age=" + (60 * 60 * 24 * 365);
    // }

}

function getTheme() {
    const cookies = document.cookie.split(";").map(cookie => cookie.trim());
    for (const cookie of cookies) {
        if (cookie.startsWith("theme=")) {
            return cookie.substring(6);
        }
    }
    return null; // Retourne null si le cookie de thème n'est pas trouvé
}

window.onload = function () {
    const savedTheme = getTheme();
    if (savedTheme == 'rgb(24, 26, 30)') {
        document.body.classList.toggle('dark-mode-variables');
        darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
    }
    else {
        document.body.classList.toggle('root');
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
        darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    }
};

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
    setTheme();
})


Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td>${order.paymentStatus}</td>
        <td class="${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
        <td class="primary">Details</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});


function dashboardClick() {
    let elements = document.getElementsByClassName("active");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove("active");
    }
    let dashboard = document.getElementById("dashboard");
    dashboard.classList.add("active");
    let users = document.getElementsByClassName("new-users");
    users[0].style.display = 'block';
    let cours = document.getElementsByClassName("recent-orders");
    cours[0].style.display = 'block';
    let analyse = document.getElementsByClassName("analyse");
    analyse[0].style.display = 'grid';
    // analyse[0].style.gridTemplateColumns = "repeat(3, 1fr)";
    let users18 = document.getElementsByClassName("user18");
    users18[0].style.display = 'none';
    let coursAll = document.getElementsByClassName("coursAll");
    coursAll[0].style.display = 'none';
    let qcm4 = document.getElementsByClassName("qcm4");
    qcm4[0].style.display = 'block';
    let qcmAll = document.getElementsByClassName("qcmAll");
    qcmAll[0].style.display = 'none';

}


function usersClick() {
    let elements = document.getElementsByClassName("active");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove("active");
    }
    let dashboard = document.getElementById("users");
    dashboard.classList.add("active");
    let cours = document.getElementsByClassName("recent-orders");
    for (var i = 0; i < elements.length; i++) {
        cours[i].style.display = 'none';
    }
    let analyse = document.getElementsByClassName("analyse");
    analyse[0].style.display = 'none';
    let users3 = document.getElementsByClassName("user3");
    users3[0].style.display = 'none';
    let users18 = document.getElementsByClassName("user18");
    users18[0].style.display = 'block';
    let qcm4 = document.getElementsByClassName("qcm4");
    qcm4[0].style.display = 'none';
    let qcmAll = document.getElementsByClassName("qcmAll");
    qcmAll[0].style.display = 'none';
}

function coursClick() {
    let elements = document.getElementsByClassName("active");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove("active");
    }
    let dashboard = document.getElementById("cours");
    dashboard.classList.add("active");
    let cours = document.getElementsByClassName("recent-orders");
    cours[0].style.display = 'none';
    let coursAll = document.getElementsByClassName("coursAll");
    coursAll[0].style.display = 'block';
    let users = document.getElementsByClassName("new-users");
    for (var i = 0; i < users.length; i++) {
        users[i].style.display = 'none';
    }
    let analyse = document.getElementsByClassName("analyse");
    for (var i = 0; i < analyse.length; i++) {
        analyse[i].style.display = 'none';
    }
    let qcm = document.getElementsByClassName("recent-qcm");
    for (var i = 0; i < qcm.length; i++) {
        qcm[i].style.display = 'none';
    }

}

function qcmClick() {
    let elements = document.getElementsByClassName("active");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove("active");
    }
    let dashboard = document.getElementById("qcm");
    dashboard.classList.add("active");
    let qcmAll = document.getElementsByClassName("qcmAll");
    qcmAll[0].style.display = 'block';
    let qcm4 = document.getElementsByClassName("qcm4");
    qcm4[0].style.display = 'none';
    let users = document.getElementsByClassName("new-users");
    for (var i = 0; i < users.length; i++) {
        users[i].style.display = 'none';
    }
    let analyse = document.getElementsByClassName("analyse");
    for (var i = 0; i < analyse.length; i++) {
        analyse[i].style.display = 'none';
    }
    let cours = document.getElementsByClassName("recent-orders");
    for (var i = 0; i < cours.length; i++) {
        cours[i].style.display = 'none';
    }

}

function ajoutUser() {
    document.location.href = "AdminAjoutuser.php";
}

function ajoutVideo(id_cours) {
    document.location.href = "ajoutVideo.php?id_cours=" + id_cours;
}

function ajoutPdf(id_cours) {
    document.location.href = "ajoutPdf.php?id_cours=" + id_cours;
}

function afficherPdf(path) {
    window.open("../" + path, '_blank');
}

function modifVideo(id_video) {
    document.location.href = "modifVideo.php?id_video=" + id_video;
}

function modifPdf(id_pdf) {
    document.location.href = "modifPdf.php?id_pdf=" + id_pdf;
}

function afficherPlaylist(id) {
    window.location.href = 'DashboardAdmin.php?id_cours=' + id;
}



// function onPauseVideo() {
//     let spans = document.querySelectorAll('.reminders .notification .icon span');
//     for (i = 0; i < spans.length; i++) {
//         spans[i].innerHTML = p

// }


function changeVideo(vsrc, title, element) {
    var video = document.getElementById("video");
    video.src = vsrc; // Change to the new video source
    // video.load(); // Reload the video element to apply changes
    //     let lis = document.querySelectorAll(".main1 .insights li");
    //     for (i = 0; i < lis.length; i++) {
    //         lis[i].style.background = 'var(--lighter)';
    //     }
    //     element.style.background = 'var(--danger)';


    let spans = document.querySelectorAll('.reminders .notification .icon span');
    // for (i = 0; i < spans.length; i++) {
    //     if (spans[i].textContent == 'pause') {
    //         spans[i].innerHTML = 'play_circle';
    //     }
    //     if (spans[i].textContent == 'play_circle') {
    //         spans[i].innerHTML = 'pause';
    //     }
    // }
    let span = element.querySelector('span');
    if (span.textContent == 'pause') {
        for (i = 0; i < spans.length; i++) {
            spans[i].innerHTML = 'play_circle';
        }
        span.innerHTML = 'play_circle';
        video.pause();

    }
    else {
        for (i = 0; i < spans.length; i++) {
            spans[i].innerHTML = 'play_circle';
        }
        span.innerHTML = 'pause';
        video.play();
    }
    let vidTitle = document.getElementById('vidTitle');
    vidTitle.innerHTML = title;

}

function onVideoClickAll(id) {
    window.location.href = 'DashboardAdmin.php?id_cours=' + id;
    qcmClick();
}


